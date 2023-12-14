<?php

session_start();

$id = $_GET['id'];

// if(isset($_GET["id"])){
//   $id = $_GET["id"];
//   if($_SESSION["carts"] == ""){
//       $_SESSION["carts"] .= $id;
//   }else{
//       $_SESSION["carts"] .=  "," . $id;
//   }
// }

if(isset($_GET["id"])){
  $id = $_GET["id"];
  if($_SESSION["carts"] == ""){
      $_SESSION["carts"] .= $id;
  }else{
      $_SESSION["carts"] .=  "," . $id;
  }
  header('location: bookpage.php');
}



?>