<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'booksell');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
category_tree(1);
//recusvie funtion
function category_tree($parrent_id)
{
  global $conn;
  $sql = "SELECT * from tbl_catagory whre parrent_id='" . $parrent_id . "'";
  $query_run = mysqli_query($conn, $sql);
}

//add book to database
// if (isset($_POST['addmovie'])) {
//   $title_movie = $_POST['movieTitle'];
//   $Mv_catagory = $_POST['parent_id'];
//   $book_price = $_POST['price'];
//   $book_author = $_POST['author'];
//   $book_stock = $_POST['stock'];
//   $decription = $_POST['Decription_product'];
//   $image = $_FILES['image_book']['name'];
//   $image_temp = $_FILES['image_book']['tmp_name'];
//   $folder = "upload/" . $image;
//   echo  $Mv_catagory;
//   $sql = "INSERT INTO book (book_title,catagory,price,Author,stock,Decription_product,image)
//      VALUES (
//      '$title_movie',
//      '$Mv_catagory',
//       '$book_price',
//       '$book_author',
//       '$book_stock',
//       '$decription',
//       '$image')";
//   $query_run = mysqli_query($conn, $sql);
//   if ($query_run) {

//     move_uploaded_file($image_temp, $folder . $imageFileName);
//     header('location: product.php');
//   } else {
//     // header("location:addNewproduct.php");

//     echo "Successfull nnot";
//     // $_SESSION['message']  = "Insert not successfull";
//   }
// }

// add book news
if (isset($_POST['addmovie'])) {
  $title_movie = $_POST['movieTitle'];
  $Mv_catagory = $_POST['parent_id'];
  list($value1, $value2) = explode(',',$Mv_catagory );
  $book_price = $_POST['price'];
  $book_author = $_POST['author'];
  $book_stock = $_POST['stock'];
  $decription = $_POST['Decription_product'];
  $image = $_FILES['image_book']['name'];
  $image_temp = $_FILES['image_book']['tmp_name'];
  $folder = "upload/" . $image;
  $sql = "INSERT INTO book (book_title,catagory,lavel,price,Author,stock,Decription_product,image)
     VALUES (
     '$title_movie',
     '$value1',
      '$value2',
      '$book_price',
      '$book_author',
      '$book_stock',
      '$decription',
      '$image')";
  $query_run = mysqli_query($conn, $sql);
  if ($query_run) {

    move_uploaded_file($image_temp, $folder . $imageFileName);
    header('location: product.php');
    $_SESSION['success']  = "Insert not successfull";
  } else {
    $_SESSION['message']  = "Insert not successfull";
  }
}

//update book
if (isset($_POST['btnUpdateBook'])) {
  $id = $_POST['Book_id_update']; //this id get when form post
  $booktitleUpdate = $_POST['movieTitle_update'];
  $categoryUpdate = $_POST['catagory_update'];
  $priceUpdate = $_POST['price_update'];
  $athurUpdate = $_POST['author_update'];
  $stockUpdate = $_POST['stock_update'];
  $descriptionUpdate = $_POST['decrtiptionEdit'];
  $image = $_FILES['image_book_update']['name'];
  $image_temp = $_FILES['image_book_update']['tmp_name'];
  $folder = "./upload" . $image; //upload to folder uploat
  $sql = "UPDATE book SET 
      book_title='$booktitleUpdate',
      catagory='$categoryUpdate',
      price='$priceUpdate',
      Author='$athurUpdate',
      stock='$stockUpdate',
      Decription_product='$descriptionUpdate',
      image='$image'
      where 
      book_id='$id'";
  $resul = mysqli_query($conn, $sql);
  if ($resul) {
    header('location: product.php');
  } else {
    header('location: product.php');
  }
}
