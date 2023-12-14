<style>
    ul li a{
        font-size: 11px;
        color: grey;
    }
</style>
<?php
    require_once("connection.php");
    function ddlCategoryItems($parent_id,$defaultSelected = 0){
        global $db;
        $sql = "SELECT id, category_name, parent_id, level, 
                description FROM categories 
                WHERE parent_id=$parent_id";
        $result = $db->query($sql);
        if($db->errno > 0){
            die($db->error);
        }
        while($row = $result->fetch_object()){

            $spaces = "";
        
            for($i=0; $i<=$row->level; $i++){
                $spaces .= " ";
            }
            if($defaultSelected != 0){
                if($row->id == $defaultSelected){
                    $selected = " selected";
                }else{
                    $selected = "";
                }
            }
            else{
                $selected="";
            }
            echo '<option value=' . $row->id . ',' . $row->level ."$selected>";
                echo $spaces . $row->category_name;
                ddlCategoryItems($row->id, $defaultSelected);
            echo '</option>';
        }
    }

    function CategoryItemsListing($parent_id){
        global $db;
        $sql = "SELECT id, category_name, parent_id, level, 
                description FROM categories 
                WHERE parent_id=$parent_id";
        $result = $db->query($sql);
        if($db->errno > 0){
            die($db->error);
        }
        echo "<ul>";
        while($row = $result->fetch_object()){
            $id = $row->id;
            echo '<li>';
                echo $row->category_name;
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='edit.php?catId=$id'>Edit</a>";
                echo "&nbsp;&nbsp;<a href='delete.php?catId=$id'>Remove</a>";
                CategoryItemsListing($id);
            echo '</li>';
        }
        echo "</ul>";
    }
    
?>