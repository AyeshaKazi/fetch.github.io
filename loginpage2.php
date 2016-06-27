<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<head>
  <title> Fetch - Sign in / Sign up</title>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
</head>

<!php code.................>
<?php

session_start();

if(!mysql_connect("localhost","root",""))
{
     die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("fetch"))
{
     die('oops database selection problem ! --> '.mysql_error());
}

//login

if(isset($_POST['btn-login']))
{
	$email='';
	$upass='';
 $email = mysql_real_escape_string($_POST['user_login']);
 $upass = mysql_real_escape_string($_POST['password_login']);
$res=mysql_query("SELECT * FROM user WHERE email='$email'");

 $row=mysql_fetch_array($res);

 if($row['password']==md5($upass))
 {
  $_SESSION['user'] = $row['user_id'];
  header("Location: new_profile.php");
 }
 else
 {
  ?>
        <script>alert('Wrong details. Please try again');</script>
        <?php
 }
}

//register

if(isset($_POST['btn-signup']))
{
$fn = ""; //First Name
$ln = ""; //Last Name
$clg = ""; //Username
$em = ""; //Email
$course = ""; //Email 2
$pswd = ""; //Password
$pswd2 = ""; // Password 2
$d = ""; // Sign up Date
$u_check = ""; // Check if username exists
//registration form
$fn = strip_tags(@$_POST['fname']);
$sn = strip_tags(@$_POST['sname']);
$clg = strip_tags(@$_POST['college']);
$em = strip_tags(@$_POST['email']);
$course = strip_tags(@$_POST['course']);
$pswd = strip_tags(@$_POST['pwd']);
$pswd2 = strip_tags(@$_POST['pwd2']);
$d = @$_POST['birthday_day']."-".@$_POST['birthday_month']."-".@$_POST['birthday_year']; // Year - Month - Day
$sex = strip_tags(@$_POST['gender']);
$yop = (int)strip_tags(@$_POST['yop']);

if (isset($em))
{//encrypt password and password 2 using md5 before sending to database
$pswd = md5($pswd);
$pswd2 = md5($pswd2);
        
@$_SESSION['email'] = $em;
@$_SESSION['password'] = $pwd;
@$_SESSION['sex']=$sex;

if(mysql_query("INSERT INTO user VALUES ('','$fn','$sn','$em','$pswd','$d','$clg','$course','$yop','','$sex')"))
 {
  ?>
        <script>alert('Successfully registered ');</script>
        <?php
        header("Location: registered.php");

 }
 else
 {
  ?>
        <script>alert('Unable to register');</script>
        <?php
 } }
}

?>





<body>

<!header..............>

<div id="head1" style="height: 100px; background-color:#6c393d ;">
<img src="images/logo.jpg" style="height: 100%; float: left; width: 15%;  border-width: 1px;">
<img src="images/11.png" style="width: 85%; height: 100%;">
</div>


<!login........................>
<br>
<div id="Login"> 
<center>
<form action="" method="post" name="form1" id="form1">
<input type="text" name="user_login" placeholder="Email" required />
<input type="password" name="password_login" placeholder="Password" required />
<button type="submit" name="btn-login">Log In</button> 
</form>
</center>
</div>
<br>

<style type="text/css">
	hr
	{
		height: 2px;
		color: black;
		background-color: black;
	}

</style>
<div style="width:100%;text-align:center;">
  <span style="width:43%;display:inline;float:left;"><hr/></span>
  <span style="display:inline;float:left; color: #6c393d; font-size: 25px; font-weight: bold;"> &nbsp SIGN UP NOW &nbsp</span>
  <span style="width:33%;display:inline;float:left;"><hr/></span>
</div>
<hr>


<!register...................>
<div id="reg">


<div id="register" style="float: left ;width: 50%; border-width: 5px;">

<form action="" method="post" name="form2" id="form2">
<input type="text" name="fname" placeholder="First Name" required /><br>
<input type="text" name="sname" placeholder="Last Name" required /><br>
Sex : 
<input type="radio" id="gender_m" name="gender" value="male" style="height:15px; width:15px;"> Male 
<input type="radio" id="gender_f" name="gender" value="female" style="height:15px; width:15px"> Female <br>


<div class="_5k_5">
<span class="_5k_4" data-type="selectors" data-name="birthday_wrapper" id="u_0_d">
<span>
Birthday
<select aria-label="Day" name="birthday_day" id="day" title="Day" class="_5dba">
<option value="0" selected="1">
Day</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
<select aria-label="Month" name="birthday_month" id="month" title="Month" class="_5dba">
<option value="0" selected="1">Month</option>
<option value="1">Jan</option>
<option value="2">Feb</option>
<option value="3">Mar</option>
<option value="4">Apr</option>
<option value="5">May</option>
<option value="6">Jun</option>
<option value="7">Jul</option>
<option value="8">Aug</option>
<option value="9">Sept</option>
<option value="10">Oct</option>
<option value="11">Nov</option>
<option value="12">Dec</option>
</select><select aria-label="Year" name="birthday_year" id="year" title="Year" class="_5dba">
<option value="0" selected="1">Year</option>
<option value="2016">2016</option>
<option value="2015">2015</option>
<option value="2014">2014</option>
<option value="2013">2013</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
</select>
<br>
<input type="text" name="college" placeholder="College Name"  /><br>
<input type="text" name="course" placeholder="Course"  /><br>
<input type="text" name="yop" placeholder="Year of passing"  /><br>
<input type="text" name="email" placeholder="Email" required /><br>
<input type="text" name="pwd" placeholder="Password" required /><br>
<input type="text" name="pwd2" placeholder="Re-enter Password" required /><br>

<button type="submit" name="btn-signup">Submit</button>
</div></span></span></div></form></div>


<div id="register2" style="float: right; width: 48%;">
<center>
<br><br><br><br>
 via facebook 
 <br>
 via google +
 <br>
 </center>
</div>



</div>

</body>

</html>