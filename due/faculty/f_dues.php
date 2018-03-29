<?php
session_start();
if($_SESSION['f_ver']!=1)
{
header("Location:../faculty_login.html");
}
else
{
		
	$name=$_SESSION['name'];
	$con=mysqli_connect('127.0.0.1','root','');
		if(!$con)
			echo nl2br("CONNECTION NOT MADE!!");
		else
		{
			if(!mysqli_select_db($con,'sample'))
			{
				echo nl2br("DB NOT SELECTED");
			}
			else
			{
				$sql="SELECT * FROM staff_reg WHERE username = '$name';";
				$result = mysqli_query($con,$sql);
				$row=mysqli_fetch_array($result);
				if ($name=="$row[0]") {

							$facid=$row[1];
							$email=$row[2];
							$dept=$row[3];
							$field=$row[4];
							$designation=$row[5];
							
							
							
							}
				else
							{
							$_SESSION['ver']=0;
							echo "ENTRY NOT FOUND ,REGISTER FIRST";
							header("refresh:2 ; url=../faculty_login.html");
							
							}
			}
		}
		
		
	
		if(isset($_POST["rollno"]))
		{
			$department=$_POST["dept"];
			$sem=$_POST["semester"];
			$rollno=$_POST["rollno"];
			$rate=$_POST["rate"];
			$cause=$_POST["cause"];
			$con=mysqli_connect('127.0.0.1','root','');
			if(!$con)
				echo nl2br("CONNECTION NOT MADE!!");
			else
			{
				if(!mysqli_select_db($con,'sample'))
				{
					echo nl2br("DB NOT SELECTED");
				}
				else
				{
					echo "DB SELECTED";
					$sql="SELECT username,admno FROM all_stud WHERE roll_no = '$rollno' and dept='$department' and sem='$sem';";
					$result = mysqli_query($con,$sql);
					$row=mysqli_fetch_array($result);
					$username="$row[0]";
					
					$admno="$row[1]";
					
					$sql="SELECT * FROM dues where username='$username' and admno='$admno' and field='$field';";
					$result = mysqli_query($con,$sql);
					$row=mysqli_fetch_array($result);
					if($row[0]=="$username")
					{
						$old_amount=row[5];
						$new_amount=$old_amount+$rate;
						$old_cause=row[4];
						$new_cause="$old_cause"."$cause";
						$sql="UPDATE dues SET amount='$new_amount' and cause='$new_cause' where username='$username' and field='$field' and admno='$admno';";
						if(mysqli_query($con,$sql))
						{
							echo "Successfully Updated";
							header("refresh:1 ; url=#");
						}
					}
					
					else
					{
						$sql="INSERT INTO dues(username,admno,sem,field,cause,amount) values('$username','$admno','$sem','$field','$cause','$rate');";
						if(mysqli_query($con,$sql))
						{
							echo "Successfully Updated";
							header("refresh:1 ; url=#");
						}
					}
			}
			
		}
		
		}
}


?>



<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-animate){display:none !important;}ng\:form{display:block;}</style>
  
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<title>Faculty</title>
	<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
	<style>
		body
{
    position: fixed; 
    overflow-y: scroll;
    width: 100%;
}
	</style>

	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="./student_files/bootstrap.css"> 

	<!-- Calendar Styling  -->
    <link rel="stylesheet" href="./student_files/calendar.css">
    
    <!-- Fonts  -->
    <link href="./student_files/css" rel="stylesheet" type="text/css">
    
    <!-- Base Styling  -->
    <link rel="stylesheet" href="./student_files/app.v1.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style></head>
