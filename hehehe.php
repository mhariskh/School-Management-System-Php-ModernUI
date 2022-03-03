<?php
ob_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/topbar.php');
?>
<?php include('database/dbconfig.php');?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Student Profile </h6>
        </div>
        <div class="card-body">
        <?php


            if(isset($_POST['view_btn']))
            {
                $sid = $_POST['view_id'];
                
                $query = "SELECT sid,s_fname FROM student WHERE sid='$sid' ";
                $query_run = mysqli_query($connection, $query);


          
                foreach($query_run as $row)
                {
                    ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
<tr>
<th> SerialNumber </th>
<th> AdmissionNumber </th>
<th> First Name </th>
<th> Last Name </th>


<th>Gender </th>
<th>DETAILS</th>
<th>EDIT </th>
<th>DELETE </th>
</tr>
</thead>
<tbody>

                    
<tr>
<td>    <?php  echo $row ['sid'];?> </td>
<td>        <?php  echo $row ['s_rollno'];?></td>
<td>    <?php  echo $row ['s_fname'];?></td>
<td> <?php  echo $row ['s_lname']; ?> </td>
<td> <?php  echo $row ['s_gender']; ?> </td>
<td>
<form action="studentDetails.php" method="post">
    <input type="hidden" name="view_id" value="<?php echo $row ['sid'];?>">
    <button  type="submit" name="view_btn" class="btn btn-success"> VIEW DETAILS</button>
</form>
</td>
<td>
<form action="editUsersRegistered.php" method="post">
    <input type="hidden" name="edit_id" value="<?php echo $row ['sid'];?>">
    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
</form>
</td>
<td>
<form action="" method="post">
  <input type="hidden" name="delete_id" value="">
  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
</form>
</td>
</tr>
</tbody>
                </table>


                        <?php
                }
            }
        ?>
        </div>
    </div>
</div>

</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>