<?php
include 'config.php';

$client_id = $_POST['id'];
$sql = "SELECT * FROM student WHERE id = {$client_id}";
$result = mysqli_query($conn, $sql) or die("Query failed");

$output = "";
if(mysqli_num_rows($result) > 0) {
        
     while($row = mysqli_fetch_assoc($result)) {
            $output .="<form  method='POST' id='editForm'>
            <lable>First Name</lable><br>
            <input type='text' class='form-control' value='{$row["stu_name"]}' name='efirst_name' id='efirst_name'><br>
            <input type='text' class='form-control' value='{$row["id"]}' name='id' id='id' hidden>
            <lable>Last Name</lable><br>
            <input type='text' name='elast_name' value='{$row["last_name"]}' class='form-control' id='elast_name'><br>
            <lable>Age</lable><br>
            <input type='Number' name='eage' value='{$row["Age"]}' class='form-control' id='eage'><br>
            <lable>City</lable><br>
            <input type='text' name='ecity' value='{$row["City"]}' class='form-control' id='ecity'><br>

                <button type='submit' class='btn btn-primary' id='edit-sumbit'>Update</button>
                </form>";
            
          }


          echo $output;
}else {
  echo "NO Record Found.";
}


?>