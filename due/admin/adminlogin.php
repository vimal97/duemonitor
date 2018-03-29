<html>
<?php
session_start();
$name=$_POST["user"];
$password=$_POST["pass"];
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
				$sql="SELECT username,password FROM admin WHERE username = '$name' and password='$password'";
				$result = mysqli_query($con,$sql);
				$row=mysqli_fetch_array($result);
				if ($name=="$row[0]" and $password=="$row[1]") {

							$_SESSION['a_ver']=1;
							$_SESSION['a_name']=$name;
							echo "<script>alert('SUCCESSFULLY LOGGED IN')</script>";
							header("refresh:1 ; url=../Admin.php");
							
							}
				else
							{
							$_SESSION['a_ver']=0;
							echo "<script>alert('YOURE NOT AN ADMIN')</script>";
							header("refresh:1 ; url=admin_login.html");
							
							}
			}
		}




?>
</html>