<html>
  <head>
    <title>Patient Registeration System</title>
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="../css/newapp.css" />
  </head>
  <body>
      <?php  
        include 'Home.php'; 
        include 'dbconnect.php';
      ?>
    
          <div class="appform">
            <form name="app" action="appinsert.php" onsubmit="return valid()" method="post" enctype="multipart/form-data">
              <h3>New Appointment<hr></h3>
              <label class="fname">Full Name:<span id="demo"></span></label> 
              <input type="text"  name="fname" id="name" ><br>

              <label class="phone">Phone Number:<span id="demo1"></span></label> 
              <input type="text"  name="num" id="num"><br>

              <label class="date">Appointment Date:<span id="demo2"></span></label>
              <input type="date"  name="date" id="date"><br>

              <label class="labeldoc">Doctor:</label>
              <select name="docname" id="docname" >
                <option disabled hidden selected>Select Doctors name</option>
                  <?php 
                    $query2 ="SELECT * FROM add_doc";
                    $result2 = mysqli_query($con,$query2);
                    while($rows = mysqli_fetch_assoc($result2) ){
                  ?>
                <option  value="<?php echo $rows['d_id'];?>"><?php echo $rows['Name'];?>
                </option>
                <?php }   ?>             
              </select>

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
      var mindate= year +"-"+month+"-"+tdate;
      document.getElementById("date").setAttribute('min',mindate);
      console.log(mindate);
      function valid()
      {
        var name=document.getElementById("name").value;
        var docname=document.getElementById("docname").value;
        var num=document.getElementById("num").value;
        var date=document.getElementById("date").value;
        if(name=="" || num=="" || date=="" || docname=="")
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
          document.getElementById("demo1").innerHTML="*Phone Number is not valid ";
          return false;    
        }
        else if(num.length>10 || num.length<10){
          document.getElementById("demo1").innerHTML="*Phone Number is doesnot have 10 numbers. ";
          return false;

        }
        else{
          return true;
        }
      }
    </script>
  </body>
</html>
