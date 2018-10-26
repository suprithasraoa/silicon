<?php include("header.php");
 include("dbConnect/dbConnect.php"); 
 ?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
           
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php 	$qry=" SELECT count(*)as cnt from dbsilicon.Client where Active=1 ";
$q=mysqli_query($dbcon,$qry);
while ($row=mysqli_fetch_assoc($q)){
echo $cnt=$row["cnt"];	
} ?></h3>
                  <p>Clients</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="Client.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php 	$qry=" SELECT count(*)as cnt from Employee where Active=1";
$q=mysqli_query($dbcon,$qry);
while ($row=mysqli_fetch_assoc($q)){
echo $cnt=$row["cnt"];	
} ?></h3>
                  <p>Employees</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="Employee.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php 	$qry=" SELECT count(*)as cnt from Deductee where Active=1 ";
$q=mysqli_query($dbcon,$qry);
while ($row=mysqli_fetch_assoc($q)){
echo $cnt=$row["cnt"];	
} ?></h3>
                  <p>Deductee</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="Deductee.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			 <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php 	$qry=" SELECT count(*)as cnt from dbsilicon.Task ";
$q=mysqli_query($dbcon,$qry);
while ($row=mysqli_fetch_assoc($q)){
echo $cnt=$row["cnt"];	
} ?></h3>
                  <p>Tasks</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="User.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


      <?php include("footer.php");?>