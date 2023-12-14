<?php include('side/header.php');

$conn = new mysqli('localhost', 'root', '', 'booksell');




?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .product-report {
        width: 500px;
        height: 500px;
        position: relative;
        padding: 30px;
        background-color: whitesmoke;
    }
    .product-report .fa-solid {
    position: absolute;
    left: 15%;
    top: 25%;
    color: red;
}

    .product-report:hover {
        transform: scale(1.1);
        transition: 1.2s;
        cursor: pointer;
    }

    .order-report {
        padding: 30px;
        width: 500px;
        position: relative;
        height: 500px;
        background-color: whitesmoke;
    }
    .order-report .fa-solid {
    position: absolute;
    left: 25%;
    top: 25%;
    color: yellow;
}
    .order-report:hover {
        transform: scale(1.1);
        transition: 1.2s;
        cursor: pointer;
    }
    
    .customer-report {
        position: relative;
        padding: 30px;
width: 500px;
height: 500px;
background-color: whitesmoke;
}
.customer-report .fa-solid {
    position: absolute;
    left: 25%;
    top: 25%;
    color: blueviolet;
}

.customer-report:hover {
transform: scale(1.1);
transition: 1.2s;
cursor: pointer;
}

    .all-report {
        display: flex;
        justify-content: space-between;
        align-content: center;
        gap: 1.2rem;
    }
</style>
<h1>Report</h1>
<br><br>
<div class="all-report">
    <div class="product-report">
    <!-- <i class="fa-solid fa-city"></i> -->
    <a href="./report/product_report.php">
    <i style="font-size: 250px;" class="fa-solid fa-city"></i>
    </a>
         <p>Product</p>
    </div>
    <div class="order-report">
    <!-- <i class="fa-solid fa-cart-shopping"></i> -->
   <a href="order_report.php">
   <i style="font-size: 250px;" class="fa-solid fa-cart-shopping"></i>
   </a>
         <p>Order</p>
    </div>
    <div class="customer-report">
       <a href="user_report.php">
       <i style="font-size: 250px;" class="fa-solid fa-user"></i>
       </a>
         <p>User Report</p>
    </div>
</div>
<?php include('side/footer.php') ?>