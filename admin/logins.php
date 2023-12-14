<?php
session_start();
require 'funtionloginAndRegister.php';


if(isset($_SESSION["id"])){
    header('location:dasboad.php');
}


$login = new Login();


if (isset($_POST['submit'])) {
    $resul = $login->loginform($_POST['usernameemail'], $_POST['password']);
    if ($resul == 1) {
         $_SESSION['login'] = true;
         $_SESSION['id']=$login->idUser();
     
        echo "login Successfull";
        header('location:dasboad.php');
    }
}
?>



<style>
    .login-form {
        left: 39%;
        top: 25%;
        position: absolute;
        width: 450px;
        height: auto;
        padding: 50px;
        border-radius: 15px;


    }

    .logo img {
        width: 100px;

    }

    .backgroun-login img {
        width: 100%;
        height: 100%;
    }

    .background-blank {
        width: 100%;
        position: absolute;
        top: 0;
        opacity: 0.6;
        height: 100%;
        background-color: black;
    }

    .btn-login-admin {
        margin-top: 20px;
        padding: 10px 150px;
        background-color: orange;
        border: none;
        border-radius: 10px;
    }

    .btn-login-admin:hover {
        background-color: #FFD3A5;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>

<body>
    <div class="login-container">
        <div class="backgroun-login">
            <img src="images/background Login.jpg" alt="">
        </div>
        <div class="background-blank">

        </div>
        <div class="login-form bg-dark">
            <div class="logo">
                <img src="images/icon/logo (2).png" alt="">
            </div>
            <h1 class="text-center text-white mt-4">Please Login</h1>
            <form action="" method="POST">
                <label class="text-white mb-3" for="">Email or Username</label>
                <input type="text" required name="usernameemail" class="form-control">
                <label class="text-white mb-3 " for="">Password</label>

                <input type="password" required name="password" class="form-control">
                <?php
                //info message
                if (isset($_SESSION['message'])) {
                ?>
                    <div class="row">
                        <div class="col-12 mb-2 text-danger">
                            <?php echo $_SESSION['message']; ?>
                        </div>
                    </div>
                <?php
                    unset($_SESSION['message']);
                }
                ?>
                <button name="submit" class="btn-login-admin" type="submit">Login</button>
                <p class="text-white mt-4">Don't have Acount ? <a href="register.php">Register Now</a></p>
            </form>
        </div>
    </div>
</body>

</html>