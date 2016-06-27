<!DOCTYPE html>
<html>
<head>
	<title>Fetch! Make it happen :D</title>
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

<style type="text/css">
	
	#tfnewsearch1{
		padding:20px;
	}
	.tftextinput21{
		margin: 0;
		padding: 5px 15px;
		font-family: Arial, Helvetica, sans-serif;
		font-size:14px;
		color:#666;
		border:1px solid #0076a3; border-right:0px;
		border-top-left-radius: 5px 5px;
		border-bottom-left-radius: 5px 5px;
		width:60%;
		margin-left:5%;
		margin-top: 0px;
	}
	.tfbutton21 {
		margin: 0;
		padding: 5px 7px;
		font-family: Arial, Helvetica, sans-serif;
		font-size:14px;
		font-weight:bold;
		outline: none;
		cursor: pointer;
		text-align: center;
		text-decoration: none;
		color: #ffffff;
		border: solid 1px #0076a3; border-right:0px;
		background: #0095cd;
		background: -webkit-gradient(linear, left top, left bottom, from(#00adee), to(#0078a5));
		background: -moz-linear-gradient(top,  #00adee,  #0078a5);
		border-top-right-radius: 5px 5px;
		border-bottom-right-radius: 5px 5px;
	}
	.tfbutton21:hover {
		text-decoration: none;
		background: #007ead;
		background: -webkit-gradient(linear, left top, left bottom, from(#0095cc), to(#00678e));
		background: -moz-linear-gradient(top,  #0095cc,  #00678e);
	}
	/* Fixes submit button height problem in Firefox */
	.tfbutton21::-moz-focus-inner {
	  border: 0;
	}
	.tfclear1{
		clear:both;
	}
</style>
<style>
a:link {
    text-decoration: none;
    color: white;
}

a:visited {
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

a:active {
    text-decoration: underline;
}
</style>

</head>
<body>





<div style="background-color:#6C393D; color:white;">
<a href="mailto:mailto:ayeshakazi1612@gmail.com?Subject=Hello%20again" style="margin-left:2px;">info@fetch.com</a>
<div style="float: right;">Display image /Name</div>
</div>
<style type="text/css">
	#colorstrip{
    width: 92.02%; 
    height: 50px;
    border-style: solid;
    border-color: #6c393d;
    background-color: #6c393d;
    top: 0px;
}
</style>

<div style="width: 100%;">
	<div style="float:left;">
		<img src="images\logo.jpg" style="height:56px; width:100px;"></img>
   	</div>
	<div style="float:right;" id="colorstrip">
		<div style="float:right; margin-right:4%; margin-top:0.5%">
			<a href="messages.html" >Messages</a>&nbsp
			<a href="Newsfeed.html" >Newsfeed</a>&nbsp
			<a href="Newpost.html" >Newpost</a>&nbsp
			<a href="Profile.html">Profile</a>&nbsp
		</div>	
		<div id="tfheader1">
			<form id="tfnewsearch1" method="get" action="http://www.google.com">
		        	<input type="text" id="tfq1" class="tftextinput21" name="q" size="21" maxlength="120" value="Fetch it!"><input type="submit" value=">" class="tfbutton21">
			</form>
			<div class="tfclear1">
			</div>
		</div>
		
	</div>
</div>
<div style="clear:both"></div>
		
</div>
</body>
</html>