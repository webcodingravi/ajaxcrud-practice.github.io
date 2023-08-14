<?php
include 'config.php';

$limit = 3;
$page = "";
if(isset($_POST['page_no'])) {
  $page = $_POST['page_no'];
}else {
  $page = 1;
}
$offset = ($page - 1) * $limit;
$sql = "SELECT * FROM student LIMIT {$offset}, {$limit}";
$result = mysqli_query($conn, $sql) or die("Query failed");

$output = "";
if(mysqli_num_rows($result) > 0) {
    
  $output .= '<table class="table table-bordered">
                <thead class="bg-primary text-white">
                <th>S.No.</th>  
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>City</th>
                <th>Modify</th>
                <th>Delete</th>  
                </thead>';
      
            $sno = $offset + 1;
        
          while($row = mysqli_fetch_assoc($result)) {
            $output .="<tbody>
            <tr>
               <td>{$sno}</td>
               <td>{$row['stu_name']}</td>
               <td>{$row['last_name']}</td>
               <td>{$row['Age']}</td>
               <td>{$row['City']}</td>
               <td><button class='btn btn-primary btn-sm' id='edit-btn' data-eid='{$row["id"]}' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Update</button></td>
               <td><button class='btn btn-danger btn-sm' id='delete-btn' data-id='{$row["id"]}'>Delete</button></td>
          </tr>
          </tbody>";
          $sno++;
          }
            
          $output .= "</table>";

          $sql1 = "SELECT * FROM student";
          $result1 = mysqli_query($conn, $sql1);

          $total_record = mysqli_num_rows($result1);
          $total_page = ceil($total_record / $limit);


          $output .= "<ul class='pagination' id='pagination'>";
          
       
          for($i=1; $i <= $total_page; $i++) {
         
          
            if($i == $page) {
              $active = "active";
            }else {
              $active ="";
            }
           
            $output .=  "<li class='page-item $active'><a class='page-link' href='' id='{$i}'>{$i}</a></li>";

      }

   
  

      $output .= "</ul>";

     
   
          echo $output;
}else {
  echo "NO Record Found.";
}





?>