<?php
	session_start();
	include("dbconnect.php");
	if($_SERVER['REQUEST_METHOD']=="POST")
{ 
	$flag=0;
	if($_POST['username']=="admin")
	{
		if($_POST['password']=='admin123')
		{
			$_SESSION['username']=$_POST['username'];
			header('location:../admin/dashboard.php');
			exit();
		}
		else
		{
			echo '<script type ="text/JavaScript">';  
			echo 'alert("Incorrect")';
			echo '</script>';
			echo "<script> location.href='login1.php'; </script>";
			// $_SESSION['msg']="incorrect password";
			// header("location:login.php");
		}
	}
	else
	{
	    $user=$_POST['username'];
	    $pass=$_POST['password'];
		$sql="SELECT * FROM `admin` WHERE `Username`='$user' and `Password`='$pass'";
		$result=$con->query($sql);
		if($result->num_rows==1)
        {
		$_SESSION['username']=$_POST['username'];
		header("location:../doc/doc_dashboard.php");
		exit();
		}
		else
		{
					
			echo '<script type ="text/JavaScript">';  
			echo 'alert("Incorrect")';
			echo '</script>';
			echo "<script> location.href='login1.php'; </script>";
		}
	}
}
?>