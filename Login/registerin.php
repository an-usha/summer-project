<?php
	// include("menu.php");
    include("dbconnect.php");
    if(isset($_POST['reg']))
    {
	  $name=$_POST["name"];
	  $username=$_POST["uname"];
	  $phone=$_POST["num"];
	  $email=$_POST["email"];
	  $pass=$_POST["pass"];
	  echo'.';
	  $sql="SELECT * FROM add_doc WHERE Name LIKE '%$name%'";
	  $sql_res=mysqli_query($con,$sql) or die(mysqli_error($con));
	  if (mysqli_num_rows($sql_res)>0)
    {
		while ($row=mysqli_fetch_array($sql_res)) 
        {
			$d_id=$row['d_id'];
			$dname=$row['Name'];
			$num=$row['Phone'];
		}
	}
	  $sql1="SELECT * FROM admin";
	  $sql_res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
		while ($row=mysqli_fetch_array($sql_res1)) 
        {
			$uname=$row['Username'];
			$mail=$row['Email'];
			if($uname==$username || $mail==$email)
			{
				echo '<script src="../Java/jquery-3.4.1.min.js"></script>';
			echo '<script src="../Java/sweetalert2.all.min.js"></script>';
			echo '<script>
			
			Swal.fire({
			type:"success",
			title:"Already Exist.",
			confirmButtonColor: "#d33"
			}).then(function(){
			window.location="../Login/login1.php";
			});
			</script>';
			die(mysqli_error($con));
			}
			else if($dname!=$name && $phone!=$num)
			{
				echo '<script src="../Java/jquery-3.4.1.min.js"></script>';
				echo '<script src="../Java/sweetalert2.all.min.js"></script>';
				echo '<script>
			
			Swal.fire({
			type:"success",
			title:"You are not allowed.",
			confirmButtonColor: "#d33"
			}).then(function(){
			window.location="../Login/login1.php";
			});
			</script>';
			die(mysqli_error($con));
			}
			else{
				$query="INSERT INTO `admin`(`Name`,`Username`,`Phone`,`Email`,`Password`,`d_id`) VALUES('$name','$username','$phone','$email','$pass','$d_id')";
			  $result=mysqli_query($con,$query) or die(mysqli_error($con));
			
			  if($result)
			  {
				echo '<script src="../Java/jquery-3.4.1.min.js"></script>';
					echo '<script src="../Java/sweetalert2.all.min.js"></script>';
					echo '<script>
				
					Swal.fire({
					type:"success",
					title:"Successfully Registered.",
					confirmButtonColor: "#d33"
				}).then(function(){
					window.location="../Login/login1.php";
				});
				</script>';
			  }
		}
	}
}
  

			
?>