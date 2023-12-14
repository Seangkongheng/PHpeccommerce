<?php include('side/header.php');

$conn = new mysqli('localhost', 'root', '', 'booksell');




?>

<h1>Order</h1>
<br><br>
<table class="table table-hover" id="myTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Order Date</th>
            <th>Name</th>
            <th>Phone Number</th>
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

        $sql="SELECT u.id, o.fistname,o.OrderDate,o.quanity,o.price,u.fistname,u.LastName,u.phonenumber,u.email,u.address
        FROM userregister AS u
        INNER JOIN `order` AS o ON u.id = o.user";
        $sql_qury = mysqli_query($conn, $sql);
        if (mysqli_num_rows($sql_qury) > 0) {
            while ($row = mysqli_fetch_assoc($sql_qury)) {
        ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['OrderDate'] ?></td>
                    <td><?php echo $row['fistname'] ?><?php echo $row['LastName']?></td>
                    <td><?php echo $row['phonenumber'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><a href="viewOrder.php?id=<?php  echo $row['id'] ?>">View</a></td>
                    <td><a href="" class="text-danger">Delete</a></td>
                </tr>

        <?php
            }
        }
        else
        {
            echo "No order item";
        }
        ?>

    </tbody>
</table>
<?php include('side/footer.php') ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>


<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "pagdingType": "Full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"],
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "serch product ",
            }
        });
    });
</script>