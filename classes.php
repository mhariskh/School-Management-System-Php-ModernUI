<?php
ob_start();
include('security.php');
include('extrasecurity.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/topbar.php');
?>

<div class="modal fade" id="addnewclass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Class Number </label>
                <input type="text" name="c_numb" class="form-control" placeholder="Enter Class Number">
            </div>

            
            <div class="form-group">
                <label> Class Name </label>
                <input type="text" name="c_name" class="form-control" placeholder="Enter Class Name">
            </div>

            <div class="form-group">
                <label> Teacher id  </label>
                <input type="text" name="teacher_id" class="form-control" placeholder="Enter Teacher id">
            </div>


            <div class="form-group">
                <label> Class Capacity </label>
                <input type="text" name="c_capacity" class="form-control" placeholder="Enter Class Capacity">
            </div>

            <div class="form-group">
                <label> Class location </label>
                <input type="text" name="c_loc" class="form-control" placeholder="Enter Class location">
            </div>


            <div class="form-group">
                <label> Class Start Date </label>
                <input type="text" name="c_sdate" class="form-control" placeholder="Enter Class Start Date">
            </div>


            
            <div class="form-group">
                <label> Class End Date </label>
                <input type="text" name="c_edate" class="form-control" placeholder="Enter Class End Date ">
            </div>

             
            <div class="form-group">
                <label> Class Fee </label>
                <input type="text" name="c_fee_type" class="form-control" placeholder="Enter Class Fee ">
            </div>



            
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registernewclass_btn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>






    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

                <!-- Begin Page Content -->
                <div class="container-fluid">

             
               

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Classes

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

                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addnewclass">
              Add New Class
            </button>
                  </h5>
                        </div>
                    <div class="card-body">
                            <div class="table-responsive">
                            <?php 
    
 

$query = "SELECT class.*,teacher.*, (SELECT COUNT(*) FROM student WHERE student.class_id = class.cid) AS countofstudents FROM class,teacher WHERE class.teacher_id=teacher.tid";


    $query_run = mysqli_query($connection,$query);

    ?>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
          <tr>
            <th> Serial Number </th>
            <th> Class Name </th>
            <th> Class Teacher Id </th>

            <th>Students Enrolled </th>
            <th>Class Fee  </th>
            <th>View Details </th>  
             <th>Edit Details </th> 
              <th>Delete </th>
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
            <td>    <?php  echo $row ['cid'];?> </td>
            <td>        <?php  echo $row ['c_name'];?></td>
            <td>    <?php  
            
            
            

            
            echo $row ['first_name'];?></td>




            <td>    <?php  echo $row ['countofstudents'];?></td>
   
            <td> <?php  echo $row ['c_fee_type']; ?> </td>
            <td>
                <form action="classDetails.php" target="_blank" method="post">
                    <input type="hidden" name="viewclass_id" value="<?php echo $row ['cid'];?>">
                    <button  type="submit" name="viewclass_btn" class="btn btn-success"> VIEW DETAILS</button>
                </form>
            </td>
            <td>
                <form action="editclasses.php" method="post">
                <input type="hidden" name="viewclass_id" value="<?php echo $row ['cid'];?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                <input type="hidden" name="viewclass_id" value="<?php echo $row ['cid'];?>">
                  <button type="submit" name="deleteclass_btn" class="btn btn-danger"> DELETE</button>
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