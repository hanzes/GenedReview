<!DOCTYPE HTML>
<html>

<head>
  <title>Gened Reviews</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine&amp;v1" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
    
<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <h1><a>Gened </a>Reviews</h1>
         <h2 class="slogan">&nbsp;&nbsp;&nbsp;Chulalongkorn University </h2> 

			<?php
			session_start();
			error_reporting(0);
			$_SESSION["backurl"] =$_SERVER['HTTP_REFERER'] ;
			$backurl = $_SESSION["backurl"];
			if(empty($_SESSION['check'])){
				$_SESSION['check']= 0;
			}
					include 'topmenu.php'; 	


			?>         
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="current" in the li tag for the selected page - to highlight which page you're on -->
          <li class="current"><a href="home.php"><i class="material-icons w3" style="font-size:24px;">home</i>Home</a></li>
          <li><a href="reviews.php"><i class="material-icons w3" style="font-size:24px; ">description</i>Reviews</a></li>
          <li><a href="rank.php"><i class="material-icons w3" style="font-size:24px; "> assessment</i>Rank</a></li>
          <li><a href="map.php"><i class="material-icons w3" style="font-size:24px; "> map</i>Map</a></li>
          <li><a href="contact.php"><i class="material-icons w3" style="font-size:24px; ">announcement</i>Contact Us</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
    <!--insert your sidebar items here-->      
      <div id="sidebar_container">
        <br><br><br><br>  
        <img class="paperclip" src="style/paperclip.png" alt="paperclip" />
        <div class="sidebar"> 
        <h3>About Gened Reviews</h3>
        <h4 style="font-size:120%;">How to use</h4>
        <p>แถถถถถถถ<br /></p>
        </div>
        
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <h1>เว็บแนะนำรายวิชาศึกษาทั่วไป</h1>
        			
            
        <p> แถ</p>
        <p> แถ</p>
        <p> แถ</p>
        <p> แถ</p>  
        <p> แถ</p>
        <p> แถ</p>
        <p> แถ</p>
        <p> แถ</p>
        <p> แถ</p>
        <p> แถ</p>
        <p> แถ</p>
        <p> แถ</p>  
      </div>
    </div>
    <div id="footer">
      <p> by ICE JOY SAII BOSS P &nbsp;&nbsp; #cscu21</p>
    </div>
  </div>
</body>
</html>
