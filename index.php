

    <link rel="stylesheet" type="text/css" href="css/style.css">
<a name="gallery_button" style="font-size: 15px;" onclick="div2_show()"  > Select from gallery </a>

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
<br><button class="buttons" onclick="gallery_selected()"> OK </button>
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

	}
    
</script>