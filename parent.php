<?php
ob_start();
include('security.php');
include('extrasecurity.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/topbar.php');
?>


    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                
               

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Parents</h5>
                        </div>
                    <div class="card-body">
                            <div class="table-responsive">
                            <?php 
  
    $query = "SELECT * FROM  student,parent where student.sid=parent.sid";
    $query_run = mysqli_query($connection,$query);

    ?>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
          <tr>
            <th> SerialNumber </th>

            <th>Parent Name </th>
         


        
            <th>Student  Name </th>
          


            <th>DETAILS</th>
            <th>EDIT </th>
       
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
            <td>    <?php  echo $row ['pid'];?> </td>
  
            <td>    <?php  echo $row ['p_fname'];?> <?php  echo $row ['p_lname']; ?> </td>
          
      
            <td> <?php  echo $row ['s_fname']; ?>  <?php  echo $row ['s_lname']; ?></td>
    
      
            <td>
            <form action="studentDetails.php" method="post">
         
                    <input type="hidden" name="vs" value="<?php echo $row ['s_rollno'];?>">
                    <input type="hidden" name="view_id" value="<?php echo $row ['sid'];?>">
                    <button  type="submit" name="view_btn" class="btn btn-success"> VIEW DETAILS</button>
                </form>
            </td>
            <td>
                <form action="editStudents.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row ['sid'];?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
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