<?php
ob_start();
include('security.php');
include('includes/header.php'); 

include('includes/topbar.php');
?>
<?php include('database/dbconfig.php');?>
<link rel="stylesheet" media="screen and (max-width: 800px)" href="./css/mobile.css"/>


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
                                <th> Class </th>
                                <th> Admission Number</th>
                                <th>Date </th>
                                <th>Absent </th>




</tr>
        </thead>
        <tbody>

        <tr> 
        <td data-th="Class Id: ">        <?php  echo $row ['class_id'];?></td>
            <td data-th="Admission Number: ">        <?php  echo $row ['s_rollno'];?></td>
        <td data-th="Date: ">  <?php   echo $row ['date'];?> </td>

<td >  Absent </td>

   
          </tr>
     


<br/>


          </tbody>
          </table>

          <?php
                
                }    
        }
        ?>

<div>  <a href="studentaccount.php" class="btn btn-primary  float-left ">Goback</a></div>   
</div>

</div>




<?php
include('includes/scripts.php');
include('includes/footer.php');
?>