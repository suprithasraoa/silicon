<?php include("header.php"); include "dbConnect/dbConnect.php"; ?>
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

<script>
function checktan()
{
	if (document.getElementById("cmbTan").value != "") {
	let str = $("#cmbTan").val();
var ss= /^[A-Za-z]{4}\d{5}[A-Za-z]{1}$/i.test(str) ;
//alert(ss);
if(ss==false)
{
    $("#gcmbTan").attr('class', 'form-group has-error');
  document.getElementById("cmbTan").focus();
   $("#lblinvalidTan").css('display','block');
   	
}
else
{
	$("#gcmbTan").attr('class', 'form-group');
	 $("#lblinvalidTan").css('display','none');
}
}
}

function validte(inputlngth,attrb)
{
if(inputlngth>0)
{
  $("#"+attrb).attr('class', 'form-group');
}
}
 function validateRForm() {
 
    if (document.getElementById("txtName").value == "") {
    $("#gtxtname").attr('class', 'form-group has-error');
  document.getElementById("txtName").focus();
  return false;
  }
     if (document.getElementById("cmbTan").value == "") {
    $("#gcmbTan").attr('class', 'form-group has-error');
  document.getElementById("cmbTan").focus();
  return false;
  }
   
   
    if (document.getElementById("txtRName").value == "") {
   $("#gtxtRname").attr('class', 'form-group has-error');
  document.getElementById("txtRName").focus();
  return false;
  }
 
  }
