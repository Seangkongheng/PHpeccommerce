<?php
session_start();

// update cart
if (isset($_POST['btnupdateCard'])) {
  $allItemQty = $_POST["txtqty"];
  $_SESSION["carts"] = "";

  foreach ($allItemQty as $ids => $quantities) {
    for ($i = 1; $i <= $quantities; $i++) {
      if ($_SESSION["carts"] == "") {
        $_SESSION["carts"] .= $ids;
      } else {
        $_SESSION["carts"] .= "," . $ids;
      }
    }
  }
}

//delete cart
if (isset($_GET["removeItemID"])) {
  $removeItemID = $_GET["removeItemID"];
  $_SESSION["carts"] = str_replace(",{$removeItemID}", "", $_SESSION["carts"]);
  $_SESSION["carts"] = str_replace("{$removeItemID},", "", $_SESSION["carts"]);
  $_SESSION["carts"] = str_replace("{$removeItemID}", "", $_SESSION["carts"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View cart</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">

  <style>
    * {
      margin: 0;
      padding: 0;
    }

    h1 {
      text-align: center;
      padding: 20px;
    }

    /* body{ padding: 20px; font: 14px sans-serif; } */
    #itemWrapping {
      padding: 20px;
      display: flex;
      border-top: 1px solid #ddd;
      border-left: 1px solid #ddd;
      border-right: 1px solid #ddd;
    }

    #itemWrapping:last-child {
      border-bottom: 1px solid grey;
    }

    .photo {
      width: 20%;
    }

    .itemName {
      width: 40%;
    }

    .quantity {
      width: 20%;
    }

    .price {
      width: 20%;
    }
  </style>
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
            <a class="nav-link text-white" aria-current="page" href="category_page.php">CATEGORY</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="promotion.php">PROMOTION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="contact_us.php">CONTACT US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="#">NEW ARRIVAL</a>
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
  <!-- end navbar -->
  <div class="container">
    <form action="" method="POST">
      <h1>Your Cart Listing</h1>
      <?php
      $carts = $_SESSION["carts"];
      if ($carts != "") :
        $ids = explode(',', $carts);

        $qty = 0;
        $newArrayCarts = array();

        foreach ($ids as $mainID) {
          foreach ($ids as $compaireID) {
            if ($mainID == $compaireID) {
              $qty++;
            }
          }
          $newArrayCarts[$mainID] = $qty;
          $qty = 0;
        }
      ?>
        <table class="table mt-5">
          <tr>
            <th>Image</th>
            <th>Product</th>
            <th></th>
            <th></th>
            <th></th>
            <th>Quanity</th>

            <th>Price</th>
            <th>Total price</th>
            <th>Action</th>
          </tr>
        </table>
        <?php

        $total = 0;
        $subtotal = 0;

        foreach ($newArrayCarts as $id => $qty) :
          
          require_once("connectionFront.php");
          $sqlItem = "SELECT *
                        FROM book where book_id ={$id} limit 1";
          $resultsetItem = $conn->query($sqlItem);
          if ($conn->errno > 0) {
            die($conn->error);
          }
          $row_ITem = $resultsetItem->fetch_object();
          $total = $qty * $row_ITem->price;

          $subtotal += $total;



        ?>



          <div id="itemWrapping">
            <div class="photo">
              <img src="../admin/upload/<?php echo $row_ITem->image ?>" width="100px">
              <!-- <img src="image/upload/<?php echo $row_ITem->image ?>" width="100px" alt=""> -->
            </div>
            <div class="itemName">
              <p><?php echo $row_ITem->book_title ?></p>
              <a class="text-decoration-none " style="font-size: 10px;" href="<?php $row_ITem->book_id ?>">View Detial</a>
            </div>
            <div class="quantity">
              <label for="qty"> </label>

              <input class="form-control" type="number" min="0" max="99" value="<?php echo $qty ?>" name="txtqty[<?php echo $row_ITem->book_id; ?>]" id="">
              <!-- <input type="submit" value="update" name="btnupdateCard"> -->

            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="price" style="margin-top: 30px;">
              <b><?php echo $row_ITem->price ?>.00&nbsp; $</b>
            </div>
            <div class="total price text-danger " style="margin-top: 30px;">
              <?php
              echo  $total . ".00&nbsp;$";

              ?>
            </div>
            <div class="update" style="margin-top: 30px;">
              <input style="padding: 5px 30px;  box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px; background-color: white; border: none;" class="text-success" type="submit" value="update" name="btnupdateCard">
              <!-- <a class="btnRemoveCart text-danger" href=""> <b> update</b> </a> -->
            </div>&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="" style="margin-top: 35px;">
              <a class="btnRemoveCart text-danger" href="viewcartEcom.php?removeItemID=<?php echo $row_ITem->book_id ?>">Remove</span></a>
            </div>

          </div>
        <?php endforeach

        ?>


    </form>
    <p align="right" style="" class=" mt-5">Grant Total : <?php echo $subtotal ?>.00 $ </p>
    <p align="right">Tax : 00.00$</p>
    <p align="right">Discount : 00.00$</p>
    <p align="right" style="font-size: 20px;" class="text-danger">Total : <b><?php echo $subtotal ?>.00 $</b> </p>
</body>

<?php
      else :
        echo " <p class='text-center'>No item in your cart!</p>";
      endif
?>
<div class="check-out-button">
  <div class="button-continues-shopping">
    <a href="bookpage.php" class="text-decoration-none text-muted"><i class="fa-solid fa-arrow-left"></i> &nbsp; &nbsp; Coninue shopping</a>
  </div>
  <!-- <a class="btn btn-warning" href="bookpage.php">Back to product</a> -->
  <?php
  if ($_SESSION["carts"] == "") {
    echo "<p  class='disable text-white float-right' disabled > check out </p>";
  } else {
    echo ' <a style="margin-left:1190px; padding:10px 10px;text-decoration:none;color:white; background-color:red" class="" href="allpage/checkout.php">Check out</a>';
  }
  ?>


</div>
</div>

</html>