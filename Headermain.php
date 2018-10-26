<?php
session_cache_limiter(FALSE);
session_start();


//$_SESSION['email']=$user_email;
?>
  
 
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <!-- Title -->
        <title>MyInfoCollections</title>
        <!-- Meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- Favicon -->
        <link href="favicon.ico" rel="shortcut icon">
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.css" rel="stylesheet">
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Template CSS -->
        <link rel="stylesheet" href="assets/css/animate.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/nexus.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/custom.css" rel="stylesheet">
	 <link rel="shortcut icon" type="image/x-icon" href="assets/img/logosite.png" />
	 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>
<!-- //animation-effect -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Google Fonts-->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" media="screen" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.css" />
		
		
<style>
#slider {
  position: relative;
  overflow: hidden;
  margin: 20px auto 0 auto;
  border-radius: 4px;
}

#slider ul {
  position: relative;
  margin: 0;
  padding: 0;
  height: 200px;
  list-style: none;
}

#slider ul li {
  position: relative;
  display: block;
  float: left;
  margin: 0;
  padding: 0;
  width: 500px;
  height: 300px;
  background: #ccc;
  text-align: center;
  line-height: 300px;
}

a.control_prev, a.control_next {
  position: absolute;
  top: 40%;
  z-index: 999;
  display: block;
  padding: 4% 3%;
  width: auto;
  height: auto;
  background: #2a2a2a;
  color: #fff;
  text-decoration: none;
  font-weight: 600;
  font-size: 18px;
  opacity: 0.8;
  cursor: pointer;
}

a.control_prev:hover, a.control_next:hover {
  opacity: 1;
  -webkit-transition: all 0.2s ease;
}

a.control_prev {
  border-radius: 0 2px 2px 0;
}

a.control_next {
  right: 0;
  border-radius: 2px 0 0 2px;
}

.slider_option {
  position: relative;
  margin: 10px auto;
  width: 160px;
  font-size: 18px;
}






#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}
#myImg1 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}
#myImg2 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}
#myImg:hover {opacity: 0.7;}
#myImg1:hover {opacity: 0.7;}
#myImg2:hover {opacity: 0.7;}
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 481px;
	    height: 500px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
<style>
div.gallery {
    margin: 5px;
    border: 1px solid #ccc;
  float: left;
    width: 180px;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}
</style>

        <style type="text/css">
            a.fancybox img {
                border: none;
                box-shadow: 0 1px 7px rgba(0,0,0,0.6);

                -o-transform: scale(1,1); -ms-transform: scale(1,1); -moz-transform: scale(1,1); -webkit-transform: scale(1,1); transform: scale(1,1); -o-transition: all 0.2s ease-in-out; -ms-transition: all 0.2s ease-in-out; -moz-transition: all 0.2s ease-in-out; -webkit-transition: all 0.2s ease-in-out; transition: all 0.2s ease-in-out;
            } 
            a.fancybox:hover img {
                position: relative; z-index: 999; -o-transform: scale(1.03,1.03); -ms-transform: scale(1.03,1.03); -moz-transform: scale(1.03,1.03); -webkit-transform: scale(1.03,1.03); transform: scale(1.03,1.03);
            }



            a1.fancybox img1 {
                border: none;
                box-shadow: 0 1px 7px rgba(0,0,0,0.6);

                -o-transform: scale(1,1); -ms-transform: scale(1,1); -moz-transform: scale(1,1); -webkit-transform: scale(1,1); transform: scale(1,1); -o-transition: all 0.2s ease-in-out; -ms-transition: all 0.2s ease-in-out; -moz-transition: all 0.2s ease-in-out; -webkit-transition: all 0.2s ease-in-out; transition: all 0.2s ease-in-out;
            } 
            a1.fancybox:hover img1 {
                position: relative; z-index: 999; -o-transform: scale(1.03,1.03); -ms-transform: scale(1.03,1.03); -moz-transform: scale(1.03,1.03); -webkit-transform: scale(1.03,1.03); transform: scale(1.03,1.03);
            }


            a.fancybox img3 {
                border: none;
                box-shadow: 0 1px 7px rgba(0,0,0,0.6);

                -o-transform: scale(1,1); -ms-transform: scale(1,1); -moz-transform: scale(1,1); -webkit-transform: scale(1,1); transform: scale(1,1); -o-transition: all 0.2s ease-in-out; -ms-transition: all 0.2s ease-in-out; -moz-transition: all 0.2s ease-in-out; -webkit-transition: all 0.2s ease-in-out; transition: all 0.2s ease-in-out;
            } 
            a.fancybox:hover img3 {
                position: relative; z-index: 999; -o-transform: scale(1.03,1.03); -ms-transform: scale(1.03,1.03); -moz-transform: scale(1.03,1.03); -webkit-transform: scale(1.03,1.03); transform: scale(1.03,1.03);
            }
        </style>
        

    </head>
    <body>
        <div id="body-bg">
            <!-- Phone/Email -->
            <div id="pre-header" class="background-gray-lighter">
                <div class="container no-padding">
                    <div class="row hidden-xs">
                        <div class="col-sm-4 padding-vert-5">
                            <strong>Phone:</strong>&nbsp;+91-9820211293
                        </div>
						 <div class="col-sm-3 padding-vert-5">
                            <strong>Email:</strong>&nbsp;mbrao@myinfocollections.com
                        </div>
                        <div class="col-sm-5 text-right padding-vert-5">


                            <?php
                            if ($_SESSION['loggedIn']) {
                                echo '<li style="list-style:none;"><a href="logout.php" class="lo" >Logout</a></li>';
                                echo "<li style='list-style:none;color:#33747a;'>Welcome " . $_SESSION['UserName'] . " " . $_SESSION['UserMiddleName'] . " " . $_SESSION['UserLastName'] . "!</li> ";
                                echo '<li style="list-style:none;"><a href="ChangePassword.php" class="lo" >ChangePassword </a></li>';
                            }

							else {
                                echo '<li style="list-style:none;"><a href="Registration.php" class="lg" >Register</a> | <a href="Login.php" class="lg" > Login</a></li>';
                            }
                            ?>
