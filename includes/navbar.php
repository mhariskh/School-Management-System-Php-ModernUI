 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-book"></i>
    </div>
    <div class="sidebar-brand-text mx-3">BipsHaripur LMS </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item ">
    <a class="nav-link" href="usersRegistered.php">
        <i class="fas fa-fw fa-user"></i>
        
        <span>Users</span></a>
</li>

<li class="nav-item ">
    <a class="nav-link" href="student.php">
        <i class="fas fa-fw fa-users"></i>
        
        <span>Students</span></a>
</li>

<li class="nav-item ">
    <a class="nav-link" href="attendance.php">
    <i class="fas fa-clipboard-list"></i>
        
        <span>Attendance</span></a>
</li>


<li class="nav-item ">
    <a class="nav-link" href="teachers.php">
        <i class="fas fa-fw fa-chalkboard-teacher"></i>
        
        <span>Teachers</span></a>
</li>



<li class="nav-item ">
    <a class="nav-link" href="parent.php">
        <i class="fas fa-fw fa-male "></i>
        
        <span>Parents</span></a>
</li>


<li class="nav-item ">
    <a class="nav-link" href="classes.php">
    <i class="fas fa-school"></i>
        
        <span>Classes</span></a>
</li>








<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>Finance Section</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Invoice</h6>
      <a class="collapse-item" href="generateInvoice.php">Generate Invoice</a>
      <a class="collapse-item" href="payinvoice.php">Pay Invoice</a>
      <a class="collapse-item" href="generateInvoice.php">Delete Invoice</a>
      <a class="collapse-item" href="dues.php">Dues</a>
    
  </div>
</li>







<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">


<!-- Nav Item - Pages Collapse Menu -->

   
</div>



<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>
<!-- End of Sidebar -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

 
   <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <form action="logout.php" method="POST">

                  <button type="submit" name="logout_btn" class="btn btn-primary" href="login.php">Log Out</button>

                  </form>
                </div>
            </div>
        </div>
    </div>

