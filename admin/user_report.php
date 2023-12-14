<?php include('side/header.php');

$conn = new mysqli('localhost', 'root', '', 'booksell');




?>
<style>
    @media print {
        body * {
            visibility: hidden;
        }


        .table * {
            visibility: visible;
        }

        .table {
            position: absolute;
            top: 0;
            left: 0;
        }
    }
</style>
<h1>All customer Register</h1>
<br><br>
<button style="padding: 5px 50px; margin-bottom:30px;" onclick="window.print()" class="btn btn-warning text-white">Print</button>
<table id="userData" class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Fist Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>phone Number</th>
            <th>Address</th>
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
                <tr>
                    <td><?php echo $row['fistname'] ?></td>
                    <td><?php echo $row['LastName'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['phonenumber'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['address'] ?></td>
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
<?php include('side/footer.php') ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>


<script>
    $(document).ready(function() {
        $('#userData').DataTable({
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