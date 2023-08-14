<?php

include 'config.php';
$id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$age = $_POST['age'];
$city = $_POST['city'];

$sql = "UPDATE student SET stu_name = '{$fname}', last_name = '{$lname}', Age = {$age}, City = '{$city}' WHERE id = {$id}";

$result = mysqli_query($conn, $sql) or die("Query failed");

if($result) {
    echo 1;
}else 
echo 0;

?>