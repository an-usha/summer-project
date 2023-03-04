<html>
  <head>
    <title>Patient Registeration System</title>
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="../css/form.css" />
  </head>
  
  <body>
  <?php 
    include 'Home.php';
  ?>
          <div class="registerform">
            <form name="reg"  action="reginsert.php" onsubmit="return valid()"  method="post" enctype="multipart/form-data">
              <div class="heading"><h3>New Patient</h3></div>
              <input type="hidden" name="created" id="created" value="<?php $now = new DateTime();
              echo $now->format('M'); ?>">
              <label class="fname">Full Name:<span id="demo"></span></label> <br><input type="text" name="fname" id="name" ><br>

              <label class="gen">Gender:</label>
                <input type="radio" name="gender" value="Male" id="gen">Male &nbsp;&nbsp; 
                <input type="radio" name="gender" value="Female" id="gen">Female<span id="demo1"></span> <br>
                
              <label class="place">Address:<span id="demo2"></span></label><br> <input type="text" name="address" id="add"  ><br>

              <label class="phone">Phone Number:<span id="demo3"></span></label><br> <input type="text" name="num" id="num"><br>

              <label class="birth">Birth Date:<span id="demo4"></span><br></label> <input type="date" name="dob" id="dob">

              <label class="wei" >Weight:<span id="demo5"></span></label><br> <input type="text" placeholder="in kg..." name="weight" id="weg"><br>

              <label class="blood">Blood Group:><span id="demo6"></span></label><br> <select name="bg" id="bg">
              <option disabled hidden selected>Select Blood Type</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>

              </select> <br>
              <!-- <label class="email">Email:<span id="demo7"></span></label><br><input type="text" name="email" id="mail"><br> -->

              <label class="button"></label><input type="submit" name="submit" value="Save">
                
            </form>
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
      var maxdate= year +"-"+month+"-"+tdate;
      document.getElementById("dob").setAttribute('max',maxdate);
      function valid()
      {
        var name=document.getElementById("name").value;
        var gender=document.querySelector( 'input[name="gender"]:checked');
        var add=document.getElementById("add").value;
        var num=document.getElementById("num").value;
        var birth=document.getElementById("dob").value;
        var weight=document.getElementById("weg").value;
        var bg=document.getElementById("bg").value;
        var wei=parseInt(weight);
        // var mail=document.getElementById("mail").value;
        // var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        // var result=mailformat.test(mail);

        if(name=="" || add=="" || num=="" || birth=="" || weight=="" || dob=="" || bg=="" )
        {
          document.getElementById("demo").innerHTML="*Please fill all this out.";
          return false;
        }
        else if (select.tagName.toLowerCase() == 'select') {
        console.log('Element is a select dropdown');
        } 
        else if(name.length>30)
        {
          document.getElementById("demo").innerHTML="*Name should be less than 30 characters.";
          return false;
                    
        }
        else if (gender==null)
        {
          document.getElementById("demo1").innerHTML="*Gender is not selected.";
          return false; 
        }
        else if(isNaN(num)) 
        {
          document.getElementById("demo3").innerHTML="*Phone Number is not valid ";
          return false;
        }
        else if(num.length>10 || num.length<10)
        {
          document.getElementById("demo3").innerHTML="*Phone Number is doesnot have 10 numbers. ";
          return false;
        }
        else if(wei<=0) 
        {
          document.getElementById("demo5").innerHTML="*Weight should not be Negative or Zero. ";
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