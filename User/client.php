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
function checkpan()
{
 if (document.getElementById("txtDeductorPAN").value != "") {
	let str = $("#txtDeductorPAN").val();
var ss= /^[A-Za-z]{5}\d{4}[A-Za-z]{1}$/i.test(str) ;
if(ss==false)
{
  document.getElementById("txtDeductorPAN").focus();
   $("#lblinvalidPan").css('display','block');
}
else
{
	 $("#lblinvalidPan").css('display','none');
}
}
}
function rcheckpan()
{
	if (document.getElementById("txtRPAN").value != "") {
	let str = $("#txtRPAN").val();
var ss= /^[A-Za-z]{5}\d{4}[A-Za-z]{1}$/i.test(str) ;
if(ss==false)
{
    $("#gtxtRPAN").attr('class', 'form-group has-error');
  document.getElementById("txtRPAN").focus();
   $("#lblinvalidrPan").css('display','block');
   	
}
else
{
	$("#gtxtRPAN").attr('class', 'form-group');
	 $("#lblinvalidrPan").css('display','none');
}
}
}
function bindNextYear()
{
	var txtfinancialYearto=$("#txtfinancialYearto").val();
	var txtasstYearfrm=parseFloat(txtfinancialYearto)+1;
	$("#txtasstYearfrm").val(txtasstYearfrm);
	txtasstYearfrm=parseFloat(txtasstYearfrm)+1;
	$("#txtasstYearto").val(txtasstYearfrm);
}
function fnbindAddress()
{
	$("#txtRAddress1").val($("#txtAddress1").val());
 $("#txtRAddress2").val($("#txtAddress2").val());
    $("#txtRAddress3").val($("#txtAddress3").val());
    
  $("#txtRCity").val($("#txtCity").val());
 $("#txtRState").val($("#txtState").val());
   $("#txtRPincode").val($("#txtPincode").val());
	
}
function validte(inputlngth,attrb)
{
if(inputlngth>0)
{
  $("#"+attrb).attr('class', 'form-group');
}
}
 function validateRForm() {
	

if (document.getElementById("cmbTan").value == "") {
    $("#gcmbTan").attr('class', 'form-group has-error');
  document.getElementById("cmbTan").focus();
  return false;
  }

  

  if (document.getElementById("txtfinancialYearfrm").value == "") {
    $("#gtxtfinancialYearfrm").attr('class', 'form-group has-error');
  document.getElementById("txtfinancialYearfrm").focus();
  return false;
  }
  if (document.getElementById("txtfinancialYearto").value == "") {
    $("#gtxtfinancialYearto").attr('class', 'form-group has-error');
  document.getElementById("txtfinancialYearto").focus();
  return false;
  }
  if (document.getElementById("txtasstYearfrm").value == "") {
    $("#gtxtasstYearfrm").attr('class', 'form-group has-error');
  document.getElementById("txtasstYearfrm").focus();
  return false;
  }
  if (document.getElementById("txtasstYearto").value == "") {
    $("#gtxtasstYearto").attr('class', 'form-group has-error');
  document.getElementById("txtasstYearto").focus();
  return false;
  }
    if (document.getElementById("txtName").value == "") {
    $("#gtxtname").attr('class', 'form-group has-error');
  document.getElementById("txtName").focus();
  return false;
  }
    if (document.getElementById("txtbranch").value == "") {
    $("#gtxtbranch").attr('class', 'form-group has-error');
  document.getElementById("txtbranch").focus();
  return false;
  }
     if (document.getElementById("txtAddress1").value == "") {
    $("#gtxtaddress1").attr('class', 'form-group has-error');
  document.getElementById("txtAddress1").focus();
  return false;
  }
   if (document.getElementById("txtCity").value == "") {
  $("#gtxtCity").attr('class', 'form-group has-error');
  document.getElementById("txtCity").focus();
  return false;
  }
   
   if (document.getElementById("txtPincode").value == "") {
   $("#gtxtPincode").attr('class', 'form-group has-error');
  document.getElementById("txtPincode").focus();
  return false;
  }

    
if (document.getElementById("txtRPAN").value == "") {
   $("#gtxtRPAN").attr('class', 'form-group has-error');
  document.getElementById("txtRPAN").focus();
  return false;
  }
   
    if (document.getElementById("txtRName").value == "") {
   $("#gtxtRname").attr('class', 'form-group has-error');
  document.getElementById("txtRName").focus();
  return false;
  }
 if (document.getElementById("txtRDesignation").value == "") {
   $("#gtxtRdesig").attr('class', 'form-group has-error');
  document.getElementById("txtRDesignation").focus();
  return false;
  }
   if (document.getElementById("txtRAddress1").value == "") {
   $("#gtxtRaddress1").attr('class', 'form-group has-error');
  document.getElementById("txtRAddress1").focus();
  return false;
  }
   if (document.getElementById("txtRCity").value == "") {
   $("#gtxtRcity").attr('class', 'form-group has-error');
  document.getElementById("txtRCity").focus();
  return false;
  }
     if (document.getElementById("txtRPincode").value == "") {
   $("#gtxtRPincode").attr('class', 'form-group has-error');
  document.getElementById("txtRPincode").focus();
  return false;
  }
      if (document.getElementById("txtRMobile").value == "") {
   $("#gtxtRmobile").attr('class', 'form-group has-error');
  document.getElementById("txtRMobile").focus();
  return false;
  }
      if (document.getElementById("txtREmail").value == "") {
   $("#gtxtRemail").attr('class', 'form-group has-error');
  document.getElementById("txtREmail").focus();
  return false;
  }
 if (document.getElementById("txtPassword").value == "") {
   $("#gtxtPassword").attr('class', 'form-group has-error');
  document.getElementById("txtPassword").focus();
  return false;
  }
  }
