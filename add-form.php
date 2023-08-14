<?php include 'header.php' ?>

<div class="Add-data">
<div class="container">
   <div class="add-text my-4 text-center">
      <h2>Add Information</h2> <hr/>
</div>
   <div class="row">
      <div class="col-12">
         <form action="" method="POST" id="addData">
            <lable>First Name</label><br>
            <input type="text" class="form-control" name="fname" id="fname" placeholder="Please Enter Your First Name..."><br>
            <lable>Last Name</label><br>
            <input type="text" class="form-control" name="lname" id="lname" placeholder="Please Enter Your Last Name..."><br>
            <lable>Age</label><br>
            <input type="number" class="form-control" name="age" id="age" placeholder="Please Enter Your Age Name..."><br>
            <lable>City</label><br>
             <?php include "config.php";
              $sql = "SELECT DISTINCT(City) FROM student";
               $result = mysqli_query($conn, $sql) or die("Query failed");
               if(mysqli_num_rows($result) > 0) {
                  echo '<select class="form-select" name="city" id="city">';
                             
                     echo '<option value="" hidden>Please Select City..</option>';
                        
                  while($row = mysqli_fetch_assoc($result)) {
                     echo "<option value='.{$row['City']}.'>{$row['City']}</option>";
                  }

                  echo '</select>';
               }else {
                  echo "No Record Found";
               }
               mysqli_close($conn);

             ?>
           

          

            <input type="button" id="save-btn" class="btn btn-primary" value="Submit">
         </form>
      </div>
   </div>
</div>


</div>



<?php include 'footer.php' ?>



