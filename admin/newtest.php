<html>
  <head>
    <title>Patient Registeration System</title>
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="../css/newtest.css" />
  </head>
  <body>
        <?php include'Home.php'; ?>
        
          <div class="testform">
            <form action="testinsert.php" onsubmit="return valid()" method="post" >
              <h3>Add Test<hr></h3>
              <label class="fname">Test Name:<span id="demo"></span></label> <input type="text" name="fname" id="name" ><br>

              <label class="note">Note:<span id="demo"></span></label><textarea class="text" name="note" placeholder="Note..." id="note"></textarea><br>

              <label class="button"></label><input type="submit" name="sub">
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
                else if(name.length>70)
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
