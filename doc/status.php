<html>
    <head>
    <style>
    .back{
    display: inline;
    margin-left:5px;
    margin-top:5px;
    text-decoration: none;
    font-size: 15px;
    font-family: 'Roboto';
    color: #FFFFFF;
    background-color: #3B3B3B;
    padding: 10px 10px;
    border-radius: 5px;
}

.back:hover{
    background-color: #3cb371;
}
</style>
</head>
    <body>
        <?php
include 'dbconnect.php';
$pt_id=$_GET['pt_id'];
$id=$_GET['id'];
$sql="SELECT * FROM pre_test where pres_test=$pt_id";
$q=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($q)){
    ?>
    <a href="test_page.php?id=<?php echo $id; ?>" class="Back">Back To Test Page</a>
    <div>
    <embed style="margin-top:20px" type="application/pdf" src="../images/<?php echo $row['file']; ?>" width="100%" height="600px">
</div>

<?php
}
?>
</body>
</html>