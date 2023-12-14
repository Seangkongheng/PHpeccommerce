<?php if (isset($error) && !empty($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
<?php } ?>
<style>
    .form-login{
        border-radius: 10px;
        position: absolute;
        top: 25%;
        left: 40%;
        width: 300px;
        padding: 30px;
        box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;
    }
    .btn_login{
        padding-left: 30px;
        padding-right: 30px;
        padding-top: 10px;
        padding-bottom: 10px;
        border: none;
        background-color: black;
        color: white;
        margin-top: 20px;
        margin-left:  140px;
    }
    .btn_login:hover{
      background-color: green;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


   <div class="form-login">
   <h2>Login</h2>
   <hr class="text-warning">
   <form method="post" class="mt-2" action="login.php">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
        
        <input type="submit" class="btn_login" value="Login">
             <p style="font-size: 12px;">Don't have account?</p>   <a class="text-decoration-none" href="">register</a>
    </form>
   </div>