<?php
// Start the session
session_start();
if(isset($_SESSION['adminloginId']) && !empty($_SESSION['adminloginId'])) {
 
}
else
{
	 header("Location: login.php");
die();
}
?>
<?php
  header("Access-Control-Allow-Origin: *");
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Silicon Admin</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Color Picker -->
    <link href="plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
    <!-- Bootstrap time Picker -->
    <link href="plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	

  </head>
 <script>
 $( document ).ready(function() {
    console.log( "ready!" );
	change_skin("skin-red");
});
 
 </script>

 <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo"><b>Silicon </b>Admin</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
             
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/silicon.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo($_SESSION["aduserName"]);?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/silicon.jpg" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo($_SESSION["aduserName"]);?>
                    
                    </p>
                  </li>
                  <!-- Menu Body -->
                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                   
                    <div class="pull-right">
                      <a href="Login.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="height: auto;">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/silicon.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo($_SESSION["aduserName"]);?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            
            </li>
           
            <li class="treeview">
              <a href="User.php">
                <i class="fa fa-user"></i> <span>User</span> 
              </a>
            </li>
			 <li class="treeview">
              <a href="Client.php">
                <i class="fa fa-user"></i> <span>Client</span> 
              </a>
            </li>
            <li class="treeview">
              <a href="Employee.php">
                <i class="fa fa-users"></i>
                <span>24Q Employee</span>
    
              </a>
            
            </li>
          
			    <li class="treeview">
              <a href="Challan.php">
                <i class="fa fa-money"></i>
                <span>24Q Challan</span>
 
              </a>
         
            </li>
			 
			 <li class="treeview">
              <a href="SalaryInformation.php">
                <i class="fa fa-inr"></i>
                <span>24Q Salary Information</span>
 
              </a>
         
            </li>
			   <li class="treeview">
              <a href="Deductee.php">
                <i class="fa fa-users"></i>
                <span>26Q/27Q Deductee</span>
    
              </a>
            
            </li>
			 <li class="treeview">
              <a href="DeducteeChallan.php">
                <i class="fa fa-money"></i>
                <span>26Q/27Q Deductee Challan</span>
 
              </a>
         
            </li>
			<li class="treeview">
              <a href="Salary26Deductee.php">
                <i class="fa fa-inr"></i>
                <span>26Q Salary Information</span>
 
              </a>
         
            </li>
		
			<li class="treeview">
              <a href="Salary27Deductee.php">
                <i class="fa fa-inr"></i>
                <span>27Q Salary Information</span>
              </a>
            </li>
           
			   
		<!--	<li class="treeview">
              <a href="ExportExcel.php">
                <i class="fa fa-edit"></i>
                <span>Export Excel Sheet</span>
 
              </a>
         
            </li> -->
            <li class="treeview">
              <a href="upload.php">
                <i class="fa fa-file"></i> <span>Upload/Download Scanned Copies</span>
              </a>
           
            </li>
          
            <li>
              <a href="task.php">
                <i class="fa fa-calendar"></i> <span>Task Update</span>
                <!-- <small class="label pull-right bg-red">3</small> -->
              </a>
            </li>
			
           
        </section>
        <!-- /.sidebar -->
      </aside>
