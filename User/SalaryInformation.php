<?php include("header.php");  ?>
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
<script>
  $(document).ready(function() {
 bindgrid();
  });
</script>
<script>
function validte(inputlngth,attrb)
{
if(inputlngth>0)
{
  $("#"+attrb).attr('class', 'form-group');
}
}

function bindChallanDetails()
{
	 var txtchallanSerialNo=document.getElementById('txtchallanSerialNo').value;
	     var url = "sub/bind_Details.php?cid="+txtchallanSerialNo+"&tbl=Challan";
         //alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
 document.getElementById('txtChallanNo').value=field.ChallanNo;
   document.getElementById('txtIncomeTax').value=field.IncomeTax;
   var str=field.ChallanDate;
 str=  str.substr(0,str.indexOf(' '));
   document.getElementById('txtChallanDate').value=str;
 
  var inctax=document.getElementById('txtIncTax').value;
  var finlamt=parseFloat(field.IncomeTax)-parseFloat(inctax);
   document.getElementById('avbl').innerHTML=finlamt;
    });
    });
}
  
    function bindgrid(ddlshow) {
		
		var ddlshowval="10";
		
    document.getElementById('sTableRow').innerHTML="";
    document.getElementById('sTableRow').innerHTML="<thead><tr><th>#</th><th>Emp. Name</th><th>Amt</th><th>Tax Deducted Date</th><th>Income Tax</th><Challan Sl. No.<th>Action</th></tr></thead><tbody>";
    var slno=0;
	var ahref="";

    var url = "sub/bind_list.php?show=" +ddlshowval+"&cid=0&tbl=SalaryInformation";
//alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
    var id= field.Id;
 	slno++;
	  
    ahref="<a class='Myedit' id='Myedit' href='javascript:FillCtrl("+id+")'><i class='fa fa-pencil' aria-hidden='true' ></i></a>  | <a onclick='javascript:confirmationDelete($(this));return false;' href='javascript:DeleteRecord("+id+")'><i class='fa fa-times' aria-hidden='true' ></i></a>";
      
    $("#sTableRow").append("<tr><td>"+slno+"</td><td style='font-size: 11px;'>"+field.empname+"</td><td style='font-size: 13px;'>"+field.Amount+"</td><td style='font-size: 13px;'>"+field.TaxDeductedDate+"</td><td style='font-size: 13px;'>"+field.IncTax+"</td><td style='font-size: 13px;'>"+field.challanname+"</td><td>"+ahref);
    
      $("#sTableRow").append("</td></tr>");
      $("#sTableRow").append("</tbody>");
    });
	//gettotalRec();
    });
	

    }
 function validateRForm() {
	 var es = document.getElementById("txtEmployeeId");
                var strUsers = es.options[es.selectedIndex].value;
                if(strUsers==0)
                {
					  $("#gtxtEmployeeId").attr('class', 'form-group has-error');
  document.getElementById("txtEmployeeId").focus();
                return false;
                }
    if (document.getElementById("txtAmount").value == "") {
    $("#gtxtAmount").attr('class', 'form-group has-error');
  document.getElementById("txtAmount").focus();
  return false;
  }
     if (document.getElementById("txtPaidDate").value == "") {
    $("#gtxtPaidDate").attr('class', 'form-group has-error');
  document.getElementById("txtPaidDate").focus();
  return false;
  }
     if (document.getElementById("txtTaxDeductedDate").value == "") {
  $("#gtxtTaxDeductedDate").attr('class', 'form-group has-error');
  document.getElementById("txtTaxDeductedDate").focus();
  return false;
  }
   
   if (document.getElementById("txtIncTax").value == "") {
  $("#gtxtIncTax").attr('class', 'form-group has-error');
  document.getElementById("txtIncTax").focus();
  return false;
  }
   
  var es1 = document.getElementById("txtChallanId");
                var strUsers1 = es1.options[es1.selectedIndex].value;
                if(strUsers1==0)
                {
					  $("#gtxtChallanId").attr('class', 'form-group has-error');
  document.getElementById("txtChallanId").focus();
                return false;
                }

  }
   $(document).ready(function() {
      
     
     
  $("#save").click(function() {
	  
      var txtSerial = $("#txtSerialNo").val();
       var txtEmployeeId = $("#txtEmployeeId").val();   
       var txtAmount = $("#txtAmount").val();
       var txtPaidDate = $("#txtPaidDate").val();   
       var txtTaxDeductedDate = $("#txtTaxDeductedDate").val();   
       var txtIncTax = $("#txtIncTax").val();
       var txtSurchargeAmt = $("#txtSurchargeAmt").val(); 
       var txtEduCessAmt = $("#txtEduCessAmt").val();
       var txtChallanId = $("#txtchallanSerialNo").val();   
       var txtIncomeTax = $("#txtIncomeTax").val();
	     var txtTaxDeducted = $("#txtTaxDeducted").val();
	
		 var es = document.getElementById("txtEmployeeId");
       var strUsers = es.options[es.selectedIndex].value;

	   var es1 = document.getElementById("txtchallanSerialNo");
       var strUsers1 = es1.options[es1.selectedIndex].value;
	   	 
                var dataString = "txtSerial="+txtSerial+"&txtEmployeeId=" + txtEmployeeId+"&txtAmount="+txtAmount+"&txtTaxDeducted="+txtTaxDeducted+"&txtPaidDate=" + txtPaidDate+"&txtTaxDeductedDate="+txtTaxDeductedDate+"&txtIncTax=" + txtIncTax+"&txtSurchargeAmt=" + txtSurchargeAmt+"&txtEduCessAmt="+txtEduCessAmt+"&txtChallanId=" + txtChallanId+"&txtIncomeTax=" + txtIncomeTax+"&Tname=SalaryInformation&save=";
alert(dataString);
            if ($.trim(txtAmount).length > 0 && $.trim(strUsers) > 0 && $.trim(strUsers1) > 0 && $.trim(txtPaidDate).length > 0 && $.trim(txtTaxDeductedDate).length > 0 && $.trim(txtIncTax).length > 0 ) {
         
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

                window.location.href="SalaryInformation.php";  
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
       var txtAgencyName = $("#txtAgencyName").val();
       var txtTerminalId = $("#txtTerminalId").val();   
       var txtContactNo = $("#txtContactNo").val();
       var txtEmailId = $("#txtEmailId").val();   
       var txtAddress1 = $("#txtAddress1").val();
       var txtAddress2 = $("#txtAddress2").val();   
       var txtAddress3 = $("#txtAddress3").val();
       var txtCity = $("#txtCity").val(); 
       var txtState = $("#txtState").val();
       var txtPincode = $("#txtPincode").val();   
       var txtTopup = $("#txtTopup").val();
       var txtCredit = $("#txtCredit").val(); 
       var txtOutstanding = $("#txtOutstanding").val();
        var txtUsername = $("#txtUsername").val();  
       var txtPassword = $("#txtPassword").val(); 


     var pkvId = $("#pkvId").val();
           var dataString = "txtAgencyName="+txtAgencyName+"&txtTerminalId=" + txtTerminalId+"&txtContactNo="+txtContactNo+"&txtEmailId=" + txtEmailId+"&txtAddress1="+txtAddress1+"&txtAddress2=" + txtAddress2+"&txtAddress3="+txtAddress3+"&txtCity=" + txtCity+"&txtState="+txtState+"&txtPincode=" + txtPincode+"&txtTopup=" + txtTopup+"&txtCredit="+txtCredit+"&txtOutstanding=" + txtOutstanding+"&txtUsername=" + txtUsername+"&txtPassword=" + txtPassword+"&pkvId=" + pkvId+"&Tname=Agent&update=";
alert(dataString);
            if ($.trim(txtAgencyName).length > 0 && $.trim(txtTerminalId).length > 0 && $.trim(txtContactNo).length > 0 && $.trim(txtEmailId).length > 0 && $.trim(txtAddress1).length > 0 && $.trim(txtAddress2).length > 0 && $.trim(txtAddress3).length > 0 && $.trim(txtCity).length > 0 && $.trim(txtState).length > 0 && $.trim(txtPincode).length > 0 && $.trim(txtTopup).length > 0  && $.trim(txtOutstanding).length > 0 && $.trim(txtUsername).length > 0 && $.trim(txtPassword).length > 0 ) {
                $.ajax({
                    type: "GET",
                    url: "sub/updateagent.php",
                    //alert(url);
                    data: dataString,
                    crossDomain: true,
                    cache: false,
                    beforeSend: function() {
                        $("#update").val('Connecting...');
                    },
                    success: function(data) {
        //alert($.trim(data));
                        if ($.trim(data) == "success") {
               $("#update").val('Update');
 alert('Agent Updated Successfully!');
  window.location.href="Agent.php"; 
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

<div class="content-wrapper">
<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Salary Information</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
				  
				  <div class="col-lg-12">
				   <div class="col-sm-6">
                    <div class="col-sm-12">
                    <div class="">
                 
                   
                
                  
				       <div class="col-sm-3">
                    <div class="form-group">
                      <label>Serial No</label>

							  <?php  
	   
	 $query ="SELECT SalaryCtr FROM Parameter where Id=1";

 $result = mysqli_query($dbcon,$query);
   while($row=mysqli_fetch_array($result)){                                                 
   $salctr=$row['SalaryCtr'];  
  }
?>
                      <input type="Number" class="form-control" id="txtSerialNo" value="<?php echo $salctr; ?>" disabled>
                    </div>
					</div>
					 
					  <div class="col-sm-9">
					  <div class="col-sm-12">
					   <label>Employee Name</label>
					  </div>
				
					    <div class="form-group" id="gtxtEmployeeId">
                    <select  id= "txtEmployeeId" class="form-control" onchange="validte(this.value.length,'gtxtEmployeeId')"  >
         <?php  $query ="SELECT 0  AS Id,'--select--' AS Ename UNION ALL SELECT Id,CONCAT(NAME,' (',SerialNo,') - ',DesignationId) AS Ename FROM Employee ORDER BY Ename ASC";

    $result = mysqli_query($dbcon,$query);
    while($row=mysqli_fetch_array($result)){                                                 
       echo "<option value='".$row['Id']."'>".$row['Ename']."</option>";       
    }
?>

                </select>
                  <!--   <input type="text" class="form-control" id="txtname" placeholder="Name" onchange="validte(this.value.length,'gtxtname')"/> -->
                    </div>
					   
				
					
					
					  </div>
					 
                   <div class="col-sm-6">
                    <div class="form-group" id="gtxtAmount">
                      <label>Amount of Payment</label>
                      <input type="number" class="form-control" id="txtAmount" placeholder="Rs." onchange="validte(this.value.length,'gtxtAmount')" />
					   
                    </div>
                  </div>
				
				    <div class="col-sm-6">
                    <div class="form-group" id="gtxtPaidDate">
                     <label>Paid/Credited Date</label>
					   <input type="text" class="form-control" id="txtPaidDate" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required onchange="validte(this.value.length,'gtxtPaidDate')" />
		
                    </div>
                  </div>
				
				       <div class="col-sm-12 nopad">
				       <div class="col-sm-6">
                    <div class="form-group" id="gtxtTaxDeductedDate">
                      <label>Tax Deducted Date</label>
					      <input type="text" class="form-control" id="txtTaxDeductedDate" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required onchange="validte(this.value.length,'gtxtTaxDeductedDate')" />
                   
                    </div>
					</div>
					     <div class="col-sm-6 nopad">
					  <div class="col-sm-12" id="gtxtIncTax">
                      <label>Income Tax</label>
                  </div>
                   <div class="col-sm-12">
                   <div class="form-group">
                       <input type="number" class="form-control" id="txtIncTax" placeholder="Rs." onchange="bindChallanDetails()"/>
                    </div>
                  </div>
				   </div>
					 </div>
				  <div class="col-sm-6 nopad">
				   <div class="col-sm-12">
                   <label>Surcharge(% and Amt)</label>
                  </div>
                   <div class="col-sm-3" style="padding-right:0px;">
                   <div class="form-group">
                      <input type="number" class="form-control" id="txtSurchargeAmtP" placeholder="%"/>
                    </div>
                  </div>
                    <div class="col-sm-9">
                   <div class="form-group">
                      <input type="number" class="form-control" id="txtSurchargeAmt" placeholder="Rs."/>
                    </div>
                  </div> 
				  </div>
				    <div class="col-sm-6 nopad">
				  <div class="col-sm-12">
                 <label>Edu Cess(% and Amt)</label>
                  </div>
				  <div class="col-sm-3" style="padding-right:0px;">
                   <div class="form-group">
                      <input type="number" class="form-control" id="txtEduCessAmtP" placeholder="%"/>
                    </div>
                  </div>
              <div class="col-sm-9">
                   <div class="form-group">
                   <input type="number" class="form-control" id="txtEduCessAmt" placeholder="Rs."/>
                    </div>
                  </div>
				 </div>
				 <div class="col-sm-6">
                    <div class="form-group" id="gtxtTaxDeductedDate">
                      <label>Tax Deducted</label>
					      <input type="number" class="form-control" id="txtTaxDeducted" />
                   
                    </div>
					</div>
                </div>
                 <div class="">
           
				
				  
				  
				  <div class="col-sm-12">
			   <div class="panel panel-info">
    <div class="panel-heading">Challan Details</div>
    <div class="panel-body">

				 <div class="col-sm-6">
                    <div class="form-group" id="gtxtChallanId">
                      <label for="exampleInputPassword1">Serial No.</label>
						    <select  id= "txtchallanSerialNo" class="form-control" onchange="bindChallanDetails();">
         <?php  $query ="SELECT 0  AS Id,'--select--' AS ChallanNo UNION ALL SELECT Id,CONCAT(SerialNo,':Quarter ',QuarterId)AS ChallanNo  FROM Challan";

    $result = mysqli_query($dbcon,$query);
    while($row=mysqli_fetch_array($result)){                                                 
       echo "<option value='".$row['Id']."'>".$row['ChallanNo']."</option>";       
    }
?>
                </select>
                    </div>
                  </div>
 <div class="col-sm-6">
                    <div class="form-group" id="gtxtChallanId">
                      <label for="exampleInputPassword1">Challan/Voucher No.</label>
					
                      <input type="text" class="form-control" id="txtChallanNo" disabled>
                    </div>
                  </div>
				  <div class="col-sm-6">
                     <div class="form-group">
                     <label for="exampleInputPassword1">Challan Date</label>
					   <input type="text" class="form-control" id="txtChallanDate" disabled/>
                    </div>
                  </div>
				  
				  
				  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Income Tax</label>
                            <input type="text" class="form-control" id="txtIncomeTax" disabled>
                    </div>
                  </div>
				   <div class="col-sm-6">
                    <div class="form-group" id="gtxtChallanId">
                      <label for="exampleInputPassword1">Avlb. Balance : </label>
					
                       <label id="avbl">-</label>
                    </div>
                  </div>
		  <div class="col-lg-12">
				  <div class="col-lg-6">
				  <div class="alert alert-success alert-dismissable" id="alert-success" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6>	<i class="icon fa fa-check"></i> Salary Information Details Submitted Successfully!</h6>
                    </div>
                  </div>
			</div>
			
	</div>
  </div>
                
				</div>
				</div>
                  
                   
                  </div><!-- /.box-body -->
				  
				  </div>
				    
					
					
					
					<div class="col-sm-6">
					
							   
		   <div class="box">
                <div class="box-header">
                  <h3 class="box-title">View Salary Information</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"><div id="example1_length" class="dataTables_length"><label><select size="1" name="example1_length" aria-controls="example1"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> records per page</label></div></div><div class="col-xs-6"><div class="dataTables_filter" id="example1_filter"><label>Search: <input type="text" aria-controls="example1"></label></div></div></div>
				  <table class="table table-bordered table-hover table-striped" id="sTableRow">

                  </table>
					  
					  <div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example1_info">Showing 1 to 10 of 57 entries</div>
					  </div>
					  <div class="col-xs-6"></div></div></div>
                </div><!-- /.box-body -->
              </div>
					
				 
					
					</div>
				
</div>
<div class="col-lg-12">
  
</div>





				</div><!-- /.box -->
				
				
			 <div class="box-footer" style="margin-left: 4%;">
				  <input type="hidden" id="pkvId">
				  <input  type="submit" value="Save"  id="save"  class="btn btn-primary" onclick="return validateRForm();" />
       
      <input type="submit" value="Update"  id="update" style="display:none;"  class="btn btn-primary" onclick="return validateRForm();"/>
    
                   </div>                
</form>
     
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
		   

        </section>
      </div>







	

	
	        <script type="text/javascript">
      $(function () {
        //Datemask dd/mm/yyyy
        $("#txtInterestPaid").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#txtcd").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
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
	   <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
    <!-- date-range-picker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- bootstrap color picker -->
    <script src="plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    <!-- bootstrap time picker -->
    <script src="plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
	



            <?php include("footer.php");?>
