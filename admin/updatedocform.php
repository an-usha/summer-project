<html>
  <head>
    <title>Patient Registeration System</title>
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="../css/newmed.css" />
  </head>
  <body>
    <?php 
      include 'Home.php'; 
	$id=$_GET['id'];
	$q="select * from add_doc where d_id=$id";
	include("dbconnect.php");
	$result=mysqli_query($con,$q) or die(mysqli_error($con));
	$data=mysqli_fetch_array($result,MYSQLI_ASSOC);
	?>
        
          <div class="medform">
            <form action="updatedoc.php" onsubmit="return valid()" method="post" >
              <h3>Update Doctor's Info<hr></h3>
              <input type="hidden" name="id" value="<?php echo $data['d_id'];?>">
              <label class="fname">Doctor Name:<span id="demo"></span></label> <input type="text" name="fname" id="name" 
              value="<?php echo $data['Name']; ?>" ><br>

              <!-- <label class="gname">Generic Name:<span id="demo1"></span></label> <input type="text" name="gname" id="gname"><br> -->

              <label class="field">Medicine Type:<span id="demo2"></span></label> <select name="field" id="field">
                <option value="General Physician" <?php 
                                      if ($data['Field']=='General Physician')
			                                       echo "selected";
                ?>  >General Physician</option>
                <option value="Dermatologist" <?php 
			       if ($data['Field']=='Dermatologist')
			         echo "selected";
                ?> >Dermatologist</option>
                <option value="Pediatician" <?php 
			       if ($data['Field']=='Pediatician')
			         echo "selected";
                ?> >Pediatician</option>
                <option value="Ophthalmologist" <?php 
			       if ($data['Field']=='Ophthalmologist')
			         echo "selected";
                ?> >Ophthalmologist</option>
                <option value="Orthologist" <?php 
			       if ($data['Field']=='Orthologist')
			         echo "selected";
                ?> >Orthologist</option>
                <option value="Gynaecologist" <?php 
			       if ($data['Field']=='Gynaecologist')
			         echo "selected";
                ?> >Gynaecologist</option>
                <option value="Cardiologist" <?php 
			       if ($data['Field']=='Cardiologist')
			         echo "selected";
                ?> >Cardiologist</option>

              </select> <br>
              <label class="phone">Phone:<span id="demo3"></span></label><input type="text" name="phone" id="phone" 
              value ="<?php echo $data['Phone']; ?>"></br>

              <label class="Time">Time:<span id="demo4"></span></label><input type="time" name="time1" id="time1" 
              value ="<?php echo $data['Time1']; ?>"></br>

              <label class="button"></label><input type="Submit" name="update" value="Edit">

                
            </form>
          </div>
     </div>
     <script type="text/javascript">
        function valid()
        {
          var name=document.getElementById("name").value;
          var field=document.getElementById("field").value;
          var time=document.getElementById("time1").value;
          var phone=document.getElementById("phone").value;
          var mg=parseInt(mg);

          if(name=="" || field=="" || time==""|| phone=="")
          {
            document.getElementById("demo").innerHTML="*Please fill all this out.";
            return false;
          }
          else if(phone.length>10 || phone.length<10)
          {
            document.getElementById("demo3").innerHTML="*Phone number incorrect.";
            return false;
                    
          }
          else if(isNaN(phone))
          {
            document.getElementById("demo3").innerHTML="*Mg should be in number.";
            return false;
          }
          else
          {
            return true;
          }
        }
      </script>
  </body>
</html>