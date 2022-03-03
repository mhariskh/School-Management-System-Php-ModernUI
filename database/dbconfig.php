   <!-- Custom styles for this template-->
   <link href="../css/sb-admin-2.min.css" rel="stylesheet">

<?php



// $serverName = "localhost";
// $dbUsername = "bipshari_hkhanpk23secured";
// $dbPassWord = "03336059364@CsPkproject";
// $dbName = "bipshari_newdbmsproject";
// $dbPort = "3306";

$serverName = "localhost";
$dbUsername = "root";
$dbPassWord = "";
$dbName = "dbmsproject";
$dbPort = "3307";

$connection = mysqli_connect($serverName,$dbUsername,$dbPassWord,$dbName,$dbPort);
$dbconfig = mysqli_select_db($connection,$dbName);

if($dbconfig)
{
    // echo"Database Successfully connected";
}


else
{

    echo '
        <div class="container">
            <div class="row">
                <div class="col-md-8 mr-auto ml-auto text-center py-5 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title bg-danger text-white"> Database Connection Failed </h1>
                            <h2 class="card-title"> Database Failure</h2>
                            <p class="card-text"> Please Check Your Database Connection.</p>
                            <a href="#" class="btn btn-primary">:( </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';
}
?>