<?php
namespace app\views;

use app\Model\UserModel;

class UserView extends UserModel
{
    public function showUser($name)
    {
        $result = $this->getUser($name);

        echo  $result[0]['name'];
    }
}