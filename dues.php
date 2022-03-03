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


    <link href="checkbox.css" rel="stylesheet">










    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Student With Dues</h6>
        </div>



        

        <?php 



?>
        <div class="card-body">
        <?php

         

                

                

                if(1) {
  



                
                $query = "SELECT DISTINCT sid,s_rollno,s_fname,s_lname FROM `feespaymentnew` WHERE fees_paid_amount = 0 ";
           
                $query_run = mysqli_query($connection, $query);
?>



            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
        <tr>
        <th> SerialNumber </th>
        <th> AdmissionNumber </th>

        <th> Name </th>
        
        <th> View Dues </th>
        
        <!-- <th> Reason</th> -->


      
    
        </tr>
        </thead>

        <?php 
        $serialNumber = 0;
        foreach($query_run as $row)
                {
                    $serialNumber++;
                    ?>
        <tbody>



        <tr>
        <td>    <?php  echo $serialNumber;?> </td>
        <td>        <?php  echo $row ['s_rollno'];?></td>
    
        <td>   <?php  echo $row ['s_fname'];?>  <?php  echo $row ['s_lname']; ?></td>
     
     

      

 


            <td><form action= "studentdetails.php" method="post">
            <input type="hidden" name="vs" value="<?php echo $row ['s_rollno'];?>">
            <input type="hidden" name="view_id" value="<?php echo $row ['sid'];?>">
            
            <button class= "btn btn-primary" name="view_btn"> View Dues</button>
            </form>
            </td>


        </tr>


    <?php 
                }
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

