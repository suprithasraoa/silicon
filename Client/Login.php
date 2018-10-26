<?php 
session_start();

?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <title>Silicon | Client</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="../index2.html"><b>Silicon</b> Client</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form  method = "post" action="">
        <div>
          <div class="form-group has-feedback">
            <input type="number" class="form-control" placeholder="Mobile Number"  name="users_email" id="users_email" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10"  required/>
            <span class="glyphicon glyphicon-mobile form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password"   name="users_pass"  id="users_pass" required />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
             
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" name="Submit" class="btn btn-primary btn-block btn-flat" style="background-color: #605ca8;    border-color: #155790;">Sign In</button>
            </div><!-- /.col -->
          </div>

          
        </div>
      </form>

       <?php 
if (isset($_POST["Submit"]))
{
  include("dbConnect/dbConnect.php"); 


$query = "SELECT * FROM Client Where RespPersonPhNo='".$_POST["users_email"]."'  and RespPersonPassword='".$_POST["users_pass"]."'";  
//echo($query);
//exit;
$result = mysqli_query($dbcon, $query);  
if(mysqli_num_rows($result)>0)
{
while($row = mysqli_fetch_array($result))  
{  
     $clientid= $row["Id"];
     $clientName=$row["Name"];
     //echo($clientid);

}  
$_SESSION["loginId"] = $clientid;
$_SESSION["ClientName"]= $clientName;
//?clientid=".$clientid
header("Location: index.php");
die();
//echo("<script>location.href = 'index.php?clientid=$clientid&clientName=$clientName';</script>");

}
else
{
 
  echo "<span style='color: red; font-weight: 700;'>Invalid Username Or Password!</span>";
}
}
       ?>


      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

   
  </body>
</html> 