</script>
 <script type="text/javascript">
  $(document).ready(function() {
 bindgrid();
  });
 
    function gettotalRec()
	{
		var url = "sub/bind_alltotal.php?Tname=Client";
//alert(url);
    $.getJSON(url, function(result) {

    console.log(result);

    $.each(result, function(i, field) {
    var cnt= field.cnt;
  document.getElementById("lblrec").innerHTML=cnt;
    });
    });
	}
    function bindgrid(ddlshow) {
    	
	var ddlshowval = $("#ddlshow").val();  
    		var userid =$("#txtUsrId").val(); 
    document.getElementById('sTableRow').innerHTML="";
    document.getElementById('sTableRow').innerHTML="<thead><tr><th>#</th><th>User</th><th>Name</th><th>Name</th><th>Designation</th><th>PAN</th><th>Mobile</th><th>Action</th></tr></thead><tbody>";
    var slno=0;
  var ahref="";

    var url = "sub/bind_list.php?show=" +ddlshowval+"&userid="+userid+"&cid=0&tbl=Client";
//alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
    var id= field.Id;
   
   
  slno++;
    
    ahref="<a class='Myedit' id='Myedit' href='javascript:FillCtrl("+id+")'><i class='fa fa-pencil' aria-hidden='true' ></i></a>  | <a onclick='javascript:confirmationDelete($(this));return false;' href='javascript:DeleteRecord("+id+")'><i class='fa fa-times' aria-hidden='true' ></i></a>";
      
    $("#sTableRow").append("<tr><td>"+slno+"</td><td style='font-size: 11px;'>"+field.uname+"</td><td style='font-size: 11px;'>"+field.Name+"</td><td style='font-size: 13px;'>"+field.RespPersonDesig+"</td><td style='font-size: 13px;'>"+field.RespPersonPAN+"</td><td style='font-size: 13px;'>"+field.PhoneNo+"</td><td style='font-size: 13px;'>"+field.EmailId+"</td><td>"+ahref);
    
      $("#sTableRow").append("</td></tr>");
      $("#sTableRow").append("</tbody>");
	    document.getElementById("lbloutof").innerHTML=slno;
		  document.getElementById("lblstart").innerHTML="1";
    });
 gettotalRec();
    });
  

    }


   $(document).ready(function() {
   
     
     
  $("#save").click(function() {
var userid =$("#userid").val(); 
      var cmbTan= $("#cmbTan").val();
  
    var txtName=$("#txtName").val();
  
    var txtRName=$("#txtRName").val();
    
     var txtRMobile=$("#txtRMobile").val();
   
   var txtPassword=$("#txtPassword").val();
                 var dataString = "cmbTan="+cmbTan+"&txtName=" + txtName  + "&txtRName=" + txtRName +"&txtRMobile=" + txtRMobile +"&txtPassword="+txtPassword+"&userid="+userid+"&Tname=Client&save=";


            if ( $.trim(txtName).length > 0  && $.trim(txtRMobile).length > 0  && $.trim(cmbTan).length > 0) {
         
                $.ajax({
                    type: "GET",
                    url: "sub/insertcommon.php",
                    data: dataString,
                    crossDomain: true,
                    cache: false,
                    beforeSend: function() {
                        $("#save").val('Connecting...');
                    },
                    success: function(data) {
          //alert($.trim(data));
                        if ($.trim(data) == "success") {

                $("#save").val('Save');

  window.location.href="Client.php";  
  document.getElementById("alert-success").style.display="block";
     $("#alert-success").fadeTo(2000, 800).slideUp(800, function(){
    $("#alert-success").slideUp(800);
});
         }          

                        
                        else if (data == "exist") {
            alert('Record Already Exists!');
                           // alert("error");
                        }
            else if (data == "error") {
            alert('Sorry! Something went wrong..');
                           // alert("error");
                        }
                    }
                });
      
            }
            return false;
        });
    
    $("#update").click(function() {

  var userid =$("#userid").val(); 
      var cmbTan= $("#cmbTan").val();
  
    var txtName=$("#txtName").val();
  
    var txtRName=$("#txtRName").val();
    
     var txtRMobile=$("#txtRMobile").val();
   
   var txtPassword=$("#txtPassword").val();

     var pkvId = $("#pkvId").val();
           var dataString =  "cmbTan="+cmbTan+"&txtName=" + txtName  + "&txtRName=" + txtRName +"&txtRMobile=" + txtRMobile +"&txtPassword="+txtPassword+"&userid="+userid+"&Tname=Client&pkvId=" + pkvId+"&update=";
//alert(dataString);
              if ( $.trim(txtName).length > 0  && $.trim(txtRMobile).length > 0  && $.trim(cmbTan).length > 0) {
                $.ajax({
                    type: "GET",
                    url: "sub/updatecommon.php",
                    //alert(url);
                    data: dataString,
                    crossDomain: true,
                    cache: false,
                    beforeSend: function() {
                        $("#update").val('Connecting...');
                    },
                    success: function(data) {
      // alert($.trim(data));
                        if ($.trim(data) == "success") {
              // $("#update").val('Update');
window.location.href="Client.php";  
  document.getElementById("alert-success").style.display="block";
     $("#alert-success").fadeTo(2000, 800).slideUp(800, function(){
    $("#alert-success").slideUp(800);
});
         }
                         
            
            else if (data == "error") {
            alert('Sorry! Something went wrong..');
                           // alert("error");
                        }
                    }
                });
      
            }
            return false;
      });
    });
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


  var url = "sub/bind_list.php?cid="+pkval+"&tbl=Client";
 //alert(url);
  $.getJSON(url, function(result) {

  console.log(result);
  $.each(result, function(i, field) {
    $("#cmbUser").val(field.UserId);
  $("#txtName").val(field.Name);
  
  $("#cmbTan").val(field.TAN);
 
  $("#txtRName").val(field.RespPersonName);
  
  $("#txtRMobile").val(field.RespPersonPhNo);
  
   $("#txtPassword").val(field.RespPersonPassword);
    $("#pkvId").val(field.Id);
  });
  });


  }

   function DeleteRecord(pkval)
  {

  var url = "sub/deletecommon.php?pkvId="+pkval+"&Tname=Client";
  //alert(url);
  $.getJSON(url, function(result) {

  console.log(result);
 
   if (result == "success") {
              
 alert('Client Deleted Successfully!');
  window.location.href="Client.php"; 
         }                       
            
  else if (result == "error") {
  alert('Sorry! Something went wrong..');
                                                   }
            
  });


  }
</script>
<script type="text/javascript">

function showGovt()
{
  //alert("fdgdfG");
  var val= document.getElementById('cmbStatus').value;
    if(val==="Others")
       document.getElementById('divGovt').style.display='none';
    else
       document.getElementById('divGovt').style.display='block'; 
}

</script>



<div class="content-wrapper">
<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Client</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                 
                    <div class="col-sm-12">
                    <div class="col-sm-6">
					<div class="box">
                  <div class="box-body">
                   
                
                   <div class="">
				   <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">User
                      </label>
                    <select class="form-control" id="cmbUser">
                          <?php  $query ="SELECT 0  AS Id,'--select--' AS Description UNION ALL SELECT Id,Name as Description FROM User";

    $result = mysqli_query($dbcon,$query);
    while($row=mysqli_fetch_array($result)){                                                 
       echo "<option value='".$row['Id']."'>".$row['Description']."</option>";       
    }
