<?php
ob_start();
include('security.php');
include('extrasecurity.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/topbar.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>






    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="./css/jquery-ui.min.css" rel = "stylesheet">
    <script src = "./js/jquery-3.5.1.min.js"></script>
    <script src = "./js/jquery-ui.min.js"></script>

                <!-- Begin Page Content -->
                <div class="container-fluid">



             
               

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Attendance 


           
                  </h5>
                        </div>
                    <div class="card-body">
                    
                    <p>Date: <input type="text" id="datepicker"></p>

                    <?php 

if(isset($_SESSION['success']) && $_SESSION['success'] != '')
{
  echo '<h3>' .  $_SESSION['success'] . '</h3>';
  unset ($_SESSION['success']);
}

if(isset($_SESSION['attendanceStatus']) && $_SESSION['attendanceStatus'] != '')
{
  echo '<h3>' .  $_SESSION['attendanceStatus'] . '</h3>';
  unset ($_SESSION['attendanceStatus']);
  echo '<h3>' .  $_SESSION['attendanceStatusHistory'] . '</h3>';
  unset ($_SESSION['attendanceStatusHistory']);
}

?>


                    
                            <div class="table-responsive">
                            <?php 



$query = "SELECT class.*, (SELECT COUNT(*) FROM student WHERE student.class_id = class.cid) AS countofstudents FROM class";


    $query_run = mysqli_query($connection,$query);

    ?>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
          <tr>
            <th> Serial Number </th>
            <th> Class Name </th>
            <th> Class Teacher Name </th>

            <th>Students Enrolled </th>
            <th>Attendance Status</th>
        
            <th>Mark Attendance </th>
             <th>Edit Attendance </th>
        
            <th>View Details </th>  
             
          </tr>
        </thead>
        <tbody>

     


        <?php 

        
     if(mysqli_num_rows($query_run)>0)

     {
       while($row = mysqli_fetch_assoc($query_run))
       {


        $cid = $row ['cid'];

        
$status_query = "SELECT * From check_attendance_marked WHERE date = curDate() AND class_id =$cid ";
$status_query_run = mysqli_query($connection, $status_query);
if(mysqli_num_rows($status_query_run) > 0)
{
    $_SESSION['a_status'] = "Yes";
    $_SESSION['status_code'] = "success";

}
else{
  $_SESSION['a_status'] = "No";
  $_SESSION['status_code'] = "error";
}
    
 
       

        ?>


          <tr>
            <td>    <?php  echo $row ['cid'];?> </td>
            <td>        <?php  echo $row ['c_name'];?></td>
            <td>    <?php  echo $row ['teacher_id'];?></td>




            <td>    <?php  echo $row ['countofstudents'];?></td>
            <td><?php echo $_SESSION['a_status']?></td>
        
            <td>
                <form action="markAttendance.php" target="_blank" method="post">
                    <input type="hidden" name="viewclass_id" value="<?php echo $row ['cid'];?>">
                    <button  type="submit" name="markAttendance_btn" class="btn btn-success"> Mark Attendance </button>
                </form>
            </td>


            
            <td>
                <form action="editAttendance.php" target="_blank" method="post">
                    <input type="hidden" name="viewclass_id" value="<?php echo $row ['cid'];?>">
                    <button  type="submit" name="markAttendance_btn" class="btn btn-success"> Edit Attendance </button>
                </form>
            </td>
           

            <td>
                <form action="attendanceDetails.php" target="_blank" method="post">
                    <input type="hidden" name="viewclass_id" value="<?php echo $row ['cid'];?>">
                    <button  type="submit" name="viewclass_btn" class="btn btn-success"> VIEW Attendance DETAILS</button>
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

<script>$("#datepicker").datepicker();
$("#datepicker").datepicker("setDate", new Date());
$("#datepicker").datepicker({
    onSelect: function() { 
        var dateObject = $(this).datepicker('getDate'); 
    }
});
</script>


    <?php
include('includes/scripts.php');
include('includes/footer.php');
?>