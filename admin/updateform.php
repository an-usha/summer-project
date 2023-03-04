<html>
<head>
	<title></title>
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="../css/form.css" />
</head>
<body>
	<?php
	$id=$_GET['id'];
	$q="select * from reg_patient where id=$id";
	include("dbconnect.php");
	$result=mysqli_query($con,$q) or die(mysqli_error($con));
	$data=mysqli_fetch_array($result,MYSQLI_ASSOC);
	?>
        <?php include 'Home.php'; ?>
    
          <div class="registerform">
          <form name="reg" action="updatepatient.php"  onsubmit="return valid()"  method="post">
              <h3>Edit Patient's Info<hr></h3>
              <input type="hidden" name="id" value="<?php echo $data['ID'];?>">
              <label class="fname">Full Name:<span id="demo"></span></label> 
              <input type="text" name="fname" id="name" value="<?php echo $data['Name']; ?>"><br>

              <label class="gen">Gender: </label> 
              <input type="radio" name="gender" id="gen" value=Male 
			    <?php 
			       if ($data['Gender']=='Male')
			         echo "checked";
                ?> 
               >Male
			    <input type="radio" name="gender" id="gen" value=Female
			        <?php 
			            if ($data['Gender']=='Female')
			                echo "checked";
                    ?>
			    >Female<span id="demo1"></span><br>

          <label class="place">Address:<span id="demo2"></span></label> <input type="text" name="address"  id="add" value="<?php echo $data['Address'];?>"><br>

              <label class="phone">Phone Number:<span id="demo3"></span></label> <input type="text" name="num" id="num" value="<?php echo $data['Phone'];?>"><br>

              <label class="birth">Birth Date:<span id="demo4"></span></label> <input type="date" name="dob" id="dob" value="<?php echo $data['Birthdate'];?>"><br>

              <label class="wei">Weight:<span id="demo5"></span></label> <input type="text" name="weight" id="weg" value="<?php echo $data['Weight'];?>"><br>

              <label class="blood">Blood Group:<span id="demo6"></span></label> <select name="bg" id="bg">
                <option value="A+" <?php 
                                      if ($data['Blood']=='A+')
			                                       echo "selected";
                ?>  >A+</option>
                <option value="A-" <?php 
			       if ($data['Blood']=='A-')
			         echo "selected";
                ?> >A-</option>
                <option value="B+" <?php 
			       if ($data['Blood']=='B+')
			         echo "selected";
                ?> >B+</option>
                <option value="B-" <?php 
			       if ($data['Blood']=='B-')
			         echo "selected";
                ?> >B-</option>
                <option value="AB+" <?php 
			       if ($data['Blood']=='AB+')
			         echo "selected";
                ?> >AB+</option>
                <option value="AB- <?php 
			       if ($data['Blood']=='AB-')
			         echo "selected";
                ?> ">AB-</option>
                <option value="O+" <?php 
			       if ($data['Blood']=='O+')
			         echo "selected";
                ?> >O+</option>
                <option value="O- <?php 
			       if ($data['Blood']=='O-')
			         echo "selected";
                ?> ">O-</option>

              </select> <br>
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
                var wei=parseInt(weight);
                // var mail=document.getElementById("mail").value;
                // var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                // var result=mailformat.test(mail);
                var current=new Date();
                var birth1= new Date(birth);


                if(name=="" || add=="" || num=="" || birth=="" || weight=="" || dob=="" )
                {
                  document.getElementById("demo").innerHTML="*Please fill all this out.";
                  return false;
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
                else if(num.length>10 || num.length<10){
                  document.getElementById("demo3").innerHTML="*Phone Number is doesnot have 10 numbers. ";
                  return false;

                }
                else if(birth1 >= current)
                {
                  document.getElementById("demo4").innerHTML="*Birthdate should not be in future.";
                  return false;
                }
                else if(wei<=0) 
                {
                  document.getElementById("demo5").innerHTML="*Weight should not be Negative or Zero. ";
                  return false;
                    
                }
                else{
                  return true;
                }
            }
        </script>
  </body>
</html>