?>
                      </select>
                    </div>
					</div>
					
				       <div class="col-sm-6">
                  <div class="form-group" id="gcmbTan">
                      <label for="exampleInputPassword1">TAN
                      </label>
					   <input type="text" class="form-control" id="cmbTan" placeholder="Enter TAN"  onchange="checktan();">
                    <label id="lblinvalidTan" style="color:red;display:none;">Invalid TAN Format</label>
                    </div>
					</div>
				  <div class="col-sm-6">
                    <div class="form-group" id="gtxtname">
                      <label for="exampleInputPassword1">Office Name<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="txtName" placeholder="Enter Name" onchange="validte(this.value.length,'gtxtname')">
                    </div>
                  </div>
                  </div>
				    
                   <div class="col-sm-6">
                    <div class="form-group" id="gtxtRname">
                      <label for="exampleInputPassword1">Resp Person Name<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="txtRName" placeholder="Enter Name" onchange="validte(this.value.length,'gtxtRname')">
                    </div>
                  </div>

				   <div class="col-sm-6">
                    <div class="form-group" id="gtxtRmobile">
                      <label for="exampleInputPassword1">Mobile No.<span style="color:red;">*</span></label>
                            <input type="Number" class="form-control" id="txtRMobile" placeholder="Enter Mobile No."onchange="validte(this.value.length,'gtxtRmobile')">
                    </div>
                  </div>
				  <div class="col-sm-6">
                    <div class="form-group" id="gtxtPassword">
                      <label for="exampleInputPassword1">Password<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="txtPassword" placeholder="Enter Password" onchange="validte(this.value.length,'gtxtPassword')">
                    </div>
                  </div>
				    <div class="col-lg-12">
				  <div class="col-lg-6">
				  <div class="alert alert-success alert-dismissable" id="alert-success" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6>	<i class="icon fa fa-check"></i>Details Submitted Successfully!</h6>
                    </div>
                  </div>
				  </div>
				  </div>
                  <div class="box-footer" style="    padding-left: 4%;">
<br>
                     <input type="hidden" id="pkvId">
          <input  type="submit" value="Save"  id="save"  style="    margin-bottom: 30px;" class="btn btn-primary" onclick="return validateRForm();" />
       
      <input type="submit" value="Update"  id="update" style="display:none; margin-bottom: 30px;"  class="btn btn-primary" onclick="return validateRForm();"/>
    
				<input type="hidden" class="form-control" id="userid" value=<?php echo $_SESSION["UserlogId"];  ?> > 
					<div id="ss">



					
                  </div>
               
              </div><!-- /.box -->
                </div>
				 </div>
                 <div class="col-sm-6">
            <div class="col-sm-12" style="border-left: 1px solid #eee;">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">View Client</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
				  
				  <div class="row">  <div class="col-sm-6 class="form-group">
                      <label for="exampleInputEmail1">User</label>
                   
		 <select  id= "txtUsrId" class="form-control" onchange="bindgrid();" >
         <?php $query ="SELECT 0  AS Id,'--ALL--' AS Name UNION ALL SELECT Id,Name FROM User where Active=1";

    $result = mysqli_query($dbcon,$query);
    while($row=mysqli_fetch_array($result)){                                                 
       echo "<option value='".$row['Id']."'>".$row['Name']."</option>";       
    }
?>
                </select>
                    </div><div class="col-xs-6"><div id="example1_length" class="dataTables_length"><label> <select  id="ddlshow" onchange="bindgrid();" size="1" name="example1_length" aria-controls="example1"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> records per page</label></div></div></div>
				 <div class="table-responsive">	
          <table class="table table-bordered table-hover table-striped" id="sTableRow">

                  </table>
            </div>
           <div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example1_info">Showing <label id="lblstart">0</label> to <label id="lbloutof">0</label> of <label id="lblrec">0</label> entries</div>
					  </div>
					  <div class="col-xs-6"></div></div></div>
                </div><!-- /.box-body -->
              </div>
          
          
          
             </div> 
                  
                </div>
                 
                   
                  </div><!-- /.box-body -->


             

                  
                  </form>
                <!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section>


      </div>







        <script type="text/javascript">
      $(function () {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                  ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                  },
                  startDate: moment().subtract('days', 29),
                  endDate: moment()
                },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
	

	
            <?php include("footer.php");?>
