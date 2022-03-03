<?php
ob_start();
include('security.php');
include('extrasecurity.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/topbar.php');
?>
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

 
<div class="modal fade" id="addnewteacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Teacher's Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> First Name </label>
                <input type="text" name="first_name" class="form-control" placeholder="Enter First Name">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name">
            </div>
            

            

            

        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerTeacher_btn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>



                <!-- Begin Page Content -->
                <div class="container-fluid">

   
               

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Teachers

                            <?php 
                            if(isset($_SESSION['success']) && $_SESSION['success'] != '')
{
  echo '<h3>' .  $_SESSION['success'] . '</h3>';
  unset ($_SESSION['success']);
}

if(isset($_SESSION['status']) && $_SESSION['status'] != '')
{
  echo '<h3>' .  $_SESSION['status'] . '</h3>';
  unset ($_SESSION['status']);
}
?>

                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addnewteacher">
              Add New Teacher
            </button>
                            </h5>
                        </div>
                    <div class="card-body">
                            <div class="table-responsive">
                            <?php 
   
    $query = "SELECT * FROM  teacher";
    $query_run = mysqli_query($connection,$query);

    ?>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
          <tr>
            <th> SerialNumber </th>
            <th> Teacher Name  </th>
          
           


           
        
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
        <?php 
     if(mysqli_num_rows($query_run)>0)

     {
       while($row = mysqli_fetch_assoc($query_run))
       {

        ?>


          <tr>
            <td>    <?php  echo $row ['tid'];?> </td>
            <td>        <?php  echo $row ['first_name'];?>  <?php  echo $row ['last_name'];?></td>
          

          
            <td>
                <form action="editTeacher.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row ['tid'];?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="">
                  <button type="submit" name="deleteteacher_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>

          
        <?php 
  
}
}

else {
echo "No Record Found";
}

?>
        
        </tbody>
                                </table>
                            </div>
                     
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

         
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->


    <?php
include('includes/scripts.php');
include('includes/footer.php');
?>