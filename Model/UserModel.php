<?php

namespace app\Model;

use app\classes\db;
use PDO;

class UserModel extends db

{
    protected function setUser($user_name, $user_email, $password)
    {
        $stmt = $this->connectToTestDb()->prepare("INSERT INTO users(user_name, user_email, user_password) VALUES (?, ?, ?);");

        $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($user_name, $user_email, $hashed_pwd))) {
            $stmt = null;
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($user_name, $user_email)
    {
        $stmt = $this->connectToTestDb()->prepare("SELECT user_name FROM users WHERE user_name = ? OR user_email = ?;");

        if (!$stmt->execute(array($user_name, $user_email))) {
            $stmt = null;
            header('location: index.php?stmt=stmtfailed');
            exit();
        }

//        $resultCheck = null;

        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }

    protected function getUser($user_name, $user_password)
    {
        $stmt = $this->connectToTestDb()->prepare("SELECT user_password FROM users WHERE user_name = ? OR user_email = ?;");

        if (!$stmt->execute(array($user_name, $user_name))) {
            $stmt = null;
            header('location: index.php?stmt=stmtfailed');
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('location: index.php?stmt=userNotFound');
            exit();
        }

        $hashed_pwd = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $check_pwd = password_verify($user_password, $hashed_pwd[0]['user_password']);

        if ($check_pwd === false) {
            $stmt = null;
            header('location: index.php?stmt=wrongpwds');
            exit();

        } elseif ($check_pwd === true) {
            $stmt = $this->connectToTestDb()->prepare("SELECT * FROM users WHERE user_name = ? OR user_email = ? AND user_password = ?;");

            if (!$stmt->execute(array($user_name, $user_name, $hashed_pwd[0]['user_password']))) {
                $stmt = null;
                header('location: index.php?stmt=ffff');
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header('location: index.php?stmt=stmtfa');
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();

            $_SESSION['user_id'] = $user[0]['user_id'];
            $_SESSION['user_name'] = $user[0]['user_name'];

            $stmt = null;

        }
    }

}