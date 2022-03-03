<?php
ob_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/topbar.php');
?>
<?php include('database/dbconfig.php');?>
<?php include('extrasecurity.php');?>

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <link href="checkbox.css" rel="stylesheet">










    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Class Details</h6>
        </div>



        

        <?php 



?>
        <div class="card-body">
        <?php


            if(isset($_POST['markAttendance_btn']))
            {


                $class_id = $_POST['viewclass_id'];
                

                $query1 = "SELECT date,class_id,am_status  FROM check_attendance_marked WHERE date = CURDATE() AND class_id = $class_id ";
                $query_run1 = mysqli_query($connection, $query1);

                    if ($query_run1->num_rows <= 0) {
                        echo "<p align=centre>Attendance Not Marked For Today</p> ";
                       


                    } 

                    
                   else {
  



                $query = "SELECT * FROM student,class  where class_id='$class_id' AND class_id = cid;   ";
           
                $query_run = mysqli_query($connection, $query);
?>


<form method = "post" action = "code.php">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
        <tr>
        <th> SerialNumber </th>
        <th> AdmissionNumber </th>
        <th> Class </th>
        <th> Name </th>
    
        <th>Gender </th>
        <th> Absent</th>
        <!-- <th> Reason</th> -->


      
    
        </tr>
        </thead>

        <?php 
        $serialNumber = 0;
        foreach($query_run as $row)
                {
                    $serialNumber++;
                    ?>
        <tbody>



        <tr>
        <td>    <?php  echo $serialNumber;?> </td>
        <td>        <?php  echo $row ['s_rollno'];?></td>
        <td>        <?php  echo $row ['c_name'];?></td>
        <td>    <?php  echo $row ['s_fname'];?>  <?php  echo $row ['s_lname']; ?></td>
       
        <td> <?php  echo $row ['s_gender']; ?> </td>
       <td> <div class="form-check">
       <input type="hidden" name="viewclass_idAttendance" value="<?php echo $row ['cid'];?>">
       <input type="hidden" name="sid" value="<?php echo $row ['sid'];?>">
  <input class="form-check-input big-checkbox" type="checkbox" name ="absentid[]" value="<?php  echo $row ['s_rollno'];?>" id="flexCheckDefault">
 
</div></td>

<!-- <td><div id="absentReason" >
    Reason:
    <input type="text" id="absentReasonInput" />
</div>
</td> -->
    
        </tr>


    <?php 
                }
    }
    }


    ?>

    </tbody>


                </table>

                <div>  <a href="attendance.php" class="btn btn-primary  float-left ">Goback</a></div>   
              <div> <button  type="submit" name="attendanceEditSubmit_btn" class="btn btn-primary   float-right"> Submit</button>
                   </div>
</form>
           
               

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

