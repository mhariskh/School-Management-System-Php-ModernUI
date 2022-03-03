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
            <h6 class="m-0 font-weight-bold text-primary"> Generate Monthly Invoices: </h6>
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

        <form action="code.php" method="POST">

        <label>Select Month of Fee Invoice:</label>

 <select name="month_of_fee_invoice">
<option>- Month -</option>
<option value="01">January</option>
<option value="02">Febuary</option>
<option value="03">March</option>
<option value="04">April</option>
<option value="05">May</option>
<option value="06">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select><select name="year_of_fee_invoice">
<option>- Year -</option>
<option value="2020">2020</option>

</select>

<br/>
<br/>
<label>Due Date of Payment</label>



<select name="due_date">
<option>- Day -</option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>

<button type="submit" name="generate_btn" class="btn btn-primary"> Generate Invoices For All </button>


</form>


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
            <form action="code.php" method="POST">
            <input type="hidden" name="deletebymonth" value="<?php echo $row ['month'];?>">
            <a href="payinvoice.php" name="enterpaymentdetails"  class="btn btn-primary float-left mt-2"> Pay Invoice </a>

           
            <button type="submit" name="deleteinvoice_btn" class="btn btn-danger float-right mt-2"> Delete Invoice  </button>
</form>


<!-- <form action="editDuedate.php">
<input type="hidden" name="editbymonth" value="<?php echo $row ['month'];?>">
<button type="submit" name="editinvoice_btn" class="btn btn-primary float-left ml-5 "> Edit Invoice Due Date </button>
</form> -->


          



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