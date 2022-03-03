<?php
ob_start();
include('security.php');
include('extrasecurity.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/topbar.php');



$month =  $_POST['paymentbymonth'];

?>








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
                            <h5 class="m-0 font-weight-bold text-primary">Fees Payment  For <?php
                            
                            
                            
                            
                            echo " Month # $month "?>


           
                  </h5>
                        </div>
                    <div class="card-body">
                    
                    <p>Date: <input type="text" id="datepicker"></p>

                    <?php 

if(isset($_SESSION['paymentStatus']) && $_SESSION['paymentStatus'] != '')
{
  echo '<h3>' .  $_SESSION['paymentStatus'] . '</h3>';
  unset ($_SESSION['paymentStatus']);
}

if(isset($_SESSION['paymentStatusHistory']) && $_SESSION['paymentStatusHistory'] != '')
{

  echo '<h3>' .  $_SESSION['paymentStatusHistory'] . '</h3>';
  unset ($_SESSION['paymentStatusHistory']);
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
            <th>Payment Entry Status</th>
        
            <th>Enter/Edit Payments </th>
            
        
            <th>View Payment Details </th>  
             
          </tr>
        </thead>
        <tbody>

     


        <?php 

        
     if(mysqli_num_rows($query_run)>0)

     {
       while($row = mysqli_fetch_assoc($query_run))
       {


        $cid = $row ['cid'];

        
$status_query = "SELECT * From fees_payment_history WHERE date = curDate() AND class_id =$cid AND month='$month' ";
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
                <form action="makepayments.php" target="_blank" method="post">
                    <input type="hidden" name="viewclass_id" value="<?php echo $row ['cid'];?>">
                    <input type="hidden" name="paymentbymonth" value="<?php echo $month;?>">
                    <button  type="submit" name="markAttendance_btn" class="btn btn-success"> Enter/Edit Payments </button>
                </form>
            </td>


           
           

            <td>
                <form action="paymentsdetails.php" target="_blank" method="post">
                <input type="hidden" name="viewclass_id" value="<?php echo $row ['cid'];?>">
                    <input type="hidden" name="paymentbymonth" value="<?php echo $month;?>">
                    <button  type="submit" name="paymentdetails_btn" class="btn btn-success"> View Payment Details</button>
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