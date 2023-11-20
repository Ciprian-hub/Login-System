<?php
require_once __DIR__ . '/vendor/autoload.php';

use app\Controller\SignUpController;

{
    if (isset($_POST['submit'])) {
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_password_confirm = $_POST['user_password_confirm'];

        $signup = new SignUpController($user_name, $user_email, $user_password, $user_password_confirm);
        $signup->signUpUser();
        header('Location: index.php?error=signed up');
    }
}