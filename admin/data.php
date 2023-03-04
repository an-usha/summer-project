<?php include("dbconnect.php");
$k=$_POST['id'];
$k=trim[$k]; 
$sql = select * from new_med where M_name='{$k}';
$res=mysqli_query($con,$sql);
while($rows=mysqli_fetch_array($res))
?>
<input type="text" id="textvalue" value=<?php echo $rows['Price']; ?>>
