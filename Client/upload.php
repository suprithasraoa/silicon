<?php include("header.php"); session_start();?>
<?php include("dbConnect/dbConnect.php");?>
<?php 

if(isset($_POST['save']))
{

date_default_timezone_set("Asia/Kolkata");
$datet = date("Y-m-d h:i:s ");

$uploaddir1 = "../Client/photos/";
   $uploadfile = $uploaddir1 . basename($_FILES['Photo1']['name']);
  // echo $uploadfile; exit;
   echo "<p>";
   move_uploaded_file($_FILES['Photo1']['tmp_name'], $uploadfile);
$Date=$_POST['txtDate'];

$UDate=date("Y-m-d", strtotime($Date));

$clientId=$_SESSION['loginId']; 
  
  $insert_user="insert into `UploadScannedCopies`(ClientId,FilePath,Quarter,Year,Date,Description,DocType,CreatedOn) VALUE ( '$clientId','".$_POST['flePhoto1']."','".$_POST['txtquter']."','".$_POST['txtyear']."','$UDate','".$_POST['txtDescription']."','".$_POST['txtDocType']."','$datet')";


if(mysqli_query($dbcon,$insert_user))
  
{
  echo '<script language="javascript">';
    echo 'alert("Submitted Successfully.")';
    echo '</script>';
       echo"<script>window.open('upload.php','_self')</script>";
}

     
 

}
if(isset($_POST['update']))
{

date_default_timezone_set("Asia/Kolkata");
$datet = date("Y-m-d h:i:s ");

$uploaddir1 = "../Client/photos/";
    $uploadfile = $uploaddir1 . basename($_FILES['Photo1']['name']);
  // echo $uploadfile; exit;
    echo "<p>";
    move_uploaded_file($_FILES['Photo1']['tmp_name'], $uploadfile);
$Date=$_POST['txtDate'];

$UDate=date("Y-m-d", strtotime($Date));

  
  $update_user="update `UploadScannedCopies` set `FilePath`='".$_POST["flePhoto1"]."', 
 
  `Quarter`='".$_POST["txtquter"]."', 
  `Year`='".$_POST["txtyear"]."', 
  `Description`='".$_POST["txtDescription"]."', 
  `Date`='$UDate', 
  `DocType`='".$_POST["txtDocType"]."' 
  
  where UploadScannedCopies.Id='".$_POST["pkvId"]."' ";

if(mysqli_query($dbcon,$update_user))
  
{
  echo '<script language="javascript">';
    echo 'alert("Updated Successfully.")';
    echo '</script>';
       echo"<script>window.open('upload.php','_self')</script>";
}

     
 

}
?>





<?php
$clientId=$_SESSION['loginId'];  ?>

<style>
.nopad
{
    padding: 0px;
}
.hide
{
    display: none;
    visibility: hidden;
}
.alert{
    padding: 5px 10px;
    margin-bottom: 10px;
}

</style>
 <script type="text/javascript">
  $(document).ready(function() {

 
 function DateToString(DateValue)
{

var dd = DateValue.getDate();
var mm = DateValue.getMonth()+1; //January is 0!

var yyyy = DateValue.getFullYear();
if(dd<10){
   dd='0'+dd;
} 
if(mm<10){
   mm='0'+mm;
} 
return yyyy+'-'+mm+'-'+dd;
//return dd+'/'+mm+'/'+yyyy;

}
function addDays(theDate, days) {
   return new Date(theDate.getTime() + days*24*60*60*1000);
}

var today = new Date();
var dd = today.getDate();
var MM = today.getMonth()+1; //January is 0!

var yyyy = today.getFullYear();
if(dd<10){dd='0'+dd} if(MM<10){MM='0'+MM} today = yyyy+'-'+MM+'-'+dd;

{
//alert(today);
document.getElementById("txtdate").value = today;
$('#txtenddate').attr('value', today);
$('#txtDate').attr('value', today);
}


 bindgrid();
  });
    function bindgrid(ddlshow) {
    
//    var ddlshowval="10";
    var txtClientId = $("#txtClientId").val();  
    document.getElementById('sTableRow').innerHTML="";
      var txtdate=document.getElementById("txtdate").value;
    var txtenddate=document.getElementById("txtenddate").value;
    document.getElementById('sTableRow').innerHTML="<thead><tr><th>#</th><th>File </th><th>Year</th><th>Date</th><th>Description</th><th>Action</th></tr></thead><tbody>";
    var slno=0;
  var ahref="";
//alert($clientId);
    var url = "sub/bind_list.php?txtdate="+txtdate+"&txtenddate="+txtenddate+"&cid=0&clientId="+txtClientId+"&tbl=UploadScannedCopies";
//

//alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
     //alert(field.Id);
    var id= field.Id;
   
// echo (result);
  slno++;
    
    ahref="<a class='Myedit' id='Myedit' href='javascript:FillCtrl("+id+")'><i class='fa fa-pencil' aria-hidden='true' ></i></a>  | <a onclick='javascript:confirmationDelete($(this));return false;' href='javascript:DeleteRecord("+id+")'><i class='fa fa-times' aria-hidden='true' ></i></a>";
      
    $("#sTableRow").append("<tr><td>"+slno+"</td><td style='font-size: 11px;'><a  target='_blank' href='../Client/photos/"+field.FilePath+"''><i class='fa fa-fw fa-download'></i></a></td><td style='font-size: 13px;'>"+field.Year+"</td><td style='font-size: 13px;'>"+field.Date+"</td><td style='font-size: 13px;'>"+field.Description+"</td><td>"+ahref);
    
      $("#sTableRow").append("</td></tr>");
      $("#sTableRow").append("</tbody>");
     document.getElementById("lbloutof").innerHTML=slno;
      document.getElementById("lblstart").innerHTML="1";
      });
    gettotalRec();
    });
  
  

    }
      function gettotalRec()
      {
    var url = "sub/bind_alltotal.php?Tname=UploadScannedCopies";
//alert(url);
    $.getJSON(url, function(result) {

    console.log(result);

    $.each(result, function(i, field) {
    var cnt= field.cnt;
  //alert(cnt);
  document.getElementById("lblrec").innerHTML=cnt;
    });
    });
  }
