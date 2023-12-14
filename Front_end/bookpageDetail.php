<?php
session_start();
//connection
require_once('connectionFront.php');
require_once("../admin/functions.php");
$sql = "SELECT * FROM book";
$sql_qeury = mysqli_query($conn, $sql);
// $id = $_GET['id'];
//create array  for stor card
if (!isset($_SESSION['cart'])) {

  $_SESSION['cart'] = array();
}
unset($_SESSION['qty_array']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Online store</title>
</head>
<!-- bootrap heng-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<!-- font-avsome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="style.css">
<!-- cdn jqery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- end cdn  jqery -->

<body>
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
            <a class="nav-link dropdown-toggle" href="index2.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              PRODUCT
            </a>
            <div class="catalog-dropdown">
              <ul class="dropdown-menu  mt-4" aria-labelledby="navbarDropdown">
                <div class="all-dropdown d-flex">
                  <div class="firs-dropdown">
                    <li><a class="dropdown-item " href="bookpage.php">Book</a></li>
                    <li><a class="dropdown-item " href="Electronic.php">Electronic</a></li>
                    <li><a class="dropdown-item " href="clothes.php">Clothes</a></li>
                    <li><a class="dropdown-item " href="toy.php">Toy</a></li>
                    <li><a class="dropdown-item" href="Furniture.php">Furniture</a></li>
                    <li><a class="dropdown-item" href="#">Marima</a></li>
                    <li><a class="dropdown-item" href="#">Holywood</a></li>
                  </div>
                  <div class="second-dropddown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Thunder</a></li>
                    <li><a class="dropdown-item" href="#">The king</a></li>
                    <li><a class="dropdown-item" href="#">The vdo move</a></li>
                    <li><a class="dropdown-item" href="#">Counting casualties</a></li>
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
            <a class="nav-link text-white" aria-current="page" href="#">CATEGORY</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="#">PROMOTION</a>
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
              <span>cart
                <span class="badge bg-danger">
                  <?php
                  $count = count($_SESSION['cart']);
                  echo $count;
                  ?>
                </span>
              </span>
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
                if (!empty($_SESSION['cart'])) {
                  $sql = "SELECT * FROM book WHERE book_id IN (" . implode(',', $_SESSION['cart']) . ")";
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
  <div class="container">
    <!-- content-book -->
    <div class="content-book mt-5">
      <div class="category">
        <div class="category-content-listing">
          <div class="all-categroy-listing">
            <h5 style="padding: 10px 50px;background-color: black; color:white;"><i class="fa-solid fa-bars"></i>&nbsp;&nbsp; CATEGORIES</h5>
            <?php CategoryItemsListingINfrontEnd(0); ?>
            <li>
            </li>
          </div>
          <div class="box-discount-one mt-4">
            <img src="image/headphoneDiscound.jpg" alt="">
            <div class="discount-title-image mt-4">
              <div class="tiltle-discound">
                <p><b>Headphone</b></p>
                <h4>Save <span class="text-info">50%</span></h4>
                <a href="" class="text-decoration-none">See all <i class="fa-solid fa-arrow-right"></i></a>
              </div>
              <div class="image-discound-blutoo">
                <img src="image/kas blu.png" alt="">
              </div>
            </div>
          </div>
          <div class="all-service-chiping">
            <div class="shipping-box mt-4">
              <div class="content-shpping-box">
                <div class="icon-shipping text-info">
                  <i class="fa-solid fa-truck-fast"></i>
                </div>
                <div class="title-shipping">
                  <h5>Free shipping</h5>
                  <p>Minimum Order 90$</p>
                </div>
              </div>
            </div>
            <div class="support-box mt-4">
              <div class="content-support-box">
                <div class="icon-shipping text-info">
                  <i class="fa-solid fa-headset"></i>
                </div>
                <div class="title-shipping">
                  <h5>24/7 Support</h5>
                  <p>Minimum Order 90$</p>
                </div>
              </div>
            </div>
            <div class="offer-box mt-4">
              <div class="content-offer-box">

                <div class="icon-shipping text-info">
                  <i class="fa-solid fa-hand-holding-dollar"></i>
                </div>
                <div class="title-shipping">
                  <h5>price & Offer</h5>
                  <p>Minimum Order 90$</p>
                </div>
              </div>
            </div>
            <div class="return-box mt-4">
              <div class="conent-return-box">
                <div class="icon-shipping text-info">
                  <i class="fa-solid fa-right-left"></i>
                </div>
                <div class="title-shipping">
                  <h5>Easy Retrun</h5>
                  <p>Minimum Order 90$</p>
                </div>
              </div>
            </div>

          </div>
          <!-- best-selling -->
          <div class="best-selling">
            <div class="content-best-selling">
              <div class="title-best-seller">
                <p class="mt-4"><b>BEST SELLING</b></p>
              </div>

              <div class="content-best-seller mt-3">
                <div class="image-best-seller">
                  <img style="width: 70px;" src="image/watch1.jpg" alt="">
                </div>
                <div class="decription-best-seller">
                  <p><b style="font-size: 13px;">Aplle watch DSR</b></p>
                  <div style="font-size: 10px;" class="star text-warning">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <p><b style="font-size: 13px;" class="text-danger">1008$</b></p>
                </div>
              </div>

              <div class="content-best-seller mt-3">
                <div class="image-best-seller">
                  <img style="width: 70px;" src="image/watch2.jpg" alt="">
                </div>
                <div class="decription-best-seller">
                  <p><b style="font-size: 13px;">Aplle watch RSD</b></p>
                  <div style="font-size: 10px;" class="star text-warning">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <p><b style="font-size: 13px;" class="text-danger">1008$</b></p>
                </div>
              </div>


              <div class="content-best-seller mt-3">
                <div class="image-best-seller">
                  <img style="width: 70px;" src="image/watch3.jpg" alt="">
                </div>
                <div class="decription-best-seller">
                  <p><b style="font-size: 13px;">Aplle watch HDV</b></p>
                  <div style="font-size: 10px;" class="star text-warning">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <p><b style="font-size: 13px;" class="text-danger">1008$</b></p>
                </div>
              </div>


              <div class="content-best-seller mt-3">
                <div class="image-best-seller">
                  <img style="width: 70px;" src="image/watch4.jpg" alt="">
                </div>
                <div class="decription-best-seller">
                  <p><b style="font-size: 13px;">Aplle watch 1080</b></p>
                  <div style="font-size: 10px;" class="star text-warning">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <p><b style="font-size: 13px;" class="text-danger">1008$</b></p>
                </div>
              </div>


            </div>
          </div>
          <!-- best-specail -->
          <div class="best-selling">
            <div class="content-best-selling">
              <div class="title-best-seller">
                <p class="mt-4"><b>SPECAIL</b></p>
              </div>

              <div class="content-best-seller mt-3">
                <div class="image-best-seller">
                  <img style="width: 70px;" src="image/chair.png" alt="">
                </div>
                <div class="decription-best-seller">
                  <p><b style="font-size: 13px;">Aplle watch DSR</b></p>
                  <div style="font-size: 10px;" class="star text-warning">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <p><b style="font-size: 13px;" class="text-danger">1008$</b></p>
                </div>
              </div>

              <div class="content-best-seller mt-3">
                <div class="image-best-seller">
                  <img style="width: 70px;" src="image/headphone.png" alt="">
                </div>
                <div class="decription-best-seller">
                  <p><b style="font-size: 13px;">Aplle watch RSD</b></p>
                  <div style="font-size: 10px;" class="star text-warning">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <p><b style="font-size: 13px;" class="text-danger">1008$</b></p>
                </div>
              </div>


              <div class="content-best-seller mt-3">
                <div class="image-best-seller">
                  <img style="width: 70px;" src="image/watch3.jpg" alt="">
                </div>
                <div class="decription-best-seller">
                  <p><b style="font-size: 13px;">Aplle watch HDV</b></p>
                  <div style="font-size: 10px;" class="star text-warning">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <p><b style="font-size: 13px;" class="text-danger">1008$</b></p>
                </div>
              </div>


              <div class="content-best-seller mt-3">
                <div class="image-best-seller">
                  <img style="width: 70px;" src="image/watch4.jpg" alt="">
                </div>
                <div class="decription-best-seller">
                  <p><b style="font-size: 13px;">Aplle watch 1080</b></p>
                  <div style="font-size: 10px;" class="star text-warning">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <p><b style="font-size: 13px;" class="text-danger">1008$</b></p>
                </div>
              </div>


            </div>
          </div>
          <div class="specail-dicount">
            <div class="image-discount-specail">
              <img src="image/specail-discount.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="bookshoping">
        <div class="navbar_book">
          <ul class="">
            <a href="">
              <li>seang kong heng</li>
            </a>
            <a href="">
              <li>More book Detail</li>
            </a>
          </ul>
        </div>
        <div class="book-all-content">
          <div class="">

            <div class="all-content-book-detail">

              <div class="picture-book-detail">

                <div class="book-detail">
                  <?php
                  $id = $_GET['id'];
                  $sql = "SELECT * FROM book WHERE book_id ='$id'";
                  $sql_qeury = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($sql_qeury) > 0) {
                    while ($row = mysqli_fetch_assoc($sql_qeury)) {
                  ?>
                      <div class="image-zoomer-box">
                        <img class="zoomImage" src="../admin/upload/<?php echo $row["image"] ?>" />

                      </div>
                      <div class="diplay-all-sub-image mt-4">

                      </div>
                </div>

            <?php
                    }
                  }
            ?>


              </div>
              <div class="deciption">
                <?php
                $id = $_GET['id'];
                $sql = "SELECT * FROM book WHERE book_id ='$id'";
                $sql_qeury = mysqli_query($conn, $sql);
                if (mysqli_num_rows($sql_qeury) > 0) {
                  while ($row = mysqli_fetch_assoc($sql_qeury)) {
                ?>
                    <div class="all-decription">
                      <div class="top-decription">
                        <h4><?php echo $row['book_title'] ?></h4>
                        <small>creat by : <span class="text-success"><?php echo $row['Author'] ?></span></small>
                        <div class="star mt-2">
                          <i class="fa-solid fa-star text-danger"></i>
                          <i class="fa-solid fa-star text-danger"></i>
                          <i class="fa-solid fa-star text-danger"></i>
                          <i class="fa-solid fa-star text-danger"></i>
                          <i class="fa-solid fa-star text-danger"></i>
                          ratings
                        </div>
                        <p class="mt-2">Available : <span>Stock in / Stock out</span> </p>
                        <p>Price : <span class="text-danger"><?php echo $row['price'] ?>.00$</span></p>
                        <p class="">Part of: Charming Petites (51 books)</p>

                      </div>
                      <div class="buttom-decription mt-3">
                        <h4>Additional Details</h4>
                        <p><?php echo $row['Decription_product'] ?></p>
                      </div>
                      <div class="button-add-cart-book-detail mt-5">
                        <a class="btnAddtocat" href="book_add_tocard.php?id=<?php echo $row['book_id'] ?>">Add to Cart</a>
                        <!-- <a class="btn btn-warning mt-2" href="">Add list</a> -->
                        <a class="btnBuyNow mt-5" href="">Buy Now</a>
                      </div>

                    </div>
                <?php
                  }
                }
                ?>
                <p class="mt-5"><span class="text-danger">*</span>Free shipping every where in the word </p>
              </div>

            </div>
            <div class="fast-delivery">
              <div class="all-box-fast-delivery">
                <div class="box-fast-delivery">
                  <div class="icon-delivery-on-detail-page">
                    <i style="font-size: 50px;" class="fa-solid fa-truck-fast"></i>
                  </div>
                  <h5 class="mt-3">Fast Delivery</h5>
                  <p style="font-size: 12px;">We ship globaly to over 100 + contry around the word!</p>
                </div>
                <div class="box-fast-delivery">
                  <div class="icon-delivery-on-detail-page">

                    <i style="font-size: 50px;" class="fa-solid fa-circle-dollar-to-slot"></i>
                  </div>
                  <h5 class="mt-3">We donaote</h5>
                  <p style="font-size: 12px;">Make an impach throught product that give back</p>
                </div>
                <div class="box-fast-delivery">
                  <div class="icon-delivery-on-detail-page">

                    <i style="font-size: 50px;" class="fa-solid fa-sun"></i>
                  </div>
                  <h5 class="mt-3">Fast Delivery</h5>
                  <p style="font-size: 12px;">We ship globaly to over 100 + contry around the word!</p>
                </div>
                <div class="box-fast-delivery">
                  <div class="icon-delivery-on-detail-page">
                    <i style="font-size: 50px;" class="fa-solid fa-code-compare"></i>
                  </div>
                  <h5 class="mt-3">Secure</h5>
                  <p style="font-size: 12px;">shop with the confidence 100% secure checkout</p>
                </div>

              </div>
            </div>
            <h3 class="text-center">You may like this</h3>
            <div class="container">
              <div class="product-interested mt-5">
                <div class="featured-box">
                  <div class="product-filter">
                    <img src="image/chair.png" alt="">
                  </div>
                  <p class="mt-3">Premium Qualitty black</p>
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
                    <img src="image/chair.png" alt="">
                  </div>
                  <p class="mt-3">Premium Qualitty black</p>
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
                    <img src="image/chair.png" alt="">
                  </div>
                  <p class="mt-3">Premium Qualitty black</p>
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
                    <img src="image/chair.png" alt="">
                  </div>
                  <p class="mt-3">Premium Qualitty black</p>
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

              </div><br>
              <div class="product-interested mt-5">
                <div class="featured-box">
                  <div class="product-filter">
                    <img src="image/chair.png" alt="">
                  </div>
                  <p class="mt-3">Premium Qualitty black</p>
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
                    <img src="image/chair.png" alt="">
                  </div>
                  <p class="mt-3">Premium Qualitty black</p>
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
                    <img src="image/chair.png" alt="">
                  </div>
                  <p class="mt-3">Premium Qualitty black</p>
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
                    <img src="image/chair.png" alt="">
                  </div>
                  <p class="mt-3">Premium Qualitty black</p>
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

              </div><br>
              <h4 class="text-center mt-5">Customer Review's</h4>
              <p class="text-center">5.0
                <i style="font-size: 10px;color:red" class="fa-solid fa-star"></i>
                <i style="font-size: 10px;color:red;" class="fa-solid fa-star"></i>
                <i style="font-size: 10px;color:red;" class="fa-solid fa-star"></i>
                <i style="font-size: 10px;color:red;" class="fa-solid fa-star"></i>
                <i style="font-size: 10px;color:red;" class="fa-solid fa-star"></i>
              </p>
              <div class="commet-block-page-detail">
                <hr>
                <p>All Comment <span class="text-danger">(3)</span> </p>
                <hr>

                <div class="form-post-comment">
                  <div class="content-comment">
                    <div class="profil-user">
                      <img src="image/comment-profile-picture.jpg" alt="">
                    </div>
                    <div class="user-decription">
                      <form action="">
                        <div class="form__group field">
                          <input type="input" class="form__field" placeholder="Write you comment here" name="name" id='name' required />
                          <label for="name" class="form__label">Write you comment here</label>
                          <button class="mt-3 btn_add_comment">Add comment</button>
                        </div>
                        <style>
                          .form__group {
                            position: relative;
                            padding: 15px 0 0;
                            margin-top: 10px;
                            width: 200%;
                          }

                          .form__field {
                            font-family: inherit;
                            width: 100%;
                            border: 0;
                            border-bottom: 2px solid gray;
                            outline: 0;
                            font-size: 1.3rem;
                            color: gray;
                            padding: 7px 0;
                            background: transparent;
                            transition: border-color 0.2s;

                            &::placeholder {
                              color: transparent;
                            }

                            &:placeholder-shown~.form__label {
                              font-size: 1.3rem;
                              cursor: text;
                              top: 20px;
                            }
                          }

                          .form__label {
                            position: absolute;
                            top: 0;
                            display: block;
                            transition: 0.2s;
                            font-size: 1rem;
                            color: gray;
                          }

                          .form__field:focus {
                            ~.form__label {
                              position: absolute;
                              top: 0;
                              display: block;
                              transition: 0.2s;
                              font-size: 1rem;
                              color: primary;
                              font-weight: 700;
                            }

                            padding-bottom: 6px;
                            font-weight: 700;
                            border-width: 3px;
                            border-image: linear-gradient(to right, primary, secondary);
                            border-image-slice: 1;
                          }

                          .form__field {

                            &:required,
                            &:invalid {
                              box-shadow: none;
                            }
                          }
                        </style>
                      </form>
                    </div>
                  </div>
                </div>
                <hr class="mt-5">
                <div class="all-comment-display">
                  <div class="all-box-diplay-comment">
                    <div class="diplay-box-image-profile">
                      <img src="image/comment-profile-picture.jpg" alt="">
                    </div>
                    <div class="date-decription-display-comment">
                      <p><b>seang kong heng</b>&nbsp; 10-10-2023,&nbsp; 7:58 PM</p>
                      <p style="margin-top: -15px;">You product is so hight quality and cheep more than order shopping and fast shipping</p>
                    </div>
                  </div>

                  <div class="all-box-diplay-comment">
                    <div class="diplay-box-image-profile">
                      <img src="image/comment-profile-picture.jpg" alt="">
                    </div>
                    <div class="date-decription-display-comment">
                      <p><b>Pen Techmeng</b>&nbsp; 10-10-2023,&nbsp; 7:58 PM</p>
                      <p style="margin-top: -15px;">You product is so hight quality and cheep more than order shopping and fast shipping</p>
                    </div>
                  </div>

                  <div class="all-box-diplay-comment">
                    <div class="diplay-box-image-profile">
                      <img src="image/comment-profile-picture.jpg" alt="">
                    </div>
                    <div class="date-decription-display-comment">
                      <p><b>phal ousa</b>&nbsp; 10-10-2023,&nbsp; 7:58 PM</p>
                      <p style="margin-top: -15px;">You product is so hight quality and cheep more than order shopping and fast shipping</p>
                    </div>
                  </div>

                  <a style="margin-left: 700px;" class="text-decoration-none" href="">See more &nbsp;<i class="fa-solid fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
    <!-- content-book -->
    <!-- FOOTER -->

    <!-- ENDFOOTER -->
  </div>
  <footer class="bg-dark text-center text-lg-start mt-5 ">
    <!-- Grid container -->
    <div class="container-fruit">
      <div class="container p-4">
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <div class="imag-logo-footer">
              <img src="image/logo-no-background.png" alt="">
            </div>


          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-0 text-white">CONTACT US</h5>

            <ul class="list-unstyled mb-0  mt-2">
              <li class="mt-2">
                <a href="#!" class="text-white text-decoration-none">BOOK CENTER</a>
              </li>
              <li class="mt-2">
                <a href="#!" class="text-white text-decoration-none">CATALOG</a>
              </li>
              <li class="mt-2">
                <a href="#!" class="text-white text-decoration-none">SELECTION</a>
              </li>
              <li class="mt-2">
                <a href="#!" class="text-white text-decoration-none">PROMOTION</a>
              </li>
              <li class="mt-2">
                <a href="#!" class="text-white text-decoration-none">TRENDING</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase text-white">MY TEAM</h5>

            <ul class="list-unstyled mb-0  mt-2">
              <li class="mt-2">
                <a href="#!" class="text-white text-decoration-none">PENTECH MENG</a>
              </li>
              <li class="mt-2">
                <a href="#!" class="text-white text-decoration-none">SEANG KONG HENG</a>
              </li>
              <li class="mt-2">
                <a href="#!" class="text-white text-decoration-none">OUENG CHHENG KHEANG</a>
              </li>
              <li class="mt-2">
                <a href="#!" class="text-white text-decoration-none">LIM SENGLEANG</a>
              </li>
              <li class="mt-2">
                <a href="#!" class="text-white text-decoration-none">SIEK TONG HENG</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-0 text-white">CONTACT US</h5>

            <p class="text-white mt-2">Socail</p>
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
              <form action="" class="mt-3">
                <!--Grid row-->
                <div class="row d-flex ">
                  <!--Grid column-->
                  <!--Grid column-->

                  <!--Grid column-->
                  <div class="">
                    <!-- col-md-5 col-12 -->
                    <!-- Email input -->
                    <div class="form-outline form-white mb-4">
                      <input type="email" id="form5Example21" placeholder="Enter you email.." class="form-control w-100" />
                    </div>
                  </div>
                  <!--Grid column-->

                  <!--Grid column-->
                  <div class="col-auto">
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-outline-light mb-4">
                      Subscribe
                    </button>
                  </div>
                  <!--Grid column-->
                </div>
                <!--Grid row-->
              </form>
            </div>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">KONCHKEA.COM</a>
      </div>
      <!-- Copyright -->
    </div>
  </footer>
  <script src="zoomsl.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $(".zoomImage").imagezoomsl({
        zoomrange: [4, 1]
      });
    });
  </script>
</body>

</html>