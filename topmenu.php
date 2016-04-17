<<<<<<< HEAD
<<<<<<< HEAD
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title></title>
   <link rel="stylesheet" href="css/materialize.min.css">
  <script src="js/materialize.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
  <a class="modal-trigger" href="#modal1"><button class="buttonlogin">Login</button></a>
     <a class="modal-trigger" href="#modal2"><button class="buttonsignup">Signup</button></a>
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Login</h4>
      <div class="row">
    <form class="col s12" id="login" action="checklog.php" method="post">
      <div class="row">
        <div class="input-field col s12">
          <input id="username" type="text" name="username" class="validate">
          <label for="username">Username</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" name="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
  </div>
    </div>
		 </form>
    <div class="modal-footer">
       <button class="btn waves-effect waves-light modal-action modal-close " type="submit" form="login">Submit
    <i class="material-icons right">send</i>
  </button>
    </div>	
 </div>	


 <div id="modal2" class="modal">
    <div class="modal-content">
      <h4>Signup</h4>
      <div class="row">
    <form class="col s12" id="signup" action="checksign.php" method="post" onsubmit="return myFunction()">
      <div class="row">
        <div class="input-field col s12">
          <input id="username" type="text" name="username" class="validate">
          <label for="username">Username</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" name="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
	    <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" name="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
	    <div class="row">
        <div class="input-field col s12">
          <input id="stdid" type="tel" name="stdid" class="validate">
          <label for="stdid">Student ID</label>
        </div>
      </div>
  <div class="input-field col s12">
    <select name="fac">
      <option value="" disabled selected>Choose your faculty</option>
      <option value="Faculty of Applied Health Sciences">Faculty of Applied Health Sciences</option>
      <option value="Faculty of Architecture">Faculty of Architecture</option>
      <option value="Faculty of Arts3">Faculty of Arts3</option>
	  <option value="Faculty of Commerce and Accountancy">Faculty of Commerce and Accountancy</option>
      <option value="Faculty of Communication Arts">Faculty of Communication Arts</option>
      <option value="Faculty of Dentistry">Faculty of Dentistry</option>
      <option value="Faculty of Economics">Faculty of Economics</option>
      <option value="Faculty of Education">Faculty of Education</option>
      <option value="Faculty of Engineerin">Faculty of Engineering</option>
      <option value="Faculty of Fine and Applied Arts">Faculty of Fine and Applied Arts</option>
      <option value="Faculty of Law">Faculty of Law</option>
	  <option value="Faculty of Medicine">Faculty of Medicine</option>
	  <option value="Faculty of Nursing">Faculty of Nursing</option>
	  <option value="Faculty of Pharmaceutical Sciences">Faculty of Pharmaceutical Sciences</option>
	  <option value="Faculty of Political Science">Faculty of Political Science</option>
	  <option value="Faculty of Psychology">Faculty of Psychology</option>
	  <option value="Faculty of Science">Faculty of Science</option>
	  <option value="Faculty of Sports Science">Faculty of Sports Science</option>
	  <option value="Faculty of Veterinary Science">Faculty of Veterinary Science</option>
    </select>
    <label>Select Faculty</label>
  </div>
  </div>
    </div>
</form>
    <div class="modal-footer">
       <button class="btn waves-effect waves-light modal-action modal-close " type="submit" form="signup">Submit
    <i class="material-icons right">send</i>
  </button>
    </div>	
 </div>	


				<?php
					
			}			
			?>


	
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
   <script >  
	   $(".button-collapse").sideNav();
	 $(".dropdown-button").dropdown();
	 $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });

  $(document).ready(function() {
    $('select').material_select();
  });

      </script>
	
 </body>
</html>
=======
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
>>>>>>> origin/master
=======
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
>>>>>>> origin/master
