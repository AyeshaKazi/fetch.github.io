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
#colorstrip{
  padding-top: 5px;
    width: 100%; 
    height: 80px;
    border-style: solid;
    border-color: #6c393d;
    background-color: #6c393d;
    top: 0px;
}
</style>

</head>
<body>
<div  id="colorstrip">
<div style="float: left; width: 80%">

<div style="background-color:#6C393D; color:white;">
  <a href="mailto:mailto:ayeshakazi1612@gmail.com?Subject=Hello%20again" style="margin-left:5px;">info@fetch.com</a>
</div>
<div style="float:left;">
  <img src="images\logo.jpg" style="height:56px; width:100px;">
</div>
    <div id="tfheader1">
      <form id="tfnewsearch1" method="get" action="http://www.google.com">
              <input type="text" id="tfq1" class="tftextinput21" name="q" size="21" maxlength="120" value="Fetch it!"><input type="submit" value=">" class="tfbutton21">
      </form>
      <div class="tfclear1">
      </div>
    </div>
</div>

<div style="float: right; width: 20%">
 <div style="color: white;" > <img src="images/a.jpg" style="height: 30px; width: 30px;"> Ria Maheshwari &nbsp Settings </div> 
 <br>
 <div >
      <button  style="width: 45px;" onclick="location.href='messages.html'" >Messages</button>&nbsp
      <button  style="width: 45px;" onclick="location.href='feed.php'" >Newsfeed</button>&nbsp
      <button  style="width: 45px;" onclick="location.href='newpost.php'" >Newpost</button>&nbsp
      <button  style="width: 45px;" onclick="location.href='profile.php'"> Notifications</button>&nbsp
    </div>  

</div>
</div>
</body>