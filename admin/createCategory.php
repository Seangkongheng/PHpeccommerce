

<?php
require_once("connection.php");
require_once("functions.php");
?>





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
    <link rel="stylesheet" href="/css/style.css">
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
    <!-- <a href="createCategory.php" class="btn btn-primary">Add New</a> -->
    <!-- Modal -->

    <div class="allproduct-display mt-4">

    <?php
    require_once("connection.php");
    require_once("functions.php");
    if(isset($_POST["buttonSubmit"])){
        $category_name = trim($_POST["category_name"]); 
        $parent_id_level = $_POST["parent_id"];

        $parent_id_level = explode(',', $parent_id_level);
        $parent_id = $parent_id_level[0];
        if(count($parent_id_level) == 2){
            $level = $parent_id_level[1] + 1;
        }else{
            $level = 0;
        }
        
        
    

        $description = trim($_POST["description"]);
        $sql = "INSERT INTO categories(category_name, 
                parent_id, level, description) 
                VALUES('$category_name', $parent_id, $level, 
                '$description')";

        $db->query($sql);
        if($db->errno > 0){
            die($db->error);
        }
    }
?>
<form action="" method="post">

    <div class="form-add-unlimited-category">
         <label for="category_name ">Category Name: </label>
         <input class="form-control" type="text" name="category_name" id="category_name">

         <label class="mt-3" for="parent_id">Parent Category: </label>
         <select class="form-control" name="parent_id" id="parent_id">
                    <option value="0"> No Parent Category </option>
                    <?php ddlCategoryItems(0); ?>
        </select>  
        <label class="mt-3" for="description">Description: </label><br>
                <textarea class="form-control" name="description" id="description" 
                cols="70" rows="7">
        </textarea>
        <input class="btn btn-primary mt-5" type="submit" value="Add Category" name="buttonSubmit">

    </div>



    <!-- <table cellpadding="10px">





        <div>
            <td><label for="category_name">Category Name: </label></td>
            <td><input class="form-control" type="text" name="category_name" id="category_name"></td>
        </div>
        <div>
            <td><label for="parent_id">Parent Category: </label></td>
            <td>
                <select class="form-control" name="parent_id" id="parent_id">
                    <option value="0"> No Parent Category </option>
                    <?php //ddlCategoryItems(0); ?>
                </select>
            </td>
        </div>

        <tr>
            <td colspan="2">
                <label for="description">Description: </label><br>
                <textarea class="form-control" name="description" id="description" 
                cols="70" rows="7"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Submit" 
                    name="buttonSubmit">
                <input type="button" value="Cancel" 
                    onclick="window.location='index.php'">
            </td>
        </tr>
    </table> -->
</form>
<?php $db->close(); ?>

    </div>

    <?php include("side/footer.php"); ?>
</body>

</html>
<?php
?>