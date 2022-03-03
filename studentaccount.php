<?php
include('security.php');
include('includes/header.php'); 

include('includes/topbar.php');
?>

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="./css/normal.css"/>-->
    <link rel="stylesheet"  href="./css/mobile.css"/>
    

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Student Personal Profile </h6>
        </div>
        <div class="card-body">
        <?php

include('database/dbconfig.php');
       
            
           
                
                $query ="SELECT * FROM student,users,class,parent  Where user_login= '".$_SESSION['username']."' AND users.user_id = student.user_id  AND class_id = cid AND parent.sid= student.sid ";
           
                $query_run = mysqli_query($connection, $query);
              
                foreach($query_run as $row)
                {
                    ?>

                    <div class="table-responsive table-responsive-sm table-responsive-lg table-responsive-md table-responsive-xl">

 <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                <thead>
          <tr>
            <th> SerialNumber </th>
            <th> AdmissionNumber </th>
            <th> First Name </th>
            <th> Last Name </th>


            <th>Gender </th>
            <th>DOB</th>
            <th>School Joining Date </th>
   
          </tr>
        </thead>
        <tbody>

        
        <tr>
            <td data-th="SerialNumber: ">    <?php  echo $row ['sid'];?> </td>
            <td data-th="AdmissionNumber: ">        <?php  echo $row ['s_rollno'];?></td>
            <td data-th="First Name: ">    <?php  echo $row ['s_fname'];?></td>
            <td data-th="Last Name: "> <?php  echo $row ['s_lname']; ?> </td>
            <td data-th="Gender: "> <?php  echo $row ['s_gender']; ?> </td>
            <td data-th="Date Of Birth: "> <?php  echo $row ['s_dob']; ?> </td>
            <td data-th="School Joining Date: "> <?php  echo $row ['s_doj']; ?> </td>
          </tr>





          </tbody>
          </table>

      
          
        
          </div>

        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Student Class Details </h6>
        </div>
        <div class="card-body">

    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                <thead>
                                <tr>

<th> Class </th>
  <th> ClassTeacher </th>
  <th> Attendance </th>
  <th> Session Starting Date  </th>
  <th> Session Ending Date  </th>


</tr>
        </thead>
        <tbody>

        <tr>
            <td data-th="Class: ">    <?php  echo $row ['c_name'];?> </td>
            <td data-th="ClassTeacher Id: ">        <?php  echo $row ['teacher_id'];?></td>
            <td data-th="Attendance:   ">   Check Below</td>
            <td data-th="Session Starting Date: "> <?php  echo $row ['c_sdate']; ?> </td>
            <td data-th="Session Ending Date: "> <?php  echo $row ['c_edate']; ?> </td>
 
          </tr>
     


<br/>


          </tbody>
          </table>
</div>

</div>


<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Parent Details </h6>
        </div>
        <div class="card-body">

      

    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                <thead>
                                <tr>

<th> Parent First Name </th>
  <th> Parent Last Name </th>
  <th> Gender </th>
  <th> Education </th>
  <th> Phone Number </th>
  <th> Profession </th>
  <th> Cnic </th>
</tr>
        </thead>
        <tbody>

        <tr>
            <td data-th="Parent First Name: ">    <?php  echo $row ['p_fname'];?> </td>
            <td data-th="Parent Last Name: ">        <?php  echo $row ['p_lname'];?></td>
            <td data-th="Gender: ">    <?php  echo $row ['p_gender'];?></td>
            <td data-th="Education: "> <?php  echo $row ['p_edu']; ?> </td>
            <td data-th="Phone Number: "> <?php  echo $row ['p_phone']; ?> </td>
            <td data-th="Profession: "> <?php  echo $row ['p_profession']; ?> </td>
            <td data-th="Cnic: "> <?php  echo $row ['p_cnic']; ?> </td>
          </tr>
     


<br/>


          </tbody>
          </table>


       
                <form action="attendancestudentaccount.php" method="post">
                    <input type="hidden" name="view_id" value="<?php echo $row ['sid'];?>">
                    <input type="hidden" name="vs" value="<?php echo $row ['s_rollno'];?>">
                    <button  type="submit" name="view_btn" class="btn btn-success "id="spleftbtn"> VIEW Attendance</button>
                </form>


                
                <form action="feesstudentaccount.php" method="post">
                    <input type="hidden" name="view_id" value="<?php echo $row ['sid'];?>">
                    <input type="hidden" name="vs" value="<?php echo $row ['s_rollno'];?>">
                    <button  type="submit" name="view_btn" class="btn btn-success" id="sprightbtn"> VIEW Fees Details</button>
                </form>
           

          <?php
                }
            
        ?>
</div>

</div>





<?php
include('includes/scripts.php');
include('includes/footer.php');
?>