<!--   <a href="Login.php">      <strong>Registration/Login</strong></a>-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Phone/Email -->
            <!-- Header -->
            <div id="header">
                <div class="container">
                    <div class="row">
 
 <div class="col-lg-12">
    <div class="col-lg-3">
                       <!-- Logo -->
                       <div class="logo">
                           <a href="index.php" title="">
                               <img src="assets/img/myInfoCollections1.png" alt="Logo" style="    margin-top: -33px;">
                           </a>
                       </div>
			<br>
					   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					     <span id="time" style=""></span>
                       <!-- End Logo -->
   </div>
   <div class="col-lg-9 flash" style="    padding: 5px 0px;    z-index: 1;
 
">
   <div class="row">
    <span style="font-size: 12px;">
 Subscription amount to this website is Rs.2,000/ for a period of 10 years. Payment is to be done through Gateway Payment, which is approved and Secure.
</span>
</div>
 <div class="row" style="
      background: linear-gradient(#b3b3b3,#dddddd);
">
       <div class="col-md-1 col-sm-1 indexflash" style="/* padding-left: 6px; */padding: 15px 3px;background: #518b99;color: white;/* font-size: 32px; */">
           <i class="fa fa-calendar" aria-hidden="true" style="
    padding: 0px 4px;
    color: rgba(255, 255, 255, 0.77);
    font-size: 14px;
"></i><span style="
    color: rgba(255, 255, 255, 0.8);
    font-size: 15px;
">NEWS </span>
       </div>
       <div class="col-md-11 col-sm-11" style="padding-right: 10px; padding-left: 10px; ">
           <div class="indexflashcont">
               <marquee behavior="scroll" direction="left" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();">
                   <div id="ContentPlaceHolder1_ind" style="display:inline-block">
                       &nbsp;&nbsp;&nbsp;&nbsp; </div>
                     <div style="  display: inline-block;
    color: rgba(0,0,0,0.91);
    font-size: 18px;
    font-family: calibri;
    font-weight: 600;
    padding: 10px 0px;">  
<?php
include("dbConnect/dbConnect.php");

$sql = "SELECT * FROM Scroll where Active =1 order by Id desc";

$result = $dbcon->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<i class='fa fa-caret-right' aria-hidden='true'></i><a href='empnews/". $row["Attachment"]. "' target='_blank' style='color:black'><span style=''></span> ". $row["Description"]. " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>";
     }
} else {
     echo "0 results";
}




$dbcon->close();
?>  


</div></marquee>
           </div>
           <div class="marqcss">
           </div>
       </div>
       <div class="marqcss">
       </div>
   </div>
   <!--<div class="row">
    <span style="font-size: 12px;">
      </span>
	   </div>-->
   </div>
   </div>
                   </div>
                </div>
            </div>
					<?php
