<?php

namespace app\Controller;

use app\Model\UserModel;

class LoginController extends UserModel
{
    private $user_name;
    private $user_password;

    public function __construct($user_name, $user_password)
    {
        $this->user_name = $user_name;
        $this->user_password = $user_password;
    }

    public function logIndUser()
    {
        if (!$this->emptyInput()) {
            echo "Empty Input";
            exit();
        }
        $this->getUser($this->user_name, $this->user_password);
    }

    private function emptyInput()
    {
        $result = null;

        if (empty($this->user_name) || empty($this->user_password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}