<?php

session_start();
$conn = new mysqli('localhost', 'root', '', 'booksell');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- bootrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <!-- font-avsome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
</head>
<style>
  .action {
    display: flex;

    gap: 1.2rem;
  }

  .allproduct-display {
    padding: 30px;
    width: 100%;
    height: 2000px;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    background-color: white;
  }
</style>

<body>
  <!-- nav bar -->
  <?php include("side/header.php"); ?>
  <!-- end navbar -->
  <!-- Button trigger modal -->
  <a href="addNewproduct.php" class="btn btn-primary">Add New</a>
  <!-- Modal -->

  <div class="allproduct-display mt-4">
  <?php         
            
            if (isset($_SESSION['success'])) {
            ?>
                <div class="row">
                    <div class="col-12 mb-2 text-success">
                        <?php echo $_SESSION['success']; ?>
                    </div>
                </div>
            <?php
                unset($_SESSION['success']);
            }
            ?>
    <table class="table table-hover" id="product">
      <thead>
        <tr>
          <th>Check</th>
          <th>ID</th>
          <th>Title</th>
          <th>Category</th>
          <th>Price</th>
          <th>Author</th>
          <th>Stock</th>
          <th>Image</th>
          <th>Action</th>
</tr>
      </thead>
      <tbody>
        <?php
        //join table for select name category
        $sql = "SELECT b.book_id,b.book_title,b.catagory,b.lavel,b.price,b.Author,b.stock,b.image,c.id,c.category_name,c.parent_id,c.level,c.description FROM book b INNER JOIN categories c ON b.catagory =c.id";
     
        $sql_qury = mysqli_query($conn, $sql);
        if (mysqli_num_rows($sql_qury) > 0) {
          while ($row = mysqli_fetch_assoc($sql_qury)) {
        ?>
            <tr>
              <td>
                <form action="deletecheck.php" method="post">
                  <input class="form-check-input" type="checkbox" name="delete[]" value="<?php echo $row['book_id'] ?>">
              </td>
              <td><?php echo $row["book_id"]; ?></td>
              <td><?php echo $row["book_title"] ?></td>
              <td><?php echo $row["category_name"] ?></td>
              <td><?php echo $row["price"] ?>$</td>
              <td><?php echo $row["Author"] ?></td>
              <td><?php echo $row["stock"] ?></td>

              <td> <img src="<?php echo "./upload/" . $row['image']; ?>" width="50px" height="50px" alt=""></td>
              <td class="action">
                <a class="btn btn-danger mt-3" href="allFuction.php?id=<?php echo $row["book_id"]; ?>">Delete</a>
                <a class="btn btn-primary mt-3" href="updatebook.php?bookid=<?php echo $row["book_id"]; ?>&cateid=<?php echo $row['id'] ?>">update</a>
                <a class="btn btn-primary mt-3" href="updatebook.php?bookid=<?php echo $row["book_id"]; ?>&cateid=<?php echo $row['id'] ?>">Show</a>
              </td>
            </tr>
            <?php
            ?>
        <?php
          }
        } else {
          echo "No record";
        }
        ?>
      </tbody>
      </tr>
    </table>
    <button type="submit" class="btn btn-warning float-end text-white mt-5" value="delete" name="btn_delete_check">Delete all check</button>
    </form>
  </div>

  <?php include("side/footer.php"); ?>
</body>

</html>
<?php

//funtion recursive
function category_tree($parent_id)
{
  global $conn;
  $sql = "SELECT * From tbl_catagory 
      where parrent_id ='" . $parent_id . "'";
  $result = $conn->query($sql);

  while ($row = mysqli_fetch_object($result)) {
    $spaces = "";

    for ($i = 1; $i <= $row->lavel; $i++) {
      $spaces .= "&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    echo '<option value=' . $row->id . '>';
    echo $spaces . $row->name;
    category_tree($row->id);
    echo '</option>';
  }
}

?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>


<script>
  $(document).ready(function() {
    $('#product').DataTable({
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