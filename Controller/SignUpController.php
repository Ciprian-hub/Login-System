<?php

namespace app\Controller;

use app\Model\UserModel;


class SignUpController extends UserModel
{
    private $user_name;
    private $user_email;
    private $user_password;
    private $user_password_confirm;

    public function __construct($user_name, $user_email, $user_password, $user_password_confirm)
    {
        $this->user_name = $user_name;
        $this->user_email = $user_email;
        $this->user_password = $user_password;
        $this->user_password_confirm = $user_password_confirm;
    }

    public function signUpUser()
    {
        if (!$this->emptyInput()) {
            header('location: index.php?err=emptyInput');
            exit();
        }
        if (!$this->invalidUserName()) {
            echo "Invalid user name";
            exit();
        }
        if (!$this->invalidEmail()) {
            echo "Invalid user email";
            exit();
        }
        if (!$this->pwdMatch()) {
            echo "Invalid password match";
            exit();
        }
        if (!$this->nameCheck()) {
            echo "Invalid user";
            exit();
        }
        $this->setUser($this->user_name, $this->user_email, $this->user_password );
    }

    private function emptyInput()
    {
        $result = null;

        if (empty($this->user_name)
            || empty($this->user_email)
            || empty($this->user_password)
            || empty($this->user_password_confirm)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    public function invalidUserName()
    {
        $result = null;

        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->user_name)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    public function invalidEmail()
    {
        $result = null;

        if (!filter_var($this->user_email, FILTER_SANITIZE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    public function pwdMatch()
    {
        $result = null;
        if ($this->user_password !== $this->user_password_confirm) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    public function nameCheck()
    {
        $result = null;
        if (!$this->checkUser($this->user_name, $this->user_email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

}