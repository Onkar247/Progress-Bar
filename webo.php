<!DOCTYPE html>
<html>
<head>
	<title>Webo</title>
	<style type="text/css">
	form{
		text-align:center; 
	}
	</style>
</head>
<body>

<form action="#" method="post">
<h1>Create Assignments</h1>
Assignment Name:<input type="text" name="assign"><br><br>
Upload: <input type="file" name="file"><br><br>
<input type="submit" name="sub">
</form>


</body>
</html>

<?php 
	if(isset($_POST['sub']))
	{	
		$con=mysqli_connect("localhost","root","","webo");
		if(!$con)
		{
			die('Could not connect:'.mysqli_connect_error());
		}
		$n=$_POST['assign'];
		$f=$_POST['file'];
		$sql="INSERT INTO details VALUES('$n','$f')";
		if(!mysqli_query($con,$sql))
		{
			die('Error:'.mysqli_error($con));
		}
		mysqli_close($con);	 
	}
 ?>


