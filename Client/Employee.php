
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
  function rcheckpan()
{
	if (document.getElementById("txtPanRef").value != "") {
	let str = $("#txtPanRef").val();
var ss= /^[A-Za-z]{5}\d{4}[A-Za-z]{1}$/i.test(str) ;
if(ss==false)
{
    $("#gtxtPanRef").attr('class', 'form-group has-error');
  document.getElementById("txtPanRef").focus();
   $("#lblinvalidrPan").css('display','block');
   	
}
else
{
	$("#gtxtPanRef").attr('class', 'form-group');
	 $("#lblinvalidrPan").css('display','none');
}
}
}
  function gettotalRec()
	{
		var txtclientId = $("#txtclientId").val();
		
		var url = "sub/bind_alltotal.php?Tname=Employee&clientId="+txtclientId;
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
		var txtclientId = $("#txtclientId").val();		
		var ddlshowval = $("#ddlshow").val();
		
    document.getElementById('sTableRow').innerHTML="";
    document.getElementById('sTableRow').innerHTML="<thead><tr><th>#</th><th>Name</th><th>Designation</th><th>Mobile</th><th>PAN Reference</th><th>Action</th></tr></thead><tbody>";
    var slno=0;
	var ahref="";

    var url = "sub/bind_list.php?show=" +ddlshowval+"&cid=0&tbl=Employee&clientId="+txtclientId;
//alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
    var id= field.Id;
   
   
 	slno++;
	  
    ahref="<a class='Myedit' id='Myedit' href='javascript:FillCtrl("+id+")'><i class='fa fa-pencil' aria-hidden='true' ></i></a>  | <a onclick='javascript:confirmationDelete($(this));return false;' href='javascript:DeleteRecord("+id+")'><i class='fa fa-times' aria-hidden='true' ></i></a>";
      
    $("#sTableRow").append("<tr><td>"+slno+"</td><td style='font-size: 11px;'>"+field.Name+"</td><td style='font-size: 13px;'>"+field.DesignationId+"</td><td style='font-size: 13px;'>"+field.Mobile+"</td><td style='font-size: 13px;'>"+field.PanNo+"</td><td>"+ahref);
    
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

    

    if (document.getElementById("txtPanRef").value == "") {
   $("#gtxtPanRef").attr('class', 'form-group has-error');
  document.getElementById("txtPanRef").focus();
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
	
	   var txtDesig = $("#txtDesig").val();
	   var txtclientId = $("#txtclientId").val();	
	
                var dataString = "txtSerial="+txtSerial+"&txtname="+txtname+"&txtDesig="+txtDesig+"&txtmobile=" + txtmobile+"&txtPan=" + txtPan+"&txtPanRef=" + txtPanRef+"&clientId="+txtclientId+"&Tname=Employee&save=";
//alert(dataString);

            if ($.trim(txtname).length > 0 && $.trim(txtPanRef).length > 0  && $('#lblinvalidrPan:visible').length == 0 ) {
         
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

	txtSerial=parseFloat(txtSerial)+1;
      $("#txtSerial").val(txtSerial);  
	  $("#txtname").val("");
	  $("#txtmobile").val(""); 
      $("#txtPan").val("");  
     $("#txtPanRef").val("");
	
     $("#txtDesig").val("");
	 bindgrid();
  document.getElementById("alert-success").style.display="block";
     $("#alert-success").fadeTo(2000, 800).slideUp(800, function(){
    $("#alert-success").slideUp(800);
});
         }          

                        
                        else if ($.trim(data) == "exist") {
            alert('Record Already Exists!');
			 
                $("#save").val('Save');
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
		      var txtclientId = $("#txtclientId").val();
     var pkvId = $("#pkvId").val();
           var dataString = "txtSerial="+txtSerial+"&txtname="+txtname+"&txtDesig="+txtDesig+"&txtmobile=" + txtmobile+"&txtPan=" + txtPan+"&txtPanRef=" + txtPanRef+"&clientId="+txtclientId+"&Tname=Employee&pkvId=" + pkvId+"&update=";
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
  var url = "sub/bind_list.php?cid="+pkval+"&tbl=Employee&clientId="+txtclientId;
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
	  
   var txtclientId = $("#txtclientId").val();
  var url = "sub/deletecommon.php?pkvId="+pkval+"&Tname=Employee&clientId="+txtclientId;
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
                  <h3 class="box-title">24Q Employee</h3>
                </div><!-- /.box-header onclick="saves();" -->
                <!-- form start -->
                <form id="frm">
            
                    <div class="col-sm-12">
					   <div class="col-sm-6">
					    <div class="box">
					        <div class="box-body">
					    <div class="col-sm-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Serial Number</label>
					  <?php  
	   
	 $query ="SELECT EmployeeCtr FROM Parameter where  ClientId='".$_SESSION["loginId"]."'";

 $result = mysqli_query($dbcon,$query);
   while($row=mysqli_fetch_array($result)){                                                 
   $empctr=$row['EmployeeCtr'];  
  }
?>
                      <input type="Number" class="form-control" id="txtSerial" value="<?php echo $empctr; ?>" disabled>
                    </div>
                  </div>
				    
				
				   <div class="col-sm-8">
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
                      <label for="exampleInputPassword1">Mobile</label>
                      <input type="Number" class="form-control" id="txtmobile" placeholder="Mobile" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10" onchange="validte(this.value.length,'gtxtmobile')">
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
                      <label for="exampleInputPassword1">Pan Reference<span style="color:red;">*</span></label><label style=" font-weight: 100;">(eg : AAAPL1234C)
                      </label>
                      <input type="text" class="form-control" id="txtPanRef" placeholder="Pan  Reference" onchange="rcheckpan();" maxlength="10">
							  <label id="lblinvalidrPan" style="color:red;display:none;">Invalid PAN Format</label>
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
                  <h3 class="box-title">View Employee</h3>
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
					
					
					
					   </div>
					
					
					
                    
                </div>
              

               

             
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
            
            <?php include("footer.php");?>
