<?php
require_once __DIR__ . '/vendor/autoload.php';

use app\Controller\LoginController;

{
    if (isset($_POST['submit'])) {
        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];

        $login = new LoginController($user_name, $user_password);

        $login->logIndUser();
        header('Location: index.php?error=Logged');
    }
}