if (!$_SESSION['loggedIn']) {

    $urlG = "#";
	$urlG1="#";
	$urlG2="#";
	$urlGV= "#";
	$urlGV1= "#";
	$urlGV2= "#";
	  $target = "_self";
    $location = "Login.php?flag=1";
} else {
  
                                                $urlG = 'Gallery.php';  
$urlG1 = 'Gallery1a.php';
$urlG2 = 'Gallry1b.php';
 $urlGV = 'Gallery1.php';
  $urlGV1 = 'GalleryW.php';
    $urlGV2 = 'GalleryM.php ';
     
                          $target = "_self";           
    $location = "";
}
?>
            <!-- End Header -->
            <!-- Top Menu -->
            <div id="hornav" class="bottom-border-shadow">
                <div class="container no-padding border-bottom">
                    <div class="row">
                        <div class="col-md-12 no-padding">
                            <div class="visible-lg">
                                <ul id="hornavmenu" class="nav navbar-nav" style="    margin-left: -5px;">
                                    <li>
                                        <a href="index.php" class="fa-home active"><span style="font-size:10px;">Home</span></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa-gears"><span style="font-size:10px;">Employment Support</span></a>
                                        <ul>
                                            <li class="parent">
                                                <a href="EMPGeneral.php">EMP-General</a>
                                                <ul>
                                                    <li>
                                                        <a href="EMPGeneral.php">Websites lists of Employment jobs</a>
                                                    </li>
                                                    <li>
                                                        <a href="EMPGeneral.php">UPSC Calender 2016-17</a>
                                                    </li>
                                                    <li>
                                                        <a href="EMPGeneral.php">SSC Calender 2016</a>
                                                    </li>
                                                    <li>
                                                        <a href="EMPGeneral.php">Employment Exchange Offices - India</a>
                                                    </li>
                                                    <li>
                                                        <a href="EMPGeneral.php">Employment Newspapers - India & Abroad</a>
                                                    </li>
                                                    <li>
                                                        <a href="EMPGeneral.php">GOI Ministries - Agencies & Private Companies</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="parent">
                                                <a href="Empoldquestionpaper.php">Employement Exam Old Question Papers</a>

                                                <ul>
                                                    <li class="parent">
                                                        <a href="oldpaper1.php">Old Papers Vol-1</a>
                                                        <ul>
                                                            <li>
                                                                <a href="oldpaper1.php">Agriculture</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper1.php">Animal Husbandry & Veterinary Science</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper1.php">Anthopology</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper1.php">Assistant Architect</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper1.php">Banking Exam</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper1.php">Botany</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper1.php">Chemistry</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper1.php">Civil Engineering</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper1.php">Commerce & Accountancy</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper1.php">Economics</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="parent">
                                                        <a href="oldpaper2.php">Old Papers Vol-2</a>
                                                        <ul>
                                                            <li>
                                                                <a href="oldpaper2.php">Engineering</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper2.php">English</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper2.php">Essay</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper2.php">Forestry</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper2.php">General Ability Test</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper2.php">General Knowledge</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper2.php">Geo Physics</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper2.php">Geography</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper2.php">Geology</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper2.php">History</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="parent">
                                                        <a href="oldpaper3.php">Old Papers Vol-3</a>

                                                        <ul style=" overflow:hidden; height: 300px; overflow-y: scroll">
                                                            <li>
                                                                <a href="oldpaper3.php">Law</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper3.php">Management</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper3.php">Mathematics</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper3.php">Mechanical Engineering</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper3.php">Medical Science</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper3.php">Pharmaceutical Sciences</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper3.php">Philosophy</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper3.php">Physics</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper3.php">Political Science & International Relations</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper3.php">Psycology</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper3.php">Public Administration</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper3.php">Science</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper3.php">Sociology</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper3.php">Statistics</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper3.php">Test of Reasoning</a>
                                                            </li>
                                                            <li>
                                                                <a href="oldpaper3.php">Zoology</a>
                                                            </li>

                                                            <li>
                                                                <a href="oldpaper3.php">ZZMISC</a>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li >
                                                <a href="insurence.php">Insurance Agency Exam Study Papers</a>




                                            </li>
                                            <li>
                                                <a href="Interview.php">Interview Facing</a>


                                            </li>
                                            <li class="parent">
                                                <a href="Informationtechnology.php">Information Technology</a>

                                                <ul>
                                                    <li>
                                                        <a href="Informationtechnology.php">IT Notes</a>
                                                    </li>
                                                    <li>
                                                        <a href="Informationtechnology.php">Computer Application</a>
                                                    </li>
                                                    <li>
                                                        <a href="Informationtechnology.php">MBA in India</a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li >
                                                <a href="humanresource.php">Human Resource Management</a>


                                            </li>
                                            <li >
                                                <a href="payroll.php">Payroll</a>

                                            </li>
                                            <li class="parent">
                                                <a href="studynotes.php">Study Notes</a>

                                                <ul>
                                                    <li>
                                                        <a href="studynotes.php">English</a>
                                                    </li>
                                                    <li>
                                                        <a href="studynotes.php">Verbal Reasoning</a>
                                                    </li>
                                                    <li>
                                                        <a href="studynotes.php">Non Verbal Reasoning</a>
                                                    </li>
                                                    <li>
                                                        <a href="studynotes.php">General Knowledge</a>
                                                    </li>
                                                    <li>
                                                        <a href="studynotes.php">Numeric Ability</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="parent">
                                                <a href="Industiesideas.php">Small Scale Industies Ideas</a>

                                                <ul>
                                                    <li>
                                                        <a href="Industiesideas.php">Vol 1</a>
                                                    </li>
                                                    <li>
                                                        <a href="Industiesideas.php">Vol 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="Industiesideas.php">Vol 3</a>
                                                    </li>
                                                    <li>
                                                        <a href="Industiesideas.php">Vol 4</a>
                                                    </li>
                                                    <li>
                                                        <a href="Industiesideas.php">Vol 5</a>
                                                    </li>
                                                </ul>
                                            </li>
											
											
											 <li class="">
                                                <a href="EmploymentNews.php">Employment News</a>

                                               
                                            </li>
											
                                        </ul>

                                    </li>
                                    <li>

                                        <a href="#" class="fa-users "><span style="font-size:10px;">Labour Laws & Acts</span></a>
                                        <ul>
                                            <li class="parent">
                                                <a href="Employeesprovidantfund.php">Employees Provident Fund</a>
                                                <ul>
                                                    <li>
                                                        <a href="Employeesprovidantfund.php">EPF Act & Scheme</a>
                                                    </li>
                                                    <li>
                                                        <a href="Employeesprovidantfund.php">EPF Appellate Tribunal</a>
                                                    </li>
                                                    <li>
                                                        <a href="Employeesprovidantfund.php">International Worker's EPF</a>
                                                    </li>
                                                    <li>
                                                        <a href="Employeesprovidantfund.php">EPF - Circulars</a>
                                                    </li>
                                                    <li>
                                                        <a href="Employeesprovidantfund.php">EPF Forms etc</a>
                                                    </li>
                                                    <li>
                                                        <a href="Employeesprovidantfund.php">EPF General Notes</a>
                                                    </li>
                                                    <li>
                                                        <a href="Employeesprovidantfund.php">EPF Compliance - Notes</a>
                                                    </li>
                                                    <li>
                                                        <a href="Employeesprovidantfund.php">Challan & UAN</a>
                                                    </li>
                                                    <li>
                                                        <a href="Employeesprovidantfund.php">Important Judgements</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="parent">
                                                <a href="EmployeesStateInsurance.php">Employees State Insurance</a>
                                                <ul>
                                                    <li>
                                                        <a href="EmployeesStateInsurance.php">ESIC Act & Guidelines</a>
                                                    </li>
                                                    <li>
                                                        <a href="EmployeesStateInsurance.php">ESIC Important Circulars</a>
                                                    </li>
                                                    <li>
                                                        <a href="EmployeesStateInsurance.php">ESIC Compliance Notes</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class=""><a href="lab.php">Labour Laws-General Matters</a>

                                            </li>
                                            <li class="parent">
                                                <a href="OtherActs&Schemes.php">Other Acts & Schemes</a>
                                                <ul>
                                                    <li class="parent">
                                                        <a href="OtherActs&Schemes.php">1 Acts Vol-1</a>
                                                        <ul style=" overflow:hidden; height: 300px; overflow-y: scroll">
                                                            <li>
                                                                <a href="Industrial_Relations.php">Industrial Relations</a>
                                                                <a href="Industrial_Relations.php">Industrial Safety & Health</a>
                                                                <a href="Industrial_Relations.php">Child Labour</a>
                                                                <a href="Industrial_Relations.php">The Factory Act,1948</a>
                                                                <a href="Industrial_Relations.php">Women Labour</a>
                                                                <a href="Industrial_Relations.php">Labour Welfare</a>
                                                                <a href="Industrial_Relations.php">Income Tax Act,1961</a>
                                                                <a href="Industrial_Relations.php">Right to Information Act,2005</a>
                                                                <a href="Industrial_Relations.php">The Companies Act,2013</a>
                                                                <a href="Industrial_Relations.php">Wealth Tax Act,1957</a>
                                                                <a href="Industrial_Relations.php">Gift Tax Act,1958</a>
                                                                <a href="Industrial_Relations.php">Finance Act</a>
                                                                <a href="Industrial_Relations.php">Air (Prevention & Control of Pollution) Act,1981</a>
                                                                <a href="Industrial_Relations.php">Apprentices Act,1961</a>
                                                                <a href="Industrial_Relations.php">Arbitration & Conciliation Act,1996</a>
                                                                <a href="Industrial_Relations.php">Banking Cash Transaction Tax</a>
                                                                <a href="Industrial_Relations.php">Benami Transactions (Prohibition) Act,1988</a>
                                                                <a href="Industrial_Relations.php">The Black Money(U F I & A)&Imposition of Tax Act,2015</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="parent">
                                                        <a href="OtherActs&Schemes.php">1 Acts Vol-2</a>
                                                        <ul style=" overflow:hidden; height: 300px; overflow-y: scroll">
                                                            <li>
                                                                <a href="OtherActs&Schemes.php">Central Boards of Revenue Act, 1963</a>
                                                                <a href="OtherActs&Schemes.php">Charitable & Religious Trusts</a>
                                                                <a href="OtherActs&Schemes.php">Charitable Endowments</a>
                                                                <a href="OtherActs&Schemes.php">The Chartered Accountants Act 2006</a>
                                                                <a href="OtherActs&Schemes.php">Code of Criminal Procedure, 1973</a>
                                                                <a href="OtherActs&Schemes.php">Commodities transaction tax</a>
                                                                <a href="OtherActs&Schemes.php">Companies Act 1956</a>
                                                                <a href="OtherActs&Schemes.php">Right to Information Act,2005</a>
                                                                <a href="OtherActs&Schemes.php">Companies Act 2013</a>
                                                                <a href="OtherActs&Schemes.php">The Companies Secretaries Amendment Act 2006</a>
                                                                <a href="OtherActs&Schemes.php">Competition ACT 2012</a>
                                                                <a href="OtherActs&Schemes.php">Consumer Protection Act & Rules</a>
                                                                <a href="OtherActs&Schemes.php">Copy right rules1957</a>
                                                                <a href="OtherActs&Schemes.php">Cost and works Accountants Act 1959</a>
                                                                <a href="OtherActs&Schemes.php">Credit Information Companies Act</a>
                                                                <a href="OtherActs&Schemes.php">Depositories act</a>
                                                                <a href="OtherActs&Schemes.php">Design act</a>
                                                                <a href="OtherActs&Schemes.php"> Economic offences</a>
                                                                <a href="OtherActs&Schemes.php"> Employee compensation act 1923</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="parent">
                                                        <a href="OtherActs&Schemes.php">1 Acts Vol-3</a>
                                                        <ul style=" overflow:hidden; height: 300px; overflow-y: scroll">
                                                            <li>
                                                                <a href="OtherActs&Schemes.php">The Employers Liability Act 1938</a>
                                                                <a href="OtherActs&Schemes.php">Eprotect Act 1986 (1)</a>
                                                                <a href="OtherActs&Schemes.php">Equal Remuneration Act 1976</a>
                                                                <a href="OtherActs&Schemes.php"> Essential Commodity Act 1955(No 10 of 1955)</a>
                                                                <a href="OtherActs&Schemes.php"> Factories act 1948</a>
                                                                <a href="OtherActs&Schemes.php">The foreign Contribution The (Regulation) Act,2010(42 of 2010) </a>
                                                                <a href="OtherActs&Schemes.php">FEMA ACT 1999</a>
                                                                <a href="OtherActs&Schemes.php">Foreign Trade Act</a>
                                                                <a href="OtherActs&Schemes.php">General Clauses Act</a>
                                                                <a href="OtherActs&Schemes.php">Hindu Adoption and Maintenance Act</a>
                                                                <a href="OtherActs&Schemes.php">Hindu Marriage Act</a>
                                                                <a href="OtherActs&Schemes.php">Hindu Minority and Guardiansip Act</a>
                                                                <a href="OtherActs&Schemes.php">Hindu Succession Act 1956</a>
                                                                <a href="OtherActs&Schemes.php">The Indian Contract Act</a>
                                                                <a href="OtherActs&Schemes.php">The Indian Evidence Act</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="parent">
                                                        <a href="OtherActs&Schemes.php">1 Acts Vol-4</a>
                                                        <ul style=" overflow:hidden; height: 300px; overflow-y: scroll">
                                                            <li>
                                                                <a href="OtherActs&Schemes.php">Indian Fatal Accident Act 1855</a>
                                                                <a href="OtherActs&Schemes.php"> Indian Income Tax Act 1992</a>
                                                                <a href="OtherActs&Schemes.php">Indian Partnership Act 1932</a>
                                                                <a href="OtherActs&Schemes.php">Indian Penal Code 1860</a>
                                                                <a href="OtherActs&Schemes.php">Indian Stamp Act 1899</a>
                                                                <a href="OtherActs&Schemes.php"> Indian Trust act 1882</a>
                                                                <a href="OtherActs&Schemes.php">Industrial Dispute Act 1947</a>
                                                                <a href="OtherActs&Schemes.php">Industrial Employement Act 1946</a>
                                                                <a href="OtherActs&Schemes.php"> Industries Act 1951</a>
                                                                <a href="OtherActs&Schemes.php">Information Technology Act 2000</a>
                                                                <a href="OtherActs&Schemes.php">Insurance Regulatory and Developement Authority Act 1999</a>
                                                                <a href="OtherActs&Schemes.php">Labour Laws Act 1988</a>
                                                                <a href="OtherActs&Schemes.php"> Land Acquisition Act 1894</a>
                                                                <a href="OtherActs&Schemes.php">Legal Metrology Act 2009</a>
                                                                <a href="OtherActs&Schemes.php">Limitation Act 1963</a>
                                                                <a href="OtherActs&Schemes.php">Limited liability partnership act 2008</a>
                                                                <a href="OtherActs&Schemes.php">Maternity Benefit Act 1961</a>
                                                                <a href="OtherActs&Schemes.php"> Micro Small Medium Enterprises Development Act 2006</a>
                                                                <a href="OtherActs&Schemes.php">Minimum Wages Act 1948</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="parent">
                                                        <a href="OtherActs&Schemes.php">1 Acts Vol-5</a>
                                                        <ul style=" overflow:hidden; height: 300px; overflow-y: scroll">
                                                            <li>
                                                                <a href="OtherActs&Schemes.php">National Green Tribunal Act 2005</a>
                                                                <a href="OtherActs&Schemes.php">Negotiable Instrument Act 1881</a>
                                                                <a href="OtherActs&Schemes.php">Partition Act 1893</a>
                                                                <a href="OtherActs&Schemes.php">Petents Act 1970</a>
                                                                <a href="OtherActs&Schemes.php">Payments Of Bonus Act 1965</a>
                                                                <a href="OtherActs&Schemes.php">Payment of gratuity act 1972</a>
                                                                <a href="OtherActs&Schemes.php"> Payment of Wages Act 1936</a>
                                                                <a href="OtherActs&Schemes.php"> Prevention of corruption act 1988</a>
                                                                <a href="OtherActs&Schemes.php"> Prevention Of Money Laundering Act 2002</a>
                                                                <a href="OtherActs&Schemes.php">Public Liability Insurance Act 1991</a>
                                                                <a href="OtherActs&Schemes.php"> Public Provident Fund Act 1986</a>
                                                                <a href="OtherActs&Schemes.php">Recovery Of Debts Due to Banks And Financial Institution Act 1993</a>
                                                                <a href="OtherActs&Schemes.php">Registration Act 1908</a>
                                                                <a href="OtherActs&Schemes.php">Reserve Bank Of India Act 1934</a>
                                                                <a href="OtherActs&Schemes.php"> Sale of goods act 1930</a>
                                                                <a href="OtherActs&Schemes.php">Sales Promotion Emlpoyees Act 1976</a>

                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="parent">
                                                        <a href="OtherActs&Schemes.php">1 Acts Vol-6</a>
                                                        <ul style=" overflow:hidden; height: 300px; overflow-y: scroll">
                                                            <li>
                                                                <a href="OtherActs&Schemes.php">Security And Exchange Board Of India Act 1992</a>
                                                                <a href="OtherActs&Schemes.php">Securities Contracts Act 1956</a>
                                                                <a href="OtherActs&Schemes.php">Securitisation And Reconstruction Of Financial Assets And Enforcement Of Security Interest Act 2002</a>
                                                                <a href="OtherActs&Schemes.php">Sick Industrial Companies Act 1985</a>
                                                                <a href="OtherActs&Schemes.php">Sick Industrial Companies Act 2003</a>
                                                                <a href="OtherActs&Schemes.php">Societies Regestration Act 1860</a>
                                                                <a href="OtherActs&Schemes.php">Special Bearer Bonds Act 1981</a>
                                                                <a href="OtherActs&Schemes.php">Special Court Act 1992</a>
                                                                <a href="OtherActs&Schemes.php">Special Economics Zone Act 2005</a>
                                                                <a href="OtherActs&Schemes.php">Special Relief Act 1963</a>
                                                                <a href="OtherActs&Schemes.php">State Emblem Of India Act 2005</a>
                                                                <a href="OtherActs&Schemes.php">Trade Marks Act 1999</a>
                                                                <a href="OtherActs&Schemes.php">Transfer Of Property Act 1882</a>
                                                                <a href="OtherActs&Schemes.php"> Urban Land Repeal Act 1999</a>
                                                                <a href="OtherActs&Schemes.php"> Volountary Deposits Act 1991</a>
                                                                <a href="OtherActs&Schemes.php">Water Act 1974</a>
                                                                <a href="OtherActs&Schemes.php">Weekly Holidays Act 1942</a>
                                                                <a href="OtherActs&Schemes.php"> Securities Transaction Act</a>
                                                                <a href="OtherActs&Schemes.php">MISC</a>

                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="parent">
                                                <a href="Indian_Govt_NewInitiative.php">Indian Government's new initiatives</a>
                                                <ul>
                                                    <li>
                                                        <a href="Indian_Govt_NewInitiative.php">Start Up India</a>
                                                    </li>
                                                    <li>
                                                        <a href="Indian_Govt_NewInitiative.php">Make in India</a>
                                                    </li>
                                                    <li>
                                                        <a href="Indian_Govt_NewInitiative.php">Digital India</a>
                                                    </li>
                                                    <li>
                                                        <a href="Indian_Govt_NewInitiative.php">Skill Development</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="">
                                                <a href="govt.php">For Central Govt Employees</a>

                                            </li>

                                        </ul>
                                    </li>
                                    <li>

                                        <a href="#" >  <span class="fa-rocket "><span style="font-size:10px;">Tourism</span></span></a>
                                        <ul>
                                            <li class="parent"><a href="indiantourism.php">Indian Tourism</a>
                                                <ul>
                                                    <li class="parent">
                                                        <a href="indiatourism.php">Indian Tourism</a>
                                                        <ul>
                                                            <li> <a href="indiatourism.php">Tourism General</a></li>
                                                            <li> <a href="indiatourism.php">Locations India Map</a></li>
                                                            <li> <a href="indiatourism.php">Tourism General Indian States</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="parent">
                                                        <a href="Northindia.php">North India</a>
                                                        <ul>
                                                            <li> <a href="Northindia.php">Haryana</a></li>
                                                            <li> <a href="Northindia.php">Locations India Map</a></li>
                                                            <li> <a href="Northindia.php">Jammu & Kashmir</a></li>
                                                            <li> <a href="Northindia.php">Punjab</a></li>
                                                            <li> <a href="Northindia.php">Rajasthan</a></li>
                                                            <li> <a href="Northindia.php">Uttar Pradesh</a></li>
                                                            <li> <a href="Northindia.php">Uttarkhand</a></li>
                                                            <li> <a href="Northindia.php">Delhi</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="parent">
                                                        <a href="Southindia.php">South India</a>
                                                        <ul>
                                                            <li> <a href="Southindia.php">Andhra Pradesh</a></li>
                                                            <li> <a href="Southindia.php">Karnataka</a></li>
                                                            <li> <a href="Southindia.php">Kerala</a></li>
                                                            <li> <a href="Southindia.php">Tamil Nadu</a></li>
                                                            <li> <a href="Southindia.php">Telangana</a></li>

                                                        </ul>
                                                    </li>
                                                    <li class="parent">
                                                        <a href="Eastindia.php">East India</a>
                                                        <ul>
                                                            <li> <a href="Eastindia.php">Bihar</a></li>
                                                            <li> <a href="Eastindia.php">Jharkhand</a></li>
                                                            <li> <a href="Eastindia.php">Odisha</a></li>
                                                            <li> <a href="Eastindia.php">West Bengal</a></li>

                                                        </ul>
                                                    </li>
                                                    <li class="parent">
                                                        <a href="Westindia.php">West India</a>
                                                        <ul>
                                                            <li> <a href="Westindia.php">Goa</a></li>
                                                            <li> <a href="Westindia.php">Gujarat</a></li>
                                                            <li> <a href="Westindia.php">Maharashtra</a></li>

                                                        </ul>
                                                    </li>
                                                    <li class="parent">
                                                        <a href="centralindia.php">Central India</a>
                                                        <ul>
                                                            <li> <a href="centralindia.php">Chattisgarh</a></li>
                                                            <li> <a href="centralindia.php">Madhya Pradesh</a></li>

                                                        </ul>
                                                    </li>
                                                    <li class="parent">
                                                        <a href="northeast.php">North East</a>
                                                        <ul>
                                                            <li> <a href="northeast.php">Arunachal Pradesh</a></li>
                                                            <li> <a href="northeast.php">Assam</a></li>
                                                            <li> <a href="northeast.php">Manipur</a></li>
                                                            <li> <a href="northeast.php">Meghalaya</a></li>
                                                            <li> <a href="northeast.php">Mizoram</a></li>
                                                            <li> <a href="northeast.php">Nagaland</a></li>
                                                            <li> <a href="northeast.php">Sikkim</a></li>
                                                            <li> <a href="northeast.php">Tripura</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="union.php">Union Territories</a>
                                                    </li>
                                                    <li>
                                                        <a href="travel.php">Travel Agents Mumbai</a>
                                                    </li>
                                                    <li>
                                                        <a href="details.php">Details of 40 cities of India</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="parent">

                                                <a href="MainWorldTourism.php"> World Tourism</a>
                                                <ul>
                                                    <li >
                                                        <a href="MainWorldTourism.php"> World Tourism</a>
                                                    </li>
                                                    <li class="parent">
                                                        <a href="NorthAmerica.php">North America</a>
                                                        <ul>
                                                            <li> <a href="NorthAmerica.php">United States of America</a></li>
                                                            <li> <a href="NorthAmerica.php">Canada</a></li>

                                                            <li> <a href="NorthAmerica.php">Mexico</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="parent">
                                                        <a href="SouthAmerica.php">South America</a>
                                                        <ul>
                                                            <li> <a href="SouthAmerica.php">Brazil</a></li>
                                                            <li> <a href="SouthAmerica.php">Argentina</a></li>


                                                        </ul>
                                                    </li>
                                                    <li class="parent">
                                                        <a href="Europe.php"> Europe</a>
                                                        <ul>
                                                            <li> <a href="Europe.php">England</a></li>
                                                            <li> <a href="Europe.php">Germany</a></li>
                                                            <li> <a href="Europe.php"> France</a></li>
                                                            <li> <a href="Europe.php"> Switzerland</a></li>
                                                            <li> <a href="Europe.php">Italy</a></li>
                                                            <li> <a href="Europe.php">Russia</a></li>
                                                            <li> <a href="Europe.php">Spain</a></li>
                                                            <li> <a href="Europe.php">Belgium</a></li>
                                                            <li> <a href="Europe.php"> Portugal</a></li>
                                                            <li> <a href="Europe.php">Poland</a></li>

                                                        </ul>
                                                    </li>
                                                    <li class="parent">
                                                        <a href="africa.php">Africa</a>
                                                        <ul>
                                                            <li> <a href="africa.php">South Africa</a></li>
                                                            <li> <a href="africa.php">Egypt</a></li>
                                                         

                                                        </ul>
                                                    </li>
                                                    <li class="parent">
                                                        <a href="asia.php">Asia</a>
                                                        <ul>
                                                            <li> <a href="asia.php">Nepal</a></li>
                                                            <li> <a href="asia.php"> Sri Lanka</a></li>
                                                            <li> <a href="asia.php"> Maldives</a></li>
                                                            <li> <a href="asia.php"> Thailand</a></li>
                                                            <li> <a href="asia.php">Malaysia</a></li>
                                                            <li> <a href="asia.php">Singapore</a></li>
                                                            <li> <a href="asia.php">Indonesia</a></li>
                                                            <li> <a href="asia.php">China</a></li>
                                                            <li> <a href="asia.php"> South Korea</a></li>
                                                            <li> <a href="asia.php">Japan</a></li>

                                                        </ul>
                                                    </li>
                                                    <li class="parent">
                                                        <a href="aus.php"> Australia & NZ</a>
                                                        <ul>
                                                            <li> <a href="northeast.php">Australia</a></li>
                                                            <li> <a href="northeast.php">New Zealand</a></li>


                                                        </ul>
                                                    </li>
                                                    <li class="parent">
                                                        <a href="gulf.php">Gulf countries</a>
                                                        <ul>
                                                            <li> <a href="northeast.php">UAE - Dubai</a></li>
                                                            <li> <a href="northeast.php">Saudi Arabia</a></li>
                                                            <li> <a href="northeast.php">Qatar</a></li>
                                                            <li> <a href="northeast.php">Oman</a></li>
                                                            <li> <a href="northeast.php">Bahrain</a></li>
                                                            <li> <a href="northeast.php">Kuwait</a></li>

                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
											
										 <li class="">

                                                <a href="travel.php">Travel Agents in India</a>

                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#" >  <span class="fa-copy "><span style="font-size:10px;">Miscellaneous</span></span></a>


                                        <ul>

                                            <li class="parent">
                                                <a href="IndianCulture.php">Indian Culture</a>

                                                <ul>
                                                    <li>
                                                        <a href="IndianCulture.php">Bharatanatyam</a>
                                                    </li>
                                                    <li>
                                                        <a href="IndianCulture.php"> Ayurveda</a>
                                                    </li>
                                                    <li>
                                                        <a href="IndianCulture.php">Yoga</a>
                                                    </li>
                                                    <li>
                                                        <a href="IndianCulture.php">Traditions</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="parent">
                                                <a href="Puzzels.php">Puzzles & Quiz</a>

                                                <ul>
                                                    <li>
                                                        <a href="Puzzels.php">Mathematical Puzzles</a>
                                                    </li>
                                                    <li>
                                                        <a href="Puzzels.php">GK Quiz</a>
                                                    </li>
                                                    <li>
                                                        <a href="Puzzels.php">Magic Tricks</a>
                                                    </li>

                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" id="Gallery" class="fa-camera"><span style="font-size:10px;">Gallery</span></a>
										 <ul id="SubGallery">

                                            <li class="parent">
                                                <a href="#">Photos</a>
                                                 <ul>

                                            <li class="">
                                                <a href='<?php echo $urlG ?>' target='<?php echo $target ?>' onclick="window.location = '<?php echo $location ?>'">Indian Tourism</a> 
                                            </li>
											<li class="">
                                                <a href='<?php echo $urlG1 ?>' target='<?php echo $target ?>' onclick="window.location = '<?php echo $location ?>'">World Tourism</a> 
                                            </li>
											<li class="">
                                               <a href='<?php echo $urlG2 ?>' target='<?php echo $target ?>' onclick="window.location = '<?php echo $location ?>'">Beautiful Photography</a> 
                                            </li>
                                               </ul>
                                            </li>
											
											 <li class="parent">
                                                <a href="#">Videos</a>
                                           <ul>

                                            <li class="">
											 <a href='<?php echo $urlGV ?>' target='<?php echo $target ?>' onclick="window.location = '<?php echo $location ?>'">Indian Tourism</a> 
                                               
                                            </li>
											<li class="">
											 <a href='<?php echo $urlGV1 ?>' target='<?php echo $target ?>' onclick="window.location = '<?php echo $location ?>'">World Tourism</a> 
                                        
                                            </li>
											<li class="">
											<a href='<?php echo $urlGV2 ?>' target='<?php echo $target ?>' onclick="window.location = '<?php echo $location ?>'">Miscellaneous</a> 
                                             
                                            </li>
                                               </ul>
                                              
                                            </li>
                                          
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#" class="fa-spinner"><span style="font-size:10px;">Open Forum</span></a>
											 <ul>

                                            <li class="">
                                                <a href="forum.php">Articles and Documents</a>

                                          </li>
											
											 <li class="parent">
                                                <a href="#">Photos</a>

                                              <ul>

                                            <li class="">
                                                <a href="forum1.php">Employment and Financial News</a> 
                                            </li>
											
											
                                               </ul>
                                            </li>
											 <li class="parent">
                                                <a href="#">Videos</a>
                                              <ul>

                                            <li class="">
                                                <a href="forum21.php">Employment and Financial News</a> 
                                            </li>
											<li class="">
                                                <a href="GSTDetails.php">GST Login and Registration Details</a> 
                                            </li>
											
                                               </ul>
                                              
                                            </li>
											
											 <li class="parent">
                                                <a href="#">Nataraja Nritya  Niketana</a>
                                              <ul>

                                           <li class="">
                                                <a href="forum2.php">Bharathanatyam Photos</a> 
                                            </li>
											<li class="">
                                                <a href="Bharathnatya.php">Bharathanatyam Videos</a> 
                                            </li>
											
                                               </ul>
                                              
                                            </li>
                                          
                                        </ul>
                                    </li>
									
									
									
                                    <li>
                                        <a href="ContactUs.php" class="fa-mobile "><span style="font-size:10px;">Contact Us</span></a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	       <script>
			   
			  
var m_names = new Array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"); 
var d = new Date(); var curr_date = d.getDate(); var curr_month = d.getMonth(); var curr_year = d.getFullYear();

document.getElementById('time').innerHTML="Last Updated: "+curr_date + "-" + m_names[curr_month] + "-" + curr_year;
</script>