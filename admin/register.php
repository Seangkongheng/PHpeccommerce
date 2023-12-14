
<?php
    require 'funtionloginAndRegister.php';

    // if login or regsiter already can not login again
    if(isset($_SESSION["id"])){
        header('location:dasboad.php');
    }
    $register = new Register();
        
    if(isset($_POST['submit'])){
        $register->registration($_POST['fistname'],$_POST['lastname'],$_POST['username'],$_POST['email'],$_POST['password'],$_POST['confimpassword']);
    }
?>

<style>
    .login-form{
        left: 39%;
        top: 13%;
        position: absolute;
        width: 500px;
        height: auto;
        padding: 50px;
        border-radius: 15px;


    }
    .logo img{
        width: 100px;

    }
    .backgroun-login img{
       width: 100%;
       height: 100%;
    }
    .background-blank{
        width: 100%;
        position:absolute;
        top: 0;
        opacity: 0.6;
       height: 100%;
       background-color: black;
    }
    .btn-login-admin{
        margin-top: 20px;
        padding: 15px 170px;
        background-color: orange;
        border: none;
        border-radius: 10px;
    }
    .btn-login-admin:hover{
        background-color:#FFD3A5;
    }
 
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            <h1 class=" text-center text-white mt-4">Register</h1>
            <?php
            //info message
                if (isset($_SESSION['message'])) {
                ?>
                    <div class="row">
                        <div class="col-12 mb-2 text-success">
                            <?php echo $_SESSION['message']; ?>
                        </div>
                    </div>
                <?php
                    unset($_SESSION['message']);
                }
                ?>
            <form class="row" action="" method="POST" autocomplete="off" >
                <?php
            //info message
                if (isset($_SESSION['AccountAlready'])) {
                ?>
                    <div class="row">
                        <div class="col-12 mb-2 text-danger">
                            <?php echo $_SESSION['AccountAlready']; ?>
                        </div>
                    </div>
                <?php
                    unset($_SESSION['AccountAlready']);
                }
                ?>
               <div class="col-6">
               <label class="text-white mb-3" for="">First Name</label>
                <input type="text" required name="fistname"  class="form-control">
               </div>
               <div class="col-6">
               <label class="text-white mb-3" for="">Last Name</label>
                <input type="text" required name="lastname" class="form-control">
               </div>
                <div class="col-12">
                <label class="text-white mb-3" for="">Username</label>
                <input type="text" required name="username"  class="form-control">
                </div>
                <div class="col-12">
                <label class="text-white mb-3 " for="">email</label>
                <input type="email" required name="email" class="form-control">
                </div>
                <div class="col-12">
               <label class="text-white mb-3 " for="">Password</label>
                <input type="password" required name="password" class="form-control">
               </div>
           
               <div class="col-12">
               <label class="text-white mb-3 " for="">confimpassword</label>
                <input type="password" required name="confimpassword" class="form-control">
               </div> 

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
                <div class="col-12">
                <button class="btn-login-admin mt-5" name="submit" type="submit">Register</button>
                <p class="text-white mt-4">You have acount already ? <a href="logins.php">Login Now</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>