<?php
   require_once('connection.php');

    function Unlimititcategories($perent_id)
    {
        global $db;
        $sql = "SELECT id,name,parrent_id,Decription,lavel From tbl_catagory
        Where parrent_id=$perent_id";
        $result = $db->query($sql);

if($db->errno>0)
{
 die ($db->error);
}
        while($row=$result->fetch_object()){
            $spaces = "";
            for($i=0; $i<=$row->lavel; $i++){
                $spaces .= "&nbsp;&nbsp;&nbsp;&nbsp;";
            }
            echo '<option value='.$row->id.','.$row->lavel.'>';
                echo $spaces . $row->name;
                Unlimititcategories($row->id);
            echo '</option>';
        }
    }
?>