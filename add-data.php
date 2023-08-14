<?php

include 'config.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$pone = $_POST['phone'];

$sql = "INSERT INTO student(stu_name, last_name, Age, City) VALUES('{$fname}', {$lname}, {$phone})";

$result = mysqli_query($conn, $sql) or die("Query failed");

if($result) {
    echo 1;
}else {
    echo 0;
}





?>