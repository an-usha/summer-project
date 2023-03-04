<html>
  <head>
    <title>Patient Registeration System</title>
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="../css/newmed.css" />
    
  </head>
  <body>
    <?php 
      include 'Home.php'; 
    ?>
        
          <div class="medform">
            <form action="docinsert.php" onsubmit="return valid()" method="post" >
              <h3>Add Doctors<hr></h3>
              <label class="fname">Doctor Name:<span id="demo"></span></label> <input type="text" name="fname" id="name" ><br>

              <!-- <label class="gname">Generic Name:<span id="demo1"></span></label> <input type="text" name="gname" id="gname"><br> -->

              <label class="Speciality">Field:<span id="demo2"></span></label><select id="field" name="field">
                <option value="General Physician">General Physician</option>
                <option value="Dermatologist">Dermatologist</option>
                <option value="Pediatician">Pediatician</option>
                <option value="Ophthalmologist">Ophthalmologist</option>
                <option value="Orthologist">Orthologist</option>
                <option value="Gynaecologist">Gynaecologist</option>
                <option value="Cardiologist">Cardiologist</option>

              </select>
              </br>

              <label class="note">Phone:<span id="demo3"></span></label><input type="text" name="phone" id="phone"></br>

              <label class="Time">Time:<span id="demo4"></span></label><input type="time" name="time1" id="time1"></br>

              <label class="button"></label><input type="Submit" name="sub">

                
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