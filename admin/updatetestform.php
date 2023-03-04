<html>
  <head>
    <title>Patient Registeration System</title>
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="../css/newtest.css" />
  </head>
  <body>
  <?php
	$id=$_GET['id'];
	$q="select * from new_test where t_id=$id";
	include("dbconnect.php");
	$result=mysqli_query($con,$q) or die(mysqli_error($con));
	$data=mysqli_fetch_array($result,MYSQLI_ASSOC);
	?>
        <?php include 'Home.php'; ?>
        
          <div class="testform">
            <form action="updatetest.php" onsubmit="return valid()" method="post" >
              <h3>Edit Test<hr></h3>
              <input type="hidden" name="id" value="<?php echo $data['t_id'];?>">

              <label class="fname">Test Name:<span id="demo"></span></label> <input type="text" name="fname" id="name" value="<?php echo $data['Test_name']; ?>"><br>

              <label class="note">Note:<span id="demo"></span></label><textarea class="text" name="note" placeholder="Note..." id="note" value=""><?php echo $data['Note']; ?></textarea><br>

              <label class="button"></label><input type="submit" name="update" value="Edit">
            </form>
          </div>
    </div>
    <script type="text/javascript">
      
            function valid()
            {
                var name=document.getElementById("name").value;
                var note=document.getElementById("note").value;

                if(name=="" || note=="")
                {
                  document.getElementById("demo").innerHTML="*Please fill all this out.";
                  return false;
                }
                else if(name.length>80)
                {
                  document.getElementById("demo").innerHTML="*Name should be less than 20 characters.";
                  return false;
                    
                }
                else{
                  return true;
                }
            }
        
    </script>
  </body>
</html>
