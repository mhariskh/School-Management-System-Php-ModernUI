<?php
ob_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/topbar.php');


?>
<?php include('extrasecurity.php');?>

<link rel="stylesheet" href="styles.css">
<div class="container-fluid">



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Invoices </h6>
        </div>
        <div class="card-body">


  


<?php 
    
   

       $month= $_SESSION['monthofpayment'] ;
       unset ($_SESSION['monthofpayment']);
   




        
       ?>






            <form action="finance.php" method="POST">
            <input type="hidden" name="paymentbymonth" value="<?php echo $month;

            

            ?>">
         <h3> Payment Was Added Successfully. </h3>
            <button type="submit" name="enterpaymentdetails"  class="btn btn-primary float-right"> Continue </button>
</form>
        </div>
   </div>





      


<?php 


?>
</div>

</div>
<?php



include('includes/scripts.php');
include('includes/footer.php');
?>