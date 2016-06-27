
<?php

session_start();

$email = $_POST['user_login'];
$password = md5($_POST['password_login']);


if($email&&$password)
{
	$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect");
	mysql_select_db("fetch") or die("Database connectivity problem");

	$query = mysql_query("SELECT * FROM user WHERE email='$email'");
	$numrows=mysql_num_rows($query);
	//if($numrows==0)
	//{
	//	echo 'NUMROWS IS ZERO <br>';
	//}

	if($numrows!=0)
	{
		while($row = mysql_fetch_assoc($query))
		{
			$dbpassword = $row['password'];
			$dbcollege = $row['college'];
			$dbfirstname = $row['firstname'];
			$dblastname = $row['lastname'];
			$dbemail = $row['email'];
			$dbdate = $row['firstname'];
			$dbyop = $row['yop'];
			$dbprofile=$row['profile_picture'];	
		}

		if($email==$dbemail&&($password)==$dbpassword)
		{
			@$_SESSION['email'] = $email;
			@$_SESSION['password'] = $password;
			
			include "profile.php";
		}
		else 	
		{
			?>
			<script> alert("Your password is incorrect!");</script>
			<?php include ("loginpage2.php");
		}
			
	}

	else 
	{ 
		?>
		<script> alert("This user is not registered!");</script>
		<?php include ("loginpage2.php");
	}
}
else 
{ 
?>
<script> alert("Please enter your email id and password!");</script>
<?php include ("loginpage2.php");
}

?>