<?php
    require_once("connection.php");
    require_once("functions.php");  
    if(isset($_GET["catId"])){
        $catId = $_GET["catId"];

        $sqlSubCategory = "SELECT category_name FROM 
                           categories WHERE parent_id=$catId";
        $resultSubCategory = $db->query($sqlSubCategory);
        $rowSubCategory = $resultSubCategory->fetch_assoc();
        if(count($rowSubCategory) > 0){
            die("Please delete all its sub categories first.");
        }

        $sqlCategoryDeleting = "DELETE FROM categories 
                                WHERE id=$catId LIMIT 1";
        $db->query($sqlCategoryDeleting);
        if($db->errno > 0){
            die($db->error);
        }
        header("location:index.php");                        
    }
?>