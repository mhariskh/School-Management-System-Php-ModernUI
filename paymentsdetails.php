<?php
ob_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/topbar.php');
$month =  $_POST['paymentbymonth'];
?>
<?php include('extrasecurity.php');?>
<?php include('database/dbconfig.php');?>

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


            if(isset($_POST['paymentdetails_btn']))
            {

                $class_id = $_POST['viewclass_id'];

                $query1 = "SELECT date,class_id,am_status  FROM fees_payment_history WHERE date = CURDATE() AND class_id = $class_id ";
                $query_run1 = mysqli_query($connection, $query1);

                if($query_run1){
                    
                        
                        echo "<p align=centre>Attendance Already Marked For Today</p> ";
                    } 
                    
                    else {
  



                
                $query = "SELECT * FROM feespaymentnew  where class_id='$class_id' AND month=$month  ";
           
                $query_run = mysqli_query($connection, $query);
?>


<form method = "post" action = "finance.php">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
        <tr>
        <th> SerialNumber </th>
        <th> AdmissionNumber </th>
        <th> Name </th>
        <th> Month</th>
        <th> Date Of Payment</th>
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
    
        <td>    <?php  echo $row ['s_fname'];?>  <?php  echo $row ['s_lname']; ?></td>
     
                 <td>        <?php  echo $row ['month'];?></td>
        <td>        <?php  echo $row ['payment_date'];?></td>
    

       <td>        <?php  echo $row ['fees_paid_amount'];?></td>
 


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
                <input type="hidden" name="paymentbymonth" value="<?php echo $month;?>">
                
              <div> <button  type="submit" name="paymentsubmit_btn" class="btn btn-primary   float-left"> Go back</button>
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

