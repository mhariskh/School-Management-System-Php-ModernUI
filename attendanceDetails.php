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


    <link href="checkbox.css" rel="stylesheet">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <?php 
        $class_id = $_POST['viewclass_id'];
        ?>
            <h6 class="m-0 font-weight-bold text-primary"> Attendance Details Class <?php echo $class_id;?> (List of Absentees)  </h6>
        </div>

        <?php 

?>
        <div class="card-body">
        <?php


          

                // $class_id = $_POST['viewclass_id'];

             
                    if(1) {
  



                
                $query = "SELECT * FROM attendance where class_id='$class_id' ";
           
                $query_run = mysqli_query($connection, $query);
?>



            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
        <tr>
        <th> Date </th>
        <th> SerialNumber </th>
        <th> AdmissionNumber </th>
        <th> Class </th>

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
        <td>  <?php   echo $row ['date'];?> </td>
        <td>    <?php  echo $serialNumber;?> </td>
        <td>        <?php  echo $row ['s_rollno'];?></td>
        <td>        <?php  echo $row ['class_id'];?></td>
    
        </tr>


    <?php 
                }
    }
    


    ?>

    </tbody>


                </table>

              <div>  <a href="attendance.php" class="btn btn-primary  float-left ">Goback</a></div>   
             
                   </div>

           
               

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

<script>

$("#datatable tbody tr.data-in-table").each(function () {

$(this).find('td').each(function (index) {
    var currentCell = $(this);
    var nextCell = $(this).next('td').length > 0 ? $(this).next('td') : null;
    if (index%2==0&&nextCell && currentCell.text() !== nextCell.text()) {
        currentCell.css('backgroundColor', 'yellow');
        nextCell.css('backgroundColor', 'yellow');
    }
});
});


</script>
