<?php
ob_start();
include('security.php');
include('extrasecurity.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/topbar.php');
?>

<div class="modal fade" id="addnewstudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Student Admission Number </label>
                <input type="text" name="s_rollno" class="form-control" placeholder="Enter Admission Number">
            </div>
            <div class="form-group">
                <label>  First Name </label>
                <input type="text" name="s_fname" class="form-control" placeholder="Enter First Name">
            </div>


           <div class="form-group">
                <label>  Last Name </label>
                <input type="text" name="s_lname" class="form-control" placeholder="Enter Last Name">
            </div>



            <div class="form-group">
                <label> DOB </label>
                <input type="text" name="dob" class="form-control" placeholder="Enter dob YYYY-MM-DD">
            </div>


            <div class="form-group">
                <label> Gender  </label>
                <select  name="gender">

            <option value="female">Female</option>
            <option value="male">Male</option>

          </select>
            
            </div>

            <div class="form-group">
                <label> Address </label>
                <input type="text" name="address" class="form-control" placeholder="Enter Address">
            </div>

            <div class="form-group">
                <label> Country </label>
                <input type="text" name="country" class="form-control" placeholder="Country">
            </div>

            <div class="form-group">
                <label> Phone Number </label>
                <input type="text" name="phone_number" class="form-control" placeholder="Enter Phone Number">
            </div>

            <div class="form-group">
                <label> Date of school joining</label>
                <input type="text" name="s_doj" class="form-control" placeholder="Enter school date of joining">
            </div>

            <div class="form-group">
                <label> Class Id</label>
                <input type="text" name="class_id" class="form-control" placeholder="Enter Class ID">
            </div>

            <div class="form-group">
                <label>  Parent First Name </label>
                <input type="text" name="p_fname" class="form-control" placeholder="Enter Parent First Name ">
            </div>


            <div class="form-group">
                <label>  Parent Last Name</label>
                <input type="text" name="p_lname" class="form-control" placeholder="Enter Parent Last Name">
            </div>

            <div class="form-group">
                <label> Parent Gender</label>
                <input type="text" name="p_gender" class="form-control" placeholder="Enter Parent Gender">
            </div>


            <div class="form-group">
                <label>  Parent Education</label>
                <input type="text" name="p_edu" class="form-control" placeholder="Enter  Parent Education">
            </div>

            <div class="form-group">
                <label>  Parent Phone Number</label>
                <input type="text" name="p_phone" class="form-control" placeholder=" Enter Parent Phone Number">
            </div>

            <div class="form-group">
                <label>  Parent Profession</label>
                <input type="text" name="p_profession" class="form-control" placeholder="Enter Parent Profession">
            </div>

            <div class="form-group">
                <label> Parent Cnic</label>
                <input type="text" name="p_cnic" class="form-control" placeholder="Enter Parent Cnic">
            </div>



            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>


            <div class="form-group">
                <label> Parent Username </label>
                <input type="text" name="p_username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Parent Email</label>
                <input type="email" name="p_email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Parent Password</label>
                <input type="password" name="p_password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Parent Password</label>
                <input type="password" name="p_confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>


           
        
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="register_student_btn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>






    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

                <!-- Begin Page Content -->
                <div class="container-fluid">

             
<?php 

if(isset($_SESSION['student_email_check']) && $_SESSION['student_email_check'] != '' )
{
echo '<h3>' .  $_SESSION['student_email_check'] . '</h3>';
unset ($_SESSION['student_email_check']);
}


if( isset($_SESSION['parent_email_check']) && $_SESSION['parent_email_check'] != '' )
{
echo '<h3>' .  $_SESSION['parent_email_check'] . '</h3>';
unset ($_SESSION['parent_email_check']);
}

if(isset($_SESSION['student_check']) && $_SESSION['student_check'] != '' )
{
 echo '<h3>' .  $_SESSION['student_check'] . '</h3>';
unset ($_SESSION['student_check']);
}

if( isset($_SESSION['add_student_check']) && $_SESSION['add_student_check'] != '')
{
    echo '<h3>' .  $_SESSION['add_student_check'] . '</h3>';
    unset ($_SESSION['add_student_check']);
}


if( isset($_SESSION['feesdatacheck']) && $_SESSION['feesdatacheck'] != '')
{
    echo '<h3>' .  $_SESSION['feesdatacheck'] . '</h3>';
    unset ($_SESSION['feesdatacheck']);
}
  


if(isset($_SESSION['status_code']) && $_SESSION['status_code'] != '')
{
  echo '<h3>' .  $_SESSION['status_code'] . '</h3>';
  unset ($_SESSION['status_code']);
}



if(isset($_SESSION['deletestatus']) && $_SESSION['deletestatus'] != '')
{
  echo '<h3>' .  $_SESSION['deletestatus'] . '</h3>';
  unset ($_SESSION['deletestatus']);
}

if(isset($_SESSION['studentUpdate']) && $_SESSION['studentUpdate'] != '')
{
  echo '<h3>' .  $_SESSION['studentUpdate'] . '</h3>';
  unset ($_SESSION['studentUpdate']);
}



if(isset($_SESSION['parentUpdate']) && $_SESSION['parentUpdate'] != '')
{
  echo '<h3>' .  $_SESSION['parentUpdate'] . '</h3>';
  unset ($_SESSION['parentUpdate']);
}




?>
               

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Students
                            <button type="button" class="btn btn-primary float-right" data-backdrop='static' data-keyboard='false' data-toggle="modal" data-target="#addnewstudent">
              Add New Student
            </button>
                  </h5>
                        </div>
                    <div class="card-body">
                            <div class="table-responsive">
                            <?php 
    
    $query = "SELECT sid,s_rollno,s_fname,s_lname,s_gender FROM  student";
    $query_run = mysqli_query($connection,$query);

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
        <?php 
     if(mysqli_num_rows($query_run)>0)

     {
       while($row = mysqli_fetch_assoc($query_run))
       {

        ?>


          <tr>
            <td>    <?php  echo $row ['sid'];?> </td>
            <td>        <?php  echo $row ['s_rollno'];?></td>
            <td>    <?php  echo $row ['s_fname'];?></td>
            <td> <?php  echo $row ['s_lname']; ?> </td>
            <td> <?php  echo $row ['s_gender']; ?> </td>
            <td>
                <form action="studentDetails.php" method="post">
                    <input type="hidden" name="view_id" value="<?php echo $row ['sid'];?>">
                    <input type="hidden" name="vs" value="<?php echo $row ['s_rollno'];?>">
                    <button  type="submit" name="view_btn" class="btn btn-success"> VIEW DETAILS</button>
                </form>
            </td>
            <td>
                <form action="editStudents.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row ['sid'];?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                <input type="hidden" name="delete_id" value="<?php echo $row ['sid'];?>">
                  <button type="submit" name="deleteStudent_btn" class="btn btn-danger"> DELETE</button>
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


    <?php
include('includes/scripts.php');
include('includes/footer.php');
?>