<?php include("header.php");  ?>
<?php include("dbConnect/dbConnect.php");?>
<style>
@media (min-width: 768px)
.form-inline .form-control {
    display: inline-block;
  
    vertical-align: middle;
}
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
.input-sm
{
	  width: 75px!important;
}
</style>
<script>
 $(document).ready(function() {

 function bindotherdate()
 {
	 document.getElementById('txtTaxDeductedDate').value = document.getElementById('txtPaidDate').value;
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

function bindChallanDetails(slno)
{
	if(slno ==1)
	{
	 var empcnt= document.getElementById("lblrec").innerHTML;
	 for(var k=2;k<=empcnt;k++)
	 {
		 
		 var firstval= $("#txtChallanId1").val();
		  $("#txtChallanId"+k).val(firstval);
		 
	}}

/* 

		var txtclientId = $("#txtclientId").val();
	 var txtchallanSerialNo=document.getElementById('txtChallanId1').value;
	     var url = "sub/bind_Details.php?cid="+txtchallanSerialNo+"&tbl=Challan&clientId="+txtclientId;
   
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
		alert(field.ChallanNo);
 document.getElementById('txtChallanNo').innerHTML=field.ChallanNo;
   document.getElementById('txtIncomeTax').innerHTML=field.IncomeTax;
   var str=field.ChallanDate;
 str=  str.substr(0,str.indexOf(' '));

 var cdate=str;
		cdate=moment(cdate, 'YYYY/MM/DD').format('DD/MM/YYYY');
         $("#txtChallanDate").val(cdate);  

  
    });
	getamt();
    });
	 */
	
	
}
  
    function bindgrid(ddlshow) {
		
			var ddlshowval = "10";
		var txtclientId = $("#txtclientId").val();
    document.getElementById('sTableRow').innerHTML="";
	
    document.getElementById('sTableRow').innerHTML="<thead><tr><th>#</th><th>Emp. Name</th><th>PAN No.</th><th>Salary Amt</th><th>Income Tax</th><th>Challan Sl. No.</th></tr></thead><tbody>";
    var slno=0;
	var ahref="";
 gettotalRec();
    var url = "sub/bind_list.php?show=" +ddlshowval+"&cid=0&tbl=Employee&clientId="+txtclientId;
//alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
		
    var id= field.Id;
 	slno++;
	  	
  
				
    $("#sTableRow").append("<tr><td>"+slno+"</td><td style='font-size: 11px;'><input type='hidden' id='txtEmployeeId"+slno+"' name='txtEmployeeId"+slno+"' value="+field.Id+">"+field.Name+"</td><td style='font-size: 13px;'>"+field.PanNo+"</td><td style='font-size: 13px;'><input type='number' name='txtAmount"+slno+"' class='form-control input-sm' id='txtAmount"+slno+"' placeholder='Rs.' onchange='validte(this.value.length,'gtxtAmount')' ></td><td style='font-size: 13px;'> <input type='number' class='form-control input-sm' id='txtTaxDeducted"+slno+"' name='txtTaxDeducted"+slno+"' placeholder='Rs.' onchange='getamt()' required></td><td style='font-size: 13px;'><select  id= 'txtChallanId"+slno+"' name='txtChallanId"+slno+"' class='form-control input-sm' onchange='bindChallanDetails("+slno+");' ></select></td><td style='display:none;'> <label for='exampleInputPassword1' >Challan/Voucher No.</label> <label id='txtChallanNo'></label> <label for='exampleInputPassword1'>Income Tax</label><label id='txtIncomeTax'></label> </td><td>"+ahref);
    
	
	
	
		
      $("#sTableRow").append("</tbody>");
	       document.getElementById("lblstart").innerHTML="1";  
    });
	
	
	
      $("#sTableRow").append("</td></tr>");
	   var url = "sub/bind_dropdown.php?tbl=Challan&clientId="+txtclientId;
//alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
		for(var j=1;j<=slno;j++)
		{
		 $("#txtChallanId"+j).append("<option value='"+field.Id+"'>"+field.ChallanNo+"</option>");
		}
		});
		});
		
		
	 document.getElementById("lbloutof").innerHTML=slno;
	 if(slno==0)
	 {
		 document.getElementById("lblstart").innerHTML="0";  
	 }
	
    });
    }
	
	
		function  gettotalRec()
	{
		var txtclientId = $("#txtclientId").val();
		var url = "sub/bind_alltotal.php?Tname=Employee&clientId="+txtclientId;
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
   
  var es1 = document.getElementById("txtchallanSerialNo");
                var strUsers1 = es1.options[es1.selectedIndex].value;
                if(strUsers1==0)
                {
					  $("#gtxtchallanSerialNo").attr('class', 'form-group has-error');
  document.getElementById("txtchallanSerialNo").focus();
                return false;
                }

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
                  <h3 class="box-title">24Q Salary Information</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
            
                 
				  
				  <div class="col-lg-12 nopad">
				 
					
					
					<div class="col-sm-6 nopad">
					
							   
		   <div class="box">
                     <div class="box-header with-border">
				   <div class="col-lg-3 ">
                  <h3 class="box-title">View Salary Info.</h3>
				   <input type="hidden" class="form-control" id="txtclientId" value=<?php echo $_SESSION["loginId"];  ?> >
    
                    </div>
          <div class="col-lg-1">
		
		        </div>
              
                 
				  
				  <!-- /.box-tools -->
                </div><!-- /.box-header -->
				<form method="post" action="">
                <div class="box-body">
                  <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
				   <div class="table-responsive">
				  <table class="table table-bordered table-hover table-striped" id="sTableRow">

                  </table>
				  </div>
				     <div class="box-footer" style="margin-left: 4%;">
				  <input type="hidden" id="pkvId">
				  
      <input type="submit" value="Update"  id="update"  name="update" class="btn btn-primary" onclick="return validateRForm();"/>

                   </div>
					<div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example1_info">Showing <label id="lblstart">0</label> to <label id="lbloutof">0</label> of <label id="lblrec">0</label> entries</div>
					  </div>
					  <div class="col-xs-6"></div></div></div>
                </div><!-- /.box-body -->
				</form>
              </div>
					
				 
					
					</div>
					
					
					
					
					
					<div class="col-sm-6">
					
							   
		   <div class="box">
                     <div class="box-header with-border">
				   <div class="col-lg-3 ">
                  <h3 class="box-title">View Salary Info.</h3>
				   <input type="hidden" class="form-control" id="txtclientId" value=<?php echo $_SESSION["loginId"];  ?> >
    
                    </div>
          <div class="col-lg-1">
		
		        </div>
              
                 
				  
				  <!-- /.box-tools -->
                </div><!-- /.box-header -->
				<form method="post" action="">
                <div class="box-body">
                  <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
				   <div class="table-responsive">
				  <table class="table table-bordered table-hover table-striped" id="sTableRow">

                  </table>
				  </div>
				     <div class="box-footer" style="margin-left: 4%;">
				  <input type="hidden" id="pkvId">
				  
      <input type="submit" value="Update"  id="update"  name="update" class="btn btn-primary" onclick="return validateRForm();"/>

                   </div>
					<div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example1_info">Showing <label id="lblstart">0</label> to <label id="lbloutof">0</label> of <label id="lblrec">0</label> entries</div>
					  </div>
					  <div class="col-xs-6"></div></div></div>
                </div><!-- /.box-body -->
				</form>
              </div>
					
				 
					
					</div>
					<div class="col-sm-4">
					
							   
		   <div class="box">
                     <div class="box-header with-border">
				   <div class="col-lg-3 ">
                  <h3 class="box-title">View Salary Info.</h3>
				   <input type="hidden" class="form-control" id="txtclientId" value=<?php echo $_SESSION["loginId"];  ?> >
    
                    </div>
          <div class="col-lg-1">
		
		        </div>
              
                 
				  
				  <!-- /.box-tools -->
                </div><!-- /.box-header -->
				<form method="post" action="">
                <div class="box-body">
                  <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
				   <div class="table-responsive">
				  <table class="table table-bordered table-hover table-striped" id="sTableRow">

                  </table>
				  </div>
				     <div class="box-footer" style="margin-left: 4%;">
				  <input type="hidden" id="pkvId">
				  
      <input type="submit" value="Update"  id="update"  name="update" class="btn btn-primary" onclick="return validateRForm();"/>

                   </div>
					<div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example1_info">Showing <label id="lblstart">0</label> to <label id="lbloutof">0</label> of <label id="lblrec">0</label> entries</div>
					  </div>
					  <div class="col-xs-6"></div></div></div>
                </div><!-- /.box-body -->
				</form>
              </div>
					
				 
					
					</div>
				
				
				
</div>
<div class="col-lg-12">
  
</div>


				
				

     
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
		   

        </section>
      </div>


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
	 


<?php 
			
date_default_timezone_set("Asia/Kolkata");
$dte = date('Y/m/d H:i:s');
if (isset($_POST["update"]) )

{
	$Ctr=0;
		
$qry="SELECT SalaryCtr FROM Parameter where  ClientId='".$_SESSION["loginId"]."'";

$q=mysqli_query($dbcon,$qry);
while ($row=mysqli_fetch_array($q)){
$SalaryCtr=$row["SalaryCtr"];	

}
$Ctr=intval($SalaryCtr);


	for($i=0;$i<=3;$i++)
	{
		
$res=mysqli_query($dbcon,"insert into `dbsilicon`.`SalaryInformation` 
	(
	`Serial`, 
	`EmployeeId`, 
	`Amount`, 
	`PaidDate`, 
	`TaxDeductedDate`,
	`TaxDeducted`,
	`IncTax`,
	`SurchargeAmt`, 
	`EduCessAmt`,
	`ChallanId`,
	`IncomeTax`, 
	`ClientId`,
	`CreatedOn`
	)
	values
	( 
	'".$Ctr."', 
	'".$_POST["txtEmployeeId".$i]."', 
	'".$_POST["txtAmount".$i]."', 
	'".$dte."', 
	'".$dte."', 
	'".$_POST["txtTaxDeducted".$i]."', 
	'".$_POST["txtAmount".$i]."', 
	'0', 
	'0', 
	'".$_POST["txtChallanId".$i]."', 
	'".$_POST["txtAmount".$i]."' ,
	'". $_SESSION["loginId"]."' ,
	'$dte'
	)");
	
	$Ctr++;
	}
	
	$Ctr=intval($Ctr)-1;
		mysqli_query($dbcon,"update dbsilicon.Parameter set SalaryCtr='".$Ctr."'  where ClientId='".$_SESSION["loginId"]."'");
	
             echo "success";  
   


	
	
   
   $_POST['update']='';
    $_POST['update']=null;
   
}

			
			
			include("footer.php");?>
