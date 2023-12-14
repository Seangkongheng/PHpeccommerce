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
    <table cellpadding="10px">
        <tr>
            <td><label for="category_name">Category Name: </label></td>
            <td><input type="text" name="category_name" id="category_name"></td>
        </tr>
        <tr>
            <td><label for="parent_id">Parent Category: </label></td>
            <td>
                <select name="parent_id" id="parent_id">
                    <option value="0"> No Parent Category </option>
                    <?php ddlCategoryItems(0); ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <label for="description">Description: </label><br>
                <textarea name="description" id="description" 
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
    </table>
</form>
<?php $db->close(); ?>