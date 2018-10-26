
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
 bindgrid();
  });
    function bindgrid(ddlshow) {
		
		var ddlshowval=document.getElementById('ddlshow').value;
		
    document.getElementById('sTableRow').innerHTML="";
    document.getElementById('sTableRow').innerHTML="<thead><tr><th>#</th><th>Inc. Tax</th><th>Challan No.</th><th>Date</th><th>BSR Code</th><th>Action</th></tr></thead><tbody>";
    var slno=0;
	var ahref="";

    var url = "sub/bind_list.php?show=" +ddlshowval+"&cid=0&tbl=Challan";
//alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
    var id= field.Id;
 	slno++;
	str=field.ChallanDate;
	   str=  str.substr(0,str.indexOf(' '));
    ahref="<a class='Myedit' id='Myedit' href='javascript:FillCtrl("+id+")'><i class='fa fa-pencil' aria-hidden='true' ></i></a>  | <a onclick='javascript:confirmationDelete($(this));return false;' href='javascript:DeleteRecord("+id+")'><i class='fa fa-times' aria-hidden='true' ></i></a>";
      
    $("#sTableRow").append("<tr><td>"+slno+"</td><td style='font-size: 11px;'>"+field.IncomeTax+"</td><td style='font-size: 13px;'>"+field.ChallanNo+"</td><td style='font-size: 13px;'>"+str+"</td><td style='font-size: 13px;'>"+field.BSRCode+"</td><td>"+ahref);
    
      $("#sTableRow").append("</td></tr>");
      $("#sTableRow").append("</tbody>");
    });
	//gettotalRec();
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
                var dataString = "txtSerial="+txtSerial+"&txtIncomeTax="+txtIncomeTax+"&txtChallanNo="+txtChallanNo+"&txtBankdate=" + txtBankdate+"&txtBSRCode=" + txtBSRCode+"&txtRemarks=" + txtRemarks+"&QuarterId="+QuarterId+"&Tname=Challan&save=";
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

  window.location.href="Challan.php";  
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
        var txtSerial = $("#txtSerial").val();  
            var txtname = $("#txtname").val();
	 var txtmobile = $("#txtmobile").val(); 
    
        var txtPan = $("#txtPan").val();  
       var txtPanRef = $("#txtPanRef").val();
     	   var txtDesig = $("#txtDesig").val();
     var pkvId = $("#pkvId").val();
           var dataString = "txtSerial="+txtSerial+"&txtname="+txtname+"&txtDesig="+txtDesig+"&txtmobile=" + txtmobile+"&txtPan=" + txtPan+"&txtPanRef=" + txtPanRef+"&Tname=Employee&pkvId=" + pkvId+"&update=";
//alert(dataString);
             if ($.trim(txtname).length > 0 && $.trim(txtPanRef).length > 0 ) {
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
       alert($.trim(data));
                        if ($.trim(data) == "success") {
               $("#update").val('Update');
window.location.href="Employee.php";  
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


  var url = "sub/bind_list.php?cid="+pkval+"&tbl=Employee";
  //alert(url);
  $.getJSON(url, function(result) {

  console.log(result);
  $.each(result, function(i, field) {
   
	$("#txtSerial").val(field.SerialNo);
	$("#txtname").val(field.Name);
	$("#txtDesig").val(field.DesignationId);
	$("#txtmobile").val(field.Mobile);
	$("#txtPan").val(field.Pan);
	$("#txtPanRef").val(field.PanNo);
		$("#pkvId").val(field.Id);
  });
  });


  }

   function DeleteRecord(pkval)
  {

  var url = "sub/deletecommon.php?pkvId="+pkval+"&Tname=Employee";
  //alert(url);
  $.getJSON(url, function(result) {

  console.log(result);
 
   if (result == "success") {
							
 alert('Employee Deleted Successfully!');
	window.location.href="Employee.php"; 
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
                  <h3 class="box-title">Challan</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                    <div class="col-sm-12">
                    <div class="col-sm-6">
                 
                   
                
				       <div class="col-sm-3">
                    <div class="form-group">
                      <label>Serial No</label>
					  			  <?php  
	   
	 $query ="SELECT ChallanCtr FROM Parameter where Id=1";

 $result = mysqli_query($dbcon,$query);
   while($row=mysqli_fetch_array($result)){                                                 
   $ChallanCtr=$row['ChallanCtr'];  
  }
?>
                    <input type="text" class="form-control pull-right" id="txtSerialNo" value="<?php echo $ChallanCtr; ?>" disabled/>
					
                    </div>
					</div>
				
					  <div class="col-sm-9">
					    <div class="form-group" id="gtxtIncomeTax">
                      <label for="exampleInputEmail1">Income Tax</label>
                     <input type="number" class="form-control" id="txtIncomeTax" placeholder="Rs." required/>
					 
                    </div>
					  </div>
					    
			
                <div class="col-sm-6">
                   <div class="form-group" id="gtxtChallanNo">
                      <label>Bank Challan No.</label>
                      <input type="text" class="form-control" id="txtChallanNo" placeholder="Enter Bank Challan No." required/>
                    </div>
                  </div> 
				  
				   <div class="col-sm-6">
                   <div class="form-group" id="gtxtBankdate">
                      <label>Date</label>
                      <input type="text" class="form-control" id="txtBankdate" placeholder="dd/mm/yyyy" required/>
                    </div>
                  </div> 
			
				  
				 
				   <div class="col-sm-6">
                   <div class="form-group" id="txtBSRCode">
                      <label>BSR Code</label>
                      <input type="text" class="form-control" id="txtBSRCode" placeholder="Enter BSR Code" required/>
                    </div>
                  </div> 
				   <div class="col-sm-6">

                   <div class="form-group">
                      <label>Remarks</label>
                      <input type="text" class="form-control" id="txtRemarks" placeholder="Enter Remarks"/>
                    </div>
                 
                </div>
 
				
                </div>
                 <div class="col-sm-6" style="border-left: 1px solid #f4f4f4;">
              
					  
                  
				 
				    <div class="box">
                <div class="box-header">
                  <h3 class="box-title">View Challan</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"><div id="example1_length" class="dataTables_length"><label><select id="ddlshow"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> records per page</label></div></div><div class="col-xs-6"><div class="dataTables_filter" id="example1_filter"><label>Search: <input type="text" aria-controls="example1"></label></div></div></div>
				  <table class="table table-bordered table-hover table-striped" id="sTableRow">

                  </table>
					  
					  <div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example1_info">Showing 1 to 10 of 57 entries</div>
					  </div>
					  <div class="col-xs-6"></div></div></div>
                </div><!-- /.box-body -->
              </div>
					
				 
				 
                  
                   
                  </div><!-- /.box-body -->

                  
                </form>
              </div><!-- /.box -->

             

                  
                  </form>
                </div><!-- /.box-body -->
		  <div class="box-footer" style="margin-left: 4%;">
				  <input type="hidden" id="pkvId">
				  <input  type="submit" value="Save"  id="save"  class="btn btn-primary" onclick="return validateRForm();" />
       
      <input type="submit" value="Update"  id="update" style="display:none;"  class="btn btn-primary" onclick="return validateRForm();"/>
    
                   </div>
              </div><!-- /.box -->
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
