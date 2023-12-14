<?php
session_start();
//connection
require_once('connectionFront.php');
$sql = "SELECT * FROM book";
$sql_qeury = mysqli_query($conn, $sql);
// $id = $_GET['id'];
//create array  for stor card
if (!isset($_SESSION["carts"])) {
  $_SESSION["carts"] = "";
}

unset($_SESSION['qty_array']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>contact us</title>
  <!-- bootrap heng-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <!-- font-avsome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- navbar -->
  <nav class="fiexnav navbar navbar-expand-lg  navbar-dark bg-dark ">
    <!-- bg-body-tertiary -->
    <div class="container">
      <a class="navbar-brand" href="index2.php">
        <div class="imag-logo">
          <img src="image/logo-no-background.png" alt="">
        </div>
      </a>
      <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav  mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="index2.php">HOME</a>
          </li>
          <!-- <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="#">CATALOG</a>
        </li> -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              PRODUCT
            </a>
            <div class="catalog-dropdown">
              <ul class="dropdown-menu  mt-4" aria-labelledby="navbarDropdown">
                <div class="all-dropdown d-flex">
                  <div class="firs-dropdown">
                    <li><a class="dropdown-item " href="bookpage.php">Book</a></li>
                    <li><a class="dropdown-item " href="Electronic.php">Electronic</a></li>
                    <li><a class="dropdown-item " href="clothes.php">Clothes</a></li>
                    <li><a class="dropdown-item " href="allpage/toy.php">Toy & Game</a></li>
                    <li><a class="dropdown-item" href="allpage/Furniture.php">Furniture</a></li>
                    <li><a class="dropdown-item" href="#">computer</a></li>
                    <li><a class="dropdown-item" href="#">Smart Home</a></li>
                  </div>
                  <div class="second-dropddown">
                    <li><a class="dropdown-item" href="#">Bebe</a></li>
                    <li><a class="dropdown-item" href="#">Beauty Care</a></li>
                    <li><a class="dropdown-item" href="#">Art & crafts</a></li>
                    <li><a class="dropdown-item" href="#">Television</a></li>
                    <li><a class="dropdown-item" href="#">Pet supplier</a></li>
                    <li><a class="dropdown-item" href="#">The leang</a></li>
                    <li><a class="dropdown-item" href="#">The kheang</a></li>

                  </div>
                  <div class="second-dropddown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Non-Funtion</a></li>
                    <li><a class="dropdown-item" href="#">Literary Fiction</a></li>
                    <li><a class="dropdown-item" href="#">Master-Threaler</a></li>
                    <li><a class="dropdown-item" href="#">Young Adult</a></li>
                    <li><a class="dropdown-item" href="#">Biography & History</a></li>
                    <li><a class="dropdown-item" href="#">Deposting</a></li>


                  </div>
                  <div class="second-dropddown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Kengkingstone</a></li>
                    <li><a class="dropdown-item" href="#">OBI-wan</a></li>
                    <li><a class="dropdown-item" href="#">The nife</a></li>
                    <li><a class="dropdown-item" href="#">star war</a></li>
                    <li><a class="dropdown-item" href="#">Historycle Fiction</a></li>
                    <li><a class="dropdown-item" href="#">Sicent Fiction</a></li>

                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">coppyRight@kon chkea.com</a></li>
                  </div>
                </div>
              </ul>

            </div>

          </li>
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="#">CATEGROY</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="promotion.php">PROMOTION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="contact_us.php">CONTACT US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="#"> SERVICE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="#"> ABOUT AS</a>
          </li>
      </div>
      <div class="right-menu">
        <ul>
          <li class="text-white English">English</li>
          <li class="text-white help">Help</li>

          <li class="dropdown">
            <a class="text-decoration-none text-white " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              <span><a class="text-decoration-none text-white" href="viewcartEcom.php"><i class="fa-solid fa-cart-shopping"></i>
                  <span class="badge bg-danger">
                    <?php
                    // $count = count($_SESSION['cart']);
                    // echo $count;
                    if ($_SESSION["carts"] != "") {
                      $itemsNumber = count(explode(',', $_SESSION["carts"]));
                      echo $itemsNumber;
                    } else {
                      echo "0";
                    }

                    ?>
                  </span>
                </a> </span>
            </a>
            </a>
            <div class="dropdown-menu mt-5 viewcart " aria-labelledby="dropdownMenuLink">
              <div class="card">
                <div class="card-header">
                  <p>shopping cart
                  <p>
                  <p class="count-item">you have <?php echo  $count ?> item in cart</p>
                </div>
                <?php

                $total = 0;
                if (!empty($_SESSION["carts"])) {
                  $sql = "SELECT * FROM book WHERE book_id IN (" . implode(',',  $_SESSION["carts"]) . ")";
                  $sql_qeury = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($sql_qeury) > 0) {
                    while ($row = mysqli_fetch_assoc($sql_qeury)) {

                      $price = $row["price"];
                      $total += $price;
                ?>
                      <div class="view-cart-list">
                        <div class="image-cart">
                          <img src="../admin/upload/<?php echo $row["image"] ?>" alt="">
                        </div>
                        <div class="name-cart">
                          <p><?php echo $row["book_title"] ?></p>
                        </div>
                        <div class="qty-cart">
                          <p>1</p>
                        </div>
                        <div class="price">
                          <p class="text-danger">$<?php echo $row["price"] ?></p>
                        </div>
                        <div class="delete">


                          <a href="deleteCart.php?id=<?php echo $row['book_id'] ?>" class="text-danger"><i class="fa-solid fa-trash"></i></a>
                        </div>
                      </div>
                      <?php

                      ?>
                <?php
                    }
                  }
                } else {
                  echo "<p class='text-center mt-5'>No item cart</>";
                }


                ?>

              </div>
              <div class="bottom-cart mt-3">
                <a href="viewcart.php" class="btn btn-info text-white"> view all</a>
                <?php

                ?>
                <p>Total : <?php echo $total ?>$</p>
              </div>
            </div>
          </li>

          <li class="text-white">

            <?php

            if (isset($_SESSION['user'])) {

              echo "
                    <a href='logout.php'class='text-decoration-none  text-white'> | Logout</a>";
            } else {
              echo '  <a  type="button" class="text-decoration-none text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">login <i class="fa-solid fa-user m2-2"></i></li></a>';
            }
            ?>

          </li>
        </ul>
        <div class="form-before-responsive">
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Login</h5>
            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body bg-dark">
            <div class="form-login">
              <form method="POST" action="code.php">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <!-- <div class="form-outline">
                  <input type="text" id="form3Example1"placholder="name" class="form-control" />
                  <label class="form-label text-white" for="form3Example1"><span class="text-danger">*</span >First name</label>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="form-outline">
                  <input type="text" id="form3Example2" class="form-control" />
                  <label class="form-label text-white" for="form3Example2"><span class="text-danger">*</span>Last name</label>
                </div>
              </div> -->
                  </div>

                  <!-- Email input -->
                  <div class="form-outline mb-3">
                    <input type="text" name="txt_username" id="form3Example3" class="form-control" />
                    <label class="form-label text-white" for="form3Example3"><span class="text-danger">*</span>Username</label>
                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-3">
                    <input type="password" name="txt_password" id="form3Example4" class="form-control" />
                    <label class="form-label text-white" for="form3Example4"> <span class="text-danger">*</span> Password</label>
                  </div>
                  <span class="dont_register text-white" href=""> Have you don't account already? <a href="Register.php" class="text-white"> sing up</a> </span>
                  <!-- Submit button -->
                  <button type="submit" name="btnUserlogign" class="btn btn-primary btn-block float-end">
                    Login
                  </button>

                  <!-- Register buttons -->
                  <div class="text-center mt-4">
                    <p class="text-white">or sign up with:</p>
                    <button type="button" class="btn btn-link btn-floating mx-1">
                      <i class="fab fa-facebook-f"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                      <i class="fab fa-google"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                      <i class="fab fa-twitter"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                      <i class="fab fa-github"></i>
                    </button>
                  </div>
              </form>
            </div>
          </div>
          <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
        </div>
      </div>
    </div>

  </nav>
  <!-- end nave -->
  <div class="background-category-page">
    <div class="content-top-in-category-page">
      <img src="image/category.jpg" alt="">

    </div>
  </div>

  <div class="container">
    <div class="category-listing-on-category-page">
      <h1 class="text-center mt-5">What are you shopping for Today?</h1>
      <div class="all-category-page mt-5">
        <div class="box-and-text-box text-center">
          <div class="category-box">
            <img src="image/boy-category-men.jpg" alt="">
          </div>
          <p class="mt-2">Men</p>
        </div>
        <div class="box-and-text-box text-center">
          <div class="category-box">
            <img src="image/girl_fashtion.jpg" alt="">
          </div>
          <p class="mt-2">Women</p>
        </div>
        <div class="box-and-text-box text-center">
          <div class="category-box">
            <img src="image/boy_fashion.jpg" alt="">
          </div>
          <p class="mt-2">Boy</p>
        </div>
        <div class="box-and-text-box text-center">
          <div class="category-box">
            <img src="image/furniture.jpg" alt="">
          </div>
          <p class="mt-2">Furniture</p>
        </div>
        <div class="box-and-text-box text-center">
          <div class="category-box">
            <img src="image/game.jpg" alt="">
          </div>
          <p class="mt-2">Game & Toy</p>
        </div>
        <div class="box-and-text-box text-center">
          <div class="category-box">
            <img src="image/Electronic.jpg" alt="">
          </div>
          <p class="mt-2">Electronic</p>
        </div>
        <div class="box-and-text-box text-center">
          <div class="category-box">
            <img src="image/smartHome.jpg" alt="">
          </div>
          <p class="mt-2">Smart Home</p>
        </div>


      </div>
    </div>


    <p class="mt-5 text-center">Daily Deas</p>
    <div class="product-listing-on-category">

      <div class="featured-box">
        <div class="product-filter">
          <img src="image/images__2_-removebg-preview.png" alt="">
        </div>
        <p class="mt-3">Apple Watch SE</p>
        <div class="start-stock">
          <div style="font-size: 10px;" class="star text-warning">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          <div style="font-size: 13px;" class="stock">
            <p class="text-success">Stock available</p>
          </div>

        </div>
        <div class="price">
          <div class="price-number">
            <p style="font-size: 18px;color:blue"><b>12.00$</b></p>
          </div>
          <div class="cart-button">
            <a class="btnAdddTowish"><img src="image/add-to-wishlist-icon" alt=""></a><br>
            <a class="btnAddTocart text-danger mt-2" href=""><i class="fa-solid fa-cart-plus"></i></a>
          </div>

        </div>
      </div>
      <div class="featured-box">
        <div class="product-filter">
          <img class="mt-5" src="image/camera2.png" alt="">
        </div>
        <p class="mt-3">Slr Camera Material Hd Transparent</p>
        <div class="start-stock">
          <div style="font-size: 10px;" class="star text-warning">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          <div style="font-size: 13px;" class="stock">
            <p class="text-success">Stock available</p>
          </div>

        </div>
        <div class="price">
          <div class="price-number">
            <p style="font-size: 18px;color:blue"><b>12.00$</b></p>
          </div>
          <div class="cart-button">
            <a class="btnAdddTowish"><img src="image/add-to-wishlist-icon" alt=""></a><br>
            <a class="btnAddTocart text-danger mt-2" href=""><i class="fa-solid fa-cart-plus"></i></a>
          </div>

        </div>
      </div>
      <div class="featured-box">
        <div class="product-filter">
          <img src="image/headphone.png" alt="">
        </div>
        <p class="mt-3">XX99 MARK II HEADPHONES</p>
        <div class="start-stock">
          <div style="font-size: 10px;" class="star text-warning">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          <div style="font-size: 13px;" class="stock">
            <p class="text-success">Stock available</p>
          </div>

        </div>
        <div class="price">
          <div class="price-number">
            <p style="font-size: 18px;color:blue"><b>12.00$</b></p>
          </div>
          <div class="cart-button">
            <a class="btnAdddTowish"><img src="image/add-to-wishlist-icon" alt=""></a><br>
            <a class="btnAddTocart text-danger mt-2" href=""><i class="fa-solid fa-cart-plus"></i></a>
          </div>

        </div>
      </div>
      <div class="featured-box">
        <div class="product-filter">
          <img src="image/images__2_-removebg-preview.png" alt="">
        </div>
        <p class="mt-3">Apple Watch SE</p>
        <div class="start-stock">
          <div style="font-size: 10px;" class="star text-warning">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          <div style="font-size: 13px;" class="stock">
            <p class="text-success">Stock available</p>
          </div>

        </div>
        <div class="price">
          <div class="price-number">
            <p style="font-size: 18px;color:blue"><b>12.00$</b></p>
          </div>
          <div class="cart-button">
            <a class="btnAdddTowish"><img src="image/add-to-wishlist-icon" alt=""></a><br>
            <a class="btnAddTocart text-danger mt-2" href=""><i class="fa-solid fa-cart-plus"></i></a>
          </div>

        </div>
      </div>
      <div class="featured-box">
        <div class="product-filter">
          <img class="mt-5" src="image/camera2.png" alt="">
        </div>
        <p class="mt-3">Slr Camera Material Hd Transparent</p>
        <div class="start-stock">
          <div style="font-size: 10px;" class="star text-warning">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          <div style="font-size: 13px;" class="stock">
            <p class="text-success">Stock available</p>
          </div>

        </div>
        <div class="price">
          <div class="price-number">
            <p style="font-size: 18px;color:blue"><b>12.00$</b></p>
          </div>
          <div class="cart-button">
            <a class="btnAdddTowish"><img src="image/add-to-wishlist-icon" alt=""></a><br>
            <a class="btnAddTocart text-danger mt-2" href=""><i class="fa-solid fa-cart-plus"></i></a>
          </div>

        </div>
      </div>

    </div>
    <div class="product-listing-on-category">
      <div class="featured-box">
        <div class="product-filter">
          <img src="image/images__2_-removebg-preview.png" alt="">
        </div>
        <p class="mt-3">Apple Watch SE</p>
        <div class="start-stock">
          <div style="font-size: 10px;" class="star text-warning">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          <div style="font-size: 13px;" class="stock">
            <p class="text-success">Stock available</p>
          </div>

        </div>
        <div class="price">
          <div class="price-number">
            <p style="font-size: 18px;color:blue"><b>12.00$</b></p>
          </div>
          <div class="cart-button">
            <a class="btnAdddTowish"><img src="image/add-to-wishlist-icon" alt=""></a><br>
            <a class="btnAddTocart text-danger mt-2" href=""><i class="fa-solid fa-cart-plus"></i></a>
          </div>

        </div>
      </div>
      <div class="featured-box">
        <div class="product-filter">
          <img class="mt-5" src="image/camera2.png" alt="">
        </div>
        <p class="mt-3">Slr Camera Material Hd Transparent</p>
        <div class="start-stock">
          <div style="font-size: 10px;" class="star text-warning">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          <div style="font-size: 13px;" class="stock">
            <p class="text-success">Stock available</p>
          </div>

        </div>
        <div class="price">
          <div class="price-number">
            <p style="font-size: 18px;color:blue"><b>12.00$</b></p>
          </div>
          <div class="cart-button">
            <a class="btnAdddTowish"><img src="image/add-to-wishlist-icon" alt=""></a><br>
            <a class="btnAddTocart text-danger mt-2" href=""><i class="fa-solid fa-cart-plus"></i></a>
          </div>

        </div>
      </div>
      <div class="featured-box">
        <div class="product-filter">
          <img src="image/headphone.png" alt="">
        </div>
        <p class="mt-3">XX99 MARK II HEADPHONES</p>
        <div class="start-stock">
          <div style="font-size: 10px;" class="star text-warning">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          <div style="font-size: 13px;" class="stock">
            <p class="text-success">Stock available</p>
          </div>

        </div>
        <div class="price">
          <div class="price-number">
            <p style="font-size: 18px;color:blue"><b>12.00$</b></p>
          </div>
          <div class="cart-button">
            <a class="btnAdddTowish"><img src="image/add-to-wishlist-icon" alt=""></a><br>
            <a class="btnAddTocart text-danger mt-2" href=""><i class="fa-solid fa-cart-plus"></i></a>
          </div>

        </div>
      </div>
      <div class="featured-box">
        <div class="product-filter">
          <img src="image/images__2_-removebg-preview.png" alt="">
        </div>
        <p class="mt-3">Apple Watch SE</p>
        <div class="start-stock">
          <div style="font-size: 10px;" class="star text-warning">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          <div style="font-size: 13px;" class="stock">
            <p class="text-success">Stock available</p>
          </div>

        </div>
        <div class="price">
          <div class="price-number">
            <p style="font-size: 18px;color:blue"><b>12.00$</b></p>
          </div>
          <div class="cart-button">
            <a class="btnAdddTowish"><img src="image/add-to-wishlist-icon" alt=""></a><br>
            <a class="btnAddTocart text-danger mt-2" href=""><i class="fa-solid fa-cart-plus"></i></a>
          </div>

        </div>
      </div>
      <div class="featured-box">
        <div class="product-filter">
          <img class="mt-5" src="image/camera2.png" alt="">
        </div>
        <p class="mt-3">Slr Camera Material Hd Transparent</p>
        <div class="start-stock">
          <div style="font-size: 10px;" class="star text-warning">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          <div style="font-size: 13px;" class="stock">
            <p class="text-success">Stock available</p>
          </div>

        </div>
        <div class="price">
          <div class="price-number">
            <p style="font-size: 18px;color:blue"><b>12.00$</b></p>
          </div>
          <div class="cart-button">
            <a class="btnAdddTowish"><img src="image/add-to-wishlist-icon" alt=""></a><br>
            <a class="btnAddTocart text-danger mt-2" href=""><i class="fa-solid fa-cart-plus"></i></a>
          </div>

        </div>
      </div>

    </div>
    <p style="margin-top: 200px;" class="text-center"> <b>OUR RECOMMENT</b></p>
    <div class="Recomment-category-box">
      <div class="all-category-page mt-5">
        <div class="box-and-text-box text-center">
          <div class="category-box">
            <img src="image/book_jpg.jpg" alt="">
          </div>
          <p class="mt-2">Book</p>
        </div>
        <div class="box-and-text-box text-center">
          <div class="category-box">
            <img src="image/kitchent.jpg" alt="">
          </div>
          <p class="mt-2">Kitchen</p>
        </div>
        <div class="box-and-text-box text-center">
          <div class="category-box">
            <img src="image/clothes.jpg" alt="">
          </div>
          <p class="mt-2">Clothes</p>
        </div>
        <div class="box-and-text-box text-center">
          <div class="category-box">
            <img src="image/bebe.jpg" alt="">
          </div>
          <p class="mt-2">Beauty Care</p>
        </div>
        <div class="box-and-text-box text-center">
          <div class="category-box">
            <img src="image/Art & crafts.jpg" alt="">
          </div>
          <p class="mt-2">Art & crafts</p>
        </div>
        <div class="box-and-text-box text-center">
          <div class="category-box">
            <img src="image/pet.jpg" alt="">
          </div>
          <p class="mt-2">Pet</p>
        </div>
        <div class="box-and-text-box text-center">
          <div class="category-box">
            <img src="image/Television.jpg" alt="">
          </div>
          <p class="mt-2">Television</p>
        </div>


      </div>
    </div>

    <div class="deal-today mt-5">
      <div class="contet-deal-today">
        <div class="text-decription-today">
          <h3>Access Exculusive Deals today</h3>
          <p>Get now you shipping Address in cambodia for free</p><br><br>
          <a href="" class="btn-signNow-on-category mt-5">Learn More &nbsp; &nbsp;<i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="image-deal-today">
          <img src="image/shipping.jpg" alt="">
        </div>

      </div>
    </div>
  </div>
  </div>
  </div>
  <footer class="footer-block mt-5">
    <div class="top-footer">
      <form action="">
        <label for="" class="form-label text-white">Email Address :</label>
        <input class="" type="text" name="" id="" placeholder="Enter Your email...">
        <button class="btn-suubcribe">Subcribe</button>
      </form>
    </div>
    <div class="content-footer mt-4">
      <div class="container">
        <div class="all-list-in-footer">
          <div class="shopping-guid">
            <h5 class="text-white">SHOPPING GUIDE</h5>
            <li><a class="text-decoration-none" href=""> <i class="fa-solid fa-angle-right"></i> &nbsp; Blog</a></li>
            <li><a class="text-decoration-none" href=""> <i class="fa-solid fa-angle-right"></i> &nbsp; FAQs</a></li>
            <li><a class="text-decoration-none" href=""> <i class="fa-solid fa-angle-right"></i> &nbsp; Payment</a></li>
            <li><a class="text-decoration-none" href=""> <i class="fa-solid fa-angle-right"></i> &nbsp; Shipment</a></li>
            <li><a class="text-decoration-none" href=""> <i class="fa-solid fa-angle-right"></i> &nbsp; Where is my order?</a></li>
            <li><a class="text-decoration-none" href=""> <i class="fa-solid fa-angle-right"></i> &nbsp; Return Policy</a></li>
          </div>
          <div class="style-advisor">
            <h5 class="text-white">INFOMATION</h5>
            <li><a class="text-decoration-none" href=""> <i class="fa-solid fa-angle-right"></i> &nbsp; Your Account</a></li>
            <li><a class="text-decoration-none" href=""> <i class="fa-solid fa-angle-right"></i> &nbsp; Information</a></li>
            <li><a class="text-decoration-none" href=""> <i class="fa-solid fa-angle-right"></i> &nbsp; Address</a></li>
            <li><a class="text-decoration-none" href=""> <i class="fa-solid fa-angle-right"></i> &nbsp; Discount</a></li>
            <li><a class="text-decoration-none" href=""> <i class="fa-solid fa-angle-right"></i> &nbsp; Order History</a></li>
            <li><a class="text-decoration-none" href=""> <i class="fa-solid fa-angle-right"></i> &nbsp; Order Tracking</a></li>
          </div>
          <div class="information">
            <h5 class="text-white">ABOUT US</h5>
            <li><a class="text-decoration-none" href=""> <i class="fa-solid fa-angle-right"></i> &nbsp; Site Map</a></li>
            <li><a class="text-decoration-none" href=""> <i class="fa-solid fa-angle-right"></i> &nbsp; Search Terms</a></li>
            <li><a class="text-decoration-none" href=""> <i class="fa-solid fa-angle-right"></i> &nbsp; Advanced Search</a></li>
            <li><a class="text-decoration-none" href=""> <i class="fa-solid fa-angle-right"></i> &nbsp; About As</a></li>
            <li><a class="text-decoration-none" href=""> <i class="fa-solid fa-angle-right"></i> &nbsp; contack us</a></li>
            <li><a class="text-decoration-none" href=""> <i class="fa-solid fa-angle-right"></i> &nbsp; Supplies</a></li>
          </div>
          <div class="contact-us">
            <h5 class="text-white">CONTACT US</h5>
            <div class="address-footer">
              <div style="font-size: 22px; margin-top:-10px;     color: rgb(0, 255, 179);" class="icon-footer-location">
                <i class="fa-solid fa-location-dot"></i>
              </div>
              <div class="address-text">
                <p class="text-white">ABC ,Phnom penh city street 1st </p>
              </div>
            </div>
            <div class="phone-footer">
              <div style="font-size: 22px; margin-top:-10px;     color: rgb(0, 255, 179);" class="icon-footer-location" class="icon-footer-location">
                <i class="fa-solid fa-phone"></i>
              </div>
              <div class="address-text">
                <p class="text-white">+88511558927</p>
              </div>
            </div>
            <div class="email-footer">
              <div style="font-size: 22px; margin-top:-10px;color: rgb(0, 255, 179);" class="icon-footer-location" class="icon-footer-location">
                <i class="fa-solid fa-envelope"></i>
              </div>
              <div class="address-text">
                <p class="text-white">konghengseang@gamil.com</p>
              </div>
            </div>
          </div>

        </div>
        <!-- .bottom-footer -->

      </div>
      <div class="bottom-footer">
        <div class="footer-block-end">
          <div class="socail mt-1">
            <!-- Facebook -->
            <a class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="#!" role="button"><i class="fab fa-facebook-f"></i>
            </a>
            <a class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram"></i>
            </a>
            <!-- Twitter -->
            <a class="btn text-white btn-floating m-1" style="background-color: #55acee;" href="#!" role="button"><i class="fab fa-twitter"></i></a>


            <!-- Instagram -->
            <a class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram"></i></a>

            <!-- Github -->
            <a class="btn text-white btn-floating m-1" style="background-color: #333333;" href="#!" role="button"><i class="fab fa-github"></i></a>

          </div>
          <div class="bank-card">
            <div class="paypal">
              <img src="image/PayPal-Logo.png" alt="">
            </div>
            <div class="visa-card">
              <img src="image/6220a9b0912013c51947f9b8.png" alt="">
            </div>
          </div>
        </div>
        <p class="text-center text-white">Copyright@2023 seang kong heng</p>
      </div>

    </div>
  </footer>
</body>

</html>