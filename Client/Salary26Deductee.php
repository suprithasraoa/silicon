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
      //  alert(url);
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
    document.getElementById('sTableRow').innerHTML="<thead><tr><th>#</th><th>Quarter</th><th>Emp. Name</th><th>Amt</th><th>Tax Deducted Date</th><th>Income Tax</th><th>Challan Sl. No.</th><th>Action</th></tr></thead><tbody>";
    var slno=0;
	var ahref="";

    var url = "sub/bind_list.php?show=" +ddlshowval+"&txtdate="+txtdate+"&txtenddate="+txtenddate+"&cid=0&tbl=SalaryInformation26&clientId="+txtclientId;
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
      
    $("#sTableRow").append("<tr><td>"+slno+"</td><td>"+QuarterId+":"+mnth+"</td><td style='font-size: 11px;'>"+field.empname+"</td><td style='font-size: 13px;'>"+field.Amount+"</td><td style='font-size: 13px;'>"+TaxDeductedDate+"</td><td style='font-size: 13px;'>"+field.IncTax+"</td><td style='font-size: 13px;'>"+field.challanname+"</td><td>"+ahref);
    
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
		var url = "sub/bind_alltotal.php?Tname=SalaryInformation26&clientId="+txtclientId;
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
				 var esd = document.getElementById("txtSection");
				    var strsec = esd.options[esd.selectedIndex].value;
                if(strsec==0)
                {
					  $("#gtxtSection").attr('class', 'form-group has-error');
  document.getElementById("txtSection").focus();
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
       var txtChallanId = $("#txtchallanSerialNo").val();   
       var txtIncomeTax = $("#txtIncomeTax").val();
	     var txtTaxDeducted = $("#txtTaxDeducted").val();

		 var es = document.getElementById("txtEmployeeId");
       var strUsers = es.options[es.selectedIndex].value;
  	   var txtSection = $("#txtSection").val();
	   var es1 = document.getElementById("txtchallanSerialNo");
       var strUsers1 = es1.options[es1.selectedIndex].value;
	   
	     var sec = document.getElementById("txtSection");
       var strUs = sec.options[sec.selectedIndex].value;
	   	 
                var dataString = "txtSerial="+txtSerial+"&txtEmployeeId=" + txtEmployeeId+"&txtAmount="+txtAmount+"&txtTaxDeducted="+txtTaxDeducted+"&txtPaidDate=" + txtPaidDate+"&txtTaxDeductedDate="+txtTaxDeductedDate+"&txtIncTax=" + txtIncTax+"&txtSurchargeAmt=" + txtSurchargeAmt+"&txtEduCessAmt="+txtEduCessAmt+"&txtChallanId=" + txtChallanId+"&txtIncomeTax=" + txtIncomeTax+"&txtSection="+txtSection+"&clientId="+txtclientId+"&Tname=SalaryInformation26&save=";
 // alert(dataString);
            if ($.trim(txtAmount).length > 0 && $.trim(strUsers) > 0 && $.trim(strUsers1) > 0 && $.trim(strUs) > 0  && $.trim(txtPaidDate).length > 0 && $.trim(txtTaxDeductedDate).length > 0 && $.trim(txtIncTax).length > 0 ) {
         
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

                window.location.href="Salary26Deductee.php";  
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
       var txtChallanId = $("#txtchallanSerialNo").val();   
       var txtIncomeTax = $("#txtIncomeTax").val();
	     var txtTaxDeducted = $("#txtTaxDeducted").val();

		 var es = document.getElementById("txtEmployeeId");
       var strUsers = es.options[es.selectedIndex].value;
  	   var txtSection = $("#txtSection").val();
	   var es1 = document.getElementById("txtchallanSerialNo");
       var strUsers1 = es1.options[es1.selectedIndex].value;
	   
	     var sec = document.getElementById("txtSection");
       var strUs = sec.options[sec.selectedIndex].value;
     var pkvId = $("#pkvId").val();
            var dataString =  "txtSerial="+txtSerial+"&txtEmployeeId=" + txtEmployeeId+"&txtAmount="+txtAmount+"&txtTaxDeducted="+txtTaxDeducted+"&txtPaidDate=" + txtPaidDate+"&txtTaxDeductedDate="+txtTaxDeductedDate+"&txtIncTax=" + txtIncTax+"&txtSurchargeAmt=" + txtSurchargeAmt+"&txtEduCessAmt="+txtEduCessAmt+"&txtChallanId=" + txtChallanId+"&txtIncomeTax=" + txtIncomeTax+"&txtSection="+txtSection+"&clientId="+txtclientId+"&Tname=SalaryInformation26&pkvId=" + pkvId+"&update=";
			
			//alert(dataString);
   if ($.trim(txtAmount).length > 0 && $.trim(strUsers) > 0 && $.trim(strUsers1) > 0 && $.trim(strUs) > 0  && $.trim(txtPaidDate).length > 0 && $.trim(txtTaxDeductedDate).length > 0 && $.trim(txtIncTax).length > 0 ) {
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
  window.location.href="Salary26Deductee.php"; 
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
  var url = "sub/bind_list.php?cid="+pkval+"&tbl=SalaryInformation26&clientId="+txtclientId;
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
	     $("#txtSection").val(field.Section);
     //  $("#txtchallanSerialNo").val(field.ChallanId);  
 		   
       $("#txtIncomeTax").val(field.IncomeTax);
	   //  $("#txtTaxDeducted").val(field.);
		$("#pkvId").val(field.Id);
		$("#txtchallanSerialNo").val(field.ChallanId).change();
  });
  });


  }

   function DeleteRecord(pkval)
  {
  var url = "sub/deletecommon.php?pkvId="+pkval+"&Tname=SalaryInformation26";
  //alert(url);
  $.getJSON(url, function(result) {

  console.log(result);
 
   if (result == "success") {
							
 alert('SalaryInformation Deleted Successfully!');
	window.location.href="SalaryInformation.php"; 
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
                  <h3 class="box-title">26Q Deduction Details</h3>
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
	   
	 $query ="SELECT Salary26Ctr FROM Parameter where  ClientId='".$_SESSION["loginId"]."'";

 $result = mysqli_query($dbcon,$query);
   while($row=mysqli_fetch_array($result)){                                                 
   $salctr=$row['Salary26Ctr'];  
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
    <div class="panel-heading">Challan Details</div>
    <div class="panel-body">

				 <div class="col-sm-6">
                    <div class="form-group" id="gtxtChallanId">
                      <label for="exampleInputPassword1">Serial No.</label>
						    <select  id= "txtchallanSerialNo" class="form-control" onchange="bindChallanDetails();">
         <?php  $query ="SELECT 0  AS Id,'--select--' AS ChallanNo UNION ALL SELECT Id,CONCAT(SerialNo,':Quarter ',QuarterId)AS ChallanNo  FROM DeducteeChallan  where ClientId='".$_SESSION["loginId"]."'";

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
                      <label for="exampleInputPassword1">Avlb. Balance (Rs.): </label>
					
                       <label id="avbl" style="    font-size: 15px;color: green;">-</label>
                    </div>
                  </div>
				  
		  <div class="col-lg-12">
				  <div class="col-lg-6">
				  <div class="alert alert-success alert-dismissable" id="alert-success" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6>	<i class="icon fa fa-check"></i> Deduction Details Details Submitted Successfully!</h6>
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
