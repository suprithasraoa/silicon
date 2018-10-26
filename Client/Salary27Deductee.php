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
	var txtclientId = $("#txtclientId").val();
	 var txtchallanSerialNo=document.getElementById('txtchallanSerialNo').value;
	     var url = "sub/bind_Details.php?cid="+txtchallanSerialNo+"&tbl=DeducteeChallan&clientId="+txtclientId;
         //alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
 document.getElementById('txtChallanNo').value=field.ChallanNo;
   document.getElementById('txtIncomeTax').value=field.IncomeTax;
   var str=field.ChallanDate;
 str=  str.substr(0,str.indexOf(' '));

 var cdate=str;
		cdate=moment(cdate, 'YYYY/MM/DD').format('DD/MM/YYYY');
         $("#txtChallanDate").val(cdate);  

  
    });
	getamt();
    });
}
  
    function bindgrid(ddlshow) {
		
			var ddlshowval = $("#ddlshow").val();
		var txtclientId = $("#txtclientId").val();
    document.getElementById('sTableRow').innerHTML="";
			var txtdate=document.getElementById("txtdate").value;
		var txtenddate=document.getElementById("txtenddate").value;
    document.getElementById('sTableRow').innerHTML="<thead><tr><th>#</th><th>Quarter</th><th>Emp. Name</th><th>Amt</th><th>Tax Deducted Date</th><th>Income Tax</th><th>NatureOfRemit</th><th>Country</th><th>Action</th></tr></thead><tbody>";
    var slno=0;
	var ahref="";

    var url = "sub/bind_list.php?show=" +ddlshowval+"&txtdate="+txtdate+"&txtenddate="+txtenddate+"&cid=0&tbl=SalaryInformation27&clientId="+txtclientId;
//alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
    var id= field.Id;
 	slno++;
	  	var TaxDeductedDate=field.TaxDeductedDate;
	   TaxDeductedDate=  TaxDeductedDate.substr(0,TaxDeductedDate.indexOf(' '));
	   	     var mnth=moment(TaxDeductedDate, 'DD/MM/YYYY').format('MMMM');
	      var mnt=moment(TaxDeductedDate, 'DD/MM/YYYY').format('MM');
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
    ahref="<a class='Myedit' id='Myedit' href='javascript:FillCtrl("+id+")'><i class='fa fa-pencil' aria-hidden='true' ></i></a>";
      
    $("#sTableRow").append("<tr><td>"+slno+"</td><td>"+QuarterId+":"+mnth+"</td><td style='font-size: 11px;'>"+field.empname+"</td><td style='font-size: 13px;'>"+field.Amount+"</td><td style='font-size: 13px;'>"+TaxDeductedDate+"</td><td style='font-size: 13px;'>"+field.IncTax+"</td><td style='font-size: 13px;'>"+field.NatureOfRemit+"</td><td style='font-size: 13px;'>"+field.CountryofRes+"</td><td>"+ahref);
    
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
		var url = "sub/bind_alltotal.php?Tname=SalaryInformation27&clientId="+txtclientId;
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
	  		var txtclientId = $("#txtclientId").val();
      var txtSerial = $("#txtSerialNo").val();
       var txtEmployeeId = $("#txtEmployeeId").val();   
       var txtAmount = $("#txtAmount").val();
       var txtPaidDate = $("#txtPaidDate").val(); 
		 var mnt=moment(txtPaidDate, 'DD/MM/YYYY').format('MM');
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
		txtPaidDate= moment(txtPaidDate, 'DD/MM/YYYY').format('YYYY/MM/DD');
		
		
       var txtTaxDeductedDate = $("#txtTaxDeductedDate").val();  
 var mnt=moment(txtTaxDeductedDate, 'DD/MM/YYYY').format('MM');
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
		txtTaxDeductedDate= moment(txtTaxDeductedDate, 'DD/MM/YYYY').format('YYYY/MM/DD');	   
       var txtIncTax = $("#txtIncTax").val();
       var txtSurchargeAmt = $("#txtSurchargeAmt").val(); 
       var txtEduCessAmt = $("#txtEduCessAmt").val();
    
	     var txtTaxDeducted = $("#txtTaxDeducted").val();
	
		 var es = document.getElementById("txtEmployeeId");
       var strUsers = es.options[es.selectedIndex].value;
  var txttdsrate = $("#txttdsrate").val();
    var txtAckNo = $("#txtAckNo").val();
	  var txtnatureof = $("#txtnatureof").val();
	    var txtCountry = $("#txtCountry").val();
	   	 var txtSection = $("#txtSection").val();
                var dataString = "txtSerial="+txtSerial+"&txtEmployeeId=" + txtEmployeeId+"&txtAmount="+txtAmount+"&txtTaxDeducted="+txtTaxDeducted+"&txtPaidDate=" + txtPaidDate+"&txtTaxDeductedDate="+txtTaxDeductedDate+"&txtIncTax=" + txtIncTax+"&txtSurchargeAmt=" + txtSurchargeAmt+"&txtEduCessAmt="+txtEduCessAmt+"&txttdsrate=" + txttdsrate+"&txtAckNo=" + txtAckNo+"&txtnatureof=" + txtnatureof+"&txtCountry=" + txtCountry+"&clientId="+txtclientId+"&txtSection="+txtSection+"&Tname=SalaryInformation27&save=";
  // alert(dataString);
            if ($.trim(txtAmount).length > 0 && $.trim(strUsers) > 0 && $.trim(txtPaidDate).length > 0 && $.trim(txtTaxDeductedDate).length > 0 && $.trim(txtIncTax).length > 0 ) {
         
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

                window.location.href="Salary27Deductee.php";  
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
					  		var txtclientId = $("#txtclientId").val();
      var txtSerial = $("#txtSerialNo").val();
       var txtEmployeeId = $("#txtEmployeeId").val();   
       var txtAmount = $("#txtAmount").val();
       var txtPaidDate = $("#txtPaidDate").val(); 
		 var mnt=moment(txtPaidDate, 'DD/MM/YYYY').format('MM');
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
		txtPaidDate= moment(txtPaidDate, 'DD/MM/YYYY').format('YYYY/MM/DD');
		
		
       var txtTaxDeductedDate = $("#txtTaxDeductedDate").val();  
 var mnt=moment(txtTaxDeductedDate, 'DD/MM/YYYY').format('MM');
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
		txtTaxDeductedDate= moment(txtTaxDeductedDate, 'DD/MM/YYYY').format('YYYY/MM/DD');	   
       var txtIncTax = $("#txtIncTax").val();
       var txtSurchargeAmt = $("#txtSurchargeAmt").val(); 
       var txtEduCessAmt = $("#txtEduCessAmt").val();

	     var txtTaxDeducted = $("#txtTaxDeducted").val();
	
		 var es = document.getElementById("txtEmployeeId");
       var strUsers = es.options[es.selectedIndex].value;

    var txttdsrate = $("#txttdsrate").val();
    var txtAckNo = $("#txtAckNo").val();
	  var txtnatureof = $("#txtnatureof").val();
	    var txtCountry = $("#txtCountry").val();
			 var txtSection = $("#txtSection").val();
     var pkvId = $("#pkvId").val();
            var dataString = "txtSerial="+txtSerial+"&txtEmployeeId=" + txtEmployeeId+"&txtAmount="+txtAmount+"&txtTaxDeducted="+txtTaxDeducted+"&txtPaidDate=" + txtPaidDate+"&txtTaxDeductedDate="+txtTaxDeductedDate+"&txtIncTax=" + txtIncTax+"&txtSurchargeAmt=" + txtSurchargeAmt+"&txtEduCessAmt="+txtEduCessAmt+"&txttdsrate=" + txttdsrate+"&txtAckNo=" + txtAckNo+"&txtnatureof=" + txtnatureof+"&txtCountry=" + txtCountry+"&clientId="+txtclientId+"&txtSection="+txtSection+"&Tname=SalaryInformation27&pkvId=" + pkvId+"&update=";
 if ($.trim(txtAmount).length > 0 && $.trim(strUsers) > 0  && $.trim(txtPaidDate).length > 0 && $.trim(txtTaxDeductedDate).length > 0 && $.trim(txtIncTax).length > 0 ) {
         
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
        //alert($.trim(data));
                        if ($.trim(data) == "success") {
               $("#update").val('Update');
 alert('Details Updated Successfully!');
  window.location.href="Salary27Deductee.php"; 
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
  var url = "sub/bind_list.php?cid="+pkval+"&tbl=SalaryInformation27&clientId="+txtclientId;
  //alert(url);
  $.getJSON(url, function(result) {

  console.log(result);
  $.each(result, function(i, field) {
   
  //  $("#txtclientId").val(field.ClientId);
      $("#txtSerialNo").val(field.Serial);
      $("#txtEmployeeId").val(field.EmployeeId);   
     $("#txtAmount").val(field.Amount);
	 var sdate=field.PaidDate;
		sdate=moment(sdate, 'YYYY/MM/DD').format('DD/MM/YYYY');
        $("#txtPaidDate").val(sdate); 
		var cdate=field.TaxDeductedDate;
		cdate=moment(cdate, 'YYYY/MM/DD').format('DD/MM/YYYY');
		$("#txtTaxDeductedDate").val(cdate);  
		$("#txtTaxDeducted").val(field.TaxDeducted); 
 
	 $("#txtIncTax").val(field.IncTax);
      $("#txtSurchargeAmt").val(field.SurchargeAmt); 
       $("#txtEduCessAmt").val(field.EduCessAmt);
  $("#txttdsrate").val(field.TDSasPer);
 $("#txtAckNo").val(field.AckNo);
	 $("#txtnatureof").val(field.NatureOfRemit);
	    $("#txtCountry").val(field.CountryofRes);
		$("#pkvId").val(field.Id);
		
  });
  });


  }

   function DeleteRecord(pkval)
  {
  var url = "sub/deletecommon.php?pkvId="+pkval+"&Tname=SalaryInformation27";
  //alert(url);
  $.getJSON(url, function(result) {

  console.log(result);
 
   if (result == "success") {
							
 alert('Salary Information Deleted Successfully!');
	window.location.href="Salary27Deductee.php"; 
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
                  <h3 class="box-title">27Q Deduction Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                 
				  
				  <div class="col-lg-12">
				   <div class="col-sm-6">
				   
				    <div class="box">
				    <div class="box-body">
                    <div class="col-sm-12">
                    <div class="">
                 
                   
                
                  
				       <div class="col-sm-3">
                    <div class="form-group">
                      <label>Serial No</label>

							  <?php  
	   
	 $query ="SELECT Salary27Ctr FROM Parameter where  ClientId='".$_SESSION["loginId"]."'";

 $result = mysqli_query($dbcon,$query);
   while($row=mysqli_fetch_array($result)){                                                 
   $salctr=$row['Salary27Ctr'];  
  }
?>
                      <input type="Number" class="form-control" id="txtSerialNo" value="<?php echo $salctr; ?>" disabled>
                    </div>
					</div>
					 
					  <div class="col-sm-9">
					  <div class="col-sm-12">
					   <label>Deductee Name</label>
					  </div>
				
					    <div class="form-group" id="gtxtEmployeeId">
                    <select  id= "txtEmployeeId" class="form-control" onchange="validte(this.value.length,'gtxtEmployeeId')"  >
          <?php  $query ="SELECT 0  AS Id,'--select--' AS Ename UNION ALL SELECT Id,CONCAT(NAME,' (',SerialNo,') - ',DesignationId) AS Ename FROM Deductee where ClientId='".$_SESSION["loginId"]."' ORDER BY Ename ASC";

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
                       <input type="number" class="form-control" id="txtIncTax" placeholder="Rs." onchange="getamt()"/>
                    </div>
                  </div>
				   </div>
					 </div>
				  <div class="col-sm-6 nopad">
				   <div class="col-sm-12">
                   <label>Surcharge Amt</label>
                  </div>
                  <!-- <div class="col-sm-3" style="padding-right:0px;">
                   <div class="form-group">
                      <input type="number" class="form-control" id="txtSurchargeAmtP" placeholder="%"/>
                    </div>
                  </div>-->
                    <div class="col-sm-12">
                   <div class="form-group">
                      <input type="number" class="form-control" id="txtSurchargeAmt" placeholder="Rs." onchange="getamt()"/>
                    </div>
                  </div> 
				  </div>
				    <div class="col-sm-6 nopad">
				  <div class="col-sm-12">
                 <label>Edu Cess Amt</label>
                  </div>
				<!--   <div class="col-sm-3" style="padding-right:0px;">
                   <div class="form-group">
                      <input type="number" class="form-control" id="txtEduCessAmtP" placeholder="%"/>
                    </div>
                  </div>-->
              <div class="col-sm-12">
                   <div class="form-group">
                   <input type="number" class="form-control" id="txtEduCessAmt" placeholder="Rs." onchange="getamt()"/>
                    </div>
                  </div>
				 </div>
				 <div class="col-sm-6">
                    <div class="form-group" id="gtxtTaxDeductedDate">
                      <label>Tax Deducted</label>
					      <input type="number" class="form-control" id="txtTaxDeducted" disabled/>
                   
                    </div>
					</div>
					 <div class="col-sm-6">
                   <div class="form-group" id="gtxtSection">
                      <label>Section<span style="color:red;">*</span></label>
                     <select id="txtSection" class="form-control">
	         <?php  $query ="SELECT 0  AS Id,'--select--' AS Description UNION ALL SELECT Id,Description FROM Section";

    $result = mysqli_query($dbcon,$query);
    while($row=mysqli_fetch_array($result)){                                                 
       echo "<option value='".$row['Id']."'>".$row['Description']."</option>";       
    }
?>
</select>
                    </div>
                  </div> 
                </div>
                 <div class="">
           
				
				  
				  
				  <div class="col-sm-12">
			   <div class="panel panel-info">
    <div class="panel-heading"></div>
    <div class="panel-body">

				 <div class="col-sm-6">
                    <div class="form-group" id="gtxtChallanId">
                      <label for="exampleInputPassword1">TDS Rate as per</label>
						    <select  id= "txttdsrate" class="form-control" onchange="bindChallanDetails();">
    <option>IT Act</option>
	<option>DTAA</option>
                </select>
                    </div>
                  </div>
 <div class="col-sm-6">
                    <div class="form-group" id="gtxtChallanId">
                      <label for="exampleInputPassword1">15CA Ack.No.</label>
					
                      <input type="text" class="form-control" id="txtAckNo" >
                    </div>
                  </div>
				  <div class="col-sm-6">
                     <div class="form-group">
                     <label for="exampleInputPassword1">Nature of Remittance</label>
					   	    <select  id= "txtnatureof" class="form-control">
                    <option>DIVIDEND</option>
					  <option>FEES FOR TECHNICAL SERVICES/ FEES FOR INCLUDED SERVICES</option>
					    <option>INTEREST PAYMENT</option>
						  <option>INVESTMENT INCOME</option>
						   <option>LONG TERM CAPITAL GAINS</option>
					    <option>ROYALTY</option>
						  <option>SHORT TERM CAPITAL GAINS</option>
						  <option>OTHER INCOME / OTHER (NOT IN THE NATURE OF INCOME)</option>
                </select>
                    </div>
                  </div>
				  
				  
				  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Country of Remittance</label>
                          	    <select  id= "txtCountry" class="form-control">
    <option value="">Country...</option>
<option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
                </select>
                    </div>
                  </div>
				  
		  <div class="col-lg-12">
				  <div class="col-lg-6">
				  <div class="alert alert-success alert-dismissable" id="alert-success" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6>	<i class="icon fa fa-check"></i>Deduction Details Submitted Successfully!</h6>
                    </div>
                  </div>
			</div>
			
	</div>
  </div>
                
				</div>
				</div>
                  
                   
                  </div><!-- /.box-body -->
				  </div>
				   <div class="box-footer" style="margin-left: 4%;">
				  <input type="hidden" id="pkvId">
				  <input  type="submit" value="Save"  id="save"  class="btn btn-primary" onclick="return validateRForm();" />
       
      <input type="submit" value="Update"  id="update" style="display:none;"  class="btn btn-primary" onclick="return validateRForm();"/>
     <input type="hidden" class="form-control" id="txtclientId" value=<?php echo $_SESSION["loginId"];  ?> >
                   </div>  
				     </div>
				  </div>
				    
					
					
					
					<div class="col-sm-6">
					
							   
		   <div class="box">
                     <div class="box-header with-border">
				   <div class="col-lg-3 ">
                  <h3 class="box-title">View Deduction Details</h3>
				  
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
                  <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"><div id="example1_length" class="dataTables_length"><label><select  id="ddlshow" onchange="bindgrid();" size="1" name="example1_length" aria-controls="example1"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> records per page</label></div></div><div class="col-xs-6"></div></div>
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
<div class="col-lg-12">
  
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
	<script>
	function getamt()
	{	
   
		var IncomeTax= $("#txtIncTax").val();
		if(IncomeTax==""){IncomeTax=0;}
		
		var Surcharge= $("#txtSurchargeAmt").val();
		if(Surcharge==""){Surcharge=0;}
		
		var EducationCess=$("#txtEduCessAmt").val();
		if(EducationCess==""){EducationCess=0;}
	
		
		var totalAmt=parseFloat(IncomeTax)+parseFloat(Surcharge)+parseFloat(EducationCess);
		$("#txtTaxDeducted").val(totalAmt);
		var txtTaxDeducted=document.getElementById('txtTaxDeducted').value;
  var incChallantax=document.getElementById('txtIncomeTax').value;
  if(incChallantax!="" || incChallantax!=null)
  {
  var finlamt=parseFloat(incChallantax)-parseFloat(txtTaxDeducted);
   document.getElementById('avbl').innerHTML=finlamt;
   if(finlamt<=0)
   {
	   $("#avbl").css('color','red');
   }
  }
	}
    </script>
	 


            <?php include("footer.php");?>
