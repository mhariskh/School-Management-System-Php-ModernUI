<?php
ob_start();
if($_SESSION['username'])
{
       
       
if ($_SESSION['userType'] != 'admin') {
    header('Location: studentaccount.php');
    exit;
}
}
?>

