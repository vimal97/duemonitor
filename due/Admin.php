<?php

session_start();

if($_SESSION['a_ver']==0)
{
	header("Location:admin/admin_login.html");
}

?>





<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
input[type=text],input[type=email], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    
}

img.avatar {
    width: 10%;
    border-radius: 10%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: absolute; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 30px;
	padding: 45px;
    top: 0;
    width: 100%; /* Full width */
    height: 2000px; /* Full height */
    overflow:scroll; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 0% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 10px solid #888;
	padding: 45px;
	overflow:scroll;
	height:600px;
    width: 40%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>


    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It&#39;s fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It&#39;s fully customizable and modular.">
    <title>Admin Panel</title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="./Admin_files/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="./Admin_files/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl  pace-done"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="">Duemonitorapp</a>
      <!-- Sidebar toggle button-->
	  <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
	  <div style="text-align:center">
	  <!--<h3 style="text-align:center">Muthoot Institute of Science and Technology</h3>
     --> </div>
	  <!-- Navbar Right Menu-->
      
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="admin.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">Admin Panel</p>
          
        </div>
      </div>
      <ul class="app-menu">
        
        <button onclick="document.getElementById('id01').style.display='block'" style="width:100%;">ADD NEW STAFFS</button>
        
        <button onclick="document.getElementById('id02').style.display='block'" style="width:100%;">MANAGE STAFFS</button>
		
		<a href="admin/a_logout.php"><button style="width:100%;">LOGOUT</button></a>
        
      </ul>
	  <div id="id01" class="modal">
  
  <form class="modal-content animate" action="php/admin_add.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      
    </div>

    <div class="container">
      
      <input type="text" placeholder="Enter Username" name="username" required="required">

      
      <input type="text" placeholder="Enter Staff Id" name="id" required="required">
	  
       <input type="email" placeholder="Enter email Id" name="email" required="required"> </br>
	   
	   
	   
    <select id="country" name="dept" required="required">
      <option value="DEPARTMENT">DEPARTMENT</option>
	  <option value="CSE">CSE</option>
      <option value="ME">ME</option>
      <option value="CE">CE</option>
	  <option value="ECE">ECE</option>
	  <option value="EEE">EEE</option>
    </select>
	   
	   
	   
	   <div class="form-group">
	   </br>
      <label class="radio-inline">
      <input type="radio" name="designation" value="faculty">FACULTY
    </label>
    <label class="radio-inline">
      <input type="radio" name="designation" value="office_staff">OFFICE STAFF
    </label>
   
      
    </div>
  

	   
	   <input type="text" placeholder="Enter Staff's field" name="field" required="required">
	   
	   <input type="password" placeholder="Enter Password" name="password" required="required">
	   
	   <input type="password" placeholder="Confirm password" name="cpassword" required="required">
   
		<button type="submit">Add details</button>
      
    

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      
    </div>
	
	</div>
  </form>
</div>


 <div id="id02" class="modal">
  
  <form class="modal-content animate" action="php/modify_staff.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      
    </div>

    <div class="container">
      <br />
    <h3 style="text-align:center">MODIFY EXISTING FACULTY</h3>
	<input type="text" placeholder="Enter Username" name="username" required="required">
	
	<input type="text" placeholder="Enter Staff Id" name="id" required="required">
	  </br>
	<h5>SELECT FIELD TO BE MODIFIED:</h5>
	<select id="country" name="slot" required="required">
      <option value="due_field">DUE FIELD</option>
	  <option value="id">FACULTY ID</option>
      <option value="password">PASSWORD</option>
      <option value="email">EMAIL ID</option>
    </select>
	</br><br>
		<input type="text" placeholder="Enter New Value" name="changed" required="required">

	<br>
	<button type="submit">Update details</button>
	  </br>
	  </br>
	  </br>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      
    </div>
	
	</div>
  </form>
</div>
    </aside>
	
	
	
	
	
	
	
	
	
	
	
	<main class="app-content">
      <p style="text-align:center><img src="maps.png"></p>
    </main>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    
    <!-- Essential javascripts for application to work-->
    <script async="" src="./Admin_files/analytics.js.download"></script><script src="./Admin_files/jquery-3.2.1.min.js.download"></script>
    <script src="./Admin_files/popper.min.js.download"></script>
    <script src="./Admin_files/bootstrap.min.js.download"></script>
    <script src="./Admin_files/main.js.download"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="./Admin_files/pace.min.js.download"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="./Admin_files/chart.js.download"></script>
    <script type="text/javascript">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  
</body></html>