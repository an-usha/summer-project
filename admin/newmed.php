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
            <form nem="medicine" action="medinsert.php" onsubmit="return valid();" method="post" enctype="multipart/form-data">
              <h3>Add Medicine<hr></h3>
              <label class="fname">Medicine Name:<span id="demo"></span></label> <input type="text" name="fname" id="name" ><br>

              <!-- <label class="gname">Generic Name:<span id="demo1"></span></label> <input type="text" name="gname" id="gname"><br> -->
              <!-- <label class="qty">Quantity:<span id="demo4"></span></label> <input type="text" name="qty" id="qty" ><br>

              <label class="price">Price:<span id="demo5"></span></label> <input type="text" name="price" id="price" ><br> -->
              <label class="medt_ype">Medicine Type:<span id="demo1"></span></label><br> <select name="med_type" id="med_type">
              <option hidden>Select medicine type</option>  
              <option value="Syrup">Syrup</option>
                <option value="Tablet">Tablet</option>
                <option value="Capsule">Capsule</option>
                <option value="Cream/Gel">Cream/Gel</option>
                <option value="Drops">Drops</option>

              </select> <br>

              <label class="mg">MG:<span id="demo2"></span></label><input type="text" name="mg" id="mg"></br>

              <label class="note">Note:<span id="demo3"></span></label><textarea class="text" name="note" placeholder="Note..." id="note"></textarea><br>

              <label class="button"></label><input type="Submit" name="sub">

                
            </form>
          </div>
    </div>
    <script type="text/javascript">
        function valid()
        {
          var name=document.getElementById("name").value;
          var med_type=document.getElementById("med_type").value;
          // var price=document.getElementById("price").value; 
          var mg=document.getElementById("mg").value;
          var note=document.getElementById("note").value;
          var mg1=parseInt(mg);
          // var qty=parseInt(qty);
          // var qty=parseInt(price);
          
          if(name=="" || note==""|| mg=="")
          {
            document.getElementById("demo").innerHTML="*Please fill all this out.";
            return false;
          }
          else if(name.length>20)
          {
            document.getElementById("demo").innerHTML="*Name should be less than 20 characters.";
            return false;
                    
          }
          else if(isNaN(mg))
          {
            document.getElementById("demo2").innerHTML="*Mg should be in number.";
            return false;
          }
          else if(isNaN(qty) && isNaN(price))
          {
            document.getElementById("demo4").innerHTML="*Quantity should be in number.";
            return false;
          }

          else if(isNaN(price))
          {
            document.getElementById("demo5").innerHTML="*Price should be in number.";
            return false;
          }

          else if(mg1>1000)
          {
            document.getElementById("demo2").innerHTML="*Mg should not be more than 1000.";
            return false;
          }

          else if(qty<1)
          {
            document.getElementById("demo4").innerHTML="*Quantity should not be in negative.";
            return false;
          }
          else if(price<1)
          {
            document.getElementById("demo5").innerHTML="*Price should not be in negative.";
            return false;
          }
          else if(mg1<1)
          {
            document.getElementById("demo2").innerHTML="*Mg should not be in negative.";
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