<?php

include  'config.php';

$id = $_POST['id'];


$sql = "DELETE FROM student WHERE id = {$id}";

$result = mysqli_query($conn, $sql) or die("Query failed");

if($result) {
    echo 1;
}else 
echo 0;



?>