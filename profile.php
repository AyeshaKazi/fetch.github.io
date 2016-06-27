<!DOCTYPE html>
<html>
<head>
	<title>
		Fetch - Profile
	</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body style="background-color: #F9EFEA;">
<!--begin div for header-->

<?php include 'header.inc.php';?> 

<!--end of header-->
<hr>

<!--begin side colour-->
<div style="float:left; width:13%; height: 800px; background-color: #6C393D;">
</div>

<!--end of side colour-->
<!--begin main div for picture+name-->
<div id="profile">


<div style="float:left; width: 30%;">
<img src=" <?php echo $dbprofile; ?>" id="img_profile">
</div>

<div style="float:right; width: 70%;">
<br><br><br>
<h1 id="name_profile"><?php echo $dbfirstname.'&nbsp'.$dblastname ?> </h1><hr>
<p id="details_profile">  <?php echo $dbcollege; ?>
<br> Email :<?php echo $dbemail; ?>
<br> Birthday :22 July, 1996 
<br> Age : 25
</p><br>
</div>


</div> <!--end of main div for profile-->
<hr>
<div> <!-- Main Div -->
<div style="float:right; width:80%;">
<div id="outer">
  <div class="inner">
  <button type="submit" class="msgBtn" onClick="return false;" style="border: none;">#pambeasely</button>
  <button type="submit" class="msgBtn" onClick="return false;" style="border: none;">#fun</button>
  <button type="submit" class="msgBtn" onClick="return false;" style="border: none;">#pranks</button>
  <button type="submit" class="msgBtn2" onClick="return false;" style="border: none;">#sales</button>
  <button type="submit" class="msgBtn" onClick="return false;" style="border: none;">#athlead</button>
  <button type="submit" class="msgBtn" onClick="return false;" style="border: none;">#cece</button>


</div>
</div>
<div style="overflow-x:auto; padding-left: 2px; padding-right: 2px; background-color: #F9EFEA;" id="p_tfheader">
    <table>
    <tr>
    <td>POST 1</td>
    <td>POST 2</td>
    </tr>
    <tr>
    <td>POST 3</td>
    <td>POST 4</td>
    </tr>
    </table>
    </div>
</div>
 
</body>

</html>