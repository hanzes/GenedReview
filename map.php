<!DOCTYPE HTML>
<html>

<head>
  <title>Gened Reviews</title>
  <script src="https://maps.googleapis.com/maps/api/js"></script>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine&amp;v1" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">     
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <h1><a href="#">Gened </a>Reviews</h1>
          <h2 class="slogan">&nbsp;&nbsp;&nbsp;Chulalongkorn University </h2>
  <?php
			session_start();
			if(empty($_SESSION['check'])){
				$_SESSION['check']= 0;
			}
			
			
			$uri = "mongodb://distdbpro:distdb555@ds023570.mlab.com:23570/distdata";
			$m = new MongoClient($uri);
			$db = $m->selectDB("distdata");
			$coll = $db->users;
			if(isset($_POST['username']) and isset($_POST['password'])){
					$cursor = $coll->find(array('user' => $_POST['username'],'password'=> $_POST['password']));
					foreach($cursor as $object){
						if(count($cursor)==1){
							$_SESSION['check'] = 1;			
							
							$_SESSION['username'] = $_POST['username'];
							$_SESSION['password'] = $_POST['password'];
						}
						else{
							$_SESSION['check'] = 0;
						}
					
					}
				
				}

			if($_SESSION['check'] == 1){
				
				echo "login complete";
				
			}
			else{
					?>

				<button class="buttonlogin">Login</button>   
				<button class="buttonsignup">Signup</button>

				<?php
					
			}
			
			
			?>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="current" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="home.php"><i class="material-icons w3" style="font-size:24px;">home</i>Home</a></li>
          <li><a href="reviews.php"><i class="material-icons w3" style="font-size:24px; ">description</i>Reviews</a></li>
          <li><a href="rank.php"><i class="material-icons w3" style="font-size:24px; "> assessment</i>Rank</a></li>
          <li class="current"><a href="map.php"><i class="material-icons w3" style="font-size:24px; "> map</i>Map</a></li>
          <li><a href="contact.php"><i class="material-icons w3" style="font-size:24px; ">announcement</i>Contact Us</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div id="sidebar_container">
        <br><br><br><br>
        <img class="paperclip" src="style/paperclip.png" alt="paperclip" />
        <div class="sidebar">
        <!-- insert your sidebar items here -->
        <h3>Find your class room</h3>
        <h4 style="font-size:120%;">How to use</h4>
            <p>1. input your subject id<br> 
                2. click search </p>
        </div>   
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <h1>Map</h1> 
        <br><br> 
        <div id="map" style="width:600px;height:400px"></div>
          <script>
              var mapCanvas = document.getElementById("map");
              var mapOptions = {
                center: new google.maps.LatLng(13.7383, 100.5322), zoom: 16
              }
              var map = new google.maps.Map(mapCanvas, mapOptions);
          </script>
        <br>
        <br>  
      </div>
    </div>
    <div id="footer">
     <p> by ICE JOY SAII BOSS P &nbsp;&nbsp; #cscu21</p>
    </div>
  </div>
</body>
</html>
