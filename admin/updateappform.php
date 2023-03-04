<html>
<head>
	<title></title>
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="../css/newapp.css" />
</head>
<body>
	<?php
	$id=$_GET['id'];
	$q="select * from new_appoint where app_id=$id";
	include("dbconnect.php");
	$result=mysqli_query($con,$q) or die(mysqli_error($con));
	$data=mysqli_fetch_array($result,MYSQLI_ASSOC);
	?>
        <?php include 'Home.php'; ?>
    
          <div class="appform">
          <form name="app" onsubmit="return valid()"  action="updateapp.php" method="post">
              <h3>Edit Appointment<hr></h3>
              <input type="hidden" name="id" value="<?php echo $data['app_id'];?>">
              <label class="fname">Full Name:<span id="demo"></span></label> 
              <input type="text" name="fname"  id="name" value="<?php echo $data['Name']; ?>"><br>

              <label class="phone">Phone Number:<span id="demo1"></label> <input type="text" id="num" name="num" value="<?php echo $data['Phone'];?>"><br>

              <label class="date">Date:<span id="demo2"></span></label> <input type="date" name="dateapp" id="date" value="<?php echo $data['Date'];?>"><br>
              
              <label class="labeldoc">Doctor:</label>
              <select name="docname" id="docname" >
                  <?php 
                  $id=$data['d_id'];
                    $query2 ="SELECT * FROM add_doc where d_id=$id";
                    $result2 = mysqli_query($con,$query2);
                    while($rows = mysqli_fetch_assoc($result2) ){
                  ?>
                <option  selected value="<?php echo $data['d_id'];?>"><?php echo $rows['Name'];?>
                </option>
                <?php }   ?>             
              </select>
              <label class="button"></label><input type="submit" name="update" value="Edit">
                
            </form>
          </div>
     </div>
     <script type="text/javascript">
      var date = new Date();
      var tdate= date.getDate();
      var month= date.getMonth()+1;
      if (tdate < 10)
      {
        tdate= "0"+ tdate;
      }
      if (month < 10)
      {
        month="0"+ month;
      }
      var year= date.getUTCFullYear();
      var mindate= year +"-"+month+"-"+tdate;
      document.getElementById("date").setAttribute('min',mindate);
      console.log(mindate);
            function valid()
            {
                var name=document.getElementById("name").value;
                var num=document.getElementById("num").value;
                var date=document.getElementById("date").value;


                if(name=="" || num=="" || date=="")
                {
                  document.getElementById("demo").innerHTML="*Please fill all this out.";
                  return false;
                }
                else if(name.length>30)
                {
                  document.getElementById("demo").innerHTML="*Name should be less than 30 characters.";
                  return false;
                    
                }
                else if(isNaN(num)) 
                {
                  document.getElementById("demo3").innerHTML="*Phone Number is not valid ";
                  return false;
                    
                }
                else if(num.length>10 || num.length<10){
                  document.getElementById("demo3").innerHTML="*Phone Number is doesnot have 10 numbers. ";
                  return false;

                }
                else{
                  return true;
                }
            }
        </script>
  </body>
</html>