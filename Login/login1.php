<?php
include("dbconnect.php");
  session_start();
if(isset($_SESSION['username']))
{
if($_SESSION['username']=="admin")
header("location:../admin/dashboard.php");
else
header("location:../doc/doc_dashboard.php");
exit();
}
?>
<html>
    <head>
        <link rel="stylesheet" href="login1.css">

    </head>
<body>
<div class="full-page">
    <div id='login-form' class='login-page'>
        <div class="form-box">
            <div class='button-box'>
                <div id='btn'></div>
                    <button type='button'onclick='login()'class='toggle-btn'>Log In</button>
                    <button type='button'onclick='register()'class='toggle-btn'>Register</button>
                </div>
                <form id='login' class='input-group-login' method='post' action='loginsert.php'>
                    <input name='username' 'type='text'class='input-field' placeholder='Enter Username' required >
                    <input name='password' type='password'class='input-field' placeholder='Enter Password' required>
                    <input name='remember' type='checkbox'class='check-box' ><span>Remember Password</span>
                    <input type='submit' class='submit-btn' value='Log In'>
                </form>
                <form id='register' class='input-group-register' onsubmit='return validreg()' method='post' action='registerin.php'>
                <input type='text' id='name' name='name' class='input-field'placeholder='Name' required><span id="demo"></span><br>
                   <input type='text' id='uname' name='uname' class='input-field'placeholder='Username' required>
                   <input type='text' id='num' name='num' class='input-field'placeholder='Phone Number'  required>
                    <input type='email' name='email' class='input-field'placeholder='Email Id' required>
                    <input type='password' id='pass' name='pass' class='input-field'placeholder='Enter Password' required>
                    <input type='password' id='rpass' name='rpass' class='input-field'placeholder='Confirm Password'  required>
                    <input type='submit'class='rsubmit-btn' value='Register' name='reg'>
                    
                </form>
            </div>
        </div>
    </div>
    <?php

?>
<script>
	</script>
	
</body>
</html>


    <script type="text/javascript">
        var x=document.getElementById('login');
        var y=document.getElementById('register');
        var z=document.getElementById('btn');
        function register()
        {
            x.style.left='-400px';
            y.style.left='50px';
            z.style.left='110px';
        }
        function login()
        {
            x.style.left='50px';
            y.style.left='450px';
            z.style.left='0px';
        }

        function validreg()
        {
            var error='';
            var name=document.getElementById("name").value;
            var uname=document.getElementById("uname").value;
            var num=document.getElementById("num").value;
            var pass=document.getElementById("pass").value;
            var repass=document.getElementById("rpass").value;
                if (name.length >20){
                    // document.getElementById("name").innerHTML="*Name should be less than 20 characters.";
                    document.getElementById("demo").innerHTML="Name is too long";
                    return false;
                }
                else if(uname.length>10){
                    // document.getElementById("uname").innerHTML="*Userame should be less than 10 characters.";
                    document.getElementById("demo").innerHTML="Username is too long";
                    return false;
                } 
                else if(pass.length<5){
                    // document.getElementById("repass").innerHTML="*Retype password should match password";
                    document.getElementById("demo").innerHTML="Password is weak.";
                    return false;
                }
                else if(repass!=pass){
                    // document.getElementById("repass").innerHTML="*Retype password should match password";
                    document.getElementById("demo").innerHTML="Password doesn't match.";
                    return false;
                }
                else if(isNaN(num)) 
                {
          document.getElementById("demo").innerHTML="*Phone Number is not valid ";
          return false;
        }
        else if(num.length>10 || num.length<10)
        {
          document.getElementById("demo").innerHTML="*Phone Number is doesnot have 10 numbers. ";
          return false;
        }
                else{
                    return true;
                }
        }
    </script>
</body>
</html>