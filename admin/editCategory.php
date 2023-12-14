<?php
    require_once("connection.php");
    require_once("functions.php");

    if(isset($_GET["catId"])){
        
        $catId = $_GET["catId"];
        
        $sqlCategory = "SELECT category_name, parent_id, 
                        level, description FROM categories
                        WHERE id=$catId LIMIT 1";
        $resultCategory = $db->query($sqlCategory);
        if($db->errno > 0){
            die($db->error);
        }
        $rowCategory = $resultCategory->fetch_object();

        $category_name = $rowCategory->category_name;
        $parent_id = $rowCategory->parent_id;
        $description = $rowCategory->description;
    }

    if(isset($_POST["buttonSubmit"])){
        $catId = $_POST["catId"];
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
        $sql = "UPDATE categories SET 
                category_name = '$category_name', 
                parent_id = $parent_id, 
                level = $level, 
                description = '$description' WHERE 
                id=$catId LIMIT 1";

        $db->query($sql);
        if($db->errno > 0){
            die($db->error);
        }
        header("location:indexCategory.php");
    }
?>












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
    <a href="createCategory.php" class="btn btn-primary">Add New</a>
    <!-- Modal -->

    <div class="allproduct-display mt-4">

    <form action="" method="post">


    <div class="updateForm">
         <label  class="mt-3" for="category_name">Category Name: </label>
         <input class="form-control" type="text" value="<?php echo $category_name;?>" name="category_name" id="category_name">

         <label  class="mt-3" for="parent_id">Parent Category: </label>
         <select class="form-control" name="parent_id" id="parent_id">
                    <option value="0"> No Parent Category </option>
                    <?php ddlCategoryItems(0, $parent_id); ?>
        </select>

        <label class="mt-3" for="description">Description: </label><br>
                <textarea class="form-control" name="description" id="description" 
                cols="70" rows="7"><?php echo $description; ?>
        </textarea>
        <input class="btn btn-primary mt-5" type="submit" value="Submit"  name="buttonSubmit">
    </div>





    <!-- <table cellpadding="10px">
        <tr>
            <td><label for="category_name">Category Name: </label></td>
            <td><input type="text" value="<?php //echo $category_name;?>" name="category_name" id="category_name"></td>
        </tr>
        <tr>
            <td><label for="parent_id">Parent Category: </label></td>
            <td>
                <select name="parent_id" id="parent_id">
                    <option value="0"> No Parent Category </option>
                    <?php //ddlCategoryItems(0, $parent_id); ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <label for="description">Description: </label><br>
                <textarea name="description" id="description" 
                cols="70" rows="7"><?php //echo $description; ?></textarea>
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
    <input type="hidden" name="catId" id="catId" value="<?php echo $catId; ?>">
</form>
<?php $db->close(); ?>

    </div>

    <?php include("side/footer.php"); ?>
</body>

</html>
<?php
?>