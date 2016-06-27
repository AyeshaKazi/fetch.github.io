<!DOCTYPE html>
<html>
<head>
	<title> NEW POST</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
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

if(isset($_SESSION['email']))
{
   echo "yes0";
}

define ("MAX_SIZE","1000"); 

date_default_timezone_set("Asia/Kolkata");

if(isset($_POST['submit']))
{
    $date = date("d.m.y")." ".date("h:i:sa") ;
    $caption ="";
    $details="";
    $about="";
    $links="";
    $category=""; 

    $caption= $_POST['caption'];
    $details= $_POST['details'];
    $about= $_POST['about'];
    $links= $_POST['links'];
    foreach($_POST['interest'] as $selected)
        { $category= $category ." ". $selected;  }



// poster

function getExtension($str)
{
     $i = strrpos($str,".");
     if (!$i) { return ""; }
     $l = strlen($str) - $i;
     $ext = substr($str,$i+1,$l);
     return $ext;
}
 
$errors=0;
$image=$_FILES['poster']['name'];
if ($image) 
{
    $filename = stripslashes($_FILES['poster']['name']);
    $extension = getExtension($filename);
    $extension = strtolower($extension);
   
        $size=filesize($_FILES['poster']['tmp_name']);
 
        if ($size > MAX_SIZE*1024)
        {
        ?>
        <script>alert('You have exceeded the size limit of the poster!');</script>
        <?php
            $errors=1;
        }
 
        $image_name=time().'.'.$extension;
        $newname="uploads/".$image_name;
 
        $copied = copy($_FILES['poster']['tmp_name'], $newname);
        if (!$copied) 
        {
        ?>
        <script>alert('Copy unsuccessfull of the poster!');</script>
        <?php
            $errors=1;
        }

}

?>
<script type="text/javascript">
    function select_gallery();
    {
        <?php
        $selected_radio = $_POST['gallery'];
        $newname=$selected_radio ;
        ?>
    }
</script>


<?php
// video


define ("MAX_SIZE_v","5000"); 

$errors=0;
$image=$_FILES['vid1']['name'];

if ($image) 
{
	$filename = stripslashes($_FILES['more_images']['name'][$i]);
	$extension = getExtension($filename);
	$extension = strtolower($extension);
	if (($extension != "mkv") && ($extension != "mp4") && ($extension != "avi") 
		&& ($extension != "gif")&& ($extension != "3gp")) 
	{
		?>
        <script>alert('Unknown extension of the video!');</script>
        <?php
		$errors=1;
	}
	
	else
	{
        $size=filesize($_FILES['vid1']['tmp_name']);
 
        if ($size > MAX_SIZE_v*1024)
        {
            ?>
        <script>alert('You have exceeded the size limit of the video');</script>
        <?php
            $errors=1;
        }
 
        $image_name=time().'.'.$extension;
        $newname3="uploads/".$image_name;
 
        $copied = copy($_FILES['vid1']['tmp_name'], $newname3);
        if (!$copied) 
        {
            ?>
        <script>alert('Copy unsuccessfull of the video');</script>
        <?php
            $errors=1;
        }
}
}

$email=$_SESSION['email'];
$row = mysql_fetch_assoc(mysql_query("SELECT * FROM user WHERE email='$email' "));
$dbid = $row['id'];

//.................................................................................................... main query
 
    if(mysql_query("INSERT INTO post VALUES ('','".$dbid."','$date','$caption','".$newname."','$details','$about','$links','".$newname3."','$category')"))
    {
        ?>
        <script>alert('Posted');</script>
        <?php
    }
    else
    {
        ?>
        <script>alert('Unable to Post');</script>
        <?php
    }

}



// many pictures
 
$cap=$_POST['caption'];

$row2 = mysql_fetch_assoc(mysql_query("SELECT * FROM post WHERE user_id='$dbid' AND caption='$cap' "));
$pid = $row2['post_id'];

$errors=0;
$count = count($_FILES['more_images']['name']);
$image2=$_FILES['more_images']['name'];
if ($image2) 
{
	$i = 0;
	for ($i=0; $i < $count ; $i++) 
	{ 
		$filename = stripslashes($_FILES['more_images']['name'][$i]);
		$extension = getExtension($filename);
		$extension = strtolower($extension);
		$size=@filesize($_FILES['more_images']['tmp_name'][$i]);
 
		if ($size > MAX_SIZE*1024)
		{
			?>
        <script>alert('You have exceeded the size limit of pictures!');</script>
        <?php
			$errors=1;
		}
 
		$image_name=mt_rand().'.'.$extension;
		$newname2="uploads/".$image_name;
 
		$copied = move_uploaded_file($_FILES['more_images']['tmp_name'][$i], $newname2);
		if (!$copied) 
		{
			/* 
			?>
        <script>alert('Copy unsuccessfull of pictures!');</script>
        <?php */
			$errors=1;
		} 
		if(!mysql_query("INSERT INTO post_more_pictures (post_id, path) VALUES('".$pid."','".$newname2."')"))
			echo "not";
	 	}
	
}


?>


