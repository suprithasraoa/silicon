
<?php include("header.php"); ?>
<?php include("dbConnect/dbConnect.php");?>
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
}


 bindgrid();
  });
  function bindnature(txtnature)
  {
	 
document.getElementById("txtnature").innerHTML="<option value='0'></option>";
var txtType=document.getElementById("txtType").value;
    var url = "sub/bind_nature.php?txtType="+txtType+"&Tname=Nature";
//alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
     $("#txtnature").append("<option value="+field.SectionId+">" + field.NatureOfPayment + "</option>");
    });
if(txtnature!=0)
{
	
	$("#txtnature").val(txtnature).change();
}
    }); 
  }
  function GetSelectedTextValue()
  {
	  var txtId=document.getElementById("txtnature").value;
    var url = "sub/bind_nature.php?txtId="+txtId+"&Tname=sec";
//alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
   document.getElementById("lblsection").innerHTML=field.Description;
    });

    }); 
  }
    function bindgrid(ddlshow) {

	var txtclientId = $("#txtclientId").val();		
		var ddlshowval = $("#ddlshow").val();
			var txtdate=document.getElementById("txtdate").value;
		var txtenddate=document.getElementById("txtenddate").value;
    document.getElementById('sTableRow').innerHTML="";
    document.getElementById('sTableRow').innerHTML="<thead><tr><th>#</th><th>Quarter</th><th>Inc. Tax</th><th>DeducteeChallan No.</th><th>Date</th><th>BSR Code</th><th>Action</th></tr></thead><tbody>";
    var slno=0;
	var ahref="";
 var txtclientId = $("#txtclientId").val();
    var url = "sub/bind_list.php?show=" +ddlshowval+"&txtdate="+txtdate+"&txtenddate="+txtenddate+"&cid=0&tbl=DeducteeChallan&clientId="+txtclientId;
//alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
    var id= field.Id;
 	slno++;
	str=field.ChallanDate;
	   str=  str.substr(0,str.indexOf(' '));
	     var mnth=moment(str, 'DD/MM/YYYY').format('MMMM');
	      var mnt=moment(str, 'DD/MM/YYYY').format('MM');
	 var QuarterId="4";
		if(mnt=="04" || mnt=="05" || mnt=="06" )
		{
			QuarterId="1";
		}
		else if(mnt=="07" || mnt=="08" || mnt=="09" )
		{
			QuarterId="2";
		}
		else if(mnt=="10" || mnt=="11" || mnt=="12" )
		{
			QuarterId="3";
		}
    ahref="<a class='Myedit' id='Myedit' href='javascript:FillCtrl("+id+")'><i class='fa fa-pencil' aria-hidden='true' ></i></a>  | <a onclick='javascript:confirmationDelete($(this));return false;' href='javascript:DeleteRecord("+id+")'><i class='fa fa-times' aria-hidden='true' ></i></a>";
      
    $("#sTableRow").append("<tr><td>"+slno+"</td><td>"+QuarterId+":"+mnth+"</td><td style='font-size: 11px;'>"+field.IncomeTax+"</td><td style='font-size: 13px;'>"+field.ChallanNo+"</td><td style='font-size: 13px;'>"+str+"</td><td style='font-size: 13px;'>"+field.BSRCode+"</td><td>"+ahref);
    
      $("#sTableRow").append("</td></tr>");
      $("#sTableRow").append("</tbody>");
	         document.getElementById("lblstart").innerHTML="1";  
    });
	 document.getElementById("lbloutof").innerHTML=slno;
	 if(slno==0)
	 {
		 document.getElementById("lblstart").innerHTML="0";  
	 }
	gettotalRec();
   
    });
	

    }
	function gettotalRec()
	{
		var txtclientId = $("#txtclientId").val();		
		var url = "sub/bind_alltotal.php?Tname=DeducteeChallan&clientId="+txtclientId;
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
    if (document.getElementById("txtname").value == "") {
    $("#gtxtname").attr('class', 'form-group has-error');
  document.getElementById("txtname").focus();
  return false;
  }
 
   
    if (document.getElementById("txtmobile").value == "") {
  $("#gtxtmobile").attr('class', 'form-group has-error');
  document.getElementById("txtmobile").focus();
  return false;
  }

   
    if (document.getElementById("txtPanRef").value == "") {
   $("#gtxtPanRef").attr('class', 'form-group has-error');
  document.getElementById("txtPanRef").focus();
  return false;
  }

  }
   $(document).ready(function() {
	 
	   
	   
  $("#save").click(function() {

      var txtSerial = $("#txtSerialNo").val();  
       var txtIncomeTax = $("#txtIncomeTax").val();
        var txtChallanNo = $("#txtChallanNo").val(); 
         var txtBankdate = $("#txtBankdate").val();  
		 var mnt=moment(txtBankdate, 'DD/MM/YYYY').format('MM');
		 		 var QuarterId="4";
		if(mnt=="04" || mnt=="05" || mnt=="06" )
		{
			QuarterId="1";
		}
		else if(mnt=="07" || mnt=="08" || mnt=="09" )
		{
			QuarterId="2";
		}
		else if(mnt=="10" || mnt=="11" || mnt=="12" )
		{
			QuarterId="3";
		}
		txtBankdate= moment(txtBankdate, 'DD/MM/YYYY').format('YYYY/MM/DD');
       var txtBSRCode = $("#txtBSRCode").val();
	   var txtRemarks = $("#txtRemarks").val();
	  var txtType= $("#txtType").val();
	  var txtnature= $("#txtnature").val();
	  var sect= document.getElementById("lblsection").innerHTML;
	
	    var txtclientId = $("#txtclientId").val();
                var dataString = "txtSerial="+txtSerial+"&txtIncomeTax="+txtIncomeTax+"&txtChallanNo="+txtChallanNo+"&txtBankdate=" + txtBankdate+"&txtBSRCode=" + txtBSRCode+"&txtRemarks=" + txtRemarks+"&QuarterId="+QuarterId+"&clientId="+txtclientId+"&txtType="+txtType+"&txtnature="+txtnature+"&sect="+sect+"&Tname=DeducteeChallan&save=";

//alert(dataString);
            if ($.trim(txtIncomeTax).length > 0 && $.trim(txtChallanNo).length > 0 ) {
         
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
          alert($.trim(data));
                        if ($.trim(data) == "success") {

                $("#save").val('Save');
window.location.href="DeducteeChallan.php";
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
          
      var txtSerial = $("#txtSerialNo").val();  
       var txtIncomeTax = $("#txtIncomeTax").val();
        var txtChallanNo = $("#txtChallanNo").val(); 
         var txtBankdate = $("#txtBankdate").val();  
		 var mnt=moment(txtBankdate, 'DD/MM/YYYY').format('MM');
		 		 var QuarterId="4";
		if(mnt=="04" || mnt=="05" || mnt=="06" )
		{
			QuarterId="1";
		}
		else if(mnt=="07" || mnt=="08" || mnt=="09" )
		{
			QuarterId="2";
		}
		else if(mnt=="10" || mnt=="11" || mnt=="12" )
		{
			QuarterId="3";
		}
		txtBankdate= moment(txtBankdate, 'DD/MM/YYYY').format('YYYY/MM/DD');
       var txtBSRCode = $("#txtBSRCode").val();
	   var txtRemarks = $("#txtRemarks").val();
	  var txtType= $("#txtType").val();
	  var txtnature= $("#txtnature").val();
	  var sect= document.getElementById("lblsection").innerHTML;
	
	    var txtclientId = $("#txtclientId").val();
     var pkvId = $("#pkvId").val();
           var dataString = "txtSerial="+txtSerial+"&txtIncomeTax="+txtIncomeTax+"&txtChallanNo="+txtChallanNo+"&txtBankdate=" + txtBankdate+"&txtBSRCode=" + txtBSRCode+"&txtRemarks=" + txtRemarks+"&QuarterId="+QuarterId+"&clientId="+txtclientId+"&txtType="+txtType+"&txtnature="+txtnature+"&sect="+sect+"&Tname=DeducteeChallan&pkvId=" + pkvId+"&update=";
//alert(dataString);
                        if ($.trim(txtIncomeTax).length > 0 && $.trim(txtChallanNo).length > 0 ) {
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

                        if ($.trim(data) == "success") {
               $("#update").val('Update');
window.location.href="DeducteeChallan.php";  
        alert("Deductee Challan Updated Successfully");
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

 var txtclientId = $("#txtclientId").val();	
  var url = "sub/bind_list.php?cid="+pkval+"&tbl=DeducteeChallan&clientId="+txtclientId;
  //alert(url);
  $.getJSON(url, function(result) {

  console.log(result);
  $.each(result, function(i, field) {
   
     $("#txtSerialNo").val(field.SerialNo);  
       $("#txtIncomeTax").val(field.IncomeTax);
        $("#txtChallanNo").val(field.ChallanNo); 
		//alert(field.ChallanDate);
		var cdate=field.ChallanDate;
		cdate=moment(cdate, 'YYYY/MM/DD').format('DD/MM/YYYY');
         $("#txtBankdate").val(cdate);  

    $("#txtBSRCode").val(field.BSRCode);
	    $("#txtRemarks").val(field.Remarks);
		$("#pkvId").val(field.Id);
	
$("#txtType").val(field.TypeId);
//.change();
 bindnature(field.NatureId);
//$("#txtnature").val(field.NatureId).change();
  });
  });


  }

   function DeleteRecord(pkval)
  {

  var url = "sub/deletecommon.php?pkvId="+pkval+"&Tname=DeducteeChallan";
  //alert(url);
  $.getJSON(url, function(result) {

  console.log(result);
 
   if (result == "success") {
							
 alert('DeducteeChallan Deleted Successfully!');
	window.location.href="DeducteeChallan.php"; 
				 }                       
						
	else if (result == "error") {
	alert('Sorry! Something went wrong..');
                                                   }
						
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
                  <h3 class="box-title">Deductee Challan</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  
                    <div class="col-sm-12">
                    <div class="col-sm-6">
					<div class="box">
                 <div class="box-body">
                   	 
                
				       <div class="col-sm-3">
                    <div class="form-group">
                      <label>Serial No</label>
					  			  <?php  
	   
	 $query ="SELECT DeducteeChallanCtr FROM Parameter  where  ClientId='".$_SESSION["loginId"]."'";

 $result = mysqli_query($dbcon,$query);
   while($row=mysqli_fetch_array($result)){                                                 
   $DeducteeChallanCtr=$row['DeducteeChallanCtr'];  
  }
?>
                    <input type="text" class="form-control pull-right" id="txtSerialNo" value="<?php echo $DeducteeChallanCtr; ?>" disabled/>
					
                    </div>
					</div>
				   <div class="col-sm-3">
                    <div class="form-group">
                      <label>Quarter</label>
					<select class="form-control" id="txtquarter" required="">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </select>
                    </div>
					</div>
					  <div class="col-sm-6">
					    <div class="form-group" id="gtxtIncomeTax">
                      <label for="exampleInputEmail1">Income Tax<span style="color:red;">*</span></label>
                     <input type="number" class="form-control" id="txtIncomeTax" placeholder="Rs." required/>
					 
                    </div>
					  </div>
					    
			
                <div class="col-sm-6">
                   <div class="form-group" id="gtxtChallanNo">
                      <label>Bank Challan No.<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="txtChallanNo" placeholder="Enter Bank Challan No." required/>
                    </div>
                  </div> 
				  
				   <div class="col-sm-6">
                   <div class="form-group" id="gtxtBankdate">
                      <label>Date<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="txtBankdate" placeholder="dd/mm/yyyy" required/>
                    </div>
                  </div> 
			<div class="col-sm-6">
                   <div class="form-group" id="gtxtBSRCode">
                      <label>BSR Code<span style="color:red;">*</span></label>
					  
                      <input type="text" class="form-control" id="txtBSRCode" placeholder="Enter BSR Code" required/>
                    </div>
                  </div> 
				   <div class="col-sm-6">

                   <div class="form-group">
                      <label>Remarks</label>
                      <input type="text" class="form-control" id="txtRemarks" placeholder="Enter Remarks"/>
				
                    </div>
                 
                </div>
			
				 <div class="col-sm-6">
                   <div class="form-group" id="gtxtType" onchange="bindnature(0);">
                      <label>Type<span style="color:red;">*</span></label>
					 	    <select class="form-control" id="txtType" required>
                        <option>--Select--</option>
						<option value="1">Form 26Q</option>
                        <option value="2">Form 27Q</option>
                      </select>
                    </div>
                  </div> 
				   
				
				   <div class="col-sm-6">
                   <div class="form-group" id="gtxtnature">
                      <label>Nature of Transaction<span style="color:red;">*</span></label>
                     <select id="txtnature" class="form-control" onchange="GetSelectedTextValue();">
	<option value="0"></option>
</select>
                    </div>
                  </div> 
				   <div class="col-sm-6">

                   <div class="form-group">
                      <label>Section</label><br>
                <label id="lblsection" style="font-weight: 100;">-</label>
                    </div>
                 
                </div>
				  </div>
  <div class="box-footer">
				  <input type="hidden" id="pkvId">
				  <input  type="submit" value="Save"  id="save"  class="btn btn-primary" style="margin-left: 2%;margin-bottom:20px;"  />
       
      <input type="submit" value="Update"  id="update" style="display:none;"  class="btn btn-primary" style="margin-left: 2%;margin-bottom:20px;" />
      <input type="hidden" class="form-control" id="txtclientId" value=<?php echo $_SESSION["loginId"];  ?> >
                   </div>
				 </div>
                </div>
                 <div class="col-sm-6" style="border-left: 1px solid #f4f4f4;">
              
					  
                  
				 
				    <div class="box">
                  <div class="box-header with-border">
				   <div class="col-lg-3 ">
                  <h3 class="box-title">View Deductee Challan</h3>
				  
                    </div>
          <div class="col-lg-1">
		
		        </div>
                    <div class="col-lg-4 ">
					<label>Search From Date</label>
                      <input type="date" class="form-control input-sm" name="txtdate" id="txtdate"  onchange="bindgrid();"   placeholder="Search Date">
                  
                    </div>
					 <div class="col-lg-4 ">
					 	<label>To Date</label>
                      <input type="date" class="form-control input-sm" name="txtenddate" id="txtenddate"  onchange="bindgrid();"   placeholder="Search Date">
                    
                    </div>
                 
				  
				  <!-- /.box-tools -->
                </div><!-- /.box-header -->
         <div class="box-body">
                  <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"><div id="example1_length" class="dataTables_length"><label><select  id="ddlshow" onchange="bindgrid();"  size="1" name="example1_length" aria-controls="example1"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> records per page</label></div></div><div class="col-xs-6"></div></div>
				  <table class="table table-bordered table-hover table-striped" id="sTableRow">

                  </table>
					  
					 <div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example1_info">Showing <label id="lblstart">0</label> to <label id="lbloutof">0</label> of <label id="lblrec">0</label> entries</div>
					  </div>
					  <div class="col-xs-6"></div></div></div>
                </div><!-- /.box-body -->
              </div>
					
				 
				 
                  
                   
                  </div><!-- /.box-body -->

              
                  </form>
                </div><!-- /.box-body -->
	
        
            </div>
		   

        </section>
      </div>






        <script type="text/javascript">
      $(function () {
        //Datemask dd/mm/yyyy
        $("#txtBankdate").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
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
