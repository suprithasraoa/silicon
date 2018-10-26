
<?php include("header.php"); ?>
<?php include("dbConnect/dbConnect.php");?>
<script>

  var varid =0;
  var edit=0;
  function validateRForm() {
    //alert("hi");

 if (document.getElementById("txtSerial").value == "") {
  alert("Enter Serial Number.");
  document.getElementById("txtSerial").focus();
  return false;
  }

   if (document.getElementById("txtinital").value == "") {
  alert("Enter Initial Name.");
  document.getElementById("txtinital").focus();
  return false;
  }
    if (document.getElementById("txtname").value == "") {
  alert("Enter Name.");
  document.getElementById("txtname").focus();
  return false;
  }

   if (document.getElementById("txtAddress1").value == "") {
  alert("Enter Address1.");
  document.getElementById("txtAddress1").focus();
  return false;
  }
    if (document.getElementById("txtAddress2").value == "") {
  alert("Enter Address2.");
  document.getElementById("txtAddress2").focus();
  return false;
  }

   if (document.getElementById("txtAddress3").value == "") {
  alert("Enter Address3.");
  document.getElementById("txtAddress3").focus();
  return false;
  }
  

   if (document.getElementById("txtCity").value == "") {
  alert("Enter City.");
  document.getElementById("txtCity").focus();
  return false;
  }
    if (document.getElementById("txtState").value == "") {
  alert("Enter State.");
  document.getElementById("txtState").focus();
  return false;
  }

   if (document.getElementById("txtPincode").value == "") {
  alert("Enter Pincode.");
  document.getElementById("txtPincode").focus();
  return false;
  }
    if (document.getElementById("txtdob").value == "") {
  alert("Enter Date of Birth.");
  document.getElementById("txtdob").focus();
  return false;
  }

    if (document.getElementById("txtesc").value == "") {
  alert("Enter Empolyee.");
  document.getElementById("txtesc").focus();
  return false;
  }

   if (document.getElementById("txtgender").value == "") {
  alert("Enter Gender.");
  document.getElementById("txtgender").focus();
  return false;
  }
    if (document.getElementById("txtFromTo").value == "") {
  alert("Enter From/To Date.");
  document.getElementById("txtFromTo").focus();
  return false;
  }
     if (document.getElementById("txtPhone").value == "") {
  alert("Enter Phone Number.");
  document.getElementById("txtPhone").focus();
  return false;
  }
    if (document.getElementById("txtmobile").value == "") {
  alert("Enter a Mobile Number.");
  document.getElementById("txtmobile").focus();
  return false;
  }

    if (document.getElementById("txtemail").value == "") {
  alert("Enter Email.");
  document.getElementById("txtemail").focus();
  return false;
  }

   if (document.getElementById("txtPan").value == "") {
  alert("Enter Pancard.");
  document.getElementById("txtPan").focus();
  return false;
  }
    if (document.getElementById("txtPanRef").value == "") {
  alert("Enter Pancard Reference.");
  document.getElementById("txtPanRef").focus();
  return false;
  }

   

  }
   $(document).ready(function() {
  $("#save").click(function() {
    //alert("shiva");
      var txtSerial = $("#txtSerial").val();
       var txtinital = $("#txtinital").val();   
       var txtname = $("#txtname").val();
       var txtAddress1 = $("#txtAddress1").val();   
       var txtAddress2 = $("#txtAddress2").val();   
       var txtAddress3 = $("#txtAddress3").val();
       var txtCity = $("#txtCity").val(); 
       var txtState = $("#txtState").val();
       var txtPincode = $("#txtPincode").val();   
       var txtdob = $("#txtdob").val();
       var txtesc = $("#txtesc").val(); 
       var txtgender = $("#txtgender").val();
        var txtFromTo = $("#txtFromTo").val();  
       var txtPhone = $("#txtPhone").val();
 var txtmobile = $("#txtmobile").val(); 
       var txtemail = $("#txtemail").val();
        var txtPan = $("#txtPan").val();  
       var txtPanRef = $("#txtPanRef").val();
      
                var dataString = "txtSerial="+txtSerial+"&txtinital=" + txtinital+"&txtname="+txtname+"&txtAddress1=" + txtAddress1+"&txtAddress2="+txtAddress2+"&txtAddress3=" + txtAddress3+"&txtCity=" + txtCity+"&txtState="+txtState+"&txtPincode=" + txtPincode+"&txtdob=" + txtdob+"&txtesc="+txtesc+"&txtgender=" + txtgender+"&txtFromTo=" + txtFromTo+"&txtPhone=" + txtPhone+"&txtmobile=" + txtmobile+"&txtemail=" + txtemail+"&txtPan=" + txtPan+"&txtPanRef=" + txtPanRef+"&Tname=Agent&save=";
alert(dataString);
            if ($.trim(txtAgencyName).length > 0 && $.trim(txtTerminalId).length > 0 && $.trim(txtContactNo).length > 0 && $.trim(txtEmailId).length > 0 && $.trim(txtAddress1).length > 0 && $.trim(txtAddress2).length > 0 && $.trim(txtAddress3).length > 0 && $.trim(txtCity).length > 0 && $.trim(txtState).length > 0 && $.trim(txtPincode).length > 0 && $.trim(txtTopup).length > 0  && $.trim(txtOutstanding).length > 0 && $.trim(txtUsername).length > 0 && $.trim(txtPassword).length > 0 ) {
         
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
 alert('Agent Added Successfully!');
  window.location.href="Agent.php";  
         }          

                        
                        else if (data == "exist") {
            alert('Terminal ID Already Exists!');
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
                  <h3 class="box-title">Empolyee</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                    <div class="col-sm-12">
                    <div class="col-sm-4">
                    <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Serial Number</label>
                      <input type="Number" class="form-control" id="txtSerial" placeholder="Enter Serial Number">
                    </div>
                  </div>

                   
                
                   <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Name</label>

                    <div class="form-group">
                    <select class="form-control" id="txtinital">
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
                    
                      <input type="text" class="form-control" id="txtname" placeholder=" Enter a  Name">
                    </div>
                  </div>
                   <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Address1</label>
                      <input type="text" class="form-control" id="txtAddress1" placeholder="Enter Address1">
                    </div>
                  </div>
                   <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Address2</label>
                      <input type="text" class="form-control" id="txtAddress2" placeholder="Enter Address2">
                    </div>
                  </div>
                   <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Address3</label>
                      <input type="text" class="form-control" id="txtAddress3" placeholder="Enter Address3">
                    </div>
                  </div>
                   <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputPassword1">City</label>
                      <input type="text" class="form-control" id="txtCity" placeholder="City">
                    </div>
                  </div>
                 
                </div>
                 <div class="col-sm-4">
                    <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">State</label>
                      <input type="text" class="form-control" id="txtState" placeholder="State">
                    </div>
                  </div>
                   <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Pincode</label>
                      <input type="Number" class="form-control" id="txtPincode" placeholder="Pincode">
                    </div>
                  </div>
                    <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Date Of Birth</label>
                          <input type="text" class="form-control" id="txtdob" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                    </div>
                  </div>
                    <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Is Employee a Diretor of a Person with Substantial interest in the Company</label>
                      <label> 
                      <input type="radio" name="r1" id="txtesc" class="minimal" checked/>Yes
                    </label>&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="r1" id="txtesc"  class="minimal"/>No
                    </label>
                    <label>
                    </div>
                  </div>
                   <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Gender:</label>&nbsp;&nbsp;
                        <label> 
                      <input type="radio" name="r1" class="minimal" id="txtgender" checked/>Male
                    </label>
                    <label>
                      <input type="radio" name="r1" class="minimal" id="txtgender"/>Female
                    </label>
                    <label>
                    </div>
                  </div>
                   <div class="col-sm-12">
                    <div class="form-group">
                      <label> 
                      <input type="radio" name="r1" class="minimal" id="txtsc" checked/>Senior Citizen
                    </label><br>
                    <label>
                      <input type="radio" name="r1" class="minimal" id="txtsc" />Very Senior Citizen
                    </label>
                    </div>
                  </div>
                   <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Designation</label>
                      <div class="form-group">
                    <select class="form-control" id="txtDesig">
                        <option>Designation</option>
                        <option>Designation</option>
                        <option>Designation</option>
                      </select>
                      </div>
                    </div>
                  </div>
                 
                    
                </div>

                  <div class="col-sm-4">
                      <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">From Date/To Date</label>
                     <input type="text" class="form-control pull-right" id="txtFromTo"/>
                    </div>
                  </div>
                 
                   <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Phone </label>
                      <input type="Number" class="form-control"  placeholder="Enter Phone" id="txtPhone">
                    </div>
                  </div>
                   <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Mobile</label>
                      <input type="Number" class="form-control" id="txtmobile" placeholder="Mobile">
                    </div>
                  </div>
                   
                     <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Email</label>
                      <input type="email" class="form-control" id="txtemail" placeholder="Email">
                    </div>
                  </div>
                     <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Pan</label>
                      
                    <div class="form-group">
                    <select class="form-control" id="txtPan">
                        <option>PANAPPLIED</option>
                        <option>PANINVALID</option>
                        <option>PANNOTVBL</option>
                      </select>
                      </div>
                      

                    </div>
                  </div>
                    <div class="col-sm-12">
                     <div class="form-group">
                      <label for="exampleInputPassword1">Pan Reference</label>
                      <input type="text" class="form-control" id="txtPanRef" placeholder="Pan  Reference">
                    </div>
                  </div>

                  
                </div>
                </div>
              
                  
                   
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                     <input  type="submit" value="save"  id="save"  class="btn btn-primary"  onclick="return validateRForm();"/>
       
      <input type="submit" value="update"  id="update" style="display:none;"  class="btn btn-primary" onclick="return validateRForm();" >
                  </div>
                </form>
              </div><!-- /.box -->

              <!-- Form Element sizes -->






              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Table With Full Features</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"><div id="example1_length" class="dataTables_length"><label><select size="1" name="example1_length" aria-controls="example1"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> records per page</label></div></div><div class="col-xs-6"><div class="dataTables_filter" id="example1_filter"><label>Search: <input type="text" aria-controls="example1"></label></div></div></div><table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                    <thead>
                      <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 172px;">Rendering engine</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 249px;">Browser</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 223px;">Platform(s)</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 146px;">Engine version</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 102px;">CSS grade</th></tr>
                    </thead>
                    
                    <tfoot>
                      <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
                    </tfoot>
                  <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
                        <td class="  sorting_1">Gecko</td>
                        <td class=" ">Firefox 1.0</td>
                        <td class=" ">Win 98+ / OSX.2+</td>
                        <td class=" ">1.7</td>
                        <td class=" ">A</td>
                      </tr><tr class="even">
                        <td class="  sorting_1">Gecko</td>
                        <td class=" ">Firefox 1.5</td>
                        <td class=" ">Win 98+ / OSX.2+</td>
                        <td class=" ">1.8</td>
                        <td class=" ">A</td>
                      </tr><tr class="odd">
                        <td class="  sorting_1">Gecko</td>
                        <td class=" ">Firefox 2.0</td>
                        <td class=" ">Win 98+ / OSX.2+</td>
                        <td class=" ">1.8</td>
                        <td class=" ">A</td>
                      </tr><tr class="even">
                        <td class="  sorting_1">Gecko</td>
                        <td class=" ">Firefox 3.0</td>
                        <td class=" ">Win 2k+ / OSX.3+</td>
                        <td class=" ">1.9</td>
                        <td class=" ">A</td>
                      </tr><tr class="odd">
                        <td class="  sorting_1">Gecko</td>
                        <td class=" ">Camino 1.0</td>
                        <td class=" ">OSX.2+</td>
                        <td class=" ">1.8</td>
                        <td class=" ">A</td>
                      </tr><tr class="even">
                        <td class="  sorting_1">Gecko</td>
                        <td class=" ">Camino 1.5</td>
                        <td class=" ">OSX.3+</td>
                        <td class=" ">1.8</td>
                        <td class=" ">A</td>
                      </tr><tr class="odd">
                        <td class="  sorting_1">Gecko</td>
                        <td class=" ">Netscape 7.2</td>
                        <td class=" ">Win 95+ / Mac OS 8.6-9.2</td>
                        <td class=" ">1.7</td>
                        <td class=" ">A</td>
                      </tr><tr class="even">
                        <td class="  sorting_1">Gecko</td>
                        <td class=" ">Netscape Browser 8</td>
                        <td class=" ">Win 98SE+</td>
                        <td class=" ">1.7</td>
                        <td class=" ">A</td>
                      </tr><tr class="odd">
                        <td class="  sorting_1">Gecko</td>
                        <td class=" ">Netscape Navigator 9</td>
                        <td class=" ">Win 98+ / OSX.2+</td>
                        <td class=" ">1.8</td>
                        <td class=" ">A</td>
                      </tr><tr class="even">
                        <td class="  sorting_1">Gecko</td>
                        <td class=" ">Mozilla 1.0</td>
                        <td class=" ">Win 95+ / OSX.1+</td>
                        <td class=" ">1</td>
                        <td class=" ">A</td>
                      </tr></tbody></table><div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example1_info">Showing 1 to 10 of 57 entries</div></div><div class="col-xs-6"><div class="dataTables_paginate paging_bootstrap"><ul class="pagination"><li class="prev disabled"><a href="#">← Previous</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li class="next"><a href="#">Next → </a></li></ul></div></div></div></div>
                </div><!-- /.box-body -->
              </div>
              
           
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
