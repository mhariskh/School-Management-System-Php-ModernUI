<?php
ob_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/topbar.php');
?>
<?php include('extrasecurity.php');?>
<?php include('database/dbconfig.php');?>

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

include('database/dbconfig.php');
            if(isset($_POST['view_btn']))
            {
                $sid = $_POST['view_id'];
                
                $query = "SELECT * FROM student,class,teacher where sid='$sid' AND class_id = cid AND class.teacher_id=teacher.tid  ";
           
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
            <td>    <?php  echo $row ['sid'];?> </td>
            <td>        <?php  echo $row ['s_rollno'];?></td>
            <td>    <?php  echo $row ['s_fname'];?></td>
            <td> <?php  echo $row ['s_lname']; ?> </td>
            <td> <?php  echo $row ['s_gender']; ?> </td>
            <td> <?php  echo $row ['s_dob']; ?> </td>
            <td> <?php  echo $row ['s_doj']; ?> </td>
          </tr>





          </tbody>
          </table>

      
          
        
          </div>
                        <?php
                }
            }
        ?>
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
  
  <th> Session Starting Date  </th>
  <th> Session Ending Date  </th>


</tr>
        </thead>
        <tbody>

        <tr>
            <td>    <?php  echo $row ['c_name'];?> </td>
            <td>        <?php  echo $row ['first_name'];?></td>
      
            <td> <?php  echo $row ['c_sdate']; ?> </td>
            <td> <?php  echo $row ['c_edate']; ?> </td>
 
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

        <?php
include('database/dbconfig.php');
            if(isset($_POST['view_btn']))
            {
                $sid = $_POST['view_id'];
                
                $query = "SELECT * FROM parent  where sid='$sid'   ";

           

                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>

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
            <td>    <?php  echo $row ['p_fname'];?> </td>
            <td>        <?php  echo $row ['p_lname'];?></td>
            <td>    <?php  echo $row ['p_gender'];?></td>
            <td> <?php  echo $row ['p_edu']; ?> </td>
            <td> <?php  echo $row ['p_phone']; ?> </td>
            <td> <?php  echo $row ['p_profession']; ?> </td>
            <td> <?php  echo $row ['p_cnic']; ?> </td>
          </tr>
     


<br/>


          </tbody>
          </table>

          <?php
                }
            }
        ?>
</div>

</div>


<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Attendance Details </h6>
        </div>
        <div class="card-body">

        <?php

          
if(isset($_POST['view_btn']))
{

    $sid = $_POST['view_id'];
    $roll = $_POST['vs'];
              
    $query2 = "SELECT * FROM ATTENDANCE WHERE s_rollno= $roll";
     
// $query3 = "SELECT COUNT(*) FROM student WHERE student.class_id = class.cid) AS countofstudents " ;




           

                $query_run = mysqli_query($connection, $query2);


                if(mysqli_num_rows($query_run) > 0)
                echo '';
                else
               
                echo 'No Absents Marked Till Now in this Month';

         

                foreach($query_run as $row)
                {   
                    
                    ?>

    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                
                                <th> Admission Number</th>
                                <th>Date </th>
                                <th>Absent </th>




</tr>
        </thead>
        <tbody>

        <tr> 
        
            <td>        <?php  echo $row ['s_rollno'];?></td>
        <td>  <?php   echo $row ['date'];?> </td>

<td>  Absent </td>

   
          </tr>
     


<br/>


          </tbody>
          </table>

          
     
          <?php
                
                }    
        }
        ?>
</div>

</div>


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
              
    $query3 = "SELECT * FROM feespaymentnew WHERE sid= $sid AND fees_paid_amount='0' ";
     
// $query3 = "SELECT COUNT(*) FROM student WHERE student.class_id = class.cid) AS countofstudents " ;




           

                $query_run = mysqli_query($connection, $query3);


                if(mysqli_num_rows($query_run) > 0)
                echo '';
                else
               
                echo 'No Fees Record Found .';

                ?>


           <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                <tr>
                <th> Serial Number</th>
                <th> Admission Number</th>
                <th>Due Date </th>
                <th>Fees Due </th>
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
        <td>    <?php  echo $serialNumber;?> </td>
            <td>        <?php  echo $row ['s_rollno'];?></td>
        <td>  <?php   echo $row ['invoice_due_date'];?> </td>
        <td>  <?php   echo $row ['fees_amount_per_month'];?> </td>
        <td>  <?php   echo $row ['month'];?> </td>


   
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