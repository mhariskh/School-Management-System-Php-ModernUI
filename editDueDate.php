<?php
ob_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/topbar.php');

$month= $_POST['editbymonth'];

?>
<?php include('extrasecurity.php');?>

<link rel="stylesheet" href="styles.css">
<div class="container-fluid">



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Edit Due Date for Month # <?php echo $month;?> </h6>
        </div>
        <div class="card-body">
        <form action="code.php" method="post">


<div>
 <select name="editdue_date">
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
</div>


<input type="hidden" name="editbymonth" value="<?php echo $month;?>">
<button type="submit" name="editinvoice_btn" class="btn btn-primary float-left mt-5 "> Edit Invoice Due Date </button>
<a href="payinvoice.php" name="enterpaymentdetails"  class="btn btn-primary float-right mt-5"> Go Back </a>
</form>

</div>

</div>
<?php



include('includes/scripts.php');
include('includes/footer.php');
?>