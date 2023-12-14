<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .table-summarry {
        padding: 30px;
        width: 800px;
        border-radius: 15px;
        background-color: whitesmoke;
        box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;
    }

    .order-sumarry-view-order {
        width: 500px;
        height: 300px;
        padding: 30px;
        border-radius: 15px;
        background-color: whitesmoke;
        box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;
    }

    .total-view-order {
        display: flex;
        justify-content: space-between;
        border-radius: 15px;
        margin-top: 30px;
        width: 500px;

        padding: 30px;
        background-color: whitesmoke;
        box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;
    }


    .block-view-order {
        display: flex;
        gap: 20px;
    }

    .OrderDeltail {
        padding: 30px;
        width: 800px;
        border-radius: 15px;
        background-color: whitesmoke;
        box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;
    }

    .text-detail {
        display: flex;
        justify-content: space-between;
    }

    .top-invoice {
        background-color: purple;
        width: 100%;
        height: 200px;
        padding: 30px;
        display: flex;
        justify-content: space-between;
    }

    .logo-invoice img {
        width: 200px;
    }

    .bill-to {
        justify-content: space-between;
        display: flex;
        padding: 30px;
    }

    @media print {
        body * {
            visibility: hidden;
        }

       
        .table-summarry * {
            visibility: visible;
        }

        .table-summarry {
            position: absolute;
            top: 0;
            left: 0;
        }
    }
</style>
<?php include('side/header.php');

?>

<div class="order-form-view">
    <div class="block-view-order">
        <div class="item-sumarry-left">
            <div class="table-summarry">
                <div class="top-invoice">
                    <div class="invocie-title">
                        <i style="font-size: 80px;" class="fa-solid fa-cart-shopping text-white"></i>
                        <h1 class="text-white">INVOICE</h1>
                    </div>
                    <div class="logo-invoice">
                        <img src="images/icon/logo (2).png" alt="">
                    </div>
                </div>

                <table class="table table-hover">
                    <tr>
                        <th>Product</th>
                        <th>Item Summarry</th>
                        <th>Quanity</th>
                        <th>price</th>
                        <th>Total Price</th>
                    </tr>
                    <tbody>
                        <?php
                        $conn = new mysqli('localhost', 'root', '', 'booksell');
                        $total = 0;
                        $subtotal = 0;
                        $id = $_GET['id'];


                        $query = "SELECT o.invoiceNumber,o.fistname,o.lastName,o.email,o.PhoneNumber,o.Address,o.country,o.OrderDate,o.quanity,o.price,b.image,b.book_title FROM `order` as o   INNER JOIN `book` as b ON o.productId=b.book_id WHERE user ='$id'";
                        $result = Mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                                <tr style="font-size: 12px;">
                                    <?php
                                    $orderdate = $row['OrderDate'];
                                    $formattedOrderDate = date('F j, Y', strtotime($orderdate));
                                    $orderhours = date('g:i a', strtotime($orderdate));
                                    $firstname = $row['fistname'];
                                    $lastName = $row['lastName'];
                                    $email = $row['email'];
                                    $address = $row['Address'];
                                    $country = $row['country'];
                                    $PhoneNumber = $row['PhoneNumber'];
                                    ?>
                                    <td> <img src="<?php echo "./upload/" . $row['image']; ?>" width="50px" height="50px" alt=""></td>
                                    <td><?php echo $row['book_title'] ?></td>
                                    <!-- is fiel product -->
                                    <td><?php echo $row['quanity'] ?></td>
                                    <td><?php echo $row['price'] ?>$</td>

                                    <td><?php
                                        $qty = $row['quanity'];
                                        $price = $row['price'];

                                        $total = $qty * $price;
                                        echo $total;
                                        $subtotal += $total;
                                        ?>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                        <tr>
                            <td colspan="4" align="right"><strong>Subtotal:</strong></td>
                            <td class="text-danger"><b><?php echo $subtotal; ?>.00$</b></td>
                        </tr>

                    </tbody>

                </table>
                <div class="bill-to">
                    <div class="name-bill">
                        <p><b>Bill To :</b></p>
                        <p>Name : &nbsp;&nbsp;&nbsp; <b><?php echo $firstname; ?><?php echo $lastName ?></b></p>
                        <p>Address : &nbsp;&nbsp;&nbsp;<b><?php echo $address ?></b></p>
                        <p>City :&nbsp;&nbsp;&nbsp;<b><?php echo $address ?></b></p>
                        <p>Country : &nbsp;&nbsp;&nbsp;<b><?php echo $country ?></b></p>
                    </div>
                    <div class="invoie-number">
                        <p>#Invoice</p>

                        <p>Date Order : <b><br><?php echo   $formattedOrderDate ?></b></p>
                        <p>Inovie Due Date</p><b>
                            <?php $currentDateTime = date('F-j-y');
                            echo $currentDateTime;
                            ?></b>
                    </div>
                </div>
              
            </div>
            <button class="btn btn-warning text-white mt-5" onclick="window.print()">Invoice</button>
        </div>

        <div class="item-sumarry-right">


            <div class="delivery-address">

            </div>
        </div>
    </div>
</div>
<?php include('side/footer.php') ?>