function validte(inputlngth,attrb)
{
if(inputlngth>0)
{
  $("#"+attrb).attr('class', 'form-group');
}
}
 function validateRForm() {
  if (document.getElementById("txtuploadfile").value == "") {
    $("#gtxtfile").attr('class', 'form-group has-error');
  document.getElementById("txtuploadfile").focus();
  return false;
  }
  if (document.getElementById("txtquter").value == "") {
    $("#gtxtquarter").attr('class', 'form-group has-error');
  document.getElementById("txtquter").focus();
  return false;
  }
    
    if (document.getElementById("txtDate").value == "") {
    $("#gtxtChequeDate").attr('class', 'form-group has-error');
  document.getElementById("txtDate").focus();
  return false;
  }
     if (document.getElementById("txtDescription").value == "") {
    $("#gtxtDescription").attr('class', 'form-group has-error');
  document.getElementById("txtDescription").focus();
  return false;
  }
   if (document.getElementById("txtDocType").value == "") {
  $("#gtxtDocType").attr('class', 'form-group has-error');
  document.getElementById("txtDocType").focus();
  return false;
  }
   
  
 
  }
 
</script>

<script>
  function confirmationDelete(anchor)
  {
  var conf = confirm('Are you sure want to delete this record?');
  if(conf)
  window.location=anchor.attr("href");
  }

  function FillCtrl(pkval)
  {

 $("#update").css('display','block');

  $("#save").css('display','none');

	 var txtClientId = $("#txtClientId").val();  
  var url = "sub/bind_list.php?cid="+pkval+"&tbl=UploadScannedCopies&clientId="+txtClientId;
//alert(url);
  $.getJSON(url, function(result) {

  console.log(result);
  //alert(result);
  $.each(result, function(i, field) {
	  
	  

 $("#flePhoto1").val(field.FilePath); // alert(field.FilePath);
  $("#txtquter").val(field.Quarter);
  $("#txtyear").val(field.Year);

  
  $("#txtDownload").css('display','block');
document.getElementById("txtDownload").href="../Client/Photos/"+field.FilePath;
 
 document.getElementById("Photo1").required=false;

  $("#txtClientId").val(field.ClientId);
  var cdate = field.Date;

  
   cdate=moment(cdate, 'YYYY/MM/DD').format('YYYY-MM-DD');
  $("#txtDate").val(cdate);
 
  $("#txtDescription").val(field.Description);
  $("#txtDocType").val(field.DocType);
    $("#pkvId").val(field.Id);
  });
  });


  }

   function DeleteRecord(pkval)
  {
 var txtClientId = $("#txtClientId").val();  
 
  var url = "sub/deletecommon.php?pkvId="+pkval+"&Tname=UploadScannedCopies&clientId="+txtClientId;
  //alert(url);
  $.getJSON(url, function(result) {

  console.log(result);
 
   if (result == "success") {
              
 alert('upload file  Deleted Successfully!');
  window.location.href="upload.php"; 
         }                       
            
  else if (result == "error") {
  alert('Sorry! Something went wrong..');
                                                   }
            
  });


  }

  function fnbindfile()
  {

 var filePath=$('#fleuploadfile').val(); 
 $('#txtuploadfile').val(filePath);
  }
