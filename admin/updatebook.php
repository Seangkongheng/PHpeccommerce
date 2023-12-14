<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'booksell');
?>

<?php include('side/header.php') ?>
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
<body>
  <!-- nav bar -->

  <!-- end navbar -->
  <div class="container mt-5">
    <?php
    $GetbookID=$_GET['bookid'];
    $GEtcategoryId=$_GET['cateid'];
    $sql = "SELECT * 
    FROM book 
    WHERE book_id='$GetbookID'";
    $result = mysqli_query($conn,$sql);
    foreach ($result as $row) {
    ?>
      <!-- this form will access to Addproduct file when submit -->
      <form action="Addproduct.php" method="POST" enctype="multipart/form-data">
        <label for=""><span class="text-danger">*</span> Movie Tile</label>
        <input type="text" value="<?php echo $row["book_title"] ?>" name="movieTitle_update" class="form-control mb-4" require>
        <label for=""><span class="text-danger">*</span>Catagory</label>
        <select name="catagory_update" id="" class="form-select">
          <?php
          //select all data form table category 
          $sqlcategory = "SELECT id,category_name from categories";
          $cat = mysqli_query($conn, $sqlcategory);
          while ($item = mysqli_fetch_assoc($cat)) {
            $cate_id = $item['id'];
            //if value in culum = category of product is true
            if ($_POST['catagoryID_id'] == $cate_id) {
              echo "<option value='$cate_id' selected>" . $item['category_name'] . "</option>";
            } else {
              echo "<option value='$cate_id'>" . $item['category_name'] . "</option>";
            }
          }
          ?>
        </select><br>
        <label for=""><span class="text-danger">*</span>price</label>
        <input type="number" value="<?php echo $row['price'] ?>" name="price_update" class="form-control mb-4" require>

        <label for=""><span class="text-danger">*</span>Author</label>
        <input type="text" name="author_update" value="<?php echo $row['Author'] ?>" class="form-control mb-4" require>


        <label for=""><span class="text-danger">*</span>stock</label>
        <input type="number" name="stock_update" value="<?php echo $row['stock'] ?>" class="form-control mb-4" require>

        <label for=""><span class="text-danger">*</span>Decription</label>
        
        <textarea class="form-control" name="decrtiptionEdit" id="" cols="30" rows="10">
            <?php echo $row['Decription_product']?>"
        </textarea> 
        <label for=""><span class="text-danger">*</span>image</label>
        <input type="file" name="image_book_update" class="form-control mb-4" require>
        <img src="./upload/<?php echo $row['image'] ?>" alt="" width="200px"><br>
        <input type="hidden" name="Book_id_update" value="<?php echo $row['book_id'] ?>">
        <button type="submit" name="btnUpdateBook" class="btn btn-primary mt-5">Update</button>
      </form>
    <?php
    }
    ?>

  </div>
</body>

</html>
<?php include('side/footer.php') ?>
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