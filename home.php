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
	<?php 
$uri = "mongodb://distdbpro:distdb555@ds023570.mlab.com:23570/distdata";
$m = new MongoClient($uri);

$db = $m->selectDB("distdata");

$coll = $db->reviews;
?>
  <div class="slider">
    <ul class="slides">
      <?php 
		$coll = $db->rate;
		$cursor = $coll->find(array('category' => "Science"));
		$maxrate = 0;
		$maxsubj = array();
		foreach ($cursor as $subj ){
		if ($subj['rate'] > $maxrate) {
			$maxrate = $subj['rate'];
			$maxsubj = $subj;
		}
		}	
		?>
	  
	  <li>
	  <a href=" <?php  echo "showreview.php?SID=" . $maxsubj['SID'];  ?>">
        <img src="http://lorempixel.com/580/250/nature/1"> <!-- random image -->
		</a>
        <div class="caption center-align">
          <h3>Recommended For Science</h3>
          <h5 class="light grey-text text-lighten-3"><?php  echo $maxsubj['title'] . " " . $maxsubj['SID']; ?></h5>
        </div>
      </li>

	  <?php 
		$coll = $db->rate;
		$cursor = $coll->find(array('category' => "Society"));
		$maxrate = 0;
		$maxsubj = array();
		foreach ($cursor as $subj ){
		if ($subj['rate'] > $maxrate) {
			$maxrate = $subj['rate'];
			$maxsubj = $subj;
		}
		}	
		?>
      <li>
	  <a href=" <?php  echo "showreview.php?SID=" . $maxsubj['SID'];  ?>">
        <img src="http://lorempixel.com/580/250/nature/2"> <!-- random image -->
		</a>
        <div class="caption left-align">
          <h3>Recommended For Society</h3>
          <h5 class="light grey-text text-lighten-3"><?php  echo $maxsubj['title'] . " " . $maxsubj['SID']; ?></h5>
        </div>
      </li>

	  <?php 
		$coll = $db->rate;
		$cursor = $coll->find(array('category' => "Interdisciplinary"));
		$maxrate = 0;
		$maxsubj = array();
		foreach ($cursor as $subj ){
		if ($subj['rate'] > $maxrate) {
			$maxrate = $subj['rate'];
			$maxsubj = $subj;
		}
		}	
		?>
      <li>
	  <a href=" <?php  echo "showreview.php?SID=" . $maxsubj['SID'];  ?>">
        <img src="http://lorempixel.com/580/250/nature/3"> <!-- random image -->
		</a>
        <div class="caption right-align">
          <h3>Recommended For Interdisciprinary</h3>
          <h5 class="light grey-text text-lighten-3"><?php  echo $maxsubj['title'] . " " . $maxsubj['SID']; ?></h5>
        </div>
      </li>
<?php 
		$coll = $db->rate;
		$cursor = $coll->find(array('category' => "Human"));
		$maxrate = 0;
		$maxsubj = array();
		foreach ($cursor as $subj ){
		if ($subj['rate'] > $maxrate) {
			$maxrate = $subj['rate'];
			$maxsubj = $subj;
		}
		}	
		?>
	
      <li>
	  	<a href=" <?php  echo "showreview.php?SID=" . $maxsubj['SID'];  ?>">
        <img src="http://lorempixel.com/580/250/nature/4"> <!-- random image -->
		</a>
        <div class="caption center-align">
          <h3>Recommended For Human</h3>
          <h5 class="light grey-text text-lighten-3"><?php  echo $maxsubj['title'] . " " . $maxsubj['SID']; ?></h5>
        </div>
      </li>
	 
    </ul>
  </div>





    </div>
    <div id="footer">
      <p> by ICE JOY SAII BOSS P &nbsp;&nbsp; #cscu21</p>
    </div>
  </div>
</body>
</html>