</script>
<script>
function myFunction() {
    document.getElementById("txtyear").defaultValue = "2014-02";
}
</script>
<div class="content-wrapper">
<section class="content">
          <div class="row">
            <form action="#" method="post" enctype="multipart/form-data">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-header">
                  <h3 class="box-title">Upload Scanned Copies</h3>
                </div><!-- /.box-header onclick="saves();" -->
                <!-- form start -->
                <form id="frm">
              
                    <input type="hidden" class="form-control" id="txtClientId" value=<?php echo $_SESSION["loginId"];  ?> >
                  
                    <div class="col-sm-12">
             <div class="col-sm-5">
                 <div class="box">
                <div class="box-body">
         
               <div class="col-sm-12 nopad">
               <div class="col-sm-12">
                    <div class="form-group" id="gtxtfile">
                      <label>Upload File <span style="color:red;" >*</span></label>
                    
                    </div>
                  <input type='file' name="Photo1" id="Photo1" onchange="readURL(this); setPhotoTextBox(this,0); " required="required">
                <img id="txtPhoto1" src="#" alt="image 1" style="display:none;" />
               <input type="hidden" name="flePhoto1" id="flePhoto1" >
			   <a href="" target="_blank" id="txtDownload" style="display:none;">Download File</a>

          </div>
           </div>
            
         <div class="col-sm-6">
              <div class="form-group" id="gtxtquarter">
                      <label for="exampleInputEmail1">Quarter</label>
                     <select class="form-control" id="txtquter" name="txtquter" required>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </select>
           
                    </div>
            </div>
           
        <div class="col-sm-6">
                   <div class="form-group" id="gtxtyear">
                      <label>Year <span style="color:red;" >*</span></label>
                      <input type="number" class="form-control" id="txtyear" placeholder="Year" onchange="validte(this.value.length,'gtxtCheque') "name="txtyear"  value="2018" required>
                    </div>
                  </div>
             
                   
                  <div class="col-sm-6">
                  <div class="form-group" id="gtxtChequeDate">
                      <label>Date <span style="color:red;" >*</span></label>
                        <input type="date" class="form-control input-sm" name="txtDate" id="txtDate" placeholder="Search Date">
                    </div>
                  </div>
                    <div class="col-sm-6">
                    <div class="form-group" id="gtxtDocType">
                      <label>Doc Type <span style="color:red;" >*</span></label>
                    <input type="text" class="form-control pull-right" id="txtDocType" name="txtDocType" required>
          
                    </div>
          </div>
        
                          <div class="col-sm-6">
                    <div class="form-group" id="gtxtDescription">
                      <label>Remarks <span style="color:red;" >*</span></label>
                    <input type="text" class="form-control pull-right" id="txtDescription" name="txtDescription" required>
          
                    </div>
          </div>
              <div class="col-sm-6">     
           </div>
      <div class="col-lg-6">
          <div class="col-lg-6">
          <div class="alert alert-success alert-dismissable" id="alert-success" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6>  <i class="icon fa fa-check"></i>Details Submitted Successfully!</h6>
                    </div>
                  </div>
      </div>
      <br>
           </div>

               <div class="box-footer" >

                    <input type="hidden" id="pkvId" name="pkvId">
          <input  type="submit" value="Save"  id="save" name="save"  class="btn btn-primary" style="margin-top: 10px; "  />
       
      <input type="submit" value="update" name="update" id="update" style="display:none;  margin-top: 10px;"  class="btn btn-primary" />
    
                   </div>
                        </div>      
             </div>
             
             
          <div class="col-sm-7" style="border-left: 1px solid #eee;">
               <div class="box">
                  <div class="box-header with-border">
           <div class="col-lg-6 ">
                  <h3 class="box-title">View Scanned Copies</h3>
          
                    </div>
       
                 
          
          <!-- /.box-tools -->
                </div><!-- /.box-header -->
         
                    <div class="col-lg-4 ">
          <label>Search From Date</label>
                      <input type="date" class="form-control input-sm" name="txtdate" id="txtdate"  onchange="bindgrid();"   placeholder="Search Date">
                  
                    </div>
           <div class="col-lg-4 ">
            <label>To Date</label>
                      <input type="date" class="form-control input-sm" name="txtenddate" id="txtenddate"  onchange="bindgrid();"   placeholder="Search Date">
                    
                    </div>
         <div class="box-body">
                  <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
          <table class="table table-bordered table-hover table-striped" id="sTableRow">

                  </table>
            
            <div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example1_info">Showing <label id="lblstart">0</label> to <label id="lbloutof">0</label> of <label id="lblrec">0</label> entries</div>
            </div>
            <div class="col-xs-6"></div></div></div>
                </div><!-- /.box-body -->
              </div>
          
          
          
          
             </div>
          
          
          
                    
                </div>
              

              

                 
                </form>
              </div><!-- /.box -->

              <!-- Form Element sizes -->






           
              
           
          </div>   <!-- /.row -->
        </section>
      </div>









        <script type="text/javascript">
    function saves()
    {
      alert("Afsdf");
    }
    function SubmitFfm(btntxt)
{
  
    $('#frm').find('[type="submit"]').trigger('click');
  
  
}
</script>
           <script>
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#txtPhoto1')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
  </script>
  <script type="text/javascript">
function setPhotoTextBox(obj,findex)
{
  document.getElementById("fle"+obj.name).value=obj.files[findex].name;
}

</script>

            <?php include("footer.php");?>


 
