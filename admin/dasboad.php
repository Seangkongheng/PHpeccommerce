<?php
session_start();
require 'funtionloginAndRegister.php';
$conn = new mysqli('localhost', 'root', '', 'booksell');
$select = new Select();
if (isset($_SESSION['id'])) {
    $user = $select->selectUserByid($_SESSION['id']);
} else {
    header("location:logins.php");
}
//count user
function rowcount()
{
    $conn = new mysqli('localhost', 'root', '', 'booksell');
    $countrow_query = "SELECT COUNT(*) as row_count FROM userregister;";
    $result = $conn->query($countrow_query);

    if ($result) {
        $row = $result->fetch_assoc();
        $rowCount = $row['row_count'];



        echo  $rowCount;
    } else {
        echo "0";
    }
}


//countpersion user
function countperrent()
{
    $conn = new mysqli('localhost', 'root', '', 'booksell');
    $countrow_query = "SELECT COUNT(*) as row_count FROM userregister;";
    $result = $conn->query($countrow_query);
    if ($result) {
        $row = $result->fetch_assoc();
        $rowCount = $row['row_count'];

        // Calculate percentage
        if ($rowCount > 0) {
            $percentage = ($rowCount / $rowCount) * 100;
            echo  number_format($percentage, 2) . "%";
        } else {
            echo "Total count is zero, cannot calculate percentage.";
        }
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
//count order
function orderCount()
{
    $conn = new mysqli('localhost', 'root', '', 'booksell');
    $countrow_query = "SELECT COUNT(*) as row_count FROM   `order`;";
    $result = $conn->query($countrow_query);

    if ($result) {
        $row = $result->fetch_assoc();
        $rowCount = $row['row_count'];

        echo  $rowCount;
    } else {
        echo "0";
    }
}
function orderCountPerrent()
{
    $conn = new mysqli('localhost', 'root', '', 'booksell');
    $countrow_query = "SELECT COUNT(*) as row_count FROM   `order`;";
    $result = $conn->query($countrow_query);
    if ($result) {
        $row = $result->fetch_assoc();
        $rowCount = $row['row_count'];

        // Calculate percentage
        if ($rowCount > 0) {
            $percentage = ($rowCount / $rowCount) * 100;
            echo  number_format($percentage, 2) . "%";
        } else {
            echo "Total count is zero, cannot calculate percentage.";
        }
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
//countcatgory
function countagegory()
{
    $conn = new mysqli('localhost', 'root', '', 'booksell');
    $countrow_query = "SELECT COUNT(*) as row_count FROM   `categories`;";
    $result = $conn->query($countrow_query);

    if ($result) {
        $row = $result->fetch_assoc();
        $rowCount = $row['row_count'];

        echo  $rowCount;
    } else {
        echo "0";
    }
}

function CategoryCountPerrent()
{
    $conn = new mysqli('localhost', 'root', '', 'booksell');
    $countrow_query = "SELECT COUNT(*) as row_count FROM   `categories`;";
    $result = $conn->query($countrow_query);
    if ($result) {
        $row = $result->fetch_assoc();
        $rowCount = $row['row_count'];

        // Calculate percentage
        if ($rowCount > 0) {
            $percentage = ($rowCount / $rowCount) * 100;
            echo  number_format($percentage, 2) . "%";
        } else {
            echo "Total count is zero, cannot calculate percentage.";
        }
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- icon font-some -->
<style>
    .top-header-dasboad {
        width: 200%;
        margin-left: -50px;
        margin-top: -40px;
        background-color: white;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
    }

    .top-header-dasboad p {
        padding: 30px 30px;
    }

    .block-dasboad-box {
        border-radius: 10px;
        width: 330px;
        height: 180px;
        background-color: #F4F4F4;
        box-shadow: rgba(33, 35, 38, 0.1) 0px 10px 10px -10px;
    }

    .block-dasboad {
        display: grid;
        grid-template-columns: auto auto auto auto;
    }

    .block-top-selling-box {
        width: 680px;
        height: 500px;
        background-color: #F4F4F4;
        box-shadow: rgba(33, 35, 38, 0.1) 0px 10px 10px -10px;
    }

    .block-top-selling-product {
        margin-top: 20px;
        display: grid;
        gap: 2px;
        grid-template-columns: auto auto;
    }

    .block-recently-box {
        width: 950px;

        background-color: #F4F4F4;
        box-shadow: rgba(33, 35, 38, 0.1) 0px 10px 10px -10px;
    }

    .block-summary-recently-product {
        margin-top: 20px;
        display: grid;
        gap: 2px;
        grid-template-columns: auto auto auto;
    }

    .content-block-user {
        display: flex;
        background-color: #BB40FF;
        border-radius: 10px;
        width: 100%;
        height: 100%;
        position: relative;
        padding: 20px;
    }

    .content-block-NewOrder {
        display: flex;
        padding: 20px;
        background-color: #00F554;
        border-radius: 10px;
        width: 100%;
        position: relative;
        height: 100%;
    }

    .content-block-Category {
        display: flex;
        padding: 20px;
        position: relative;
        background-color: #3596FF;
        border-radius: 10px;
        width: 100%;
        height: 100%;
    }

    .content-block-Notification {
        display: flex;
        position: relative;
        padding: 20px;
        background-color: #FFC700;
        border-radius: 10px;
        width: 100%;
        height: 100%;
    }

    .block-icon-user {
        position: relative;
        position: absolute;
        width: 50px;
        height: 50px;
        left: 260px;
        background-color: white;
        border-radius: 100%;
    }

    .icon-user {

        margin-top: 15px;
        margin-left: 17px;
    }

    .top-summary-top-selling p {
        padding: 20px 20px;
        background-color: white;
        box-shadow: rgba(33, 35, 38, 0.1) 0px 10px 10px -10px;
    }

    .block-content-selling-product-box {}

    .selling-product-box {
        width: 100%;
        margin-top: 2px;
        padding: 30px;
        height: 110px;
        display: flex;
        align-items: center;
        gap: 1.2rem;
        background-color: whitesmoke;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
    }

    .image-sellig-product {
        width: 100px;
        height: 90px;
    }

    .image-sellig-product img {
        width: 50px;
    }
</style>
<?php include('side/header.php'); ?>
<p>Welcom &nbsp; </p>
<h1> <?php echo $user['fistname'] ?> <?php echo $user['LastName'] ?></h1>
<h4 class="mt-4">Ecommerce Dasboad</h4>
<p style="font-size: 10px;">Manage you product</p>
<div class="container-fluid mt-5">
    <!-- view summary box -->
    <div class="block-dasboad">
        <div class="block-dasboad-box">
            <div class="content-block-user">
                <div class="title-user text-white">
                    <p>TOTAL NEW USER</p>
                    <h1 class="text-white" style="font-size: 50PX;"><?php echo rowcount() ?></h1>
                    <p>Overage <?php echo countperrent() ?> &nbsp;</p>
                </div>
                <div class="block-icon-user">
                    <div class="icon-user" style="color:#BB40FF">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-dasboad-box">
            <div class="content-block-NewOrder">
                <div class="title-user text-white">
                    <p>TOTAL NEW ORDERED</p>
                    <h1 class="text-white" style="font-size: 50PX;"><?php echo orderCount() ?></h1>
                    <p>Overage <?php echo orderCountPerrent() ?></p>
                </div>
                <div class="block-icon-user">
                    <div class="icon-user" style="color:#00F554">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-dasboad-box">
            <div class="content-block-Category">
                <div class="title-user text-white">
                    <p>TOTAL CATEGORY</p>
                    <h1 class="text-white" style="font-size: 50PX;"><?php countagegory() ?></h1>
                    <p>Overage <?php echo CategoryCountPerrent() ?></p>
                </div>
                <div class="block-icon-user">
                    <div class="icon-user" style="color:#3596FF;">
                        <i class="fa-brands fa-stack-overflow"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-dasboad-box">
            <div class="content-block-Notification">
                <div class="title-user text-white">
                    <p>NOTIFICATION</p>
                    <h1 class="text-white" style="font-size: 50PX;">0</h1>
                    <p>Overage 0 &nbsp;%</p>
                </div>
                <div class="block-icon-user">
                    <div class="icon-user" style="color: #FFC700;">
                        <i class="fa-solid fa-bell"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end view summary box -->
    <!-- top selling summary box -->
    <div class="summary-top-selling-product">
        <div class="block-top-selling-product">
            <div class="block-top-selling-box">
                <div class="top-summary-top-selling">
                    <p>Summary last Order</p>

                </div>
                <div class="block-content-order">
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr style="font-size: 13px;">
                                <th>ID</th>
                                <th>Order Date</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //  $sql = "SELECT b.book_id,b.book_title,b.catagory,b.price,b.Author,b.stock,b.Decription_product,b.image,c.id,c.name,c.parrent_id,c.Decription,c.lavel 
                            //  FROM book b 
                            //  INNER JOIN tbl_catagory c ON b.catagory =c.id; ";


                            // $sql = "SELECT o.order_id,o.user,o.OrderDate,o.price,o.invoiceNumber,o.fistname,o.lastName,o.email,o.Address,o.PhoneNumber,u.id,u.fistname,u.lastName,u.phonenumber FROM `order` as o  INNER JOIN `userregister` as u ON o.user = u.id";

                            $sql = "SELECT o.order_id , u.id, o.fistname,o.OrderDate,o.quanity,o.price,u.fistname,u.LastName,u.phonenumber,u.email,u.address
        FROM userregister AS u
        INNER JOIN `order` AS o ON u.id = o.user";
                            $sql_qury = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($sql_qury) > 0) {
                                while ($row = mysqli_fetch_assoc($sql_qury)) {
                            ?>

                                    <tr style="font-size: 13px;">
                                        <td><?php echo $row['order_id'] ?></td>

                                        <td><?php $orderdate = $row['OrderDate'];
                                            echo  $formattedOrderDate = date('F j, Y', strtotime($orderdate)); ?></td>
                                        <td><?php echo $row['fistname'] ?><?php echo $row['LastName'] ?></td>
                                        <td><?php echo $row['phonenumber'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><a href="viewOrder.php?id=<?php echo $row['id'] ?>">View</a></td>
                                        <td><a href="" class="text-danger">Delete</a></td>
                                    </tr>

                            <?php
                                }
                            } else {
                                echo "No order item";
                            }
                            ?>

                        </tbody>
                    </table>
                    <a style="margin-left: 580px;" class="mt-4" href="Order.php">View All &nbsp;<i class="fa-solid fa-arrow-right"></i></a>

                </div>
            </div>
            <div class="block-top-selling-box">
                <div class="top-summary-top-selling">
                    <p>Top Selling product</p>
                </div>
                <div class="block-content-selling-product-box">
                    <div class="selling-product-box">
                        <div style="margin-top: 15px;" class="image-sellig-product">
                            <img src="images/chair.png" alt="">
                        </div>
                        <div class="title-selling-product">
                            <p><b>Chair for desk</b></p>
                            <p style="font-size: 10px;">Good product </p>
                            <i style="font-size: 12px;color:orange" class="fa-solid fa-star"></i>
                            <i style="font-size: 12px;color:orange" class="fa-solid fa-star"></i>
                            <i style="font-size: 12px;color:orange" class="fa-solid fa-star"></i>
                            <i style="font-size: 12px;color:orange" class="fa-solid fa-star"></i>
                            <i style="font-size: 12px;color:orange" class="fa-solid fa-star"></i>

                        </div>
                        <div style="margin-left: 270px;" class="price-selling-product">
                            <p class="text-danger">100.00$</p>

                        </div>
                    </div>
                    <div class="selling-product-box">
                        <div style="margin-top: 15px;" class="image-sellig-product">
                            <img src="images/headphone.png" alt="">
                        </div>
                        <div class="title-selling-product">
                            <p><b>Headphone</b></p>
                            <p style="font-size: 10px;">Good product </p>
                            <i style="font-size: 12px;color:orange" class="fa-solid fa-star"></i>
                            <i style="font-size: 12px;color:orange" class="fa-solid fa-star"></i>
                            <i style="font-size: 12px;color:orange" class="fa-solid fa-star"></i>
                            <i style="font-size: 12px;color:orange" class="fa-solid fa-star"></i>
                            <i style="font-size: 12px;color:orange" class="fa-solid fa-star"></i>

                        </div>
                        <div style="margin-left: 270px;" class="price-selling-product">
                            <p class="text-danger">130.00$</p>
                        </div>
                    </div>
                    <div class="selling-product-box">
                        <div style="margin-top: 15px;" class="image-sellig-product">
                            <img src="images/I wacth.png" alt="">
                        </div>
                        <div class="title-selling-product">
                            <p><b>Apple watch</b></p>
                            <p style="font-size: 10px;">Good product </p>
                            <i style="font-size: 12px;color:orange" class="fa-solid fa-star"></i>
                            <i style="font-size: 12px;color:orange" class="fa-solid fa-star"></i>
                            <i style="font-size: 12px;color:orange" class="fa-solid fa-star"></i>
                            <i style="font-size: 12px;color:orange" class="fa-solid fa-star"></i>
                            <i style="font-size: 12px;color:orange" class="fa-solid fa-star"></i>

                        </div>
                        <div style="margin-left: 270px;" class="price-selling-product">
                            <p class="text-danger">120.00$</p>
                        </div>
                    </div>
                    <a style="margin-left: 580px;" class="mt-5" href="">View All &nbsp;<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end top selling summary box-->
<div class="summary-recently-product">
    <div class="block-summary-recently-product">
        <div class="block-recently-box">
            <div class="top-summary-top-selling">
                <p>Summary User</p>
            </div>
            <div class="table-user">
                <table id="userData" class="table table-hover">
                    <thead>
                        <tr style="font-size: 13px;">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>phone Number</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql = "SELECT * from userregister";
                        $sql_qeury = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($sql_qeury) > 0) {
                            while ($row = mysqli_fetch_assoc($sql_qeury)) {
                        ?>
                                <tr style="font-size: 13px;">
                                <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['fistname'] ?><?php echo $row['LastName'] ?></td>
                                    <td><?php echo $row['address'] ?></td>
                                    <td><?php echo $row['phonenumber'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                   
                                    <td>
                                        <a class="btn btn-danger" href="">Delete</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>

            </div>
            <a style="margin-left: 830px; font-size: 15px;" class="mt-1" href="costomer.php">View All &nbsp;<i class="fa-solid fa-arrow-right"></i></a>

        </div>

    </div>
</div>
</div>







<?php include('side/footer.php') ?>
<script>
    //bar
    var ctxB = document.getElementById("barChart").getContext('2d');
    var myBarChart = new Chart(ctxB, {
        type: 'bar',
        data: {
            labels: ["Monday", "Tue", "Wed", "Thur", "fri", "Sat", "Sun"],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script>
    var ctxP = document.getElementById("labelChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
        plugins: [ChartDataLabels],
        type: 'pie',
        data: {
            labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
            datasets: [{
                data: [210, 130, 120, 160, 120],
                backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'right',
                labels: {
                    padding: 20,
                    boxWidth: 10
                }
            },
            plugins: {
                datalabels: {
                    formatter: (value, ctx) => {
                        let sum = 0;
                        let dataArr = ctx.chart.data.datasets[0].data;
                        dataArr.map(data => {
                            sum += data;
                        });
                        let percentage = (value * 100 / sum).toFixed(2) + "%";
                        return percentage;
                    },
                    color: 'white',
                    labels: {
                        title: {
                            font: {
                                size: '16'
                            }
                        }
                    }
                }
            }
        }
    });
</script>