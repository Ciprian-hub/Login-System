<?php
session_start()
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<?php
require_once __DIR__ . '/vendor/autoload.php';
?>
<ul>
    <?php
    if (isset($_SESSION['user_id'])) {
        ?>
        <li><a href=""><?php echo $_SESSION['user_name']; ?></a></li>
        <li><a href="/logout.php">Logout</a></li>
        <?php
    } else {
        ?>
        <li>Sing Up</li>
        <li>Log In</li>
        <?php
    }
    ?>
</ul>
<div class="d-flex justify-content-center">
    <section>
        <div class="mx-auto pt-5">
            <h2>Sing up</h2>
            <form action="/signup.php" method="post">
                <div class="mb-3">
                    <label for="example" class="form-label">User Name</label>
                    <input type="text" name="user_name" class="form-control" id="example" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="user_email" class="form-control" id="exampleInputEmail1"
                           aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="user_password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPasswordConfirm" class="form-label">Password</label>
                    <input type="password" name="user_password_confirm" class="form-control"
                           id="exampleInputPassword1Confirm">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
    <div class="pt-5">
        <h1 class="mx-5"></h1>
    </div>
    <section>
        <div class="mx-auto pt-5">
            <h2>Log in</h2>
            <form action="/login.php" method="post">
                <div class="mb-3">
                    <label for="example" class="form-label">User Name</label>
                    <input type="text" name="user_name" class="form-control" id="example" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="user_password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
</div>


</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
