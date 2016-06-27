<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</head>

<?php
if(!mysql_connect("localhost","root",""))
{
     die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("fetch"))
{
     die('oops database selection problem ! --> '.mysql_error());
}
session_start();

if(!isset($_SESSION['email']))
{
   echo "NO";
}

if(isset($_POST["submit"]))
{
function getExtension($str)
{
     $i = strrpos($str,".");
     if (!$i) { return ""; }
     $l = strlen($str) - $i;
     $ext = substr($str,$i+1,$l);
     return $ext;
}
 define ("MAX_SIZE","1000"); 

// deafult profile picture is male for now
$newname="image/male.jpg";

$errors=0;
$image=$_FILES['profile_picture']['name'];
if ($image) 
{
    $filename = stripslashes($_FILES['profile_picture']['name']);
    $extension = getExtension($filename);
    $extension = strtolower($extension);
   
        $size=filesize($_FILES['profile_picture']['tmp_name']);
 
        if ($size > MAX_SIZE*1024)
        {
        ?>
        <script>alert('You have exceeded the size limit of the profile_picture!');</script>
        <?php
            $errors=1;
        }
 
        $image_name=time().'.'.$extension;
        $newname="uploads/".$image_name;
 
        $copied = copy($_FILES['profile_picture']['tmp_name'], $newname);
        if (!$copied) 
        {
        ?>
        <script>alert('Copy unsuccessfull of the profile_picture!');</script>
        <?php
            $errors=1;
        }
}
/*
else
{
	if($_SESSION['sex']=="male")
		$newname="images/male.jpg";
	if($_SESSION['sex']=="female")
		$newname="images/female.jpg";
}
*/
$category="";
foreach($_POST['interest'] as $selected)
        { $category= $category ." ". $selected;  }
$em=$_SESSION['email'];
if(mysql_query("UPDATE user SET profile_picture='$newname' WHERE email='$em'"))
 {
  echo "pp set";
 }


 //INSERT INTO CATEGORY TABLE SOMEHOW



}

?>




<body>


<div>
<!-- Popup Div Starts Here -->
<div>
<!-- Contact Us Form -->

<form action="#" id="newform" method="post" name="newform" enctype="multipart/form-data" style="margin: 50px;">

<h2 style="color:#6c393d;">You have successfully registered! <br> Give us some more details to make your Fetch experience better</h2>
<hr>

<!select gender and the default profile picture changes accordingly >

Set a Profile Picture<br>From your device memory : <input type="file" name="profile_picture" accept="image/*" onchange="loadFile(event)"> <br><br>
<div id="x">
<img id="i1" src="images/male.jpg" style="height: 100px; width: 100px;"> <img id="i2" src="images/female.jpg" style="height: 100px; width: 100px;"> <span style="font-size: 12px;"><br> default profile pictures </span>
</div><img id="select" style="height: 200px; width: 200px; display: none;">


<img id="profile_picture" /><br>
<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
    	document.getElementById('x').style.display="none";
    	document.getElementById('select').style.display="block";

      var output = document.getElementById('select');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>


<hr>
<b>Select Category (interests) : <br></b><br>

<div style="margin-left:120px; margin-right: 120px;">
<div id="a" style="float: left; width: 20%">   <input type="checkbox" name="interest[]" value="Bike"> Science<br>  <input type="checkbox" name="interest[]" value="Bike"> Dance<br>
  <input type="checkbox" name="interest[]" value="Bike"> Dance<br>

 </div>
<div id="a" style="float: left; width: 20%">   <input type="checkbox" name="interest[]" value="Bike"> Science<br>  <input type="checkbox" name="interest[]" value="Bike"> Dance<br>
  <input type="checkbox" name="interest[]" value="Bike"> Dance<br>

 </div>
<div id="a" style="float: left; width: 20%">   <input type="checkbox" name="interest[]" value="Bike"> Science<br>  <input type="checkbox" name="interest[]" value="Bike"> Dance<br>
  <input type="checkbox" name="interest[]" value="Bike"> Dance<br>

 </div>
 </div>


<br><br><br>
<br>  
<!<a href="javascript:%20check_empty()" id="submit" class="buttons" Send</a>
<button type="submit" id="submit" name="submit" class="buttons" > SAVE </button> 
<br><br>
</form>
</div>
<!-- Popup Div Ends Here -->
</div>
</body>
</html>
<script language="javascript" type="text/javascript">
//preview picture on selection
$(function () {
    $("#fileupload").change(function () {
        $("#dvPreview").html("");
        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
        if (regex.test($(this).val().toLowerCase())) {
            if ($.browser.msie && parseFloat(jQuery.browser.version) <= 9.0) {
                $("#dvPreview").show();
                $("#dvPreview")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
            }
            else {
                if (typeof (FileReader) != "undefined") {
                    $("#dvPreview").show();
                    $("#dvPreview").append("<img />");
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("#dvPreview img").attr("src", e.target.result);
                    }
                    reader.readAsDataURL($(this)[0].files[0]);
                } else {
                    alert("This browser does not support FileReader.");
                }
            }
        } else {
            alert("Please upload a valid image file.");
        }
    });
});
</script>

