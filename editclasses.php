<?php
ob_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/topbar.php');
?>
<?php include('extrasecurity.php');?>
<?php include('database/dbconfig.php');?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT Class Details </h6>
        </div>
        <div class="card-body">
        <?php

            if(isset($_POST['edit_btn']))
            {
                $serialNumber = $_POST['viewclass_id'];
                
                $query = "SELECT * FROM  class WHERE cid=$serialNumber ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>

                        <form action="code.php" method="POST">
                        <input type="visible" name="edit_id" value="<?php echo $serialNumber?>">

                            <div class="form-group">
                <label> Class Number </label>
                <input type="text" name="c_numb" class="form-control" value="<?php echo $row['c_numb'] ?>" placeholder="Enter Class Number">
            </div>

            
            <div class="form-group">
                <label> Class Name </label>
                <input type="text" name="c_name" class="form-control" value="<?php echo $row['c_name'] ?>" placeholder="Enter Class Name">
            </div>

            <div class="form-group">
                <label> Teacher id  </label>
                <input type="text" name="teacher_id" class="form-control" value="<?php echo $row['teacher_id'] ?>" placeholder="Enter Teacher id">
            </div>


            <div class="form-group">
                <label> Class Capacity </label>
                <input type="text" name="c_capacity" class="form-control" value="<?php echo $row['c_capacity'] ?>" placeholder="Enter Class Capacity">
            </div>

            <div class="form-group">
                <label> Class location </label>
                <input type="text" name="c_loc" class="form-control" value="<?php echo $row['c_loc'] ?>" placeholder="Enter Class location">
            </div>


            <div class="form-group">
                <label> Class Start Date </label>
                <input type="text" name="c_sdate" class="form-control" value="<?php echo $row['c_sdate'] ?>" placeholder="Enter Class Start Date">
            </div>


            
            <div class="form-group">
                <label> Class End Date </label>
                <input type="text" name="c_edate" class="form-control" value="<?php echo $row['c_edate'] ?>" placeholder="Enter Class End Date ">
            </div>

             
            <div class="form-group">
                <label> Class Fee </label>
                <input type="text" name="c_fee_type" class="form-control" value="<?php echo $row['c_fee_type'] ?>" placeholder="Enter Class Fee ">
            </div>

                            <a href="classes.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="updateclass_btn" class="btn btn-primary"> Update </button>

                        </form>
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