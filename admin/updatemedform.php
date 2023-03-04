<html>
  <head>
    <title>Patient Registeration System</title>
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="../css/newmed.css" />
  </head>
  <body>
  <?php
	$id=$_GET['id'];
	$q="select * from new_med where m_id=$id";
	include("dbconnect.php");
	$result=mysqli_query($con,$q) or die(mysqli_error($con));
	$data=mysqli_fetch_array($result,MYSQLI_ASSOC);
	?>
        <?php include 'Home.php'; ?>
        
          <div class="medform">
            <form action="updatemed.php" onsubmit="return validmed()" method="post" >
              <h3>Edit Medicine<hr></h3>
              <input type="hidden" name="id" value="<?php echo $data['m_id'];?>">

              <label class="fname">Medicine Name:<span id="demo"></span></label> <input type="text" name="fname" id="name" value="<?php echo $data['M_name'];?>"><br>
              <label class="Med_type">Medicine Type:<span id="demo6"></span></label> <select name="med_type" id="med_type">
                <option value="Syrup" <?php 
                                      if ($data['Med_type']=='Syrup')
			                                       echo "selected";
                ?>  >Syrup</option>
                <option value="Tablet" <?php 
			       if ($data['Med_type']=='Tablet')
			         echo "selected";
                ?> >Tablet</option>
                <option value="Capsule" <?php 
			       if ($data['Med_type']=='Capsule')
			         echo "selected";
                ?> >Capsule</option>
                <option value="Cream/Gel" <?php 
			       if ($data['Med_type']=='Cream/Gel')
			         echo "selected";
                ?> >Cream/Gel</option>
                <option value="Drops" <?php 
			       if ($data['Med_type']=='Drops')
			         echo "selected";
                ?> >Drops</option>

              </select> <br>

<!-- 
              <label class="gname">Generic Name:<span id="demo1"></span></label> <input type="text" name="gname" id="gname"  value="<?php echo $data['G_name'];?>"><br> -->

              <label class="mg">MG:<span id="demo2"></span></label><input type="text" name="mg" id="mg" value="<?php echo $data['Mg'];?>"></br>

              <label class="note">Note:<span id="demo3"></label><textarea class="text" id="note" name="note" placeholder="Note..." value=""><?php echo $data['Note'];?></textarea><br>

              <label class="button"></label><input type="Submit" name="update" value="Edit">

            </form>
          </div>
      </div>
      <script type="text/javascript">
            function validmed()
            {
                var name=document.getElementById("name").value;
                var med_type=document.getElementById("med_type").value;
                var mg=document.getElementById("mg").value;
                var note=document.getElementById("note").value;
                var mg1=parseInt(mg);


                if(name=="" || med_type=="" || note==""|| mg=="")
                {
                  document.getElementById("demo").innerHTML="*Please fill all this out.";
                  return false;
                }
                else if(name.length>20)
                {
                  document.getElementById("demo").innerHTML="*Name should be less than 20 characters.";
                  return false;
                    
                }
                else if(mg1<=0)
                {
                  document.getElementById("demo2").innerHTML="*Mg should not be Zero.";
                  return false;
                }
                else{
                  return true;
                }
            }
      </script>
  </body>
</html>
