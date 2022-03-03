<?php
ob_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/topbar.php');
$month1 = $_POST['paymentbymonth'];
?>
<?php include('database/dbconfig.php');?>
<?php include('extrasecurity.php');?>

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <link href="checkbox.css" rel="stylesheet">










    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Fees Payment For <?php echo " Month # $month1 "?></h6>
        </div>



        

        <?php 



?>
        <div class="card-body">
        <?php


            if(isset($_POST['markAttendance_btn']))

            {
                // $month1 = $_POST['paymentbymonth'];
              
                // echo "<h6> Month # $month1</h6> ";

                $class_id = $_POST['viewclass_id'];

                $query1 = "SELECT date,class_id,am_status  FROM fees_payment_history WHERE date = CURDATE() AND class_id = $class_id ";
                $query_run1 = mysqli_query($connection, $query1);

                if($query_run1){
                    
                        
                        echo "<p align=centre>Attendance Already Marked For Today</p> ";
                    } 
                    
                    else {
  


                      
             
                $query = "SELECT * FROM student,class,feespaymentnew  where student.class_id='$class_id' AND student.class_id = cid AND feespaymentnew.sid= student.sid AND feespaymentnew.month=$month1  ";
           
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
        <th> Fees Paid</th>
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
       <input type="hidden" name="sid" value="<?php echo $row ['sid'];?>">
      
      
                    <input type="hidden" name="paymentbymonth" value="<?php echo $month1;?>">
       <input type="hidden" name="viewclass_idAttendance" value="<?php echo $row ['cid'];?>" >
  <input class="form-check-input big-checkbox" type="checkbox" name ="paymentid[]" value="<?php  echo $row ['s_rollno'];?>"   id="flexCheckDefault" <?php echo ($row['checked']=='checked' ? 'checked' : '');?> >
 
</div></td>

<!-- <td><div id="paymentReason" >
    Reason:
    <input type="text" id="paymentReasonInput" />
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
                
               
               <button  type="submit" name="paymentsubmit_btn" class="btn btn-primary   float-right pt-10"> Submit</button>
                
                </form>








                <div> <form action=finance.php method="post">
                <input type="hidden" name="viewclass_id" value="<?php echo $row ['cid'];?>">
                    <input type="hidden" name="paymentbymonth" value="<?php echo $month1;?>">
               <button class="btn btn-primary  float-left ">Goback</button> </form> </div>

             

           
               
 
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

