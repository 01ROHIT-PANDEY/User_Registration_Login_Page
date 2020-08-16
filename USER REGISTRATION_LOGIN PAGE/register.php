<?php
$conn=mysqli_connect("localhost","root","","userdb");   //here userdb is database to store user details in tables
if(!$conn)
{echo"connection error";
}
else

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password=$_POST['password'];
$contact=$_POST['contact'];

$sql="insert into  user(firstname,lastname,email,password,contact) values ('$firstname','$lastname','$email','$password','$contact')";
$s1="select email from user where email='$email'";
$result=mysqli_query($conn,$s1); 

    if(mysqli_num_rows($result) >0)  //here check if account is existed or not.
     {  
        echo "Account already existed";
      
    }
     else if(mysqli_query($conn,$sql))
        { ?>   <script >alert("Account Successfully Created!");window.location="login.html" </script>

  <?php } else
    {
            echo "Error in Creating";
    }

mysqli_close($conn);

?>
