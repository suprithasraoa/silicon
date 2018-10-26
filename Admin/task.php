<?php include("header.php"); session_start();?>
<?php include("dbConnect/dbConnect.php");?>
<style>
.nopad
{
    padding: 0px;
}
.alert{
    padding: 5px 10px;
    margin-bottom: 10px;
}
.mailbox-subject {
	padding:3px;
}

mailbox-name {
	padding:3px;
}
.mailbox-star
{
	text-align: center;
}
</style>

<script>
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
}


 bindgrid();
  });
    function bindgrid(ddlshow) {
	var txtClientId = $("#txtCltId").val();  
	if	(txtClientId==null)	{
	txtClientId = 0;
}
		var userid =$("#txtUsrId").val(); 
		var ddlshowval = $("#ddlshow").val();  
	var txtdate=document.getElementById("txtdate").value;
		var txtenddate=document.getElementById("txtenddate").value;


    document.getElementById('sTableRow').innerHTML="";
    document.getElementById('sTableRow').innerHTML="<tbody >";
    var slno=0;
	var ahref="";

    var url = "sub/bind_list.php?txtdate="+txtdate+"&txtenddate="+txtenddate+"&cid=0&CltId="+txtClientId+"&userid="+userid+"&tbl=Task";
//alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
    var id= field.Id;
 var DateGiven= field.DateGiven;
    var Task= field.Task;
	 var Status= field.Status;
	 
	// alert(Status);
	  var lengt = 35;

var string = Task;
//alert(string.length);
var trimmedString = "";
if(string.length > lengt )
{	trimmedString=string.substring(0, lengt - 3) + "...";
}
else{ 
trimmedString=string;
}
//alert(trimmedString);
Task = trimmedString;

 	slno++;
	  if(Status==2)
	  {
    ahref="<a class='Myedit' id='Myedit' href='javascript:FillCtrl("+id+")'><i class='fa fa-pencil' aria-hidden='true' ></i></a> ";
      
    $("#sTableRow").append("<tr><td class='mailbox-star'><a href='#'><i class='fa fa-star text-yellow'></i></a></td><td class='mailbox-name' style='padding-right: 8px;'>"+field.UName+"</td><td class='mailbox-name' style='padding-right: 8px;'>"+field.CName+"</td><td class='mailbox-name' style='padding-right: 8px;'>"+field.DateGiven+"</td><td class='mailbox-subject' id='text'>"+Task+"</td><td>"+ahref);
	  }
	  else if(Status==1)
	  {
		  ahref="<a class='Myedit' id='Myedit' href='javascript:FillCtrl("+id+")'><i class='fa fa-pencil' aria-hidden='true' ></i></a> ";
      
    $("#sTableRow").append("<tr><td class='mailbox-star'><a href='#'><i class='fa fa-star-o text-yellow'></i></a></td><td class='mailbox-name' style='padding-right: 8px;'>"+field.UName+"</td><td class='mailbox-name' style='padding-right: 8px;'>"+field.CName+"</td><td class='mailbox-name' style='padding-right: 8px;'>"+field.DateGiven+"</td><td class='mailbox-subject' id='text'>"+Task+"</td><td>"+ahref);
		  
	  }
  
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
		var url = "sub/bind_alltotal.php?Tname=Task";
//alert(url);
    $.getJSON(url, function(result) {

    console.log(result);

    $.each(result, function(i, field) {
    var cnt= field.cnt;
  document.getElementById("lblrec").innerHTML=cnt;
    });
    });
	}
	 function bindClient(clid){
	  //  $("#txtClientId").append("");
		document.getElementById("txtClntId").innerHTML="";
		$("#gtxtUserId").attr('class', 'form-group');
		 var txtUserId = $("#txtUserId").val();  
		   var url = "sub/bind_client.php?UserId=" +txtUserId;
//alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
    var id= field.Id;
   
   $("#txtClntId").append("<option value='"+field.Id+"'>"+field.Name+"</option>");
  if(clid!=0){

  $("#txtClntId").val(clid);
  }
    });

    });
	
	}
	 function bindClientEdit(){
	document.getElementById("txtCltId").innerHTML="";
	bindgrid();
		 var txtUserId = $("#txtUsrId").val();  
		   var url = "sub/bind_client.php?UserId=" +txtUserId;
//alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
    var id= field.Id;
   
   $("#txtCltId").append("<option value='"+field.Id+"'>"+field.Name+"</option>");
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
	  var esu = document.getElementById("txtUserId");
               var strUsers = esu.options[esu.selectedIndex].value;
               if(strUsers==0)
               {
 $("#gtxtUserId").attr('class', 'form-group has-error');
  document.getElementById("txtUserId").focus();
               return false;
               }
	
	  var es = document.getElementById("txtClntId");
               var strUsers = es.options[es.selectedIndex].value;
               if(strUsers==0)
               {
 $("#gtxtClientId").attr('class', 'form-group has-error');
  document.getElementById("txtClntId").focus();
               return false;
               }
  if (document.getElementById("txtTaskdate").value == "") {
    $("#gtxtTaskdate").attr('class', 'form-group has-error');
 // document.getElementById("txtTaskdate").focus();
  return false;
  }
  if (document.getElementById("txtTask").value == "") {
    $("#gtxtTask").attr('class', 'form-group has-error');
  document.getElementById("txtTask").focus();
  return false;
  }

  }
   $(document).ready(function() {
      
     
     
  $("#save").click(function() {
 //alert("HEEII");
   
      var txtTaskdate = $("#txtTaskdate").val();
	  txtTaskdate= moment(txtTaskdate, 'DD/MM/YYYY').format('YYYY/MM/DD');
      var txtTask = $("#txtTask").val();   
       var txtClientId = $("#txtClntId").val();  
	   var userid =$("#txtUserId").val(); 
	 var TCheckbox = $('input[type="checkbox"]:checked').val();
      var Tstatus = TCheckbox ? 2: 1; 
    var es = document.getElementById("txtClntId");
               var strUsers = es.options[es.selectedIndex].value;
			     var esu = document.getElementById("txtUserId");
               var strUser = esu.options[esu.selectedIndex].value;
                var dataString = "txtTaskdate=" + txtTaskdate + "&txtTask=" + txtTask + "&txtStatus=" + Tstatus+"&userid="+userid+ "&txtClientId="+txtClientId+"&Tname=Task&save=";
//alert(dataString);
            if ($.trim(txtTaskdate).length > 0 && $.trim(txtTask).length > 0 && $.trim(strUsers) > 0 && $.trim(strUser) > 0) {
         
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
       //  alert($.trim(data));
                        if ($.trim(data) == "success") {

              
                $("#save").val('Save');
 window.location.href="task.php";  
     alert('Details Saved Successfully!');
	 bindgrid(); 
 
 // document.getElementById("alert-success").style.display="block";
    // $("#alert-success").fadeTo(2000, 800).slideUp(800, function(){
   // $("#alert-success").slideUp(800);
//});
 
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
        var DateGiven = $("#txtTaskdate").val();  
		DateGiven= moment(DateGiven, 'DD/MM/YYYY').format('YYYY-MM-DD');
            var Task = $("#txtTask").val();
 
	 var TCheckbox = $('input[type="checkbox"]:checked').val();
      var Tstatus = TCheckbox ? 2: 1; 
     var pkvId = $("#pkvId").val();
	var txtClientId = $("#txtClntId").val();  
	   var userid =$("#txtUserId").val(); 
	   var es = document.getElementById("txtClntId");
               var strUsers = es.options[es.selectedIndex].value;
			     var esu = document.getElementById("txtUserId");
               var strUser = esu.options[esu.selectedIndex].value;
            var dataString = "txtTaskdate=" + DateGiven + "&txtTask=" + Task + "&txtStatus=" + Tstatus+"&userid="+userid+ "&txtClientId="+txtClientId+"&Tname=Task&pkvId=" + pkvId+"&update=";
//alert(dataString);
              if ($.trim(DateGiven).length > 0 && $.trim(Task).length > 0 && $.trim(strUsers) > 0 && $.trim(strUser) > 0) {
                $.ajax({
                    type: "GET",
                    url: "sub/updatecommon.php",
              // alert(url);
                    data: dataString,
                    crossDomain: true,
                    cache: false,
                    beforeSend: function() {
                        $("#update").val('Connecting...');
                    },
                    success: function(data) {
						//alert("hii");
   //alert($.trim(data));
                        if ($.trim(data) == "success") {
           $("#save").val('Save');
		    $("#update").val('Update');
 window.location.href="task.php";  
   bindgrid();
  
	document.getElementById("txtStatus").checked=false;
      alert('Details Updated Successfully..!');
	//  window.location.href="Task.php"; 
   //  $("#alert-success").fadeTo(2000, 800).slideUp(800, function(){
   // $("#alert-success").slideUp(800);
	 $("#update").css('display','none');

  $("#save").css('display','block');
	
//});
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

var userid =$("#txtUserId").val(); 
var txtClientId = $("#txtCltId").val(); 
if	(txtClientId==null)	{
	txtClientId = 0;
}
  var url = "sub/bind_list.php?cid="+pkval+"&CltId="+txtClientId+"&userid="+userid+"&tbl=Task";
//alert(url);
  $.getJSON(url, function(result) {

  console.log(result);
  $.each(result, function(i, field) {
	  $("#txtUserId").val(field.UId);
     var CLid = field.ClientId;
	bindClient(CLid);
	
		var cdate=field.DateGiven;
		cdate=moment(cdate, 'YYYY/MM/DD').format('DD/MM/YYYY');
         $("#txtTaskdate").val(cdate);  
		
	$("#txtTask").val(field.Task);
	var Tstatus = field.Status;
	
	if(Tstatus == 1){
		document.getElementById("txtStatus").checked=false;
	}else{
	document.getElementById("txtStatus").checked=true;	
	}
	$("#pkvId").val(field.Id);
  });
  });


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
                  <h3 class="box-title">Task</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
       
                    <div class="col-sm-12">
                    <div class="col-sm-4">
					 <div class="box">
                            <div class="box-body">
                   
                
                   <div class="col-sm-12 nopad">
				     <div class="col-sm-6">
                    <div class="form-group" id="gtxtUserId">
                      <label for="exampleInputEmail1">User <span style="color:red;" >*</span> </label>
                   
		 <select  id= "txtUserId" class="form-control" onchange="bindClient(0);">
         <?php $query ="SELECT 0  AS Id,'--select--' AS Name UNION ALL SELECT Id,Name FROM User where Active=1";

    $result = mysqli_query($dbcon,$query);
    while($row=mysqli_fetch_array($result)){                                                 
       echo "<option value='".$row['Id']."'>".$row['Name']."</option>";       
    }
?>
                </select>
                    </div>
                  </div>
				     <div class="col-sm-6">
                    <div class="form-group" id="gtxtClientId">
                      <label for="exampleInputEmail1">Client <span style="color:red;" >*</span></label>
                   
		 <select  id= "txtClntId" class="form-control" onchange="validte(this.value.length,'gtxtClientId')">
 
                </select>
                    </div>
                  </div>
				   
				       <div class="col-sm-8">
                    <div class="form-group"  id="gtxtTaskdate">
					  <input type="hidden" class="form-control" id="userid" value=<?php echo $_SESSION["UserlogId"];  ?> >
                      <label>Task Date <span style="color:red;" >*</span></label>
                 <input type="text" class="form-control" id="txtTaskdate" placeholder="dd/mm/yyyy" onchange="validte(this.value.length,'gtxtTaskdate')"/>
					 <input type="hidden" id="txtclienId"/>
					
               
                    </div>
					</div>
					 </div>
					 
					    <div class="col-sm-12 nopad">
					  <div class="col-sm-6">
					    <div class="form-group" id="gtxtTask">
                      <label for="exampleInputEmail1">Task <span style="color:red;" >*</span></label>
                     <textarea rows="4" cols="30" id="txtTask" onchange="validte(this.value.length,'gtxtTask')"></textarea>
                    </div>
					  </div>
					  </div>
					   <div class="col-sm-12 nopad">
					  <div class="col-sm-6">
                    <div class="form-group">
					
                      <label> 
                      Complete : <input type="checkbox" name="txtStatus" id="txtStatus"  /> 
                    </label>
				
                    </div>
					</div>
					</div>
					   		  <div class="col-lg-12">
				  
				  <div class="alert alert-success alert-dismissable" id="alert-success" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6>	<i class="icon fa fa-check"></i> Task Details Submitted Successfully!</h6>
                   
                  </div>
			</div>
			</div>
			 <div class="box-footer" style="    padding-left: 4%;">
				  <input type="hidden" id="pkvId">
                   <input  type="submit" value="Save"  id="save"  class="btn btn-primary" style="margin-left: 2%;" onclick="return validateRForm();" />
       
      <input type="submit" value="Update"  id="update" style="display:none;"  class="btn btn-primary" style="margin-left: 2%;"  onclick="return validateRForm();"/>
    
                  </div>
				       </div>
                </div>
                 <div class="col-sm-8" style="border-left: 1px solid #f4f4f4;">
<div class="box box-primary">
                <div class="box-header with-border">
				   <div class="col-lg-2 ">
                  <h3 class="box-title">View Tasks</h3>
				  
                    </div>
          <div class="col-lg-4">
		
		    <span class='mailbox-star'><a href='#'><i class='fa fa-star-o text-yellow'></i></a></span>Pending
			  <span class='mailbox-star'><a href='#'><i class='fa fa-star text-yellow'></i></a></span>Completed
		        </div>
                    <div class="col-lg-3 ">
					<label>Search From Date</label>
                      <input type="date" class="form-control input-sm" name="txtdate" id="txtdate"  onchange="bindgrid();"   placeholder="Search Date">
                  
                    </div>
					 <div class="col-lg-3 ">
					 	<label>To Date</label>
                      <input type="date" class="form-control input-sm" name="txtenddate" id="txtenddate"  onchange="bindgrid();"   placeholder="Search Date">
                    
                    </div>
					<div class="col-sm-4 class="form-group">
                      <label for="exampleInputEmail1">User</label>
                   
		 <select  id= "txtUsrId" class="form-control" onchange="bindClientEdit();" >
         <?php $query ="SELECT 0  AS Id,'--ALL--' AS Name UNION ALL SELECT Id,Name FROM User where Active=1";

    $result = mysqli_query($dbcon,$query);
    while($row=mysqli_fetch_array($result)){                                                 
       echo "<option value='".$row['Id']."'>".$row['Name']."</option>";       
    }
?>
                </select>
                    </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Client</label>
                   
		 <select  id= "txtCltId" class="form-control" onchange="bindgrid();" >
        
                </select>
                    </div>
                  </div>
				  
				  <!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
               
                  <div class="table-responsive mailbox-messages" style="    overflow-x: hidden;">
                    <table class="table table-hover table-striped"  id="sTableRow">
                      
                    </table><!-- /.table -->
					 <div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example1_info">Showing <label id="lblstart">0</label> to <label id="lbloutof">0</label> of <label id="lblrec">0</label> entries</div>
					  </div>
					  <div class="col-xs-6"></div></div>
                  </div><!-- /.mail-box-messages -->
				  
				  
				  
                </div><!-- /.box-body -->
                
              </div>
					 
                  
				  
			
                  </div> 
				   
                </div>
                  
                   
                
                 
                </form>
              </div><!-- /.box -->

             

                  
                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
		   
		   
		 
        </section>
      </div>






        <script type="text/javascript">
      $(function () {
        //Datemask dd/mm/yyyy
        $("#txtTaskdate").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        //$("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
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
	<script>
	function getamt()
	{	
   
		var IncomeTax= $("#txtIncomeTax").val();
		if(IncomeTax==""){IncomeTax=0;}
		
		var FeesPaid= $("#txtFeesPaid").val();
		if(FeesPaid==""){FeesPaid=0;}
		
		var Surcharge= $("#txtSurcharge").val();
		if(Surcharge==""){Surcharge=0;}
		
		var EducationCess=$("#txtEducationCess").val();
		if(EducationCess==""){EducationCess=0;}
		
		 var InterestPaid=$("#txtInterestPaid").val();
		 if(InterestPaid==""){InterestPaid=0;}
		
		var PenaltyPaid= $("#txtPenaltyPaid").val();
		if(PenaltyPaid==""){PenaltyPaid=0;}
		
		var OtherAmtPaid= $("#txtOtherAmtPaid").val();
		if(OtherAmtPaid==""){OtherAmtPaid=0;}
		
		var totalAmt=parseFloat(IncomeTax)+parseFloat(FeesPaid)+parseFloat(Surcharge)+parseFloat(EducationCess)+parseFloat(InterestPaid)+parseFloat(PenaltyPaid)+parseFloat(OtherAmtPaid);
		$("#txtTotalAmtPaid").val(totalAmt);
		
	}
    </script>
	
	
	
            <?php include("footer.php");?>