<body data-ng-app="" class="ng-scope">

	
    <!-- Preloader -->
    
    <!-- Preloader -->
    	
    
	<aside class="left-panel" tabindex="5003" style="overflow: hidden; outline: none;">
    		
            <div class="user text-center">
                  <img src="./student_files/user.png" class="img-circle" alt="...">
                  <h3 style="color:red;"><?php echo "$name";?></h3>
                  
                  <!--<div class="dropdown user-login">
                  <button class="btn btn-xs dropdown-toggle btn-rounded" type="button" data-toggle="dropdown" aria-expanded="true">
                    <i class="fa fa-circle status-icon available"></i> Available <i class="fa fa-angle-down"></i>
                  </button>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation"><a role="menuitem" href=""><i class="fa fa-circle status-icon signout"></i> Busy</a></li>
                    <li role="presentation"><a role="menuitem" href=""><i class="fa fa-circle status-icon signout"></i> Sign out</a></li>
                  </ul>
                  </div>-->	 
            </div>
            
            
            
            <nav class="navigation">
            	<ul class="list-unstyled">
                	<li class="has-submenu"><a href="f_dash.php"><i class="fa fa-bookmark-o"></i><span class="nav-label">Dashboard</span></a></li>
                    
                    <li class="active"><a href="#"><i class="fa fa-flag-o"></i> <span class="nav-label">add dues</span></a>
                    	
                    </li>
					<li class="has-submenu"><a href="f_cal.php"><i class="fa fa-heart-o"></i> <span class="nav-label">CALENDER</span></a>
                    	
                    </li>
					<li class="has-submenu"><a href="f_admin.php"><i class="fa fa-heart-o"></i> <span class="nav-label">Contact admin</span></a>
                    	
                    </li>
                    <li class="has-submenu"><a href="fac_logout.php"><i class="fa fa-file-text-o"></i> <span class="nav-label">logout</span></a>
                    	
                    </li>
                   <!-- 
                    <li class="has-submenu"><a href="#"><i class="fa fa-code"></i> <span class="nav-label">Charts</span></a>
                    	
                    </li>
                    <li class="has-submenu"><a href="#"><i class="fa fa-star-o"></i> <span class="nav-label">Plugins &amp; More</span></a>
                    	
                    </li>-->
                </ul>
            </nav>
            
    </aside>
    <!-- Aside Ends-->
    
    <section class="content">
    	
        <header class="top-head container-fluid">
            <!--<button type="button" class="navbar-toggle pull-left">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            -->
            
            
            <nav class=" navbar-default hidden-xs" role="navigation">
                <ul class="nav navbar-nav">
                
                
              </ul>
            </nav>
            
          
        </header>
        <!-- Header Ends -->
		
        
       <div style="height:800px; background:url(bg.png); no-repeat 0px 0px;">
				<!--<img src="mits.jpg">
				--></br>
		</br>
		</br>
		</br>
		
		
		
		<div class="w3-container">
  
  
  <div class="w3-card-4" style="background-color:white">
    <div class="w3-container w3-green">
      <h2>DUE UPDATION FORM</h2>
    </div>

    <form class="w3-container" action="f_dues.php" method="post">
	</br>
      <p>
	  
	  <label for="country"><h4>DEPARTMENT</h4></label>
    <select id="country" name="dept" style="font-size: 20px;">
      <option value="CSE">CSE</option>
      <option value="ME">ME</option>
      <option value="CE">CE</option>
	  <option value="ECE">ECE</option>
	  <option value="EEE">EEE</option>
    </select>
	  
	  </p>
	  
      <p>
	  
	  <label for="country"><h4>SEMESTER</h4></label>
    <select id="country" name="semester" style="font-size: 20px;">
      <option value="11">S1</option>
      <option value="2">S2</option>
      <option value="3">S3</option>
	  <option value="4">S4</option>
	  <option value="5">S5</option>
	  <option value="6">S6</option>
	  <option value="7">S7</option>
	  <option value="8">S8</option>
    </select></p>
	</br>
	<label for="roll"><h4>ENTER ROLL NUMBER OF THE STUDENT</h4></label></br>
		<input id="roll" name="rollno" style="height:30px" type="text" >
		</br>
		<label for="due"><h4>ENTER DUE RATE</h4></label></br>
		<input id="due" name="rate" style="height:30px" type="text" >
		</br>
		<label for="roll"><h4>ENTER CAUSE FOR DUE</h4></label></br>
		<textarea rows="5" cols="50" name="cause" placeholder="..."></textarea>
	
	</br>
	  <div class="row"> 
	  </br>
          
            <input style="width:100%;background-color: #4CAF50;border: none;color: white;padding: 12px 27px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;padding-left: 30px;" type="submit" value="Submit Due">
          
          
        </div>
	  
    </form>
  </div>
