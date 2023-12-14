<?php
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        

        // fix values
        $validUsername = "kongheng";
        $validPassword = "123";


        if($username==$validUsername &&  $password== $validPassword)
        {
            session_start();
            $_SESSION["username"] = $username;
            header("Location:../index.php"); // Redirect to a protected page after successful login
            exit();

        }
        else
        {
          echo "invalid";
        }
    }
?>