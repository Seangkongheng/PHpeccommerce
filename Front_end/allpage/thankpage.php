<?php
session_start();


?>
<style>
    .block-display-order{
        padding: 20px;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check out</title>
    <!-- font avsome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- boot strapp link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   <!-- sweet alert in php -->
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- stylesheet link -->
    <link rel="stylesheet" href="../style.css">

</head>

<body>
    <!-- navbar of checkout page -->
    <div class="navCheckout">
        <div class="all-conten-NavCheckout">
            <div class="button-continues-shopping">
                <a href="../bookpage.php" class="text-decoration-none text-muted"><i class="fa-solid fa-arrow-left"></i> &nbsp; &nbsp; Coninue shopping</a>
            </div>
            <div class="logo-checkout">
                <img style="width: 100px;" src="../image/ecom.png" alt="">
            </div>
            <div class="warranty">
                <div class="warranty-icon text-center" style="font-size: 12px;">
                    <i class="fa-solid fa-medal"></i>
                    <p>warranty <br> 3 year</p>

                </div>
                <div class="earth-icon text-center" style="font-size: 12px;">
                    <i class="fa-solid fa-earth-americas"></i>
                    <p>Global <br> delivery</p>
                </div>
                <div class="key-lock-icon text-center" style="font-size: 12px;">
                    <i class="fa-solid fa-lock"></i>
                    <p>warranty <br> 3 year</p>
                </div>

            </div>

        </div>
    </div>
    <!--end navbar of checkout page -->
    <!-- content-chechout -->
    <div class="all-content-checkout">
        <div class="checkout-title">
            <h1 class="text-center" style="padding: 0 50px;">SECURE CHECKOUT</h1>
        </div>
        <div class="block-thank-you">
            <h1 class="mt-5">Thank you </h1>
               <p class="text-danger">For Order </p> 
          <table>
            
          </table>
        </div>
    </div>
    <!--end content-chechout -->
</body>

</html>