</div>
		
		
		
		
			
     </div>   
        <!-- Warper Ends Here (working area) -->
        
        
       <footer class="container-fluid footer">
        	Copyright ©  <a href="#" target="_blank"></a>
            <a href="#" class="pull-right scrollToTop"><i class="fa fa-chevron-up"></i></a>
        </footer> 
        
    
    </section>
    <!-- Content Block Ends Here (right box)-->
    
    <!--
   
	<script async="" src="./student_files/analytics.js.download"></script><script src="./student_files/jquery-1.9.1.min.js.download" type="text/javascript"></script>
    <script src="./student_files/underscore-min.js.download"></script>
   
    <script src="./student_files/bootstrap.min.js.download"></script>
    
  
    <script src="./student_files/globalize.min.js.download"></script>
    
   
    <script src="./student_files/jquery.nicescroll.min.js.download"></script>
    
    <script src="./student_files/dx.chartjs.js.download"></script>
    <script src="./student_files/world.js.download"></script>
  
    <script src="./student_files/demo-charts.js.download"></script>
    <script src="./student_files/demo-vectorMap.js.download"></script>
    
    
    <script src="./student_files/jquery.sparkline.min.js.download"></script>
    
    <script src="./student_files/jquery.sparkline.demo.js.download"></script>
    

    <script src="./student_files/angular.min.js.download"></script>
    
    <script src="./student_files/todo.js.download"></script>
    
    
    
   
    <script src="./student_files/calendar.js.download"></script>
   
    <script src="./student_files/calendar-conf.js.download"></script>
	
    
    
 
	<script src="./student_files/custom.js.download" type="text/javascript"></script>
    

    
	<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
    ga('create', 'UA-56821827-1', 'auto');
    ga('send', 'pageview');
    
    </script>-->


<div id="ascrail2000" class="nicescroll-rails" style="width: 7px; z-index: auto; cursor: default; position: absolute; top: 366px; left: 1534.66px; height: 205px; opacity: 0;"><div style="position: relative; top: 0px; float: right; width: 5px; height: 200px; background-color: rgb(157, 158, 165); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 0px;"></div></div>

<div id="ascrail2000-hr" class="nicescroll-rails" style="height: 7px; z-index: auto; top: 564px; left: 1159.66px; position: absolute; cursor: default; display: none; width: 375px; opacity: 0;"><div style="position: relative; top: 0px; height: 5px; width: 382px; background-color: rgb(157, 158, 165); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 0px;"></div></div>

<div id="ascrail2001" class="nicescroll-rails" style="width: 7px; z-index: auto; cursor: default; position: absolute; top: 0px; left: 1535.5px; height: 520px; opacity: 0;"><div style="position: relative; top: 0px; float: right; width: 5px; height: 485px; background-color: rgb(157, 158, 165); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 0px;"></div></div>

<div id="ascrail2001-hr" class="nicescroll-rails" style="height: 7px; z-index: auto; top: 1242px; left: 937.5px; position: absolute; cursor: default; display: none; width: 598px; opacity: 0;"><div style="position: relative; top: 0px; height: 5px; width: 605px; background-color: rgb(157, 158, 165); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 0px;"></div></div>

<div id="ascrail2002" class="nicescroll-rails" style="width: 7px; z-index: auto; cursor: default; position: absolute; top: 0px; left: -7px; height: 0px; display: none;"><div style="position: relative; top: 0px; float: right; width: 5px; height: 0px; background-color: rgb(157, 158, 165); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 0px;"></div></div>

<div id="ascrail2002-hr" class="nicescroll-rails" style="height: 7px; z-index: auto; top: -7px; left: 0px; position: absolute; cursor: default; display: none;"><div style="position: relative; top: 0px; height: 5px; width: 0px; background-color: rgb(157, 158, 165); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 0px;"></div></div>

<div id="ascrail2003" class="nicescroll-rails" style="width: 5px; z-index: auto; cursor: default; position: fixed; top: 0px; left: 225px; height: 783px; display: none;"><div style="position: relative; top: 0px; float: right; width: 5px; height: 0px; background-color: rgb(142, 144, 154); border: 0px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 0px;"></div></div>

<div id="ascrail2003-hr" class="nicescroll-rails" style="height: 5px; z-index: auto; top: 778px; left: 0px; position: fixed; cursor: default; display: none;"><div style="position: relative; top: 0px; height: 5px; width: 0px; background-color: rgb(142, 144, 154); border: 0px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 0px;"></div></div></body></html>