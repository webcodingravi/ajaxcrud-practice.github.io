<div id="error-message">This is error message</div>
<div id="success-message">This is successfully message.</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

      var origin = window.location.origin;
      var path = window.location.pathname.split( '/' );
      var URL = origin+'/'+path[1]+'/';


             function loadData(page) {
                $.ajax({
               url : "loaddata.php",
               type : "POST",
               data : {page_no : page},
               success : function(data) {
                  $("#loadTable").html(data);
               }
            });
             }
        
             loadData();

             $(document).on("click", "#pagination a", function(e) {
                e.preventDefault();
                var page_id = $(this).attr("id");
                loadData(page_id);
             })

          
             /*******INSERT DATA */
             $("#save-btn").on("click", function(e) {
               e.preventDefault();
             
             var fname = $("#fname").val();
             var lname = $("#lname").val();
             var age = $("#age").val();
             var city = $("#city").val();
            
            if(fname == "" || lname == "" || age == "" || city == "") {
               $("#error-message").html("Please Fill All filed.").slideDown();
                 $("#success-message").slideUp();
                
                 setTimeout(() => {
                  $("#error-message").html("Please Fill All filed.").slideUp();
                 }, 3000);
              
            }else{
                $.ajax({
                   url : "insert-data.php",
                   type : "POST",
                   data : $("#addData").serialize(),
                   success : function(data) {
                     if(data == 1) {
                        $("#addData").trigger("reset");
                         $("#success-message").html("Data Successfully Insert.").slideDown();
                         $("#error-message").slideUp(); 

                         setTimeout(() => {window.location = URL+'index.php'; }, 1500);
                
                           
                     }else {
   
                        $("#error-message").html("Data Not Insert").slideDown();
                         $("#success-message").slideUp();

                         setTimeout(() => {
                           $("#success-message").html("Data Not Insert").slideUp();
                         }, 3000);
                     }
                   }
                });    
            }

         }); 
        


         $(document).on("click", "#edit-btn", function() {
            var client_id = $(this).data("eid");
            
            $.ajax({
                url : "single-data.php",
                type : "POST",
                data : {id : client_id},
                success : function(data) {
                  $("#modal-form").html(data);
   
                }
               
            });

            $(document).on("click", "#edit-sumbit", function(e) {
               // e.preventDefault();

            var id = $("#id").val();
            var fname = $("#efirst_name").val();
             var lname = $("#elast_name").val();
             var age = $("#eage").val();
             var city = $("#ecity").val();
               
               $.ajax({
                  url : "update-data.php",
                  type : "POST",
                  data : {id : id, fname : fname, lname : lname, age : age, city : city},
                  success : function(data) {
                     if(data == 1) {
                        $("#modal").hide();
                        $("#error-message").html("Data Successfully Update").slideDown();
                         $("#success-message").slideUp();

                         setTimeout(() => {
                           $("#success-message").html("Data Successfully Update").slideUp();
                         }, 3000);
                        loadData();
                     }else {
                        $("#error-message").html("Data Not Update").slideDown();
                         $("#success-message").slideUp();

                         setTimeout(() => {
                           $("#success-message").html("Data Not Update").slideUp();
                         }, 3000);
                        loadData();
                     }
                   
                  }
               });

            });



         });





       $(document).on("click", "#delete-btn", function() {
         var client_id = $(this).data("id");
          
           var element = this;
            if(confirm("Do You want really delete this record ?")) {
               $.ajax({
               url : "Delete-data.php",
               type : "POST",
                data : {id :client_id},
                success : function(data) {
                  if(data == 1) {
                     $(element).closest("tr").fadeOut;
                     $("#success-message").html("Data Successfully Delete").slideDown();
                         $("#error-message").slideUp();

                         setTimeout(() => {
                           $("#success-message").html("Data Successfully Delete").slideUp();
                         }, 3000);
                        loadData();
                     loadData();
                  }else {
                     $("#error-message").html("Data Not Delete").slideDown();
                         $("#success-message").slideUp();

                         setTimeout(() => {
                           $("#success-message").html("Data Not Delete").slideUp();
                         }, 3000);  
                  }
                }
          });
            }
       
            

       
       });

         $("#search").on("keyup", function() {
          var search = $(this).val();

         $.ajax({
               url : "search-trem.php",
               type : "POST",
               data : {search_trem : search},
               success : function(data) {
               
                  $("#loadTable").html(data);
               }
       });
       })

    });
</script>
</body>
</html>
