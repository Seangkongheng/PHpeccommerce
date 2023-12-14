<style>
    ul li a {
        font-size: 11px;
        color: grey;
    }

    .topCate:hover .subcategory {
        display: block;
    }

    .sub-category{
        display: none;
    }
    
    .dropdown-toggle::after {
        display: none;
    }
    ul .block-drop{
        width: 400px;
        margin-left: 500px;
    }

</style>
<?php
require_once("connection.php");
function ddlCategoryItems($parent_id, $defaultSelected = 0)
{
    global $db;
    $sql = "SELECT id, category_name, parent_id, level, 
                description FROM categories 
                WHERE parent_id=$parent_id";
    $result = $db->query($sql);
    if ($db->errno > 0) {
        die($db->error);
    }
    while ($row = $result->fetch_object()) {

        $spaces = "";

        for ($i = 0; $i <= $row->level; $i++) {
            $spaces .= " --- ";
        }
        if ($defaultSelected != 0) {
            if ($row->id == $defaultSelected) {
                $selected = " selected";
            } else {
                $selected = "";
            }
        } else {
            $selected = "";
        }
        echo '<option value=' . $row->id . ',' . $row->level . "$selected>";
        echo $spaces . $row->category_name;
        ddlCategoryItems($row->id, $defaultSelected);
        echo '</option>';
    }
}

function CategoryItemsListing($parent_id)
{
    global $db;
    $sql = "SELECT id, category_name, parent_id, level, 
                description FROM categories 
                WHERE parent_id=$parent_id";
    $result = $db->query($sql);
    if ($db->errno > 0) {
        die($db->error);
    }
    echo "<ul>";
    while ($row = $result->fetch_object()) {
        $id = $row->id;
        echo '<li>';
        echo $row->category_name;
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='editCategory.php?catId=$id'>Edit</a>";
        echo "&nbsp;&nbsp;<a href='delete.php?catId=$id'>Remove</a>";
        CategoryItemsListing($id);
        echo '</li>';
    }
    echo "</ul>";
}
//funtion for display category in front end
// function CategoryItemsListingINfrontEnd($parent_id){
//     global $db;
//     $sql = "SELECT id, category_name, parent_id, level, 
//             description FROM categories 
//             WHERE parent_id=$parent_id";
//     $result = $db->query($sql);
//     if($db->errno > 0){
//         die($db->error);
//     }
//     echo "<ul style='list-style-type:none;'>";
//     while($row = $result->fetch_object()){
//         $id = $row->id;
//         echo '<li"><a style="font-size:50px; href="categorylistFromlisst.php?id=$id">';
//             echo $row->category_name;
//             CategoryItemsListingINfrontEnd($id);
//         echo '</li></a>';
//     }
//     echo "</ul>";
// }

function CategoryItemsListingINfrontEnd($parent_id)
{
    global $db;

    $sql = "SELECT id, category_name, parent_id, level FROM categories WHERE parent_id=$parent_id";
    $result = $db->query($sql);

    if ($db->errno > 0) {
        die($db->error);
    }

    echo "<ul style='list-style-type:none;'>";

    while ($row = $result->fetch_object()) {
        
        $id = $row->id;
        $categoryName = $row->category_name;
        $level = $row->level;

        $fontSize = 15 - $level * 2;
        // $link = "<a href='categorylistFromlisst.php?id=$id' style='font-size:$fontSize;color:black;text-decoration:none'>";
        echo "<li class='customer-drop dropdown' style=''>";
            echo " <a class='dropdown-toggle s  text-decoration-none ' style='font-size:20px' href='#'  id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='fale'>
            $categoryName</a>";
      
             echo "<div class='block-drop dropdown-menu' aria-labelledby='dropdownMenuLink'>";
                 CategoryItemsListingINfrontEnd($id);
                
             echo "</div>";
        
       echo "</li>";

       
    }

    echo "</ul>";
}








?>