
<?php
ob_start();
include('security.php');
include('extrasecurity.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/topbar.php');
?>


    <link href="./css/jquery-ui.min.css" rel = "stylesheet">
    <script src = "./js/jquery-3.5.1.min.js"></script>
    <script src = "./js/jquery-ui.min.js"></script>

     
    <p>Date: <input type="text" id="datepicker"></p>

<script>$("#datepicker").datepicker();
$("#datepicker").datepicker("setDate", new Date());
$("#datepicker").datepicker({
    onSelect: function() { 
        var dateObject = $(this).datepicker('getDate'); 
    }
});

 $.ajax({
            url: 'your_script.php',
            type: 'POST',
            data: {var1: javascript_var_1, var2: javascript_var_2},
            success: function(data) {
                console.log("success");
            }
        });

</script>




<?php
include('includes/scripts.php');
include('includes/footer.php');
?>