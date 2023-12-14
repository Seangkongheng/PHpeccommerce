<?php
class Connection
{

    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $db_name = "booksell";
    public $conn;



    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
    }
}

class Register extends Connection
{

    public function registration($firstName, $lastName, $username, $email, $password, $confimpassword)
    {

        $duplicate = mysqli_query($this->conn, "SELECT * FROM `useradmin` where usernam = '$username' OR email='$email'");
        if (mysqli_num_rows($duplicate) > 0) {

            $_SESSION['AccountAlready']  = "Email or username has taken already";
        } else {

            if ($password == $confimpassword) {
                $query = "INSERT INTO `useradmin` (fistName, LastName,usernam,email,Password) VALUES ('$firstName', '$lastName','$username','$email','$password')";
                $result = mysqli_query($this->conn, $query);

                if ($result) {
                    $_SESSION['message']  = "Register successfull";
                } else {
                    echo "Registration failed: " . mysqli_error($this->conn);
                }
            } else {
                $_SESSION['message']  = "password not match.";
            }
        }
    }
}

//loh
class Login extends Connection
{
    public $id;
    public function loginform($usernameemial, $password)
    {
        $result = mysqli_query($this->conn, "SELECT * From useradmin where usernam='$usernameemial' OR email='$usernameemial' ");
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            if ($password == $row['Password']) {
                $this->id = $row['admin_id'];
                return 1;
                // login successfull
            } else {

                $_SESSION['message']  = "Invalid username or password. Please try again.";
            }
        } else {
            return 100;
            //user not regisster
        }
    }
    public function idUser()
    {
        return $this->id;
    }
}
class Select extends Connection
{
    public function selectUserByid($id)
    {
        $result = mysqli_query($this->conn, "SELECT * From useradmin where admin_id=$id");
        return mysqli_fetch_assoc($result);
    }
}
