<?php
namespace app\Controller;
use app\Model\UserModel;

class UserController extends UserModel
{
    public function createUser($name, $email, $password, $user_type, $profile_image)
    {
        $this->insertUser($name, $email, $password, $user_type, $profile_image);
    }

}