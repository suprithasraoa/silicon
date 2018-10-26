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
.lb
{
	    font-weight: 500;
		    margin-left: 10px;
}
</style>

	<script>

	$(document).ready(function(){
		bindValues();
		
	function bindValues()
	{
	var pkval="1";
	  var url = "sub/bind_list.php?cid="+pkval+"&tbl=Client";
//	  alert(url);
  $.getJSON(url, function(result) {

  console.log(result);
  $.each(result, function(i, field) {
 
	  $("#txtfinancialYearfrm").html(field.FinancialYearFrm); 
	  $("#txtfinancialYearto").html(field.FinancialYearTo);
	  	  $("#txtasstYearfrm").html(field.AsstYearFrm); 
	  $("#txtasstYearto").html(field.AsstYearTo);
	    $("#cmbStatus").html(field.DeductorStatus);
	 	  $("#cmbDeductorType").html(field.DeductorType); 
	  $("#txtDeductorPAN").html(field.DeductorPAN);
	   $("#txtName").html(field.Name);
	   $("#txtbranch").html(field.Branch);
	  			      $("#txtRName").html(field.RespPersonName);
					     $("#txtRPAN").html(field.RespPersonPAN);
	  	   $("#txtRDesignation").html(field.RespPersonDesig);
	   
	     // $("#txtRFatheName").val(field.GovtMinistry);
	 
	  $("#txtRMobile").html(field.RespPersonPhNo);
	  $("#txtREmail").html(field.RespPersonEmailId);
	
  });
  });
	}
		
	
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
				 <div class="col-sm-2">
				 </div>
				  <div class="col-sm-6">
                  <h3 class="box-title" style="font-weight: 700; margin-bottom: 11px; margin-top: 20px;">View Profile</h3>
				  </div>
				   <div class="col-sm-4">
				   </div>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                    <div class="col-sm-12">
					 <div class="col-sm-2">
	
					 </div>
                    <div class="col-sm-6">
                 
                   				 	  <div class="col-sm-6">
					    <div class="form-group" id="gtxtfinancialYearfrm">
                      <label for="exampleInputEmail1">Financial Year : </label>
              
					 
                    </div>
					  </div>
					    <div class="col-sm-6">
					    <div class="form-group" id="gtxtfinancialYearto">
                              <label id="txtfinancialYearfrm" class="lb"></label> - 
					 <label id="txtfinancialYearto" class="lb"></label>
                    </div>
					  </div>
					      <div class="col-sm-6">
                    <div class="form-group" id="gtxtasstYearfrm">
                      <label for="exampleInputPassword1">Asst. Year : </label>
                     
					   
                    </div>
                  </div>
				    <div class="col-sm-6">
                    <div class="form-group" id="gtxtasstYearto">
                                               <label id="txtasstYearfrm" class="lb"></label> - 
					    <label id="txtasstYearto" class="lb"></label>
                    </div>
                  </div>
				    <div class="col-sm-6">
                   <div class="form-group">
                      <label for="exampleInputPassword1">Status :   </label>
                    <label id="cmbStatus" class="lb"></label>
                    </div>
                  </div>
				 
                   <div class="col-sm-6">
                   <div class="form-group">
                      <label for="exampleInputPassword1">Deductor Type : </label>
               <label id="cmbDeductorType" class="lb"></label>
                    </div>
                  </div>
                  
                   <div class="col-sm-12">
                   <div class="panel panel-info">
    <div class="panel-heading">Deductor Details</div>
    <div class="panel-body">
	
	 <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Deductor PAN : </label>
                            <label id="txtDeductorPAN" class="lb"></label>
                    </div>
                  </div> 
				  
				   <div class="col-sm-6">
                    <div class="form-group" id="gtxtname">
                      <label for="exampleInputPassword1">Name : </label>
                            <label id="txtName" class="lb"></label>
                    </div>
                  </div>
				  <div class="col-sm-6">
                    <div class="form-group" id="gtxtbranch">
                      <label for="exampleInputPassword1">Branch/Division : </label>
                            <label id="txtbranch" class="lb"></label>
                    </div>
                  </div>

			
				
	</div>
  </div>
                  </div>
  <div class="col-sm-12">
				                   <div class="panel panel-info">
    <div class="panel-heading">Responsible Person Details</div>
    <div class="panel-body">
	
	 <div class="col-sm-6">
                    <div class="form-group" id="gtxtRPAN">
                      <label for="exampleInputPassword1">Resp. PAN : </label>
                            <label id="txtRPAN" class="lb"></label>
                    </div>
                  </div>
 <div class="col-sm-6">
                    <div class="form-group" id="gtxtRname">
                      <label for="exampleInputPassword1">Name : </label>
                            <label id="txtRName" class="lb"></label>
                    </div>
                  </div>
				 
				  <div class="col-sm-6">
                    <div class="form-group" id="gtxtRdesig">
                      <label for="exampleInputPassword1">Designation : </label>
                            <label id="txtRDesignation" class="lb"></label>
                    </div>
                  </div>
				  
		
				   <div class="col-sm-6">
                    <div class="form-group" id="gtxtRmobile">
                      <label for="exampleInputPassword1">Mobile No. : </label>
                            <label id="txtRMobile" class="lb"></label>
                    </div>
                  </div>
				   <div class="col-sm-6">
                    <div class="form-group" id="gtxtRemail">
                      <label for="exampleInputPassword1">Email : </label>
                            <label id="txtREmail" class="lb"></label>
                    </div>
                  </div>
			
	</div>
  </div>
  </div>
            
                </div>
                 <div class="col-sm-4">

                  
                </div>
         
                   
                  </div><!-- /.box-body -->

              
                  
                
                </div><!-- /.box-body -->
				
				
				
				
				<div class="box-footer" style="    padding-left: 4%;">
				  <input type="hidden" id="pkvid" value="1">
                    <button type="submit" class="btn btn-primary" style="background-color: white;border-color: white;" id="update" onclick="return validateRForm();">Submit</button>
					<div id="ss">
					
                  </div>
                
              </div>
			  
			  
			  
				  </form>
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section>
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
