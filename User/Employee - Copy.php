
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
		
		var ddlshowval="10";
		
    document.getElementById('sTableRow').innerHTML="";
    document.getElementById('sTableRow').innerHTML="<thead><tr><th>#</th><th>Name</th><th>City</th><th>Designation</th><th>Mobile</th><th>PAN Reference</th><th>Action</th></tr></thead><tbody>";
    var slno=0;
	var ahref="";

    var url = "sub/bind_list.php?show=" +ddlshowval+"&cid=0&tbl=Employee";
//alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
    var id= field.Id;
   
   
 	slno++;
	  
    ahref="<a class='Myedit' id='Myedit' href='javascript:FillCtrl("+id+")'><i class='fa fa-pencil' aria-hidden='true' ></i></a>  | <a onclick='javascript:confirmationDelete($(this));return false;' href='javascript:DeleteRecord("+id+")'><i class='fa fa-times' aria-hidden='true' ></i></a>";
      
    $("#sTableRow").append("<tr><td>"+slno+"</td><td style='font-size: 11px;'>"+field.Name+"</td><td style='font-size: 13px;'>"+field.City+"</td><td style='font-size: 13px;'>"+field.desig+"</td><td style='font-size: 13px;'>"+field.Mobile+"</td><td style='font-size: 13px;'>"+field.PanNo+"</td><td>"+ahref);
    
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
    if (document.getElementById("txtFatherName").value == "") {
  $("#gtxtFatherName").attr('class', 'form-group has-error');
  document.getElementById("txtFatherName").focus();
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

      var txtSerial = $("#txtSerial").val();  
       var txtinital = $("#txtinital").val();   
       var txtname = $("#txtname").val();
	   var txtFatherName = $("#txtFatherName").val();
	   var txtresidential = $("#txtresidential").val();
       var txtAddress1 = $("#txtAddress1").val();   
       var txtAddress2 = $("#txtAddress2").val();   
       var txtAddress3 = $("#txtAddress3").val();
       var txtCity = $("#txtCity").val(); 
       var txtState = $("#txtState").val();
       var txtPincode = $("#txtPincode").val();   
       var txtdob = $("#txtdob").val();
       var txtesc = $("#txtesc").val(); 
       var txtgender = $("#txtgender").val();
        var reservation = $("#reservation").val();  
       var txtPhone = $("#txtPhone").val();
 var txtmobile = $("#txtmobile").val(); 
       var txtemail = $("#txtemail").val();
        var txtPan = $("#txtPan").val();  
       var txtPanRef = $("#txtPanRef").val();
      
	   var txtsc = $("#txtsc").val(); 
      
	   	   var txtFrmdate = reservation.substr(0, 10);
	   var txtTodate = reservation.substr(13, 10);
 
	   var txtDesig = $("#txtDesig").val();
                var dataString = "txtSerial="+txtSerial+"&txtinital=" + txtinital+"&txtname="+txtname+"&txtFatherName="+txtFatherName+"&txtresidential="+txtresidential+"&txtAddress1=" + txtAddress1+"&txtAddress2="+txtAddress2+"&txtAddress3=" + txtAddress3+"&txtCity=" + txtCity+"&txtState="+txtState+"&txtPincode=" + txtPincode+"&txtsc="+txtsc+"&txtdob=" + txtdob+"&txtFrmdate="+txtFrmdate+"&txtTodate="+txtTodate+"&txtDesig="+txtDesig+"&txtesc="+txtesc+"&txtgender=" + txtgender+"&reservation=" + reservation+"&txtPhone=" + txtPhone+"&txtmobile=" + txtmobile+"&txtemail=" + txtemail+"&txtPan=" + txtPan+"&txtPanRef=" + txtPanRef+"&Tname=Employee&save=";
//alert(dataString);

            if ($.trim(txtname).length > 0 && $.trim(txtCity).length > 0 && $.trim(txtPincode).length > 0 && $.trim(txtmobile).length > 0 && $.trim(txtPanRef).length > 0 ) {
         
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

  window.location.href="Employee.php";  
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
       var txtinital = $("#txtinital").val();   
       var txtname = $("#txtname").val();
	   var txtFatherName = $("#txtFatherName").val();
	   var txtresidential = $("#txtresidential").val();
       var txtAddress1 = $("#txtAddress1").val();   
       var txtAddress2 = $("#txtAddress2").val();   
       var txtAddress3 = $("#txtAddress3").val();
       var txtCity = $("#txtCity").val(); 
       var txtState = $("#txtState").val();
       var txtPincode = $("#txtPincode").val();   
       var txtdob = $("#txtdob").val();
       var txtesc = $("#txtesc").val(); 
       var txtgender = $("#txtgender").val();
        var reservation = $("#reservation").val();  
       var txtPhone = $("#txtPhone").val();
 var txtmobile = $("#txtmobile").val(); 
       var txtemail = $("#txtemail").val();
        var txtPan = $("#txtPan").val();  
       var txtPanRef = $("#txtPanRef").val();
      
	   var txtsc = $("#txtsc").val(); 
      
	   	   var txtFrmdate = reservation.substr(0, 10);
	   var txtTodate = reservation.substr(13, 10);
 
	   var txtDesig = $("#txtDesig").val();
     var pkvId = $("#pkvId").val();
           var dataString = "txtSerial="+txtSerial+"&txtinital=" + txtinital+"&txtname="+txtname+"&txtFatherName="+txtFatherName+"&txtresidential="+txtresidential+"&txtAddress1=" + txtAddress1+"&txtAddress2="+txtAddress2+"&txtAddress3=" + txtAddress3+"&txtCity=" + txtCity+"&txtState="+txtState+"&txtPincode=" + txtPincode+"&txtsc="+txtsc+"&txtdob=" + txtdob+"&txtFrmdate="+txtFrmdate+"&txtTodate="+txtTodate+"&txtDesig="+txtDesig+"&txtesc="+txtesc+"&txtgender=" + txtgender+"&reservation=" + reservation+"&txtPhone=" + txtPhone+"&txtmobile=" + txtmobile+"&txtemail=" + txtemail+"&txtPan=" + txtPan+"&txtPanRef=" + txtPanRef+"&Tname=Employee&pkvId=" + pkvId+"&update=";
//alert(dataString);
               if ($.trim(txtname).length > 0 && $.trim(txtCity).length > 0 && $.trim(txtPincode).length > 0 && $.trim(txtmobile).length > 0 && $.trim(txtPanRef).length > 0 ) {
         
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
<div class="content-wrapper">
<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Employee</h3>
                </div><!-- /.box-header onclick="saves();" -->
                <!-- form start -->
                <form id="frm">
                  <div class="box-body">
                    <div class="col-sm-12">
					   <div class="col-sm-6">
					   <div class="col-sm-12 nopad">
					    <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Serial Number</label>
					  <?php  
	   
	 $query ="SELECT EmployeeCtr FROM Parameter where Id=1";

 $result = mysqli_query($dbcon,$query);
   while($row=mysqli_fetch_array($result)){                                                 
   $empctr=$row['EmployeeCtr'];  
  }
?>
                      <input type="Number" class="form-control" id="txtSerial" value="<?php echo $empctr; ?>" disabled>
                    </div>
                  </div>
				     <div class="col-sm-3">
                    <div class="form-group">
                       <label for="exampleInputPassword1">Title</label>
                       <select class="form-control" id="txtinital" required>
                        <option>Kum</option>
                        <option>M/s</option>
                        <option>Miss</option>
                        <option>Mr</option>
                        <option>Mrs</option>
                        <option>Shri</option>
                        <option>Smt</option>
                        <option>Sri</option>
                      </select>
                    </div>
                  </div>
				   </div>
					  
				   <div class="col-sm-6">
                    <div class="form-group">
                    
					
                    <div class="form-group" id="gtxtname">
					  <label for="exampleInputPassword1">Name</label>
                      <input type="text" class="form-control" id="txtname" placeholder=" Enter Name" onchange="validte(this.value.length,'gtxtname')">
                      </div>
                    
                    </div>
                  </div>
				  <div class="col-sm-6">
				
                    <div class="form-group" id="gtxtFatherName">
                        <label>Father's Name</label>
                      <input type="text" class="form-control" id="txtFatherName" placeholder="Enter Father's Name" onchange="validte(this.value.length,'gtxtFatherName')">
                    </div>
                  </div>
				    <div class="col-sm-6">
                    <div class="form-group">
                      <label>Residential Status</label>
                      <select class="form-control" id="txtresidential">
                        <option>Resident in India</option>
                        <option>Resident but not ordinarily Resident in India</option>
                        <option>Not Resident in India</option>
                      </select>
                    </div>
                  </div>
				 
				    <div class="col-sm-6">
                    <div class="form-group">
                      <label>Address Line1</label>
                      <input type="text" class="form-control" id="txtAddress1" placeholder="Enter Address Line1" required>
                    </div>
                  </div>
                   <div class="col-sm-4">
                    <div class="form-group">
                      <label>Address Line2</label>
                      <input type="text" class="form-control" id="txtAddress2" placeholder="Enter Address Line2" required>
                    </div>
                  </div>
                   <div class="col-sm-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Address Line3</label>
                      <input type="text" class="form-control" id="txtAddress3" placeholder="Enter Address Line3" required>
                    </div>
                  </div>
                   <div class="col-sm-4">
                    <div class="form-group" id="gtxtCity">
                      <label for="exampleInputPassword1">City</label>
                      <input type="text" class="form-control" id="txtCity" placeholder="City" onchange="validte(this.value.length,'gtxtCity')">
                    </div>
                  </div>
				    <div class="col-sm-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">State</label>
                   
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
                      <label for="exampleInputPassword1">Pincode</label>
                      <input type="Number" class="form-control" id="txtPincode" placeholder="Pincode" onchange="validte(this.value.length,'gtxtPincode')">
                    </div>
                  </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Date Of Birth</label>
                          <input type="text" class="form-control" id="txtdob" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required />
                    </div>
                  </div>
					   </div>
					   
					   
					<div class="col-sm-6" style="border-left: 1px solid #eee;">
					   
					   <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Is Employee a Diretor of a Person with Substantial interest in the Company</label>
					  <fieldset id="group1">
                      <label> 
                      <input type="radio" id="txtesc" class="minimal" name="group1"/>Yes
                    </label>&nbsp;&nbsp;
                    <label>
                      <input type="radio" id="txtesc"  class="minimal" name="group1" checked/>No
                    </label>
					</fieldset>
                    <label>
                    </div>
                  </div>
				   <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Gender:</label>&nbsp;&nbsp;
					   <fieldset id="group2">
                        <label> 
                      <input type="radio" name="group2" class="minimal" id="txtgender"/>Male
                    </label>
                    <label>
                      <input type="radio" name="group2" class="minimal" id="txtgender"/>Female
                    </label>
					</fieldset>
                    <label>
                    </div>
                  </div>
                   <div class="col-sm-6">
                    <div class="form-group">
					 <fieldset id="group3">
                      <label> 
                      <input type="radio" name="group3" class="minimal" id="txtsc"  />Senior Citizen
                    </label><br>
                    <label>
                      <input type="radio" name="group3" class="minimal" id="txtsc" />Very Senior Citizen
                    </label>
					</fieldset>
                    </div>
                  </div>
				   <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Designation</label>
                      <div class="form-group">
                    <select class="form-control" id="txtDesig" required>
                          <?php  $query ="SELECT 0  AS Id,'--select--' AS Description UNION ALL SELECT Id,Description FROM Designation";

    $result = mysqli_query($dbcon,$query);
    while($row=mysqli_fetch_array($result)){                                                 
       echo "<option value='".$row['Id']."'>".$row['Description']."</option>";       
    }
?>
                      </select>
                      </div>
                    </div>
                  </div>
				       <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Employment From Date/To Date</label>
                     
                     <input type="text" class="form-control pull-right" id="reservation" required />
                    </div>
                  </div>
                
                   
                   <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Phone </label>
                      <input type="Number" class="form-control"  placeholder="Enter Phone" id="txtPhone" required>
                    </div>
                  </div>
                   <div class="col-sm-6">
                    <div class="form-group" id="gtxtmobile">
                      <label for="exampleInputPassword1">Mobile</label>
                      <input type="Number" class="form-control" id="txtmobile" placeholder="Mobile" onchange="validte(this.value.length,'gtxtmobile')">
                    </div>
                  </div>
				   <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Email</label>
                      <input type="email" class="form-control" id="txtemail" placeholder="Email" required>
                    </div>
                  </div>
                     <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Pan</label>
                      
                    <div class="form-group">
                    <select class="form-control" id="txtPan" required>
                        <option>PANAPPLIED</option>
                        <option>PANINVALID</option>
                        <option>PANNOTVBL</option>
                      </select>
                      </div>
                      

                    </div>
                  </div>
                    <div class="col-sm-6">
                     <div class="form-group" id="gtxtPanRef">
                      <label for="exampleInputPassword1">Pan Reference</label>
                      <input type="text" class="form-control" id="txtPanRef" placeholder="Pan  Reference" onchange="validte(this.value.length,'gtxtPanRef')">
                    </div>
                  </div>
					   </div>
					
					
					
                    
                </div>
              
                  <div class="col-lg-12">
				  <div class="col-lg-6">
				  <div class="alert alert-success alert-dismissable" id="alert-success" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6>	<i class="icon fa fa-check"></i> Employee Details Submitted Successfully!</h6>
                    </div>
                  </div>
				  </div>
                   
                  </div><!-- /.box-body -->

                  <div class="box-footer" style="margin-left: 4%;">
				  <input  type="submit" value="Save"  id="save"  class="btn btn-primary" onclick="return validateRForm();" />
       
      <input type="submit" value="update"  id="Update" style="display:none;"  class="btn btn-primary" onclick="return validateRForm();"/>
    
                   </div>
                </form>
              </div><!-- /.box -->

              <!-- Form Element sizes -->






              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">View Employee</h3>
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
              
           
          </div>   <!-- /.row -->
        </section>
      </div>









        <script type="text/javascript">
		function saves()
		{
			alert("Afsdf");
		}
		function SubmitFfm(btntxt)
{
	
    $('#frm').find('[type="submit"]').trigger('click');
	
	
}
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
