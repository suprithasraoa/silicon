<?php include("header.php");include("dbConnect/dbConnect.php");$ClientId =$_SESSION["loginId"];?>
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
                 <h3><?php   $qry=" SELECT count(*)as cnt from dbsilicon.SalaryInformation where  ClientId='$ClientId'";
				
$q=mysqli_query($dbcon,$qry);
while ($row=mysqli_fetch_assoc($q)){
echo $cnt=$row["cnt"];	
} ?></h3>
                 <p>Salary</p>
               </div>
               <div class="icon">
                 <i class="ion ion-person-add"></i>
               </div>
               <a href="SalaryInformation.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
             </div>
           </div><!-- ./col -->
           <div class="col-lg-3 col-xs-6">
             <!-- small box -->
             <div class="small-box bg-yellow">
               <div class="inner">
                 <h3><?php $qry=" SELECT count(*)as cnt from Employee INNER JOIN dbsilicon.Client ON Client.Id=Employee.ClientId INNER JOIN dbsilicon.User ON User.Id=Client.UserId where Employee.Active=1 and User.Active = 1 AND  Client.Active = 1 AND User.Id='$ClientId'";
				
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
                 <h3><?php $qry=" SELECT count(*)as cnt from Deductee INNER JOIN dbsilicon.Client ON Client.Id=Deductee.ClientId INNER JOIN dbsilicon.User ON User.Id=Client.UserId where Deductee.Active=1 and User.Active = 1 AND  Client.Active = 1 AND User.Id='$ClientId' ";
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
                 <h3><?php $qryTASK=" SELECT COUNT(*)AS cnt FROM dbsilicon.Task  WHERE ClientId='$ClientId' ";
			
$qTASK=mysqli_query($dbcon,$qryTASK);
while ($rowTASK=mysqli_fetch_assoc($qTASK)){
echo $cnt=$rowTASK["cnt"];
 
} ?></h3>
                 <p>Tasks</p>
               </div>
               <div class="icon">
                 <i class="ion ion-person-add"></i>
               </div>
               <a href="User.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
             </div>
           </div><!-- ./col -->
		     <!-- <div class="col-lg-6">
        
        <div class="table-responsive">
<div class="panel-heading">
                               <h3 class="panel-title">Pending Entry of Salary(Clientwise)</h3>
                           </div>

          <table class="table table-bordered table-hover table-striped" id="sTableRow">
<thead><tr><th>Client Name</th><th>Employee</th><th>Quarter</th></tr></thead><tbody>
<?php ?>
</tbody>
          </table>
        </div>
		</div>-->
 <div class="col-lg-2"></div>
 <div class="col-lg-8">
<div class="table-responsive">
<div class="panel-heading">
                               <h3 class="panel-title">Pending Task(Clientwise)</h3>
                           </div>
    <table class="table table-bordered table-hover table-striped" id="sTableRow">
<thead><tr><th>Serial No</th><th>Created On</th><th>Quarter</th><th>Status</th></tr></thead><tbody>
<?php 
$qryTASK="SELECT * FROM dbsilicon.Task  WHERE ClientId='$ClientId' ";

$qTASK=mysqli_query($dbcon,$qryTASK);		
while ($rowTASK=mysqli_fetch_assoc($qTASK)){
 $cnt=$rowTASK["cnt"];
 $SerialNo=$rowTASK["SerialNo"];	
 $CreatedOn=$rowTASK["CreatedOn"];
 $Quarter=$rowTASK["Quarter"];
echo "<tr><td style='font-size: 15px;font-weight: bold;'>".$SerialNo."</td><td>".$CreatedOn."</td><td>".$Quarter."</td><td></td></tr>";	

$var1=$rowTASK["RecvStatus1"]==1?"<span style='color:green;font-size:12px;'>Done</span>":"<span style='color:red;font-size:12px;'>Pending</span>";
$var2=$rowTASK["RecvStatus2"]==1?"<span style='color:green;font-size:12px;'>Done</span>":"<span style='color:red;font-size:12px;'>Pending</span>";
$var3=$rowTASK["RecvStatus3"]==1?"<span style='color:green;font-size:12px;'>Done</span>":"<span style='color:red;font-size:12px;'>Pending</span>";
$var4=$rowTASK["RecvStatus4"]==1?"<span style='color:green;font-size:12px;'>Done</span>":"<span style='color:red;font-size:12px;'>Pending</span>";
$var5=$rowTASK["RecvStatus5"]==1?"<span style='color:green;font-size:12px;'>Done</span>":"<span style='color:red;font-size:12px;'>Pending</span>";
$var6=$rowTASK["RecvStatus6"]==1?"<span style='color:green;font-size:12px;'>Done</span>":"<span style='color:red;font-size:12px;'>Pending</span>";

	echo "<tr><td colspan='4'><table style='width:100%'><tr><td style='width: 1px;    padding-right: 3%;'>1.</td> <td><lable style='font-size:13px'>Data Recieved Date</label> : <span style='font-size:13px;font-weight:bold'> ".$rowTASK["DataRcvDate"]."</span></td><td>".$var1."</td></tr><tr><td style='width: 1px;    padding-right: 3%;'>2.</td><td><lable style='font-size:13px'>Entry & e-return Date</lable>: <span style='font-size:13px;font-weight:bold'> ".$rowTASK["EntryEreturn"]."</span></td><td>".$var2."</td></tr><tr><td style='width: 1px;    padding-right: 3%;'>3.</td><td><lable style='font-size:13px'>Form 27A & Bill Sending Date </label>:<span style='font-size:13px;font-weight:bold'> ".$rowTASK["Form27ABill"]."</span></td><td> ".$var3."</td></tr><tr><td style='width: 1px;'>4.</td><td><lable style='font-size:13px'>Recieving of Signed Form 27A & Bill Amount Date</lable>:<span style='font-size:13px;font-weight:bold'> ".$rowTASK["RecvForm27ABill"]."</span></td>
	<td>".$var4."</td></tr><tr><td style='width: 1px;    padding-right: 3%;'>5.</td><td><lable style='font-size:13px'>UploadingFVUFile</lable>:<span style='font-size:13px;font-weight:bold'> ".$rowTASK["UploadingFVUFile"]."</span></td><td> ".$var5."</td></tr><tr><td style='width: 1px;    padding-right: 3%;'>6.</td><td><lable style='font-size:13px'>SendingPRtoCust</lable>:<span style='font-size:13px;font-weight:bold'> ".$rowTASK["SendingPRtoCust"]."</span></td><td>".$var6."</td></tr></table></td></tr>";	
}

 ?></tbody>
          </table></div>
		
		</div>
		
 <!--<div class="col-lg-6">
<div class="table-responsive">
<div class="panel-heading">
                               <h3 class="panel-title">Status Information(Clientwise)</h3>
                           </div>
    <table class="table table-bordered table-hover table-striped" id="sTableRow">
<thead><tr><th>Client Name</th><th>Status</th></tr></thead><tbody>
<?php ?></tbody>
          </table></div>
		
		</div>-->


		 </div><!-- /.row -->
      
		
		</section><!-- /.content -->
      </div><!-- /.content-wrapper -->


      <?php include("footer.php");?>