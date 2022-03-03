<?php
ob_start();
session_start(); 
include('includes/header.php');
?>


<div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row ">
                            <div class="col-lg-6 d-none d-lg-block row text-center "><img src="logo.png" class=" m-auto d-block" ></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        <?php
                                        if(isset($_SESSION['status']) && $_SESSION['status'] != '')

                                            {
                                                echo '<h3 class="bg-danger text-white">'.$_SESSION['status'].'</h3>';
                                                unset($_SESSION['status']);
                                            }

?>                                              
                                    </div>
                                    <form class="user" action="code.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Username...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                       <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                   
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="www.bipsharipur.com">-> Go Back To BipsHaripur Website</a>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

<?php include('includes/scripts.php');?>
<?php include('includes/footer.php');?>

     <!-- <hr>
                                        <a href="#" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Follow Us On Youtube
                                        </a>
                                        <a href="#" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Follow Us On Facebook
                                        </a> -->