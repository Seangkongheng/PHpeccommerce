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
    .text-detail{
        display: flex;
        justify-content: space-between;
    }
</style>
<?php include('side/header.php');

?>
<h1>View Order</h1>

<div class="order-form-view">
    <p>Order Number:</p>
    <div class="block-view-order">
        <div class="item-sumarry-left">
            <div class="table-summarry">
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
                                    $firstname=$row['fistname'];
                                    $lastName=$row['lastName'];
                                    $email=$row['email'];
                                    $address=$row['Address'];
                                    $country=$row['country'];
                                    $PhoneNumber=$row['PhoneNumber'];
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
            </div>
            <div class="OrderDeltail mt-4">
                <p> customer-and-order-detail</p>
                <hr>
                <div class="text-detail">
                   <div class="name-cumstomer">
                     <p>Customer name</p>
                   </div>
                   <div class="name">
                        <b><?php echo $firstname?><?php echo $lastName?></b>
                   </div>
                </div>
                <hr>
                <div class="text-detail">
                   <div class="name-cumstomer">
                     <p>Phone Number</p>
                   </div>
                   <div class="name">
                  
                   <p><b><?php echo $PhoneNumber?></b></p>
                   </div>
                </div>
                <hr>
                <div class="text-detail">
                   <div class="name-cumstomer">
                     <p>Email</p>
                   </div>
                   <div class="name">
                       <p><b><?php echo $email?></b></p>
                   </div>
                </div>
                <hr>
                <div class="text-detail">
                   <div class="name-cumstomer">
                     <p>Address</p>
                   </div>
                   <div class="name">
                    <p><b><?php echo $address?></b></p>
                   </div>
                </div>
                <hr>
                <div class="text-detail">
                   <div class="name-cumstomer">
                     <p>country</p>
                   </div>
                   <div class="name">
                    <p><b><?php echo $country?></b></p>
                   </div>
                </div>
                <hr>
                
            </div>
        </div>

        <div class="item-sumarry-right">
            <div class="order-sumarry-view-order">
                <p style="font-size: 30px;">Oder Summary</p>
                <p class="mt-3">Order Create :&nbsp; <b><?php echo $formattedOrderDate ?> </b></p>
                <p class="mt-2">Order Time :&nbsp;&nbsp;&nbsp;<b><?php echo $orderhours ?></b></p>
                <p class="mt-2">Total :&nbsp;&nbsp;&nbsp;<b><?php echo $subtotal; ?>.00$</b></p>
                <p class="mt-2">Delivery : <span class="text-warning"><b>0.00$</b></span></p>
            </div>

            <div class="total-view-order">
                <div class="total-div">
                    <p>Subtotal</p>
                </div>
                <div class="total-number-div">
                    <b><?php echo $subtotal; ?>.00$</b></p>
                </div>
            </div>
            <div class="delivery-address">

            </div>
        </div>
    </div>
</div>
<?php include('side/footer.php') ?>