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

if(isset($_SESSION['status']) && $_SESSION['status'] != '')
{
  echo '<h3>' .  $_SESSION['status'] . '</h3>';
  unset ($_SESSION['status']);
}

if(isset($_SESSION['successstory']) && $_SESSION['successstory'] != '')
{
  echo '<h3>' .  $_SESSION['successstory'] . '</h3>';
  unset ($_SESSION['successstory']);
 
}

?>

  


<?php 
    
    $query = "SELECT * FROM  invoice_records ORDER BY month";
    $query_run = mysqli_query($connection,$query);

    if(mysqli_num_rows($query_run)>0)

    {
      while($row = mysqli_fetch_assoc($query_run))
      {
        
       ?>




    <div class="card p-3 bg-white"><i class="fa fa-apple"></i>
        <div class="about-product text-center mt-2">
            <div>
                <h4>Month # <?php echo $row['month']?></h4>
                <h6 class="mt-0 text-black-50"></h6>
            </div>
        </div>
        <div class="stats mt-2">
            <div class="d-flex justify-content-between p-price">Date Issued:<?php echo $row['date_created']?></div>
            <br/>
            <div class="d-flex justify-content-between p-price">Due Date:<?php echo $row['due_date']?></div>
            <form action="finance.php" method="POST">
            <input type="hidden" name="paymentbymonth" value="<?php echo $row ['month'];

            

            ?>">
          
            <button type="submit" name="enterpaymentdetails"  class="btn btn-primary float-right"> Enter Payment Details </button>
</form>
        </div>
   </div>





      


<?php 

}
}
?>
</div>

</div>
<?php



include('includes/scripts.php');
include('includes/footer.php');
?>