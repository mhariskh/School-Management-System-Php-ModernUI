<?php
ob_start();
include('security.php');
include('includes/header.php'); 

include('includes/topbar.php');
?>
<?php include('database/dbconfig.php');?>
<link rel="stylesheet" media="screen and (max-width: 800px)" href="./css/mobile.css"/>


<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Fees Dues Details </h6>
        </div>
        <div class="card-body">

        <?php

          
if(isset($_POST['view_btn']))
{

    $sid = $_POST['view_id'];
    $roll = $_POST['vs'];
              
    $query3 = "SELECT * FROM feespaymentnew WHERE sid= $sid  ";
     
// $query3 = "SELECT COUNT(*) FROM student WHERE student.class_id = class.cid) AS countofstudents " ;




           

                $query_run = mysqli_query($connection, $query3);


                if(mysqli_num_rows($query_run) > 0)
                echo '';
                else
               
                echo 'No Absents Marked Till Now in this Month';

                ?>


           <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                <tr>
                <th> Serial Number</th>
                <th> Admission Number</th>
                <th>Due Date </th>
                <th>Fees Per Month </th>
                <th>Fees Paid </th>
                <th>Payment Status </th>
                <th>Month </th>
                </tr>
            </thead>

<?php 

         
$serialNumber = 0;


                foreach($query_run as $row)
                {   $serialNumber++;
                    
                    ?>

   




        <tbody>

        <tr> 
        <td data-th="SerialNumber: ">    <?php  echo $serialNumber;?> </td>
            <td data-th="AdmissionNumber: ">        <?php  echo $row ['s_rollno'];?></td>
        <td data-th="Invoice Due Date: ">  <?php   echo $row ['invoice_due_date'];?> </td>
        <td data-th="Fees Issued Amount: ">  <?php   echo $row ['fees_amount_per_month'];?> </td>
        <td data-th="Fees Paid Amount: ">  <?php   echo $row ['fees_paid_amount'];?> </td>
        <td data-th="Payment Status: ">  <?php   echo $row ['payment_status'];?> </td>
        <td data-th="Month Of Invoice: ">  <?php   echo $row ['month'];?> </td>


   
          </tr>
     


<br/>

<?php
                
            }    
    }
    ?>

          </tbody>
          </table>

          
     
</div>

</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>