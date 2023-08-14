<?php include 'header.php' ?>

<div class="main-div">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <div class="add_data ">
                     <a href="add-form.php">Add Data</a>
                    </div>
                </div>
                <div class="col-12">
                    <table class="table table-bordered" id="loadTable">

                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
                 <div id="modal">
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Update Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close"></button>
                    </div>
                    <div class="modal-body" id="modal-form">

               
               
                    </div>
                </div>
                </div>
                </div>


<?php include 'footer.php' ?>