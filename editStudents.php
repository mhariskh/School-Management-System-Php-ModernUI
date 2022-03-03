<?php
ob_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/topbar.php');
?>
<?php include('database/dbconfig.php');?>
<?php include('extrasecurity.php');?>

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Student Personal Profile </h6>
        </div>
        <div class="card-body">
        <?php


            if(isset($_POST['edit_btn']))
            {
                $sid = $_POST['edit_id'];
                
                $query = "SELECT * FROM student,class,teacher where sid='$sid' AND class_id = cid AND class.teacher_id=teacher.tid  ";
           
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>

                   
                    <form action="code.php" method="POST">

                        <input type="hidden" name="sid" value="<?php echo $row['sid'] ?>"
                                        class="form-control" placeholder="Student Id">
            
        
            <div class="form-group">
                                    <label>Student Roll Number</label>
                                    <input type="text" name="s_rollno" value="<?php echo $row['s_rollno'] ?>"
                                        class="form-control" placeholder="Enter Roll Number">
                                </div>


                                
            <div class="form-group">
                                    <label>Student First Name</label>
                                    <input type="text" name="s_fname" value="<?php echo $row['s_fname'] ?>"
                                        class="form-control" placeholder="Enter Student First Name">
                                </div>


                                <div class="form-group">
                                    <label>Student Last Name</label>
                                    <input type="text" name="s_lname" value="<?php echo $row['s_lname'] ?>"
                                        class="form-control" placeholder="Enter Student First Name">
                                </div>

                                <div class="form-group">
                                    <label>Student Gender </label>
                                    <input type="text" name="s_gender" value="<?php echo $row['s_gender'] ?>"
                                        class="form-control" placeholder="Enter Student First Name">
                                </div>

                                <div class="form-group">
                                    <label>Student DOB </label>
                                    <input type="text" name="s_dob" value="<?php echo $row['s_dob'] ?>"
                                        class="form-control" placeholder="Enter Student Dob">
                                </div>

                                <div class="form-group">
                                    <label>Student Date Of School Joining </label>
                                    <input type="text" name="s_doj" value="<?php echo $row['s_doj'] ?>"
                                        class="form-control" placeholder="Enter Student Dob">
                                </div>

                                <div class="form-group">
                                    <label>Class </label>
                                    <input type="text" name="class_id" value="<?php echo $row['class_id'] ?>"
                                        class="form-control" placeholder="Enter Student Dob">
                                </div>


    
                        







   

                                <a href="student.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="updatestudent_btn" class="btn btn-primary"> Update </button>

                        </form>
          
        
         
                        <?php
                }
            }
        ?>
        </div>
    </div>



           
      
         
 



<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Parent Details </h6>
        </div>
        <div class="card-body">

        <?php

            if(isset($_POST['edit_btn']))
            {
                $sid = $_POST['edit_id'];
                
                $query = "SELECT * FROM parent  where sid='$sid'   ";

           

                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>

<form action="code.php" method="POST">
<div class="form-group">
                                    <label>Parent First Name </label>
                                    <input type="text" name="p_fname" value="<?php echo $row['p_fname'] ?>"
                                        class="form-control" placeholder="Enter Parent Name">
                                </div>

                                <div class="form-group">
                                    <label>Parent last Name </label>
                                    <input type="text" name="p_lname" value="<?php echo $row['p_lname'] ?>"
                                        class="form-control" placeholder="Enter Parent Name">
                                </div>

                                <div class="form-group">
                                    <label>Parent Gender </label>
                                    <input type="text" name="p_gender" value="<?php echo $row['p_gender'] ?>"
                                        class="form-control" placeholder="Enter Parent Gender">
                                </div>

                                <div class="form-group">
                                    <label>Parent Education </label>
                                    <input type="text" name="p_edu" value="<?php echo $row['p_edu'] ?>"
                                        class="form-control" placeholder="Enter Parent Education">
                                </div>

                                <div class="form-group">
                                    <label>Parent Phone </label>
                                    <input type="text" name="p_phone" value="<?php echo $row['p_phone'] ?>"
                                        class="form-control" placeholder="Enter Parent phone">
                                </div>


                                <div class="form-group">
                                    <label>Parent Profession </label>
                                    <input type="text" name="p_profession" value="<?php echo $row['p_profession'] ?>"
                                        class="form-control" placeholder="Enter Parent Profession">
                                </div>


                                <div class="form-group">
                                    <label>Parent Cnic </label>
                                    <input type="text" name="p_cnic" value="<?php echo $row['p_cnic'] ?>"
                                        class="form-control" placeholder="Enter Parent Cnic">
                                </div>




                                <a href="student.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="updateparent_btn" class="btn btn-primary"> Update </button>

                        </form>




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