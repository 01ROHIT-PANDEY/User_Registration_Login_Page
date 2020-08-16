<?php
session_start();
$conn=mysqli_connect("localhost","root","","userdb"); //here userdb is database to store user details in tables
if(!$conn)
   {echo"connection error". "<br>";
   die("unable to connect,check your connection parameters");}
else

$email=$_POST['email'];
$password=$_POST['password'];

$sql="select * from user where email='$email' and password='$password'";
$eid=mysqli_query($conn,$sql); 

    if(mysqli_num_rows($eid) >0)  //here check if account is existed or not.
     {  
        
        $_SESSION["username"]=$email;
        header("Location:dashboard.php");

      
    }
   else  {?>
        <script>alert("Wrong Inputs");
        window.location="login.html";
       </script>
        
    <?php }

mysqli_close($conn);
?>
