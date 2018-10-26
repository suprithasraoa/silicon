
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

		
    document.getElementById('sTableRow').innerHTML="";
    document.getElementById('sTableRow').innerHTML="<thead><tr><th>#</th><th>Name</th><th>Mobile</th><th>Email Id</th><th>Action</th></tr></thead><tbody>";
    var slno=0;
	var ahref="";

    var url = "sub/bind_list.php?cid=0&tbl=User";
//alert(url);
    $.getJSON(url, function(result) {
    console.log(result);
    $.each(result, function(i, field) {
    var id= field.Id;
 	slno++;

    ahref="<a class='Myedit' id='Myedit' href='javascript:FillCtrl("+id+")'><i class='fa fa-pencil' aria-hidden='true' ></i></a>  | <a onclick='javascript:confirmationDelete($(this));return false;' href='javascript:DeleteRecord("+id+")'><i class='fa fa-times' aria-hidden='true' ></i></a>";
      
    $("#sTableRow").append("<tr><td>"+slno+"</td><td style='font-size: 11px;'>"+field.Name+"</td><td style='font-size: 13px;'>"+field.Phone+"</td><td style='font-size: 13px;'>"+field.EmailId+"</td><td>"+ahref);
    
      $("#sTableRow").append("</td></tr>");
      $("#sTableRow").append("</tbody>");
	    document.getElementById("lbloutof").innerHTML=slno;
		  document.getElementById("lblstart").innerHTML="1";
    });
	gettotalRec();
    });
	

    }
	function gettotalRec()
	{
		var url = "sub/bind_alltotal.php?Tname=User";
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
 
   
    if (document.getElementById("txtmobile").value == "") {
  $("#gtxtmobile").attr('class', 'form-group has-error');
  document.getElementById("txtmobile").focus();
  return false;
  }

   
    if (document.getElementById("txtEmailId").value == "") {
   $("#gtxtEmailId").attr('class', 'form-group has-error');
  document.getElementById("txtEmailId").focus();
  return false;
  }
if (document.getElementById("txtPassword").value == "") {
   $("#gtxtPassword").attr('class', 'form-group has-error');
  document.getElementById("txtPassword").focus();
  return false;
  }
  }
   $(document).ready(function() {
	 
	   
	   
  $("#save").click(function() {

     
	
       var txtname = $("#txtname").val();
	   var txtmobile = $("#txtmobile").val();
	   var txtEmailId = $("#txtEmailId").val();
	   var txtPassword = $("#txtPassword").val();
                var dataString = "txtname="+txtname+"&txtmobile="+txtmobile+"&txtEmailId="+txtEmailId+"&txtPassword=" + txtPassword+"&Tname=User&save=";
//alert(dataString);

            if ($.trim(txtmobile).length > 0 && $.trim(txtPassword).length > 0 ) {
         
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
         // alert($.trim(data));
                        if ($.trim(data) == "success") {

                $("#save").val('Save');

 	
       $("#txtname").val("");
       $("#txtmobile").val("");
	    $("#txtEmailId").val(""); $("#txtPassword").val("");
	   bindgrid();
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
       var txtname = $("#txtname").val();
	   var txtmobile = $("#txtmobile").val();
	   var txtEmailId = $("#txtEmailId").val();
	   var txtPassword = $("#txtPassword").val();
	    var pkvId = $("#pkvId").val();
                var dataString = "txtname="+txtname+"&txtmobile="+txtmobile+"&txtEmailId="+txtEmailId+"&txtPassword=" + txtPassword+"&Tname=User&pkvId=" + pkvId+"&update=";
//alert(dataString);
                      if ($.trim(txtmobile).length > 0 && $.trim(txtPassword).length > 0 ) {
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

                        if ($.trim(data) == "success") {
               $("#update").val('Update');
window.location.href="User.php";  
        alert("User Updated Successfully");
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


  var url = "sub/bind_list.php?cid="+pkval+"&tbl=User";
  //alert(url);
  $.getJSON(url, function(result) {

  console.log(result);
  $.each(result, function(i, field) {
   
     $("#txtname").val(field.Name);  
       $("#txtmobile").val(field.Phone);
        $("#txtEmailId").val(field.EmailId); 
	    $("#txtPassword").val(field.Password);
		$("#pkvId").val(field.Id);
  });
  });


  }

   function DeleteRecord(pkval)
  {

  var url = "sub/deletecommon.php?pkvId="+pkval+"&Tname=User";
  //alert(url);
  $.getJSON(url, function(result) {

  console.log(result);
 
   if (result == "success") {
							
 alert('User Deleted Successfully!');
	window.location.href="User.php"; 
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
                  <h3 class="box-title">User</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  
                    <div class="col-sm-12">
                    <div class="col-sm-6">
					<div class="box">
                 <div class="box-body">
                   	 
                
				    
					  <div class="col-sm-6">
					    <div class="form-group" id="gtxtname">
                      <label for="exampleInputEmail1">Name<span style="color:red;">*</span></label>
                     <input type="text" class="form-control" id="txtname" placeholder="Enter Name" required/>
					 
                    </div>
					  </div>
					    
			
                <div class="col-sm-6">
                   <div class="form-group" id="gtxtEmailId">
                      <label>Email Id<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="txtEmailId" placeholder="Enter Email Id" required/>
                    </div>
                  </div> 
				  
				   <div class="col-sm-6">
                   <div class="form-group" id="gtxtmobile">
                      <label>Mobile<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="txtmobile" placeholder="Enter Mobile" required/>
                    </div>
                  </div> 
			
				  
				 
				   <div class="col-sm-6">
                   <div class="form-group" id="gtxtPassword">
                      <label>Password<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="txtPassword" placeholder="Enter Password" required/>
                    </div>
                  </div> 
				
				  </div>
  <div class="box-footer">
				  <input type="hidden" id="pkvId">
				  <input  type="submit" value="Save"  id="save"  class="btn btn-primary" style="margin-left: 2%;"  />
       
      <input type="submit" value="Update"  id="update" style="display:none;"  class="btn btn-primary" style="margin-left: 2%;" />
    
                   </div>
				 </div>
                </div>
                 <div class="col-sm-6" style="border-left: 1px solid #f4f4f4;">
              
					  
                  
				 
				    <div class="box">
                  <div class="box-header with-border">
				   <div class="col-lg-3 ">
                  <h3 class="box-title">View Users</h3>
				  
                    </div>
       
                 
				  
				  <!-- /.box-tools -->
                </div><!-- /.box-header -->
         <div class="box-body">
                  <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
				  <table class="table table-bordered table-hover table-striped" id="sTableRow">

                  </table>
					  
						 <div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example1_info">Showing <label id="lblstart">0</label> to <label id="lbloutof">0</label> of <label id="lblrec">0</label> entries</div>
					  </div>
					  <div class="col-xs-6"></div></div></div>
                </div><!-- /.box-body -->
              </div>
					
				 
				 
                  
                   
                  </div><!-- /.box-body -->

              
                  </form>
                </div><!-- /.box-body -->
	
        
            </div>
		   

        </section>
      </div>


            <?php include("footer.php");?>
