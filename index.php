  <?php include 'Headermain.php';?>
<script type="text/javascript" src="assets/js/jquery-1.12.4.js"></script>
                       <script type="text/javascript" src="assets/js/jssor.slider.mini.js"></script>
			  <script>

        jQuery(document).ready(function ($) {

            var _SlideshowTransitions = [
            //Fade in L
                {$Duration: 1200, x: 0.3, $During: { $Left: [0.3, 0.7] }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade out R
                , { $Duration: 1200, x: -0.3, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade in R
                , { $Duration: 1200, x: -0.3, $During: { $Left: [0.3, 0.7] }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade out L
                , { $Duration: 1200, x: 0.3, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

            //Fade in T
                , { $Duration: 1200, y: 0.3, $During: { $Top: [0.3, 0.7] }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            //Fade out B
                , { $Duration: 1200, y: -0.3, $SlideOut: true, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            //Fade in B
                , { $Duration: 1200, y: -0.3, $During: { $Top: [0.3, 0.7] }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade out T
                , { $Duration: 1200, y: 0.3, $SlideOut: true, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

            //Fade in LR
                , { $Duration: 1200, x: 0.3, $Cols: 2, $During: { $Left: [0.3, 0.7] }, $ChessMode: { $Column: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            //Fade out LR
                , { $Duration: 1200, x: 0.3, $Cols: 2, $SlideOut: true, $ChessMode: { $Column: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            //Fade in TB
                , { $Duration: 1200, y: 0.3, $Rows: 2, $During: { $Top: [0.3, 0.7] }, $ChessMode: { $Row: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade out TB
                , { $Duration: 1200, y: 0.3, $Rows: 2, $SlideOut: true, $ChessMode: { $Row: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

            //Fade in LR Chess
                , { $Duration: 1200, y: 0.3, $Cols: 2, $During: { $Top: [0.3, 0.7] }, $ChessMode: { $Column: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            //Fade out LR Chess
                , { $Duration: 1200, y: -0.3, $Cols: 2, $SlideOut: true, $ChessMode: { $Column: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade in TB Chess
                , { $Duration: 1200, x: 0.3, $Rows: 2, $During: { $Left: [0.3, 0.7] }, $ChessMode: { $Row: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            //Fade out TB Chess
                , { $Duration: 1200, x: -0.3, $Rows: 2, $SlideOut: true, $ChessMode: { $Row: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

            //Fade in Corners
                , { $Duration: 1200, x: 0.3, y: 0.3, $Cols: 2, $Rows: 2, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $ChessMode: { $Column: 3, $Row: 12 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            //Fade out Corners
                , { $Duration: 1200, x: 0.3, y: 0.3, $Cols: 2, $Rows: 2, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $SlideOut: true, $ChessMode: { $Column: 3, $Row: 12 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }

            //Fade Clip in H
                , { $Duration: 1200, $Delay: 20, $Clip: 3, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade Clip out H
                , { $Duration: 1200, $Delay: 20, $Clip: 3, $SlideOut: true, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseOutCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade Clip in V
                , { $Duration: 1200, $Delay: 20, $Clip: 12, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade Clip out V
                , { $Duration: 1200, $Delay: 20, $Clip: 12, $SlideOut: true, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseOutCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
                ];

            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $Idle: 1500,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                                //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)
                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 800,                                //Specifies default duration (swipe) for slide in milliseconds

                $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                    $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                    $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                    $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                    $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                },

                $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                },

                $ThumbnailNavigatorOptions: {                       //[Optional] Options to specify and enable thumbnail navigator or not
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $SpacingX: 8,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $Cols: 10,                             //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 360                          //[Optional] The offset position to park thumbnail
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider1.$ScaleWidth(Math.max(Math.min(parentWidth, 800), 300));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>
			<div id="content" class="bottom-border-shadow">
                <div class="container background-white bottom-border">
                    <div class="row margin-vert-30">
                        <!-- Main Text -->
                       <div class="col-md-6">
                <div class="Headline"><h2 style="    font-family: calibri;">Introduction </h2></div>
                <video width="100%" height="300" controls  style="    margin-top: -18px;">
                    <source src="assets/Video/Final.mp4"  type="video/mp4">
                </video><br>
                <div style="font-family: calibri;    margin-top: 3%;"><a href="forum21.php">More Videos in <i class="fa fa-hand-o-right" aria-hidden="true"></i>       <b> OpenForum</b></a></div>
            </div>
                   <div class="col-md-6">

                <div class="Headline"><h2 style="    font-family: calibri;">Employment and Financial News</h2>
                   <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 800px;
        height: 456px; background: #191919; overflow: hidden;">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 800px; height: 356px; overflow: hidden;">
           <?php
                                $fo = opendir("assets/AdminImages");
                                $file_names = '';
								$i=0;
                                while (($file = readdir($fo)) && ($i<=20) ) {
									$i++;
                                    if ($file != "." && $file != ".." && $file != "Thumbs.db") {
                                        echo "<div>";
                                        echo "<img u='image' src='assets/AdminImages/$file'/>";
                                        echo "<img u='thumb' src='assets/AdminImages/$file'/>";
                                        echo "</div>";
                                    }
                                }
                                ?>

		
        </div>
        
        <!--#region Arrow Navigator Skin Begin -->
        <style>
            /* jssor slider arrow navigator skin 05 css */
            /*
            .jssora05l                  (normal)
            .jssora05r                  (normal)
            .jssora05l:hover            (normal mouseover)
            .jssora05r:hover            (normal mouseover)
            .jssora05l.jssora05ldn      (mousedown)
            .jssora05r.jssora05rdn      (mousedown)
            */
            .jssora05l, .jssora05r {
                display: block;
                position: absolute;
                /* size of arrow element */
                width: 40px;
                height: 40px;
                cursor: pointer;
                background: url(../img/a17.png) no-repeat;
                overflow: hidden;
            }
            .jssora05l { background-position: -10px -40px; }
            .jssora05r { background-position: -70px -40px; }
            .jssora05l:hover { background-position: -130px -40px; }
            .jssora05r:hover { background-position: -190px -40px; }
            .jssora05l.jssora05ldn { background-position: -250px -40px; }
            .jssora05r.jssora05rdn { background-position: -310px -40px; }
        </style>
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora05l" style="top: 158px; left: 8px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora05r" style="top: 158px; right: 8px">
        </span>
        <!--#endregion Arrow Navigator Skin End -->
        <!--#region Thumbnail Navigator Skin Begin -->
        <!-- Help: http://www.jssor.com/help/thumbnail-navigator.html -->
        <style>
            /* jssor slider thumbnail navigator skin 01 css */
            /*
            .jssort01 .p            (normal)
            .jssort01 .p:hover      (normal mouseover)
            .jssort01 .p.pav        (active)
            .jssort01 .p.pdn        (mousedown)
            */

            .jssort01 {
                position: absolute;
                /* size of thumbnail navigator container */
                width: 800px;
                height: 100px;
				background:#eee;
            }

                .jssort01 .p {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 72px;
					
                    height: 72px;
                }

                .jssort01 .t {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    border: none;
                }

                .jssort01 .w {
                    position: absolute;
                    top: 0px;
                    left: 0px;
                    width: 100%;
                    height: 100%;
                }

                .jssort01 .c {
                    position: absolute;
                    top: 0px;
                    left: 0px;
                    width: 68px;
                    height: 68px;
                    border: #000 2px solid;
                    box-sizing: content-box;
                    background: url(../img/t01.png) -800px -800px no-repeat;
                    _background: none;
                }

                .jssort01 .pav .c {
                    top: 2px;
                    _top: 0px;
                    left: 2px;
                    _left: 0px;
                    width: 68px;
                    height: 68px;
                    border: #000 0px solid;
                    _border: #fff 2px solid;
                    background-position: 50% 50%;
                }

                .jssort01 .p:hover .c {
                    top: 0px;
                    left: 0px;
                    width: 70px;
                    height: 70px;
                    border: #fff 1px solid;
                    background-position: 50% 50%;
                }

                .jssort01 .p.pdn .c {
                    background-position: 50% 50%;
                    width: 68px;
                    height: 68px;
                    border: #000 2px solid;
                }

                * html .jssort01 .c, * html .jssort01 .pdn .c, * html .jssort01 .pav .c {
                    /* ie quirks mode adjust */
                    width /**/: 72px;
                    height /**/: 72px;
                }
        </style>

        <!-- thumbnail navigator container -->
        <div u="thumbnavigator" class="jssort01" style="left: 0px; bottom: 0px;">
            <!-- Thumbnail Item Skin Begin -->
            <div u="slides" style="cursor: default;">
                <div u="prototype" class="p">
                    <div class=w><div u="thumbnailtemplate" class="t"></div></div>
                    <div class=c></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!--#endregion Thumbnail Navigator Skin End -->
        <a style="display: none" href="http://www.jssor.com">jQuery Slider</a>
    </div>
					<br>
					  <div style="font-family: calibri;"><a href="forum1.php">More Photos in <i class="fa fa-hand-o-right" aria-hidden="true"></i> <b>OpenForum</b></a></div>
                </div>
            </div>
                    </div>
						
                </div>
				
			
            </div>
        
            <div id="content" class="bottom-border-shadow">
                <div class="container background-white bottom-border">
			
				
				
				
				
				<div class="row margin-vert-30">
			<div class="col-md-12" style="padding: 0px;border-bottom:1px solid">
					<div class="col-md-8" style="padding: 0px;margin-bottom:1%;">
				<h3 style="font-family:calibri">About</h3> <h2 style="font-family:calibri">MyInfoCollections</h2>
				
                <p style="
    font-weight: 600;text-align:justify; 
"> <i class="fa fa-share" aria-hidden="true"></i> This is a  Website designed with an intention of making a collection of useful information about Employment, Labour Laws of India, Tourism and some other miscellaneous subjects pertaining to India which can be useful to all, for helping  to improve knowledge and creating a platform for storing informative data.&nbsp;&nbsp;&nbsp;&nbsp;
</p>
</div>


					<div class="col-md-4" style="padding-right:0px;padding-top:5%;margin-bottom:2%;">
					<img src="Facebook Myinfo.jpg" style="">
							</div>
			</div>	</div>
		
		
		
		
		
		 <div class="row margin-vert-30">
			<div class="col-md-12" style="padding: 0px;border-bottom:1px solid">
					<div class="col-md-8" style="padding: 0px;margin-bottom:1%;">
				<h3 style="font-family:calibri"> College Admission and Opting Careers</h3>
				<h6 style="font-family:calibri;color:#a94442"><b> 1. Interests and Abilities</b></h6>
				
                <p style="
    font-weight: 600;text-align:justify; 
"> <i class="fa fa-share" aria-hidden="true"></i> It is your interest that must drive education. Careers are passionate affairs and unless one enjoys what one is doing, excellence can never be achieved and sustained. There are so many different career options after graduation, irrespective of which subject you choose, and the college you get into. Every degree programme gives you knowledge of the subject, leading to a career directly related to that subject, as well as certain transferable skills that you can use for any number of other careers.<br> Moreover, the three years you spend in college studying for a bachelor’s degree in arts, commerce or science is also important in your total growth and development as a person. College is where you get your first whiff of the world at large –taking on responsibility, developing communication and interpersonal skills, picking up friends, and possible contacts for life, and learning to fend for yourself. Such lessons enable you to deal with the world of work and shape your personality for the future.&nbsp;&nbsp;&nbsp;&nbsp;
<a href="college.php" id="link" style="color:#a94442">Read More </a></p>
</div>


					<div class="col-md-4" style="padding-right:0px;padding-top:5%;margin-bottom:2%;">
					<img src="College admision career.jpg" style="height: 5%;">
							</div>
			</div>	</div>
		
		
		
		
		
		
		
		
		
                    <div class="row margin-vert-30" style="margin-bottom:10px;">
					<div class="col-md-12" style="padding: 0px;margin-bottom:1%;border-bottom:1px solid ">
					
						<div class="col-md-8" style="padding: 0px;margin-bottom:1%;">
						  <h2 style="font-family:calibri">The Pradhan Mantri Rojgar Protsahan  Yojana Plan Scheme</h2>
						
						<p style="border-bottom:1px solid #eee; font-weight: 600;"><b>Benefits for Employers covered under Employees Provident Fund Act in respect of new employees –regarding Employer’s share contributions to be borne by the Government.</p>
						<p style="text-align:justify; font-weight: 600;">The Pradhan Mantri Rojgar Protsahan Yojana (PMRPY) Plan Scheme has been designed to incentivise employers for generation of new employment, where Government of India will be paying the 8.33% EPS contribution of the employer for the new employment. This scheme has a dual benefit, where, on the one hand, the employer is incentivised for increasing the employment base of workers in the establishment, and on the other hand, a large number of workers will find jobs in such establishments. A direct benefit is that these workers will have access to social security benefits of the organized sector. For Garmenting Sector, Government to bear 8.33% EPS contribution and 3.67% EPF employer’s share for new employees.  For details, log on to these websites -</b> </p>
						<div class="col-lg-6" style="padding: 0px;">
						<a href="https://pmrpy.gov.in/" target="_blank">https://pmrpy.gov.in/</a><br>
						<a href="http://www.epfindia.com" target="_blank">http://www.epfindia.com</a></div>
						<div class="col-lg-6" style="padding: 0px;">
						
						<a href="https://unifiedportal.epfindia.gov.in/" target="_blank">https://unifiedportal.epfindia.gov.in/</a></div>
						</div>
					<br>
					
					<div class="col-md-4" style="padding-right:0px;padding-top:0px;margin-bottom:2%;">
					<img src="Photo on Home page in left side2.png">
							</div>
				
				    </div>
					
				 <div class="row margin-vert-30" style="">
					<div class="col-md-12" style="border-bottom:1px solid ">
					<h2>Advances/Withdrawals available to EPF Subscribers from his 
Employees Provident Fund Account</h2>
<p><b>Advance/ Withdrawals may be availed for the following purposes :</b></p>
<div class="col-md-6" style="margin-bottom:1%;font-size:16px;">
<a href="advance.php" target="_blank"><b>•	Marriage / Education</b></a><br>
<a href="advance.php" target="_blank"><b>•	Treatment</b></a><br>
<a href="advance.php"target="_blank"><b>•	Purchase or construction of Dwelling house</b></a><br>
<a href="advance.php" target="_blank"><b>•	Repayment of Housing Loan</b></a><br>
<a href="advance.php"target="_blank"><b>•	Purchase of Plot</b></a><br>
<a href="advance.php" target="_blank"><b>•	Addition/Alteration of House</b></a></div>
<div class="col-md-6" style="margin-bottom:1%">
<a href="advance.php" target="_blank"><b>•	Repair of House</b></a><br>
<a href="advance.php" target="_blank"><b>•	Lockout</b></a><br>
<a href="advance.php"target="_blank"><b>•	Withdrawal Prior to Retirement</b></a><br>
<a href="advance.php" target="_blank"><b>•	Other Advances</b></a><br>
<a href="advance.php" target="_blank"><b>•	Notes</b></a><br><br>
<a href="advance.php" target="_blank" style="

font-size:15px;color:#a94442"><i class="fa fa-hand-o-right" aria-hidden="true"></i> <b>Click here for More Details</b></a>
</div></div></div>
					
					
					
					
					<div class="row margin-vert-30" style="    margin-bottom: 10px;">
					<div class="col-md-12" style="border-bottom:1px solid ">
					
					<div class="col-md-8" style="padding: 0px;margin-bottom:1%;">
					<h2>Employees’ Provident Fund Organisation (EPFO)</h2>
<p style="text-align:justify;"><b>EPFO is a statutory body under the Ministry of Labour &amp; Employment, Govt. of

India. EPFO is administered by Central Board of Trustees (CBT), Employees’ Provident

Fund.<br> CBT is a tri-party body consisting Central Government and State Government

officials, Employers’ and Employees’ representatives. Union Minister for Labour and

Employment is the Chairman and Central Provident Fund Commissioner is the Ex-officio

Secretary of the CBT.<br>
<a href="EPFO.php" target="_blank" style="

font-size:15px;color:#a94442"> <b>Read More</b></a></b></p></div>

	<div class="col-md-4" style="padding-right:0px;margin-bottom:2%;padding-top: 2%;">
					<img src="EPFO.png" style="height: 5%;">
							</div>


</div></div>



	<div class="row margin-vert-30" style="">
					<div class="col-md-12" style="border-bottom:1px solid ">
					
					<div class="col-md-6" style="padding: 0px;margin-bottom:1%;">
					<h2>Goods & Service Tax</h2>
<p style="text-align:justify;"><b>GST common portal has been launched for on boarding Taxpayers from 25th June 2017 for obtaining registrations - https://www.gst.gov.in/ </b></p>
<p style="text-align:justify;">
<b>•	If you are an existing Taxpayer under VAT, Service Tax and Central Excise, you can enroll yourself at the GST Portal. Enrolment window will remain open till next 3 months.<br>
•	On account of deferment of TDS and TCS provisions in GST, Registration for the same will commence from 25th July 2017.<br>
•	After generation of Application Reference Number (ARN), the Registration Certificate (RC) containing GSTIN will be issued after 3 working days, unless approved earlier by Tax Officer. For example if a Taxpayer files a New Registration Application on 7th of a month (being Friday), then he will receive his RC and GSTIN on 13th of the month (8th and 9th, being Saturday and Sunday, are not working days), unless approved earlier by Tax Officer. If 11th of the month also is a holiday, then he will receive his RC and GSTIN on 14th of the month.
</b></p>

</div>

	<div class="col-md-6" style="padding-right:0px;margin-bottom:2%;padding-top: 5%;">
					<img src="GST.png" style="width:100%;">
							</div></div></div>


<div class="row margin-vert-30" style="">
<div class="col-md-12" style="padding: 0px;margin-bottom:5px;border-bottom:1px solid">
<h2>Supreme Court Judgements Link</h2>
							<b><p style="text-align:justify;">
All Supreme Court judgments from 1950 to 2016 (34110 judgments) are available on one touch at- </p>
<a href="http://www.liiofindia.org/in/cases/cen/INSC/" style="color:blue;" target="_blank">www.liiofindia.org/in/cases/cen/INSC/</a></b>
<br><br></div>
<br>
</div>






</div>
                        <!-- Main Text -->
                        <div class="col-md-12" style="padding: 0px;">
                
                <span style="font-size: large;color: #33747a;text-align: center;">Employment</span><br>
                <p style="text-align:justify; 
    font-weight: 600;
"> <i class="fa fa-share" aria-hidden="true"></i> 
                    Job opportunities are hard to come in these competitive days in India.  You are aware that if there is a vacancy of 100 posts in a Government department or Banking or Public Sector Undertakings, about 1 lakh persons will apply.  Such is the competition.  Advanced computerization has decreased the job opportunities.  However, on constant persuading with full effort, leaving no stone unturned, try every possible course of action in order to achieve getting a good and decent job, the goal can be achieved.  I have made some effort here to guide the job aspirants.
                </p>
				</div>
				  
    <div class="col-md-12" style="padding: 0px;">
                <span style="font-size: large;color: #33747a;text-align: center;">Labour Laws of India </span><br>
                <p style="
    font-weight: 600;text-align:justify; 
"> <i class="fa fa-share" aria-hidden="true"></i>  Employees Provident Fund Organisation and Employees State Insurance Corporation, the departments of Ministry of Labour & Employment, New Delhi are the 2 Social Security organizations, one giving benefits on retirement and the other with medical Insurance.  There is collection of all Acts of Government done here.  The Government’s new initiatives are also compiled here.  The matters pertaining to much awaited Goods and Services Tax (GST) are yet to be collected as it is still under finalization.  The proposed GST would subsume various Central (Excise Duty, Additional Excise Duty, Service Tax, Countervailing or Additional Customs Duty, Special Additional Duty of Customs, etc.), as well as State level Indirect Taxes (VAT/Sales Tax, Purchase Tax, Entertainment Tax, Luxury Tax, Octroi, Entry Tax, etc).</p> 



                <span style="font-size: large;color: #33747a;text-align: center;">Tourism </span><br>
                <p style="
    font-weight: 600;text-align:justify; 
"> <i class="fa fa-share" aria-hidden="true"></i> 
                    This is one of my favorite subjects since my younger days. I had a hobby of collecting all the details pertaining Tourism.  Here, I have made a huge collection of details pertaining to Indian and World Tourism.  More information is under process of collection.  I collected information pertaining World Tourism from some of the Foreign Consulates and Tourism Agents in Mumbai.  Now, started making an effort to collect information regarding Visa, Currency exchange etc., the details as and when collected will be posted here in this website in future days.

                </p>
                <span style="font-size: large;color: #33747a;text-align: center;">Miscellaneous </span><br>
                <p style="text-align:justify; 
    font-weight: 600;
"> <i class="fa fa-share" aria-hidden="true"></i> 
                    I had created a Menu for this, to insert any other useful and interesting information pertaining to Indian Culture, Tradition, Education, Entertainment, Sports etc. </p>
               
                <span style="font-size: large;color: #33747a;text-align: center;">Open Forum</span><br>
                <p style="
    font-weight: 600;text-align:justify; 
"> <i class="fa fa-share" aria-hidden="true"></i> 
                    However, the Documents, Photos and Videos posted in Open Forum Menu are free for all.  I have decided to post some information in this which can be viewed by all.
                </p>
				<div class="col-lg-12" style="background:#33747a;color:white;

    box-shadow: 3px 3px 3px #888888;
    padding: 10px 5px;
    margin-bottom: 10px;
    line-height: 25px;
    font-size: 16px;">
							<span style="font-weight: bold;font-size: 20px;">Subscription</span>:  For subscribing to this Website www.myinfocollections.com, interested should make a payment of Rs.2,000- (Rupees Two Thousand only) which is a membership for a period of 10 years. Remittance should be done through Gateway-payment option under Registration Menu. The subscribers will get message of Registration done, through email and SMS in Mobile.  The joined members will get email intimation of updating done in the Website, from time to time.  Good luck.
							</div>
							
							<div class="col-lg-12" style="

    box-shadow: 3px 3px 3px #888888;
    padding: 10px 5px;
    margin-bottom: 10px;
    line-height: 25px;
    font-size: 16px;">
							<span style="font-weight: bold;font-size: 20px;">Payment procedure of subscription to website – www.myinfocollections.com</span>
							
							<div class="col-lg-6">
							<span style="font-weight: bold;font-size: 16px;">1). Click on Subscribe or Register</span>
							<img src="MyInfoScreenShots/Step1.png" style="">
							</div>
							
							<div class="col-lg-6">
							<span style="font-weight: bold;font-size: 16px;">2). Fill up Registration and click on Pay</span>
							<img src="MyInfoScreenShots/Step2.png" style="">
							</div>
							
							<div class="col-lg-6">
							<span style="font-weight: bold;font-size: 16px;">3). Complete Gateway Payment procedures</span>
							<img src="MyInfoScreenShots/Step3.png" style="">
							</div>
							
							<div class="col-lg-6">
							<span style="font-weight: bold;font-size: 16px;">4). Transaction will get successful</span>
							<img src="MyInfoScreenShots/Step4.png" style="">
							</div>
							
							<div class="col-lg-6">
							<span style="font-weight: bold;font-size: 16px;">5). On successful transaction, you will receive email and SMS of User id & Password</span>
							<img src="MyInfoScreenShots/Step5.png" style="">
							</div>
							
							<div class="col-lg-6">
							<span style="font-weight: bold;font-size: 16px;">6). Login to access information.

</span>
							<img src="MyInfoScreenShots/Step6.png" style="">
							</div>
							
							
							</div>
							<div class="col-lg-6">
							<span style="font-weight: bold;font-size: 16px;">7). Click on Menu for list of Information.</span>
							<img src="MyInfoScreenShots/Step7.png" style="">
							</div>
							<div class="col-lg-6"></div>
							<div class="col-lg-12">
                <p style="text-align:justify; 
                   font-size: larger;">
                    Your feedbacks are most welcome through email – <span>mbrao@myinfocollections.com, mbrao2@yahoo.com</span> 
                </p>
				</div>
            </div>
                        <!-- End Main Text -->
                      <!--  <div class="col-md-6">
                            <h3 class="padding-vert-10">Key Features</h3>
                            <p>Duis sit amet orci et lectus dictum auctor a nec enim. Donec suscipit fringilla elementum. Suspendisse nec justo ut felis ornare tincidunt vitae et lectus.</p>
                            <ul class="tick animate fadeInRight">
                                <li>Responsive Design</li>
                                <li>Built with LESS</li>
                                <li>Font Choosers</li>
                                <li>Replaceable Background Image</li>
                                <li>Custom Module Widths</li>
                                <li>All Module Extensions Included</li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- Portfolio -->
        
            <!-- End Portfolio -->
            <!-- === END CONTENT === -->
        <?php include 'footer.php'?>