<body>
<button class="buttons" onclick="div_show()" >New Event</button>


<div id="newpost" >
<!-- Popup Div Starts Here -->
<div id="popup">
<!-- Contact Us Form -->

<form action="#" id="newform" method="post" name="newform" enctype="multipart/form-data">

<img id="close" src="images/close.png" onclick ="div_hide()">
<h2 style="font-color:#6c393d;">New Event Post</h2>
<hr>

<input id="caption" name="caption" class="inputs" placeholder="Caption (2-3 sentences)" type="text"> <br><br>

Add poster : <input type="file" name="poster" accept="image/*" onchange="loadFile(event)"> <br><br>
<a name="gallery_button" style="font-size: 15px; cursor: pointer; color: #6c393d" onclick="div2_show()" > &nbsp Or Select from our gallery &nbsp </a>


<style type="text/css">

#newpost2 input[type="radio"]
{
    display: none;
}
#newpost2 input[type="radio"]:checked + label
{
    border :2px solid black ;
    opacity: 0.5;
}
</style>


<div id="newpost2" style="display: none;">
<div id="popup2" >
<div id="newform2" style="width: 500px;">
<img id="close" src="images/close.png" onclick ="div2_hide()">
<?php
$dirname = "images/gallery/";
$images = glob($dirname."*.jpg");
foreach($images as $image_g) {
echo ' <input type="radio" id="'.$image_g.'" name="gallery" value="'.$image_g.'"/><label for="'.$image_g.'"><img style="height:150px; width:150px" src="'.$image_g.'" /></label>     ';
}
?>
<br><br><a class="buttons" style="cursor: pointer;" onclick="gallery_selected()">&nbsp SELECTED &nbsp</a>
</div>
</div>
</div>


<script type="text/javascript">
    function div2_show()
    {
        document.getElementById('newpost2').style.display = "block";
    }
    function div2_hide()
    {
        document.getElementById('newpost2').style.display = "none";
    }
    function gallery_selected()
    {

        document.getElementById('newpost2').style.display = "none";
        select_gallery();
    }
    
</script>
<! select the image and go to select_gallery funtion in php >




<br><br>
<img id="poster" /><br>
<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('poster');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>




<textarea style="height: 80px;" id="details" name="details" class="inputs" placeholder="Details Eg: Venue, Timings" type="text"></textarea><br>
<textarea style="height: 120px;"id="about" name="about" class="inputs" placeholder="About the event"></textarea><br>
<textarea style="height: 60px;"id="links" name="links" class="inputs" placeholder="Links to other social media eg. Facebook, Twitter pages" type="text"></textarea> <br><br>


<label for="img1">Add more pictures : </label>



    <input id="imageupload" name="more_images[]" type="file" multiple />
    <br />
    <div id="preview-image" style="height: 100px; display: none;"></div>
<script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>
<script type="text/javascript">
 $("#imageupload").on('change', function () {
 
     var countFiles = $(this)[0].files.length;
 
     var imgPath = $(this)[0].value;
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     var image_holder = $("#preview-image");
     image_holder.empty();
     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
         if (typeof (FileReader) != "undefined") {
             for (var i = 0; i < countFiles; i++) {
 
                 var reader = new FileReader();
                 reader.onload = function (e) {
                     $("<img />", {
                         "src": e.target.result,
                             "class": "thumbimage"
                     }).appendTo(image_holder);
                 }
                 image_holder.show();
                 reader.readAsDataURL($(this)[0].files[i]);
             }

         } else {
             alert("It doesn't support");
         }
     } else {
         alert("Select Only images");
     }
 });
 </script>

<br>

<label for="vid1">Add a video : </label>
<input id="fileupload" name="vid1" type="file" />
<br><br>

<b>Select Category (interests) : <br></b>
<div style="padding-left: 50px;">
  <input type="checkbox" name="interest[]" value="Bike"> Science<br>
  <input type="checkbox" name="interest[]" value="Bike"> IT<br>
  <input type="checkbox" name="interest[]" value="Bike"> Dance<br>
  <input type="checkbox" name="interest[]" value="Bike"> Debates<br>
  <input type="checkbox" name="interest[]" value="Bike"> LA<br>
  <input type="checkbox" name="interest[]" value="Bike"> Sports<br>
  <input type="checkbox" name="interest[]" value="Bike"> Cooking<br>
</div>

<br>  
<!<a href="javascript:%20check_empty()" id="submit" class="buttons" Send</a>
<button type="submit" id="submit" name="submit" class="buttons" >POST</button> 

</form>
</div>
<!-- Popup Div Ends Here -->
</div>
</body>
</html>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script language="javascript" type="text/javascript">
//previw pictue on selection
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


<script>
// Validating Empty Field
function check_empty() {
if (document.getElementById('name').value == "" || document.getElementById('email').value == "" || document.getElementById('msg').value == "") {
alert("Fill All Fields !");
} else {
document.getElementById('newform').submit();
alert("Post Successfully");
}
}
//Function To Display Popup
function div_show() {
document.getElementById('newpost').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('newpost').style.display = "none";
}
</script>

