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
  <a href="AddCategoy.php" class="btn btn-primary">Add New</a>
  <!-- Modal -->

  <div class="allproduct-display mt-4">
    <table class="table mt-5">
      <tr>
        <th>id</th>
        <th>cagory name</th>
        <th>Sub catagory</th>
        <th>Deciption</th>
        <th>Action</th>
        <th>Check</th>
      </tr>

      <tbody>
        <?php
        $sql = "SELECT * From tbl_catagory";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
              <td><?php echo $row["id"] ?></td>

              <td><?php echo $row["name"] ?></td>
              <td><?php echo $row["parrent_id"] ?>

              </td>
              <td><?php echo $row["Decription"] ?></td>
              <td class="action">
                <form action="updatebook.php" method="POST">
                  <input type="hidden" name="catagoryID_id" value=" <?php //
                                                                    ?>">
                  <input type="hidden" name="id_book" value="<?php // 
                                                              ?>">
                  <button type="submit" class="btn btn-danger mt-3 text-white" name="bookEdit">Delete</button>
                </form>
                <!-- <a class="btn btn-danger mt-3" href="allFuction.php?id=<?php // 
                                                                            ?>">Delete</a> -->
                <!-- form form update book -->
                <form action="updatebook.php" method="POST">
                  <input type="hidden" name="catagoryID_id" value=" <?php //
                                                                    ?>">
                  <input type="hidden" name="id_book" value="<?php // 
                                                              ?>">
                  <button type="submit" class="btn btn-info mt-3 text-white" name="bookEdit">Update</button>
                </form>
              </td>
              <td>
                <input class="form-check-input mt-3" type="checkbox" value="" id="flexCheckChecked">

              </td>
            </tr>
        <?php
          }
        }
        ?>
        <tr>

        </tr>
      </tbody>
    </table>
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