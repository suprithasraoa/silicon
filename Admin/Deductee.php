
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
  function bindCounter(){
	
	$("#gtxtClientId").attr('class', 'form-group');
		 var txtClientId = $("#txtClientId").val();  
		 var url = "sub/get_Counter.php?ctr=DeducteeCtr&field=" +txtClientId;
//alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
    var DeducteeCtr= field.DeducteeCtr;
	$("#txtSerial").val(DeducteeCtr);
  

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
  function bindClient(clid){
	  //  $("#txtClientId").append("");
		document.getElementById("txtClientId").innerHTML="";
		$("#gtxtUserId").attr('class', 'form-group');
		 var txtUserId = $("#txtUserId").val();  
		   var url = "sub/bind_client.php?UserId=" +txtUserId;
//alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
    var id= field.Id;
   
   $("#txtClientId").append("<option value='"+field.Id+"'>"+field.Name+"</option>");
  if(clid!=0){

  $("#txtClientId").val(clid);
  }
    });

    });
	
	}
    function bindgrid(ddlshow) {
		
	var txtClientId = $("#txtCltId").val(); 
if	(txtClientId==null)	{
	txtClientId = 0;
}
		//var ddlshowval="10";
		var userid =$("#txtUsrId").val(); 
	var txtclientId = $("#txtCltId").val();	
		var ddlshowval = $("#ddlshow").val();
		
		
    document.getElementById('sTableRow').innerHTML="";
    document.getElementById('sTableRow').innerHTML="<thead><tr><th>#</th><th>User</th><th>Client</th><th>Name</th><th>Code</th><th>Designation</th><th>Mobile</th><th>PAN Reference</th><th>Action</th></tr></thead><tbody>";
    var slno=0;
	var ahref="";

    var url = "sub/bind_list.php?show=" +ddlshowval+"&cid=0&tbl=Deductee&CltId="+txtClientId+"&userid="+userid;
//alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
    var id= field.Id;
   
   
 	slno++;
	  
    ahref="<a class='Myedit' id='Myedit' href='javascript:FillCtrl("+id+")'><i class='fa fa-pencil' aria-hidden='true' ></i></a>  | <a onclick='javascript:confirmationDelete($(this));return false;' href='javascript:DeleteRecord("+id+")'><i class='fa fa-times' aria-hidden='true' ></i></a>";
      
    $("#sTableRow").append("<tr><td>"+slno+"</td><td style='font-size: 11px;'>"+field.UName+"</td><td style='font-size: 11px;'>"+field.CName+"</td><td style='font-size: 11px;'>"+field.EName+"</td><td style='font-size: 11px;'>"+field.Code+"</td><td style='font-size: 13px;'>"+field.DesignationId+"</td><td style='font-size: 13px;'>"+field.Mobile+"</td><td style='font-size: 13px;'>"+field.PanNo+"</td><td>"+ahref);
    
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
		
		var url = "sub/bind_alltotal.php?Tname=Deductee&clientId="+txtclientId;
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
    if (document.getElementById("txtname").value == "") {
    $("#gtxtname").attr('class', 'form-group has-error');
  document.getElementById("txtname").focus();
  return false;
  }
 

    if (document.getElementById("txtDesig").value == "") {
  $("#gtxtDesig").attr('class', 'form-group has-error');
  document.getElementById("txtDesig").focus();
  return false;
  }

    if (document.getElementById("txtmobile").value == "") {
  $("#gtxtmobile").attr('class', 'form-group has-error');
  document.getElementById("txtmobile").focus();
  return false;
  }

    if (document.getElementById("txtPanRef").value == "") {
		
	//  var panVal = $('#panNumber').val();
//var regpan = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;

//if(regpan.test(panVal)){
   //alert(" valid pan card number");
//} else {
  //   alert("invalid pan card number");
//}


   $("#gtxtPanRef").attr('class', 'form-group has-error');
  document.getElementById("txtPanRef").focus();
  return false;
  }

    if (document.getElementById("txtCode").value == "") {
  $("#gtxtCode").attr('class', 'form-group has-error');
  document.getElementById("txtCode").focus();
  return false;
  }
 
  }
   $(document).ready(function() {
	 
	   
	   
  $("#save").click(function() {

      var txtSerial = $("#txtSerial").val();  
     
       var txtname = $("#txtname").val();
	
 var txtmobile = $("#txtmobile").val(); 
         var txtPan = $("#txtPan").val();  
       var txtPanRef = $("#txtPanRef").val();
	 var txtCode = $("#txtCode").val();
	   var txtDesig = $("#txtDesig").val();
	   	   var txtclientId = $("#txtclientId").val();
                var dataString = "txtSerial="+txtSerial+"&txtname="+txtname+"&txtDesig="+txtDesig+"&txtmobile=" + txtmobile+"&txtPan=" + txtPan+"&txtPanRef=" + txtPanRef+"&clientId="+txtclientId+"&txtCode="+txtCode+"&Tname=Deductee&save=";


            if ($.trim(txtname).length > 0 && $.trim(txtPanRef).length > 0 ) {
         
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

  //window.location.href="Deductee.php";  
  document.getElementById("alert-success").style.display="block";
     $("#alert-success").fadeTo(2000, 800).slideUp(800, function(){
    $("#alert-success").slideUp(800);
	txtSerial=parseFloat(txtSerial)+1;
      $("#txtSerial").val(txtSerial);  
	  $("#txtname").val("");
	  $("#txtmobile").val(""); 
      $("#txtPan").val("");  
     $("#txtPanRef").val("");
	 $("#txtCode").val("");
     $("#txtDesig").val("");
	 bindgrid();
	   
	   
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
    		      var txtclientId = $("#txtclientId").val();
        var txtPan = $("#txtPan").val();  
       var txtPanRef = $("#txtPanRef").val();
     	   var txtDesig = $("#txtDesig").val();
     var pkvId = $("#pkvId").val();
	 	 var txtCode = $("#txtCode").val();
           var dataString = "txtSerial="+txtSerial+"&txtname="+txtname+"&txtDesig="+txtDesig+"&txtmobile=" + txtmobile+"&txtPan=" + txtPan+"&txtPanRef=" + txtPanRef+"&txtCode="+txtCode+"&clientId="+txtclientId+"&Tname=Deductee&pkvId=" + pkvId+"&update=";
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
window.location.href="Deductee.php";  
  //document.getElementById("alert-success").style.display="block";
    // $("#alert-success").fadeTo(2000, 800).slideUp(800, function(){
    //$("#alert-success").slideUp(800);
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

var txtclientId = $("#txtclientId").val();
  var url = "sub/bind_list.php?cid="+pkval+"&tbl=Deductee&clientId="+txtclientId;
 //alert(url);
  $.getJSON(url, function(result) {

  console.log(result);
  $.each(result, function(i, field) {
   
	$("#txtSerial").val(field.SerialNo);
		$("#txtCode").val(field.Code);
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

  var url = "sub/deletecommon.php?pkvId="+pkval+"&Tname=Deductee";
  //alert(url);
  $.getJSON(url, function(result) {

  console.log(result);
 
   if (result == "success") {
							
 alert('Deductee Deleted Successfully!');
	window.location.href="Deductee.php"; 
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
                  <h3 class="box-title">Deductee</h3>
                </div><!-- /.box-header onclick="saves();" -->
                <!-- form start -->
                <form id="frm">
                
                    <div class="col-sm-12">
					   <div class="col-sm-6">
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
                      <label for="exampleInputEmail1">Client <span style="color:red;" >*</span> </label>
                   
		 <select  id= "txtClientId" class="form-control" onchange="bindCounter();">
        
                </select>
                    </div>
                  </div>
				   	    
				   </div>
					    <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Serial Number</label>
					  <?php  
	   
	 $query ="SELECT DeducteeCtr FROM Parameter  where  ClientId='".$_SESSION["loginId"]."'";

 $result = mysqli_query($dbcon,$query);
   while($row=mysqli_fetch_array($result)){                                                 
   $empctr=$row['DeducteeCtr'];  
  }
?>
                      <input type="Number" class="form-control" id="txtSerial" value="<?php echo $empctr; ?>" disabled>
                    </div>
                  </div>
				    
				
				   <div class="col-sm-6">
                    <div class="form-group">
                    
					
                    <div class="form-group" id="gtxtname">
					  <label for="exampleInputPassword1">Name<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="txtname" placeholder=" Enter Name" onchange="validte(this.value.length,'gtxtname')">
                      </div>
                    
                    </div>
                  </div>
				   
				
				   <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Designation<span style="color:red;">*</span></label>
                      <div class="form-group">
                  <input type="text"  class="form-control" id="txtDesig" placeholder="Designation" />
                                              </div>
                    </div>
                  </div>
				     
                   
                  
                   <div class="col-sm-6">
                    <div class="form-group" id="gtxtmobile">
                      <label for="exampleInputPassword1">Mobile<span style="color:red;">*</span></label>
                      <input class="form-control" id="txtmobile" placeholder="Mobile" type="text" pattern="\d*" maxlength="10" onchange="validte(this.value.length,'gtxtmobile')">
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
                      <label for="exampleInputPassword1">Pan Reference<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="txtPanRef" placeholder="Pan  Reference" onchange="validte(this.value.length,'gtxtPanRef')">
                    </div>
                  </div>
				   <div class="col-sm-12 nopad">
				     <div class="col-sm-6">
                     <div class="form-group" id="gtxtCode">
                      <label for="exampleInputPassword1">Code<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="txtCode" placeholder="Code" onchange="validte(this.value.length,'gtxtCode')">
                    </div>
					    </div>
                  </div>
		  <div class="col-lg-12">
				  <div class="col-lg-6">
				  <div class="alert alert-success alert-dismissable" id="alert-success" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6>	<i class="icon fa fa-check"></i> Deductee Details Submitted Successfully!</h6>
                    </div>
                  </div>
			</div>
			  </div>
                         <div class="box-footer">
				  <input type="hidden" id="pkvId">
				  <input  type="submit" value="Save"  id="save"  class="btn btn-primary" style="margin-left: 2%;" onclick="return validateRForm();" />
       
      <input type="submit" value="Update"  id="update" style="display:none;"  class="btn btn-primary" style="margin-left: 2%;"  onclick="return validateRForm();"/>
         <input type="hidden" class="form-control" id="txtclientId" value=<?php echo $_SESSION["loginId"];  ?> >
                   </div>
				   </div>
					   </div>
					   
					   
					<div class="col-sm-6" style="border-left: 1px solid #eee;">
					   <div class="box">
                <div class="box-header">
                  <h3 class="box-title">View Deductee</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-4"><div class="form-group">
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
                    </div>
                  
				    <div class="col-sm-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Client</label>
                   
		 <select  id= "txtCltId" class="form-control" onchange="bindgrid();" >
 
                </select>
                    </div>
                  </div><div class="col-xs-4"><div id="example1_length" class="dataTables_length"><label><select  id="ddlshow" onchange="bindgrid();"  size="1" name="example1_length" aria-controls="example1"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> records per page</label></div></div><div class="col-xs-6"></div></div>
				  <table class="table table-bordered table-hover table-striped" id="sTableRow">

                  </table>
					  
					    <div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example1_info">Showing <label id="lblstart">0</label> to <label id="lbloutof">0</label> of <label id="lblrec">0</label> entries</div>
					  </div>
					  <div class="col-xs-6"></div></div></div>
                </div><!-- /.box-body -->
              </div>
					
					
					
					   </div>
					
					
					
                    
                </div>
              

                <!-- /.box-body -->

            
                </form>
              </div><!-- /.box -->

              <!-- Form Element sizes -->






           
              
           
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
