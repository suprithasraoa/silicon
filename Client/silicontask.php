<?php


 include("header.php");  ?>
 <?php include("dbConnect/dbConnect.php");?>
<style>
.spn
{
	    background: #f4f4f4;
    padding: 2px 9px;
    border-radius: 6px;
    margin-right: 9px;
    font-size: 19px;
}
.nopad
{
    padding: 0px;
	box-shadow: #d2d6de 3px 1px 3px;
    margin-bottom: 20px;
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
input[type=checkbox]
{
	margin-right: 8px;
}
.lbl
{
	font-weight: 100;
    font-size: 20px;
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
 $("#divtask2").hide();
  $("#divtask3").hide();
   $("#divtask4").hide();
    $("#divtask5").hide();
	 $("#divtask6").hide();
	 
  });
    function bindgrid(ddlshow) {
		
		var ddlshowval="10";
	var txtdate=document.getElementById("txtdate").value;
		var txtenddate=document.getElementById("txtenddate").value;
//alert(txtdate);	
//alert(txtenddate);
   var txtclientId = $("#txtclientId").val();	
    document.getElementById('sTableRow').innerHTML="";
    document.getElementById('sTableRow').innerHTML="<tbody >";
    var slno=0;
	var ahref="";

    var url = "sub/bind_list.php?show=" +ddlshowval+"&txtdate="+txtdate+"&txtenddate="+txtenddate+"&cid=0&tbl=Task&clientId="+txtclientId;
//alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
    var id= field.Id;
 var CreatedOn= field.CreatedOn;
    var Quarter= field.Quarter;
	 var Status= field.Status;
slno++;
	
    ahref="<a class='Myedit' id='Myedit' href='javascript:FillCtrl("+id+")'><i class='fa fa-pencil' aria-hidden='true' ></i> | <i class='fa fa-eye' aria-hidden='true' ></i></a> ";
      
  
   $("#sTableRow").append("<tr><td>"+field.SerialNo+"</td><td class='mailbox-star'><a href='#'><i class='fa fa-star text-yellow'></i></a></td><td class='mailbox-name' style='padding-right: 8px;'>"+CreatedOn+"</td><td class='mailbox-subject' id='text'>Quarter: "+Quarter+"</td><td>"+ahref);
	
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
		  var txtclientId = $("#txtclientId").val();
		var url = "sub/bind_alltotal.php?Tname=Task&clientId="+txtclientId;
//alert(url);
    $.getJSON(url, function(result) {

    console.log(result);

    $.each(result, function(i, field) {
    var cnt= field.cnt;
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
  if (document.getElementById("txtTaskdate1").value == "") {
    $("#gtxtTaskdate1").attr('class', 'form-group has-error');
 // document.getElementById("txtTaskdate").focus();
  return false;
  }
  
  }
   $(document).ready(function() {
      
     
     
  $("#save").click(function() {
 //alert("HEEII");
     var txtclientId = $("#txtclientId").val();
 var txtQuarter= $("#txtQuarter").val();
var txtTaskdate1= $("#txtTaskdate1").val();
txtTaskdate1= moment(txtTaskdate1, 'DD/MM/YYYY').format('YYYY/MM/DD');
var txtstatus1=document.getElementById("txtstatus1").checked == true?1:0;
 var txtRemarks= $("#txtTask").val();
  var txtSerialNo= $("#txtSerialNo").val();
// alert(txtstatus1);
                var dataString = "txtSerialNo="+txtSerialNo+"&txtRemarks="+txtRemarks+"&txtQuarter="+txtQuarter+"&txtTaskdate1=" + txtTaskdate1+"&txtstatus1=" + txtstatus1+"&clientId="+txtclientId+"&Tname=Task&save=";
//alert(dataString);
            if ($.trim(txtTaskdate1).length > 0  ) {
         
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
window.location.href="silicontask.php";
              
                $("#save").val('Save');

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
    
  $("#update").click(function() {
	        var txtclientId = $("#txtclientId").val();
 var txtQuarter= $("#txtQuarter").val();
var txtTaskdate1= $("#txtTaskdate1").val();
txtTaskdate1= moment(txtTaskdate1, 'DD/MM/YYYY').format('YYYY/MM/DD');
var txtstatus1=document.getElementById("txtstatus1").checked == true?1:0;
 var txtRemarks= $("#txtTask").val();
     var pkvId = $("#pkvId").val();
           var dataString = "txtRemarks="+txtRemarks+"&txtQuarter="+txtQuarter+"&txtTaskdate1=" + txtTaskdate4+"&txtstatus1=" + txtstatus4+"&Tname=Task&clientId="+txtclientId+"&pkvId=" + pkvId+"&mtype=1&update=";
//alert(dataString);
               if ($.trim(txtTaskdate1).length > 0  ) {
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
							alert("Updated Successfully");
         window.location.href="silicontask.php";
		 
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
   
	
	  $("#update4").click(function() {
		  
	        var txtclientId = $("#txtclientId").val();

var txtTaskdate4= $("#txtTaskdate4").val();
txtTaskdate4= moment(txtTaskdate4, 'DD/MM/YYYY').format('YYYY/MM/DD');
var txtstatus4= document.getElementById("txtstatus4").checked == true?1:0;
var txtRemarks= $("#txtTask").val();
     var pkvId = $("#pkvId").val();
           var dataString = "txtRemarks="+txtRemarks+"&txtTaskdate4=" + txtTaskdate4+"&txtstatus4=" + txtstatus4+"&Tname=Task&clientId="+txtclientId+"&pkvId=" + pkvId+"&mtype=2&update=";

                   if ($.trim(txtTaskdate4).length > 0  ) {
                $.ajax({
                    type: "GET",
                    url: "sub/updatecommon.php",
              // alert(url);
                    data: dataString,
                    crossDomain: true,
                    cache: false,
                    beforeSend: function() {
                        $("#update4").val('Connecting...');
                    },
                    success: function(data) {
						//alert("hii");
   //alert($.trim(data));
                        if ($.trim(data) == "success") {
			alert("Updated Successfully");
            window.location.href="silicontask.php";
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



  $("#save").css('display','none');

	    var txtclientId = $("#txtclientId").val();
  var url = "sub/bind_list.php?cid="+pkval+"&tbl=Task&clientId="+txtclientId;
//alert(url);
  $.getJSON(url, function(result) {

  console.log(result);
  $.each(result, function(i, field) {
    
	$("#txtQuarter").val(field.Quarter);
	$("#txtTask").val(field.Remarks);
	$("#txtSerialNo").val(field.SerialNo);
	
		$("#txtTaskdate1").val(moment(field.DataRcvDate, 'YYYY/MM/DD').format('DD/MM/YYYY')); 
	var RecvStatus1=field.RecvStatus1;
	if(RecvStatus1==0)	{ $("#update").css('display','block');
	document.getElementById("txtstatus1").checked=false; }
	else{		
		$("#update").css('display','block');
	}
	if(field.RecvStatus2==1)
	{
		$("#update").css('display','none');
		
		document.getElementById("txtQuarter").disabled=true;
		document.getElementById("txtTaskdate1").disabled=true;
		document.getElementById("txtstatus1").disabled=true;
	$("#divtask2").show();
	$("#lblTaskdate2").html(field.EntryEreturn);	
	$("#lblstatus2").html("Done");
	
	}
	if(field.RecvStatus3==1)
	{
		$("#divtask4").show();
			$("#update4").css('display','block');
				$("#update").css('display','none');
	$("#divtask3").show();
	$("#lblTaskdate3").html(field.Form27ABill);
	$("#lblstatus3").html("Done");
	}
	
	var RecvStatus4=field.RecvStatus4;

	if(RecvStatus4==0)	{ document.getElementById("txtstatus4").checked=false; }
		
	{
	
	$("#divtask4").show();
	$("#txtTaskdate4").val(field.RecvForm27ABill);
	$("#txtstatus4").val(field.RecvStatus4);
	$("#update4").css('display','block');
	}
		if(field.RecvStatus5==1)
	{
		$("#update4").css('display','none');
		document.getElementById("txtTaskdate4").disabled=true;
		document.getElementById("txtstatus4").disabled=true;
		document.getElementById("txtRemarks").disabled=true;
	$("#divtask5").show();
	$("#lblTaskdate5").html(field.UploadingFVUFile);
	$("#lblstatus5").html("Done");
	}
	
		if(field.RecvStatus6==1)
	{
	$("#divtask6").show();
	$("#lblTaskdate6").html(field.SendingPRtoCust);
	$("#lblstatus6").html("Done");
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
       <input type="hidden" id="txtclienId"/>
                    <div class="col-sm-12">
                    <div class="col-sm-5">
					 <div class="box">
                            <div class="box-body">
							  <div class="col-sm-12 nopad" id="divtask1">
							      <div class="col-sm-3">
                    <div class="form-group">
					    <span class="spn">1</span>  
                      <label>Serial No</label>
					  			  <?php  
	   
	 $query ="SELECT TaskCtr FROM Parameter where  ClientId='".$_SESSION["loginId"]."'";

 $result = mysqli_query($dbcon,$query);
   while($row=mysqli_fetch_array($result)){                                                 
   $taskCtr=$row['TaskCtr'];  
  }
?>
                    <input type="text" class="form-control pull-right" id="txtSerialNo" value="<?php echo $taskCtr; ?>" disabled/>
					
                    </div>
					</div>
							  <div class="col-sm-6">
                    <div class="form-group">
                  <label>Quarter<span style="color:red;">*</span></label><br>
              <select  id= "txtQuarter" class="form-control" >
			   <option>--Select--</option>
       <option>1</option>
	   <option>2</option>
	   <option>3</option>
	   <option>4</option>
                </select>
					</div>
					</div>
					  <div class="col-sm-6">
					  </div>
				       <div class="col-sm-8">
                    <div class="form-group">
                    <label>Data Recieved Date<span style="color:red;">*</span></label>
                 <input type="text" class="form-control" id="txtTaskdate1" placeholder="dd/mm/yyyy"/> </div>
					</div>
					 <div class="col-sm-4">
                    <div class="form-group">
                      <label>Status<span style="color:red;">*</span></label><br>
              <label><input type="checkbox" id="txtstatus1" value="1" checked>Done</label> </div>
					</div>
					</div>
					  <div class="col-sm-12 nopad" id="divtask2">
					 <div class="col-sm-8">
                    <div class="form-group"  id="gtxtTaskdate">
                      <span class="spn">2</span><label>Entry & e-return Date<span style="color:red;">*</span></label><br>
					    <div style="text-align:center;"><label class="lbl" id="lblTaskdate2">fff</label></div>
                    </div>
					</div>
					 <div class="col-sm-4">
                    <div class="form-group">
                      <label>Status</label><br>
               <label class="lbl" id="lblstatus2">fff</label>
					</div>
					</div>
					</div>
					  <div class="col-sm-12 nopad" id="divtask3">
					<div class="col-sm-8">
                    <div class="form-group"  id="gtxtTaskdate">
                      <span class="spn">3</span><label>Form 27A & Bill Sending Date</label><br>
                <div style="text-align:center;"> <label class="lbl" id="lblTaskdate3">fff</label></div>
				 </div>
					</div>
					 <div class="col-sm-4">
                    <div class="form-group">
                      <label>Status</label><br>
              <label class="lbl" id="lblstatus3">fff</label></div>
					</div>
					</div>
					  <div class="col-sm-12 nopad" id="divtask4">
					<div class="col-sm-8">
                    <div class="form-group"  id="gtxtTaskdate">
                      <span class="spn">4</span><label>Recieving of Signed Form 27A & Bill Amount Date<span style="color:red;">*</span></label>
                 <input type="text" class="form-control" id="txtTaskdate4" placeholder="dd/mm/yyyy" onchange="validte(this.value.length,'gtxtTaskdate')"/>
					   </div>
					</div>
					 <div class="col-sm-4">
                    <div class="form-group">
                      <label>Status<span style="color:red;">*</span></label><br>
              <label><input type="checkbox" id="txtstatus4" value="1" checked>Done</label> 
			  </div>
					</div>
					</div>
					  <div class="col-sm-12 nopad" id="divtask5">
					<div class="col-sm-8">
                    <div class="form-group"  id="gtxtTaskdate">
                     <span class="spn">5</span><label>Uploading of FVU File Date</label><br>
                <div style="text-align:center;"> <label class="lbl" id="lblTaskdate5">fff</label></div>
					  </div>
					</div>
					 <div class="col-sm-4">
                    <div class="form-group">
                      <label>Status</label><br>
         <label class="lbl" id="lblstatus5">fff</label></div>
					</div>
					</div>
					  <div class="col-sm-12 nopad" id="divtask6">
					<div class="col-sm-8">
                    <div class="form-group"  id="gtxtTaskdate">
                      <span class="spn">6</span><label>Sending PR to Customer Date</label><br>
               <div style="text-align:center;"> <label class="lbl" id="lblTaskdate6">fff</label></div>
					</div>
					</div>
					 <div class="col-sm-4">
                    <div class="form-group">
                      <label>Status<span style="color:red;">*</span></label><br>
           <label class="lbl" id="lblstatus6">fff</label>
		   </div>
					</div>
					</div>
					    <div class="col-sm-12">
					  <div class="col-sm-6">
					    <div class="form-group">
                      <label for="exampleInputEmail1">Remarks<span style="color:red;">*</span></label>
                     <textarea rows="4" cols="30" id="txtTask"></textarea>
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
    <input type="submit" value="Update"  id="update4" style="display:none;"  class="btn btn-primary" style="margin-left: 2%;"  onclick="return validateRForm();"/>

	<input type="hidden" class="form-control" id="txtclientId" value=<?php echo $_SESSION["loginId"];  ?> >
                  </div>
				       </div>
                </div>
                 <div class="col-sm-7" style="border-left: 1px solid #f4f4f4;">
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
        $("#txtTaskdate1").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
		$("#txtTaskdate4").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
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

	
	
	
            <?php include("footer.php");?>
