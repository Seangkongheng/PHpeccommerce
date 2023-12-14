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
        <div class="all-content-block">
            <div class="review-cart">
                <p style=" margin: 20px 20px 20px 20px; ">1.&nbsp;<b>REVIEW YOUR ORDER (1 ITEMS)</b></p>
                <hr>
                <div class="block-display-order">
                     <!-- display from cart -->
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
                    <table class="table">
                        <tr>
                            <th>product name</th>
                            <th>price</th>
                            <th>Qaunity</th>
                            <th>Total</th>
                        </tr>

                        <?php

                        $total = 0;
                        $subtotal = 0;

                        foreach ($newArrayCarts as $id => $qty) :
                            require_once("../connectionFront.php");
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
                            <tbody style="font-size: 12px;">
                                <tr>
                                    <td><?php echo $row_ITem->book_title ?></td>
                                    <td><?php echo $row_ITem->price ?>.00&nbsp; $</td>
                                    <td> X <?php echo $qty ?></td>
                                    <td><?php echo  $total . ".00&nbsp;$"; ?></td>
                                </tr>
                            </tbody>
                        <?php endforeach
                        ?>
                    </table>
                    <p align="right" class="mt-4"><b>subtotal &nbsp; <span class="text-danger"><b><?php echo $subtotal ?>.00 $</b></span> </b></p>
                </div>
               
            </div>
            
            <div class="delivery-adress">
                <p style=" margin: 20px 20px 20px 20px; ">2. &nbsp;<b>DELIVERY ADDRESS</b></p>
                <hr>
                <div class="checkout-block">
                <form action="order.php" method="POST">

                        <label for="" class="form-label">Fist name <span class="text-danger">*</span> </label>
                        <input class="form-control" type="text" name="firstname" id="">

                         <label for="" class="form-label">last name <span class="text-danger">*</span> </label>
                        <input class="form-control" type="text" name="lastname" id="">

                         <label for="" class="form-label">Email Address <span class="text-danger">*</span> </label>
                        <input class="form-control" type="email" name="email" id="">

                       <label for="" class="form-label">phone Number <span class="text-danger">*</span> </label>
                        <input class="form-control" type="text" name="phonNumber" id="">

                        <label for="" class="form-label">Delivery Address <span class="text-danger">*</span> </label>
                        <input class="form-control" type="text" name="address" id="">

                        <label for="" class="form-label">Contry<span class="text-danger">*</span> </label>
                        <input class="form-control" type="text" name="country" id="">
                   

                   <?php
                       if(isset($_SESSION['user']) && $_SESSION['user']){
                        echo " <div class='payNow mt-3'>
                        <button type='submit' name='btnOrder' >Pay Now</button>
                         </div>";
                    } else {
                        echo " <div class='payNow mt-3'>
                        <button disabled name='btnOrder' >Please login</button>
                         </div>";
                    }
                   ?>     
                
                  
                </div>
            </div>
            <div class="payment-ordersummaray">
                <div class="payment-method">
                    <p style=" margin: 20px 20px 20px 20px; ">3. &nbsp; <b>SELECT PAYMENT METHOD</b></p>
                    <hr>
                    <div class="checkout-block">
                        <div class="method-cart">
                            <button style="border-bottom: none;" class="cart-method-button">Cart<i class="fa-solid fa-arrow-right"></i></button><br>
                            <button>
                                <div class="title-method-button">
                                    Paypal
                                </div>
                                <div class="icon-method-button">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </button>
                        </div>
                    </div>

                </div>
            
       
                <div class="order-summaray mt-3">
                    <div class="order">
                        <p style=" margin: 20px 20px 20px 20px; ">&nbsp; ORDER SUMMARAY</p>
                        <hr>
                        <div class="item-order-sumaray">
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
                                <table class="table">
                                    <tr>
                                        <th>product name</th>
                                        <th>price</th>
                                        <th>Qaunity</th>
                                        <th>Total</th>
                                    </tr>

                                    <?php

                                    $total = 0;
                                    $subtotal = 0;

                                    foreach ($newArrayCarts as $id => $qty) :
                                        require_once("../connectionFront.php");
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
                                        <tbody style="font-size: 12px;">
                                            <tr>
                                                <td><?php echo $row_ITem->book_title ?></td>
                                                <td><?php echo $row_ITem->price ?>.00&nbsp; $</td>
                                                <td> X <?php echo $qty ?></td>
                                                <td><?php echo  $total . ".00&nbsp;$"; ?></td>
                                            </tr>
                                        </tbody>
                                    <?php endforeach
                                    ?>
                                </table>



                        </div>
                    </div>
                </div>
                <div class="order-total ">
                    <div class="title-total">
                        <p> <b>ORDER TOTAL</b> </p>
                    </div>
                    <div class="price-total">
                        <p align="right"><b>subtotal &nbsp; <span class="text-danger"><b><?php echo $subtotal ?>.00 $</b></span> </b></p>
                    </div>
                </div>
             

            </form>
            </div>
        </div>
    </div>
    <!--end content-chechout -->
<?php
                            else :
                                echo " <p class='text-center'>No item in your cart!</p>";
                            endif
?>
<?php
                else :
                    echo " <p class='text-center'>No item in your cart!</p>";
                endif
?>
</body>

</html>
