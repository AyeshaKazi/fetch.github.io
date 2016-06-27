<!DOCTYPE html>
<html>
<head>
	<title>
		Each post
	</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	
	<?php

if(!mysql_connect("localhost","root",""))
{
     die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("fetch"))
{
     die('oops database selection problem ! --> '.mysql_error());
}

$query = mysql_query("SELECT * FROM post WHERE post_id='$post_id'");
$row = mysql_fetch_assoc($query);

$caption=$row['caption'];
$poster=$row['poster'];
$time=$row['time'];
$time2=date('h:i:s a m-d-Y', strtotime($time));

$user_id=$row['user_id'];
$query2 = mysql_query("SELECT * FROM user WHERE id='$user_id'");
$row2=mysql_fetch_assoc($query2);
$name=$row2['firstname']. " ". $row2['lastname'];
$college=$row2['college'];
$profile=$row2['profile_picture'];

	?>


<div id="post">


<div id="post_imagediv"> <img src="<?php echo $profile; ?>" id="post_image"> </div>
<br>
<div id="postx">

<span><div id="post_name"> <?php echo $name; ?> </div></span> <span id="post_college" style="float: right; padding-right: 20px;"><?php echo $time2; ?></span> <br>
<div id="post_college"> <?php echo $college; ?> </div>
</div><br><br>

<div id="post_caption"> <?php echo $caption; ?>
</div> <br><br>

<div id="post_posterdiv"><img id="post_poster" src="<?php echo $poster ;?>">
</div>
<br>
Like | Comment
<br><br>

</div>
</body>