</script>
 <script type="text/javascript">
  $(document).ready(function() {
 bindgrid();
 showGovt();
  });
    function gettotalRec()
	{
		var userid =$("#userid").val(); 
		var url = "sub/bind_alltotal.php?Tname=Client&userid="+userid;
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
    


var userid =$("#userid").val(); 
		var ddlshowval = $("#ddlshow").val();
    
    document.getElementById('sTableRow').innerHTML="";
    document.getElementById('sTableRow').innerHTML="<thead><tr><th>#</th><th>Name</th><th>Designation</th><th>Resp. Name</th><th>Resp. PAN</th><th>Resp. Mobile</th><th>Email Id</th><th>Action</th></tr></thead><tbody>";
    var slno=0;
  var ahref="";

    var url = "sub/bind_list.php?show=" +ddlshowval+"&cid=0&tbl=Client&userid="+userid;
//alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
    var id= field.Id;
   
   
  slno++;
    
    ahref="<a class='Myedit' id='Myedit' href='javascript:FillCtrl("+id+")'><i class='fa fa-pencil' aria-hidden='true' ></i></a>  | <a onclick='javascript:confirmationDelete($(this));return false;' href='javascript:DeleteRecord("+id+")'><i class='fa fa-times' aria-hidden='true' ></i></a>";
      
    $("#sTableRow").append("<tr><td>"+slno+"</td><td style='font-size: 11px;'>"+field.Name+"</td><td style='font-size: 13px;'>"+field.RespPersonDesig+"</td><td style='font-size: 13px;'>"+field.RespPersonName+"</td><td style='font-size: 13px;'>"+field.RespPersonPAN+"</td><td style='font-size: 13px;'>"+field.RespPersonPhNo+"</td><td style='font-size: 13px;'>"+field.EmailId+"</td><td>"+ahref);
    
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


   $(document).ready(function() {
   
     
     
  $("#save").click(function() {
var userid =$("#userid").val(); 
      var cmbTan= $("#cmbTan").val();
   var txtfinancialYearfrm= $("#txtfinancialYearfrm").val();
   var txtfinancialYearto= $("#txtfinancialYearto").val();
      var txtasstYearfrm=  $("#txtasstYearfrm").val();
    var txtasstYearto=$("#txtasstYearto").val();
   var cmbTDSassesse= $("#cmbTDSassesse").val();
    var cmbStatus=$("#cmbStatus").val();
    
    var cmbReturntype= $("#cmbReturntype").val();
   var cmbDeductorType= $("#cmbDeductorType").val();
   var txtDeductorPAN= $("#txtDeductorPAN").val();
    var txtGSTIN=$("#txtGSTIN").val();
    var txtName=$("#txtName").val();
  
   var txtbranch= $("#txtbranch").val();
    var txtAddress1=$("#txtAddress1").val();
   var txtAddress2= $("#txtAddress2").val();
    var txtAddress3=$("#txtAddress3").val();
    
   var txtCity= $("#txtCity").val();
   var txtState= $("#txtState").val();
   var txtPincode= $("#txtPincode").val();
    var txtPhoneNo=$("#txtPhoneNo").val();
    var txtFax=$("#txtFax").val();
    var txtEmail= $("#txtEmail").val();
     
       var txtGAIN=$("#txtGAIN").val();
    var txtGState=$("#txtGState").val();
      var txtGPAOCode=$("#txtGPAOCode").val();
    var txtGPRegnNo=$("#txtGPRegnNo").val();
      var txtGDDOCode=$("#txtGDDOCode").val();
    var txtDPRegnNo=$("#txtDPRegnNo").val();
   
      var txtMinistry=$("#txtMinistry").val();
    var txtOtherName=$("#txtOtherName").val();
      var txtRPAN=$("#txtRPAN").val();
    var txtRName=$("#txtRName").val();
      var RespPersonGender=$("#rdbGender").val();
    var txtRDesignation=$("#txtRDesignation").val();
      var txtRAddress1=$("#txtRAddress1").val();
    var txtRAddress2=$("#txtRAddress2").val();
     var txtRAddress3=$("#txtRAddress3").val();
       var txtRCity=$("#txtRCity").val();
     var txtRState=$("#txtRState").val();
     var txtRPincode=$("#txtRPincode").val();
     var txtRMobile=$("#txtRMobile").val();
     var txtREmail=$("#txtREmail").val();
   var txtPassword=$("#txtPassword").val();
                 var dataString = "cmbTan="+cmbTan+"&txtfinancialYearfrm=" + txtfinancialYearfrm  + "&txtfinancialYearto=" + txtfinancialYearto + "&txtasstYearfrm=" + txtasstYearfrm +"&txtasstYearto=" + txtasstYearto +"&cmbTDSassesse=" + cmbTDSassesse +"&cmbStatus=" + cmbStatus +"&cmbReturntype=" + cmbReturntype +"&cmbDeductorType=" + cmbDeductorType +"&txtDeductorPAN=" + txtDeductorPAN +"&txtGSTIN=" + txtGSTIN +"&txtName=" + txtName  + "&txtbranch=" + txtbranch + "&txtAddress1=" + txtAddress1 +"&txtAddress2=" + txtAddress2 +"&txtAddress3=" + txtAddress3 +"&txtCity=" + txtCity +"&txtState=" + txtState +"&txtPincode=" + txtPincode +"&txtPhoneNo=" + txtPhoneNo +"&txtFax=" + txtFax +"&txtEmail=" + txtEmail  + "&txtGAIN=" + txtGAIN + "&txtGState=" + txtGState +"&txtGPAOCode=" + txtGPAOCode +"&txtGPRegnNo=" + txtGPRegnNo +"&txtGDDOCode=" + txtGDDOCode +"&txtDPRegnNo=" + txtDPRegnNo +"&txtMinistry=" + txtMinistry +"&txtOtherName=" + txtOtherName +"&txtRPAN=" + txtRPAN +"&txtRName=" + txtRName +"&RespPersonGender=" + RespPersonGender +"&txtRDesignation=" + txtRDesignation +"&txtRAddress1=" + txtRAddress1  + "&txtRAddress2=" + txtRAddress2 + "&txtRAddress3=" + txtRAddress3 +"&txtRCity=" + txtRCity +"&txtRState=" + txtRState +"&txtRPincode=" + txtRPincode +"&txtRMobile=" + txtRMobile +"&txtREmail=" + txtREmail+"&txtPassword="+txtPassword+"&userid="+userid+"&Tname=Client&save=";


            if ($.trim(txtfinancialYearfrm).length > 0 && $.trim(txtfinancialYearto).length > 0 && $.trim(txtasstYearfrm).length > 0 && $.trim(txtasstYearto).length > 0 && $.trim(txtName).length > 0 && $.trim(txtbranch).length > 0 && $.trim(txtRMobile).length > 0 && $.trim(txtRDesignation).length > 0 && $.trim(txtRCity).length > 0 && $.trim(txtREmail).length > 0 && $.trim(txtPassword).length > 0 ) {
         
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
   var txtfinancialYearfrm= $("#txtfinancialYearfrm").val();
   var txtfinancialYearto= $("#txtfinancialYearto").val();
      var txtasstYearfrm=  $("#txtasstYearfrm").val();
    var txtasstYearto=$("#txtasstYearto").val();
   var cmbTDSassesse= $("#cmbTDSassesse").val();
    var cmbStatus=$("#cmbStatus").val();
    
    var cmbReturntype= $("#cmbReturntype").val();
   var cmbDeductorType= $("#cmbDeductorType").val();
   var txtDeductorPAN= $("#txtDeductorPAN").val();
    var txtGSTIN=$("#txtGSTIN").val();
    var txtName=$("#txtName").val();
  
   var txtbranch= $("#txtbranch").val();
    var txtAddress1=$("#txtAddress1").val();
   var txtAddress2= $("#txtAddress2").val();
    var txtAddress3=$("#txtAddress3").val();
    
   var txtCity= $("#txtCity").val();
   var txtState= $("#txtState").val();
   var txtPincode= $("#txtPincode").val();
    var txtPhoneNo=$("#txtPhoneNo").val();
    var txtFax=$("#txtFax").val();
    var txtEmail= $("#txtEmail").val();
     
       var txtGAIN=$("#txtGAIN").val();
    var txtGState=$("#txtGState").val();
      var txtGPAOCode=$("#txtGPAOCode").val();
    var txtGPRegnNo=$("#txtGPRegnNo").val();
      var txtGDDOCode=$("#txtGDDOCode").val();
    var txtDPRegnNo=$("#txtDPRegnNo").val();
   
      var txtMinistry=$("#txtMinistry").val();
    var txtOtherName=$("#txtOtherName").val();
      var txtRPAN=$("#txtRPAN").val();
    var txtRName=$("#txtRName").val();
      var RespPersonGender=$("#rdbGender").val();
    var txtRDesignation=$("#txtRDesignation").val();
      var txtRAddress1=$("#txtRAddress1").val();
    var txtRAddress2=$("#txtRAddress2").val();
     var txtRAddress3=$("#txtRAddress3").val();
       var txtRCity=$("#txtRCity").val();
     var txtRState=$("#txtRState").val();
     var txtRPincode=$("#txtRPincode").val();
     var txtRMobile=$("#txtRMobile").val();
     var txtREmail=$("#txtREmail").val();
   var txtPassword=$("#txtPassword").val();

     var pkvId = $("#pkvId").val();
           var dataString = "cmbTan="+cmbTan+"&txtfinancialYearfrm=" + txtfinancialYearfrm  + "&txtfinancialYearto=" + txtfinancialYearto + "&txtasstYearfrm=" + txtasstYearfrm +"&txtasstYearto=" + txtasstYearto +"&cmbTDSassesse=" + cmbTDSassesse +"&cmbStatus=" + cmbStatus +"&cmbReturntype=" + cmbReturntype +"&cmbDeductorType=" + cmbDeductorType +"&txtDeductorPAN=" + txtDeductorPAN +"&txtGSTIN=" + txtGSTIN +"&txtName=" + txtName  + "&txtbranch=" + txtbranch + "&txtAddress1=" + txtAddress1 +"&txtAddress2=" + txtAddress2 +"&txtAddress3=" + txtAddress3 +"&txtCity=" + txtCity +"&txtState=" + txtState +"&txtPincode=" + txtPincode +"&txtPhoneNo=" + txtPhoneNo +"&txtFax=" + txtFax +"&txtEmail=" + txtEmail  + "&txtGAIN=" + txtGAIN + "&txtGState=" + txtGState +"&txtGPAOCode=" + txtGPAOCode +"&txtGPRegnNo=" + txtGPRegnNo +"&txtGDDOCode=" + txtGDDOCode +"&txtDPRegnNo=" + txtDPRegnNo +"&txtMinistry=" + txtMinistry +"&txtOtherName=" + txtOtherName +"&txtRPAN=" + txtRPAN +"&txtRName=" + txtRName +"&RespPersonGender=" + RespPersonGender +"&txtRDesignation=" + txtRDesignation +"&txtRAddress1=" + txtRAddress1  + "&txtRAddress2=" + txtRAddress2 + "&txtRAddress3=" + txtRAddress3 +"&txtRCity=" + txtRCity +"&txtRState=" + txtRState +"&txtRPincode=" + txtRPincode +"&txtRMobile=" + txtRMobile +"&txtREmail=" + txtREmail+"&txtPassword="+txtPassword+"&userid="+userid+"&Tname=Client&pkvId=" + pkvId+"&update=";
//alert(dataString);
              if ($.trim(txtfinancialYearfrm).length > 0 && $.trim(txtfinancialYearto).length > 0 && $.trim(txtasstYearfrm).length > 0 && $.trim(txtasstYearto).length > 0 && $.trim(txtName).length > 0 && $.trim(txtbranch).length > 0 && $.trim(txtRMobile).length > 0 && $.trim(txtRDesignation).length > 0 && $.trim(txtRCity).length > 0 && $.trim(txtREmail).length > 0 && $.trim(txtPassword).length > 0 ) {
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

var userid =$("#userid").val(); 
  var url = "sub/bind_list.php?cid="+pkval+"&tbl=Client&userid="+userid;
  //alert(url);
  $.getJSON(url, function(result) {

  console.log(result);
  $.each(result, function(i, field) {
   
  $("#txtName").val(field.Name);
  $("#txtAddress1").val(field.Address1);
  $("#txtAddress2").val(field.Address2);
  $("#txtAddress3").val(field.Address3);
  $("#txtCity").val(field.City);
  $("#txtState").val(field.State);
  $("#txtPincode").val(field.Pincode);
  $("#cmbTan").val(field.TAN);
  $("#txtesc").val(field.Tan_Number);
  $("#txtFax").val(field.Fax);
  $("#txtPhoneNo").val(field.PhoneNo);
  $("#txtEmail").val(field.EmailId);
  $("#txtfinancialYearfrm").val(field.FinancialYearFrm);
  $("#txtfinancialYearto").val(field.FinancialYearTo);
  $("#txtasstYearfrm").val(field.AsstYearFrm);
  $("#txtasstYearto").val(field.AsstYearTo);
  $("#cmbTDSassesse").val(field.ExistingTDS);
  $("#cmbStatus").val(field.DeductorStatus);
  $("#cmbDeductorType").val(field.DeductorType);
  $("#cmbReturntype").val(field.ReturnType);
  $("#txtDeductorPAN").val(field.DeductorPAN);
  $("#txtGSTIN").val(field.DeductorGSTIN);
  $("#txtbranch").val(field.Branch);
  $("#txtGAIN").val(field.GovtAIN);
  $("#txtGState").val(field.GovtState);
  $("#txtGPAOCode").val(field.GovtPAOCode);
  $("#txtGPRegnNo").val(field.GovtPAORegNo);
  $("#txtGDDOCode").val(field.GovtDDOCode);
  $("#txtDPRegnNo").val(field.GovtDDORegNo);
  $("#txtMinistry").val(field.GovtMinistry);
  $("#txtOtherName").val(field.GovtOtherName);
  $("#txtRPAN").val(field.RespPersonPAN);
  $("#txtRName").val(field.RespPersonName);
  $("#RespPersonGender").val(field.RespPersonGender);
  $("#txtRDesignation").val(field.RespPersonDesig);
  $("#txtRMobile").val(field.RespPersonPhNo);
  $("#txtEmail").val(field.EmailId);
  $("#txtRAddress1").val(field.RespPersonAddress1);
  $("#txtRAddress2").val(field.RespPersonAddress2);
  $("#txtRAddress3").val(field.RespPersonAddress3);
  $("#txtRCity").val(field.RespPersonCity);
  $("#txtRState").val(field.RespPersonState);
  $("#txtRPincode").val(field.RespPersonPincode);
  $("#txtREmail").val(field.RespPersonEmailId);
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
	document.getElementById('cmbDeductorType').innerHTML="";
	 var url = "";
  var val= document.getElementById('cmbStatus').value;
    if(val=="Others")
	{
       document.getElementById('divGovt').style.display='none';
	   url = "sub/bind_details.php?tbl=Client&Stype=2";
	}
    else
	{
       document.getElementById('divGovt').style.display='block'; 
	   url = "sub/bind_details.php?tbl=Client&Stype=1";
	}
   
  
//alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {

   $("#cmbDeductorType").append("<option value='"+field.Id+"'>"+field.Description+"</option>");
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
                  <h3 class="box-title">Client</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                    <div class="col-sm-12">
                    <div class="col-sm-6">
                 
                   
                
                   <div class="">
				       <div class="col-sm-6">
                    <div class="form-group" id="gcmbTan">
                      <label for="exampleInputPassword1">TAN
                      </label>
					   <input type="text" class="form-control" id="cmbTan" placeholder="Enter TAN"  onchange="checktan();">
                    <label id="lblinvalidTan" style="color:red;display:none;">Invalid TAN Format</label>
                    </div>
					</div>
					  <div class="col-sm-3">
					    <div class="form-group" id="gtxtfinancialYearfrm">
                      <label for="exampleInputEmail1">Fin. Year
                      <span style="color:red;">*</span></label>
                     <input type="Number" class="form-control pull-right" id="txtfinancialYearfrm" placeholder="From" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "4" onchange="validte(this.value.length,'gtxtfinancialYearfrm')"/>
					 
                    </div>
					  </div>
					    <div class="col-sm-3">
					    <div class="form-group" id="gtxtfinancialYearto">
                                 <label style="color:white;">s</label>
					 <input type="Number" class="form-control pull-right" id="txtfinancialYearto" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "4" placeholder="To" onchange="bindNextYear();"/>
                    </div>
					  </div>
                  </div>
				    
                  
                
				  <div class="col-sm-12 nopad">
                   <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Existing TDS assessee
                      </label>
                    <select class="form-control" id="cmbTDSassesse">
                        <option>Yes</option>
						 <option>No</option>
                      </select>
                    </div>
                  </div>
                   <div class="col-sm-3">
                    <div class="form-group" id="gtxtasstYearfrm">
                      <label for="exampleInputPassword1">Asst. Year<span style="color:red;">*</span></label>
                      <input type="Number" class="form-control pull-right" id="txtasstYearfrm" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "4" placeholder="From"  onchange="validte(this.value.length,'gtxtasstYearfrm')"/>
					   
                    </div>
                  </div>
				    <div class="col-sm-3">
                    <div class="form-group" id="gtxtasstYearto">
                                                <label style="color:white;">s</label>
					    <input type="Number" class="form-control pull-right" id="txtasstYearto" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "4" placeholder="To"  onchange="validte(this.value.length,'gtxtasstYearto')"/>
                    </div>
                  </div>
				   </div>
                   <div class="col-sm-6">
                   <div class="form-group">
                      <label for="exampleInputPassword1">Status</label>
                    <select class="form-control" id="cmbStatus" onchange="showGovt()">
                        <option>Government</option>
						 <option>Others</option>
                      </select>
                    </div>
                  </div>
				   <div class="col-sm-6">
				      
                    <div class="form-group">
                      <label for="exampleInputPassword1">Return Type</label>
                    <select class="form-control" id="cmbReturntype">
                        <option>Digital</option>
						     <option>Electronic</option>
                      </select>
                    </div>
					
                  </div>
                   <div class="col-sm-12">
                   <div class="form-group">
                      <label for="exampleInputPassword1">Deductor Type</label>
                    <select class="form-control" id="cmbDeductorType">
                  
                      </select>
                    </div>
                  </div>
                  
                   <div class="col-sm-12">
                   <div class="panel panel-info">
    <div class="panel-heading">Deductor Details</div>
    <div class="panel-body">
	
	 <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Deductor PAN</label>
                            <input type="text" class="form-control" id="txtDeductorPAN" placeholder="Deductor PAN" maxlength="10" onchange="checkpan();">
							  <label id="lblinvalidPan" style="color:red;display:none;">Invalid PAN Format</label>
                    </div>
                  </div> <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">GSTIN</label>
                           <input type="text" class="form-control" id="txtGSTIN" placeholder="Enter GSTIN" maxlength="15">
                    </div>
                  </div>
				  
				   <div class="col-sm-6">
                    <div class="form-group" id="gtxtname">
                      <label for="exampleInputPassword1">Name<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="txtName" placeholder="Enter Name" onchange="validte(this.value.length,'gtxtname')">
                    </div>
                  </div>
				  <div class="col-sm-6">
                    <div class="form-group" id="gtxtbranch">
                      <label for="exampleInputPassword1">Branch/Division<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="txtbranch" placeholder="Enter Branch/Division" onchange="             validte(this.value.length,'gtxtbranch')">
                    </div>
                  </div>
				   <div class="col-sm-6">

                    <div class="form-group" id="gtxtaddress1">
                      <label for="exampleInputPassword1">Address Line1<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="txtAddress1" placeholder="Enter Address Line1" onchange="validte(this.value.length,'gtxtaddress1')">
                    </div>
                  </div>
				   <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Address Line2</label>
                            <input type="text" class="form-control" id="txtAddress2" placeholder="Enter Address Line2">
                    </div>
                  </div>
				   <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Address Line3</label>
                            <input type="text" class="form-control" id="txtAddress3" placeholder="Enter Address Line3">
                    </div>
                  </div>
				   <div class="col-sm-6">
                    <div class="form-group" id="gtxtCity">
                      <label for="exampleInputPassword1">City<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="txtCity" placeholder="Enter City" onchange="validte(this.value.length,'gtxtCity')">
                    </div>
                  </div>
				   <div class="col-sm-8">
                    <div class="form-group">
                      <label for="exampleInputPassword1">State<span style="color:red;">*</span></label>
							 <select  id= "txtState" class="form-control" >
         <?php  $query ="SELECT 0  AS Id,'--select--' AS Description UNION ALL SELECT Id,Description FROM State";

    $result = mysqli_query($dbcon,$query);
    while($row=mysqli_fetch_array($result)){                                                 
       echo "<option value='".$row['Id']."'>".$row['Description']."</option>";       
    }
?>
                </select>
                    </div>
                  </div>
				   <div class="col-sm-4">
                    <div class="form-group" id="gtxtPincode">
                      <label for="exampleInputPassword1">Pincode<span style="color:red;">*</span></label>
                            <input type="Number" class="form-control" id="txtPincode" placeholder="Enter Pincode"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "6" onchange="validte(this.value.length,'gtxtPincode')">
                    </div>
                  </div>
				   <div class="col-sm-5">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Address Same</label>
                    <select class="form-control" id="cmbAdd" onchange="fnbindAddress();">
                       
						     <option>-</option>
							  <option>Yes</option>
                      </select>
                    </div>
					</div>
					<div class="col-sm-7">
                    <div class="form-group" id="gtxtPhone">
                      <label for="exampleInputPassword1">Phone No.</label>
                            <input type="Number" class="form-control" id="txtPhoneNo" placeholder="Enter Phone No." oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "12" onchange="validte(this.value.length,'gtxtPhone')">
                    </div>
                  </div>
				  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Fax</label>
                            <input type="text" class="form-control" id="txtFax" placeholder="Enter Fax">
                    </div>
                  </div>
				  <div class="col-sm-8">
                    <div class="form-group" id="gtxtemail">
                      <label for="exampleInputPassword1">Email</label>
                            <input type="Email" class="form-control" id="txtEmail" placeholder="Enter Email" onchange="validte(this.value.length,'gtxtPhone')">
                    </div>
                  </div>
	</div>
  </div>
                  </div>
 
				
                </div>
                 <div class="col-sm-6">
                                       <div class="panel panel-info"  id="divGovt">
    <div class="panel-heading">Govt. Addl. Details</div>
    <div class="panel-body">
	
	 <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">AIN</label>
                            <input type="number" class="form-control" id="txtGAIN" placeholder="Enter AIN">
                    </div>
                  </div> <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">State</label>
                          
						   <select  id= "txtGState" class="form-control" >
         <?php  $query ="SELECT 0  AS Id,'--select--' AS Description UNION ALL SELECT Id,Description FROM State";

    $result = mysqli_query($dbcon,$query);
    while($row=mysqli_fetch_array($result)){                                                 
       echo "<option value='".$row['Id']."'>".$row['Description']."</option>";       
    }
?>
                </select>
                    </div>
                  </div>
				  
				   <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">PAO Code</label>
                            <input type="number" class="form-control" id="txtGPAOCode" placeholder="Enter PAO Code">
                    </div>
                  </div>
				  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Regn. No.</label>
                            <input type="text" class="form-control" id="txtGPRegnNo" placeholder="Enter Regn. No.">
                    </div>
                  </div>
				   <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">DDO Code</label>
                            <input type="number" class="form-control" id="txtGDDOCode" placeholder="Enter DDO Code">
                    </div>
                  </div>
				   <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Regn. No.</label>
                            <input type="text" class="form-control" id="txtDPRegnNo" placeholder="Enter Regn. No.">
                    </div>
                  </div>
				   <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Ministry</label>
                            <input type="text" class="form-control" id="txtMinistry" placeholder="Enter Ministry">
                    </div>
                  </div>
				   <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Other Name</label>
                            <input type="text" class="form-control" id="txtOtherName" placeholder="Enter Other Name">
                    </div>
                  </div>
			
	</div>
  </div>
                               <div class="panel panel-info">
    <div class="panel-heading">Responsible Person Details</div>
    <div class="panel-body">
	
	 <div class="col-sm-6">
                    <div class="form-group" id="gtxtRPAN">
                      <label for="exampleInputPassword1">Responsible Person PAN<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="txtRPAN" placeholder="Enter PAN No." onchange="rcheckpan();" maxlength="10">
							  <label id="lblinvalidrPan" style="color:red;display:none;">Invalid PAN Format</label>
                    </div>
                  </div>
 <div class="col-sm-6">
                    <div class="form-group" id="gtxtRname">
                      <label for="exampleInputPassword1">Name<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="txtRName" placeholder="Enter Name" onchange="validte(this.value.length,'gtxtRname')">
                    </div>
                  </div>
				  <div class="col-sm-6">
                     <div class="form-group">
                      <label for="exampleInputPassword1">Gender:</label>&nbsp;&nbsp;<br>
                        <label> 
                      <input type="radio" id="rdbGender" value="Male" checked />Male
                    </label>
                    <label>
                      <input type="radio" id="rdbGender" value="Female"/>Female</label>
                    <label>
                    </div>
                  </div>
				  
				  
				  <div class="col-sm-6">
                    <div class="form-group" id="gtxtRdesig">
                      <label for="exampleInputPassword1">Designation<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="txtRDesignation" placeholder="Enter Designation" onchange="validte(this.value.length,'gtxtRdesig')">
                    </div>
                  </div>
				   <div class="col-sm-6" style="display:none:">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Father's Name</label>
                            <input type="text" class="form-control" id="txtRFatheName" placeholder="Enter Father's Name">
                    </div>
                  </div>
				   		   <div class="col-sm-6">
                    <div class="form-group" id="gtxtRaddress1">
                      <label for="exampleInputPassword1">Address Line1<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="txtRAddress1" placeholder="Enter Address Line1" onchange="validte(this.value.length,'gtxtRaddress1')">
                    </div>
                  </div>
				   <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Address Line2</label>
                            <input type="text" class="form-control" id="txtRAddress2" placeholder="Enter Address Line2">
                    </div>
                  </div>
				   <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Address Line3</label>
                            <input type="text" class="form-control" id="txtRAddress3" placeholder="Enter Address Line3">
                    </div>
                  </div>
				   <div class="col-sm-6">
                    <div class="form-group" id="gtxtRcity">
                      <label for="exampleInputPassword1">City<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="txtRCity" placeholder="Enter City" onchange="validte(this.value.length,'gtxtRcity')">
                    </div>
                  </div>
				   <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">State<span style="color:red;">*</span></label>
                         
							  <select  id= "txtRState" class="form-control" >
         <?php  $query ="SELECT 0  AS Id,'--select--' AS Description UNION ALL SELECT Id,Description FROM State";

    $result = mysqli_query($dbcon,$query);
    while($row=mysqli_fetch_array($result)){                                                 
       echo "<option value='".$row['Id']."'>".$row['Description']."</option>";       
    }
?>
                </select>
                    </div>
                  </div>
				   <div class="col-sm-6">
                    <div class="form-group" id="gtxtRPincode">
                      <label for="exampleInputPassword1">Pincode<span style="color:red;">*</span></label>
                            <input type="Number" class="form-control" id="txtRPincode" placeholder="Enter Pincode" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "6" onchange="validte(this.value.length,'gtxtRPincode')">
                    </div>
                  </div>
				   <div class="col-sm-6">
                    <div class="form-group" id="gtxtRmobile">
                      <label for="exampleInputPassword1">Mobile No.<span style="color:red;">*</span></label>
                            <input type="Number" class="form-control" id="txtRMobile" placeholder="Enter Mobile No." oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10" onchange="validte(this.value.length,'gtxtRmobile')">
                    </div>
                  </div>
				   <div class="col-sm-6">
                    <div class="form-group" id="gtxtRemail">
                      <label for="exampleInputPassword1">Email<span style="color:red;">*</span></label>
                            <input type="Email" class="form-control" id="txtREmail" placeholder="Enter Email" onchange="validte(this.value.length,'gtxtRemail')">
                    </div>
                  </div>
			<div class="col-sm-6">
                    <div class="form-group" id="gtxtPassword">
                      <label for="exampleInputPassword1">Password<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="txtPassword" placeholder="Enter Password" onchange="validte(this.value.length,'gtxtPassword')">
                    </div>
                  </div>
	</div>
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
                   
                  </div><!-- /.box-body -->

                  <div class="box-footer" style="    padding-left: 4%;">

                     <input type="hidden" id="pkvId">
          <input  type="submit" value="Save"  id="save"  class="btn btn-primary" onclick="return validateRForm();" />
       
      <input type="submit" value="Update"  id="update" style="display:none;"  class="btn btn-primary" onclick="return validateRForm();"/>
    
				<input type="hidden" class="form-control" id="userid" value=<?php echo $_SESSION["UserlogId"];  ?> > 
					<div id="ss">



					
                  </div>
                </form>
              </div><!-- /.box -->

             

                  
                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section>

            <div class="col-sm-12" style="border-left: 1px solid #eee;">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">View Client</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"><div id="example1_length" class="dataTables_length"><label> <select  id="ddlshow" onchange="bindgrid();"size="1" name="example1_length" aria-controls="example1"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> records per page</label></div></div><div class="col-xs-6"></div></div>
          <table class="table table-bordered table-hover table-striped" id="sTableRow">

                  </table>
            
           <div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example1_info">Showing <label id="lblstart">0</label> to <label id="lbloutof">0</label> of <label id="lblrec">0</label> entries</div>
					  </div>
					  <div class="col-xs-6"></div></div></div>
                </div><!-- /.box-body -->
              </div>
          
          
          
             </div> 
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
