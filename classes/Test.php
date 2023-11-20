<?php

namespace app\classes;

class Test extends db
{
    public function getUsers()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->query($sql);
        while ($row = $stmt->fetch()) {
            echo $row['name'] . '</br>';
        }
    }

    public function getUsersStmt($name, $email)
    {
        $sql = "SELECT * FROM users WHERE name = ? AND email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $email]);
        $users = $stmt->fetchAll();

        foreach ($users as $user) {
            echo $user['name'] . '</br>' . $user['email'];
        }
    }

    public function setUsersStmt($name, $email, $password, $user_type, $profile_image)
    {
        $sql = "INSERT INTO users(name, email, password, user_type, profile_image) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $email, $password, $user_type, $profile_image]);
    }

}
