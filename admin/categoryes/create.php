<?php
    require_once('connection.php');
    require_once('function.php');

    if(isset($_POST['btnSubmit']))
    {
        $categroyname=$_POST['categoryname'];
        $parrent_id=$_POST['category'];
        $parrent_id_level=explode(',',$parrent_id_level);
        $parrent_id=$parrent_id_level[0];
        if(count($parrent_id_level)>1)
        {
            $level=$parrent_id_level[1];
        }
        $decription=trim($_POST['decription']);

        $sql = "INSERT INTO tbl_catagory (name,parrent_id,Decription,lavel)
        VALUES ('$categroyname','$parrent_id','$decription',$level)";
        // $query_run=mysqli_query($db,$sql);
        $db->query($sql);
        if($db->errno>0)
        {
            die($db->error);
           
        }
    }
?>


<form action="" method="post">
    <table>
        <tr>
            <td><label for="categoryname">category name</label></td>
            <input type="text" name="categoryname" id="categoryname">
        </tr>

        <tr>
            <td><label for="parent_id">perent categroy</label></td>
            <td>
                <select name="category" id="">
                <option value="0"> No parrent ID</option>
                    <?php Unlimititcategories(0)?> 
                </select>
            </td>
        </tr>

        <tr>
            <td><label for="decription">Decription</label></td>
            <td>
            <textarea name="decription" id="decription" cols="70" rows="17">
            </textarea>
            </td>
        </tr>

        <tr>
            <td>
                <input type="submit" value="addd" name ="btnSubmit">
                <input type="submit" value="cancel" name ="btnbtncencal" onclick="window.location='index.php_check_syntax'">
            </td>
        </tr>
    </table>
</form>