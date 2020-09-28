
<html lang="en">
  <head>
  <?php //list(, $userid) = Auth::get_user_id(); 

//Debug::dump($userid);die;

// if($userid == 0){
//   Session::set_flash('error', 'Your must login in first');
//   Response::redirect('auth/login');
// }

?>

<?php  //Custom::getusername($userid)?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chifamba B/Store</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo Uri::base(false);?>/purple/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo Uri::base(false);?>/purple/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
	<link rel="stylesheet" href="<?php echo Uri::base(false);?>/purple/assets/css/style.css">
				
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?php echo Uri::base(false);?>/purple/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src="<?php echo Uri::base(false);?>/purple/assets/images/liqourman.png" alt="logo" height=50px/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?php echo Uri::base(false);?>/purple/assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="<?php  echo Uri::base(false);?>/purple/assets/images/faces/avatar.png" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">Civic Center s</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo Uri::base(false);?>/auth/login">
                  <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>

            <li class="nav-item nav-settings d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-format-line-spacing"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">

            <li class="nav-item">
              <a class="nav-link" href="<?php echo Uri::base(false).'regworker' ?>">
                <span class="menu-title">Admin</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Stock Manager</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?php echo Uri::base(false).'supplier';?>">Add Supplier</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo Uri::base(false);?>/product">Add Product</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo Uri::base(false).'purchase';?>">Purchases</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo Uri::base(false);?>/transfer">Transfers</a></li>
                </ul>
              </div>
            </li>
             
                <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Reconciliation</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi mdi-medical-bag menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                
                  <li class="nav-item"> <a class="nav-link" href="<?php echo Uri::base(false);?>/stocktake">Stock Take</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo Uri::base(false);?>/dailytaking/">Daily Cash </a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo Uri::base(false);?>/stocktake/choose">Reconcile Stock</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo Uri::base(false);?>/reconciliation">Reports </a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo Uri::base(false);?>/stockvalue">Stock Value </a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo Uri::base(false);?>/job/create">Settings</a></li>
                </ul>
              </div>
            </li>
           

          
            
            
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <?php if (Session::get_flash('success')): ?>
			<div class="alert alert-success">
				<strong>Success</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
				</p>
			</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
			<div class="alert alert-danger">
				<strong>Error</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
				</p>
			</div>
<?php endif; ?>

                    <?php echo $content; ?>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
        
			<p>
				<a href="https://www.pksystems.co.zw">LiqourMan </a> is a  liquor inventory management system developed by Promise Kudzai Makufa.<br>
				<small>Version: <?php echo "1.1.0"; ?></small>
			</p>
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"> <a href="https://www.bootstrapdash.com/" target="_blank"></a>. </span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> <i class="mdi mdi-heart text-danger"></i></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo Uri::base(false);?>/purple/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?php echo Uri::base(false);?>/purple/assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo Uri::base(false);?>/purple/assets/js/off-canvas.js"></script>
    <script src="<?php echo Uri::base(false);?>/purple/assets/js/hoverable-collapse.js"></script>
    <script src="<?php echo Uri::base(false);?>/purple/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?php echo Uri::base(false);?>/purple/assets/js/dashboard.js"></script>
    <script src="<?php echo Uri::base(false);?>/purple/assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>


  
</html>