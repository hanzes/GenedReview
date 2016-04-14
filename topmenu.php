<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title></title>
  <style type="text/css">
#popupbox{
margin: 0; 
margin-left: 40%; 
margin-right: 40%;
margin-top: 50px; 
padding-top: 10px; 
width: 20%; 
height: 150px; 
position: absolute; 
background: #FBFBF0; 
border: solid #000000 2px; 
z-index: 9; 
font-family: arial; 
visibility: hidden; 
}
</style>
<script language="JavaScript" type="text/javascript">
function login(showhide){
if(showhide == "show"){
    document.getElementById('popupbox').style.visibility="visible";
}else if(showhide == "hide"){
    document.getElementById('popupbox').style.visibility="hidden"; 
}
}
</script>
 </head>
 <body>



			<?php
			session_start();

			if(empty($_SESSION['check'])){
				$_SESSION['check']= 0;
			}
			
			if($_SESSION['check'] == 1){
				?>
	
  <a href="logout.php"><button class="buttonlogin">Logout</button></a>
   <a href="about.php"><button class="buttonlogin">Hello, <?php echo $_SESSION['username'];?></button></a>

				
				<?php
			}
			else{
					?>

  <a href="javascript:login('show');"><button class="buttonlogin">Login</button></a>
        <button class="buttonsignup">Signup</button> 
	<div id="popupbox"> 
<form name="login" action="checklog.php" method="post">
<center>Username:</center>
<center><input name="username" size="14" /></center>
<center>Password:</center>
<center><input name="password" type="password" size="14" /></center>
<center><input type="submit" name="submit" value="login" /></center>
</form>
<br />
<center><a href="javascript:login('hide');">close</a></center> 
</div> 
				<?php
					
			}			
			?>




	
 </body>
</html>
