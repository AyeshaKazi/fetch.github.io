<html>
	<head>
		<title>News Feed</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta name="ROBOTS" content="NOINDEX, NOFOLLOW" />
<!-- JAVASCRIPT to clear search text when the field is clicked -->
<script type="text/javascript">
window.onload = function(){ 
	//Get submit button
	var submitbutton = document.getElementById("tfq");
	//Add listener to submit button
	if(submitbutton.addEventListener){
		submitbutton.addEventListener("click", function() {
			if (submitbutton.value == 'Search our website'){//Customize this text string to whatever you want
				submitbutton.value = '';
			}
		});
	}
}
</script>
<!-- CSS styles for standard search box with placeholder text-->

</head>
	<body>
		<!header..............>
		<?php include 'header.inc.php';?> 

		<!Navigation...............................>
		<div id="tfheader">
		<center>
		<form id="tfnewsearch" method="get" action="http://www.google.com">
		</center>
		</form>
		<! Post...............................................................................................>
		<div style="overflow-x:auto;">
		<table>



		<?php
		$post_id=50;
		for($i=0;$i<5;$i++)
		{
			?>
			<tr>
			<td> <?php include 'eachpost.php'; $post_id++;?> </td>
			<td> <?php include 'eachpost.php'; $post_id++;?> </td>
			</tr>
			<?php	
		}
		?>

		
		</table>
		</div>
		</div>

	</body>
</html>