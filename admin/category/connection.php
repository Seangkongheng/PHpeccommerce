<?php
    $db = new MySQLi('localhost', 'root','','booksell');
    // $conn = new mysqli('localhost', 'root','','booksell');
    if($db->connect_errno > 0){
        die($db->connect_error);
    }
?>