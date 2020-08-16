
<?php 
session_start();
error_reporting(0);
$conn=mysqli_connect("localhost","root","","userdb") or
 die("unable to connect check your connection parameters");//here userdb is database to store user details in tables
if(!$conn)
   {
   	echo"connection error";
   	die(mysqli_error($conn));
   }
else
{
$username= $_SESSION["username"];
$sql="select * from user where email='$username'";
$result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) >0)  //here check if account is existed or not.
     {  
     	while($row=mysqli_fetch_assoc($result))
     	{
     		$username=$row["firstname"];
     		$lastname=$row["lastname"];
     		$email=$row["email"];
     		$contact=$row["contact"];
     	}
     }
   }
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Dashboard</title>
<link rel="stylesheet" type="text/css" href="css/dashboard.css">
</head>
<body>
    <script>
    alert("Successfully Login!");	

</script>
	<div class="nav">
	<h2>MY DASHBOARD</h2><p> You Are Log In as :<strong><?php echo " ". $username ."" ?></strong><br><br><button><a href="logout.php "target="_self">Log Out</a></button></p>
	    
</div>

	<div class="main">
			<div class="info">
					<center>
					<h4>USER DETAILS</h4>
					 <ul type="none" style="text-align: left;">
					 <li>Email:<?php echo "". $email ."";?></li><br>
					 <li>Your Name:  <?php echo "". $username ." ". $lastname."";?></li><br>
					 <li>Your Contact: <?php echo "". $contact ."";?></li>
					</ul>
					</center>
			</div>
	</div>


</body>
</html>