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
        header("location:index.php");
    }
?>
<form action="" method="post">
    <table cellpadding="10px">
        <tr>
            <td><label for="category_name">Category Name: </label></td>
            <td><input type="text" value="<?php echo $category_name;?>" name="category_name" id="category_name"></td>
        </tr>
        <tr>
            <td><label for="parent_id">Parent Category: </label></td>
            <td>
                <select name="parent_id" id="parent_id">
                    <option value="0"> No Parent Category </option>
                    <?php ddlCategoryItems(0, $parent_id); ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <label for="description">Description: </label><br>
                <textarea name="description" id="description" 
                cols="70" rows="7"><?php echo $description; ?></textarea>
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
    <input type="hidden" name="catId" id="catId" value="<?php echo $catId; ?>">
</form>
<?php $db->close(); ?>