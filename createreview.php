
<html>
<head>
<link rel="stylesheet" type="text/css" href="style/review.css" />
<title>Gened Reviews</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine&amp;v1" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
  <link rel="stylesheet" type="text/css" href="style/style2.css">

</head>   
<body>
<div id="main">
    <div id="header">
      <div id="logo">
        <h1><a href="#">Gened </a>Reviews</h1>
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
          <li><a href="home.php"><i class="material-icons w3" style="font-size:24px;">home</i>Home</a></li>
          <li class="current"><a href="reviews.php"><i class="material-icons w3" style="font-size:24px; ">description</i>Reviews</a></li>
          <li><a href="rank.php"><i class="material-icons w3" style="font-size:24px; "> assessment</i>Rank</a></li>
          <li><a href="map.php"><i class="material-icons w3" style="font-size:24px; "> map</i>Map</a></li>
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
        <h3>See Your Gened</h3>
        <h4 style="font-size:120%;">How to use</h4>
        <p>1.<br />
            2.<br>
            3.
            </p>
        </div>
      </div>

<div id="content">
        <!-- insert the page content here -->
        <h1>Create Reviews</h1>
        <form method="post"> <!--àÃÔèÁ¡ÅèÍ§-->
    <fieldset class="contact-inner">
      <p class="contact-input">
         <input type="text" name="name" required="required" placeholder="Reviewer Name">
      </p>
	  <p class="contact-input">
          <input type="text" name="SID" required="required" placeholder="Subject ID">
      </p>
	  <p class="contact-input">
         <input type="text" name="title" required="required" placeholder="Subject Title">
      </p>

      <p class="contact-input">
        <label for="select" class="select">
		 <select name="category" id="select">
		 <option value="" selected>Choose Category...</option>
			<option value="Science">Science</option>
			<option value="Human">Human</option>
			<option value="Society">Society</option>
			<option value="Interdisciplinary">Interdisciplinary</option>
			</select>
        </label>
      </p>
		  <p class="contact-input">
          <input type="text" name="location" required="required" placeholder="Class Location">
      </p>
		  <p class="contact-input">
         <input type="text" name="credit" required="required" placeholder="Subject Credit">
      </p>
	  <p class="contact-input">
         <input type="text" name="grade" required="required" placeholder="Reviewer Grade">
      </p>
  <p class="contact-input">
        <input type="text" name="rate" required="required" placeholder="Rate (min at 0 max at 10)">
      </p>


      <p class="contact-input">
        <textarea name="descrip" required="required" placeholder="Describe on this subject"></textarea>
      </p>

      <p class="contact-submit">
        <input type="submit" name="submit" value="Add Review">
      </p>
    </fieldset>
  </form>

   <!--¨º¡ÅèÍ§-->
      </div>
    </div>
    <div id="footer">
      <p> by ICE JOY SAII BOSS P &nbsp;&nbsp; #cscu21</p>
    </div>
  </div>
 <?php
 
			
 $uri = "mongodb://distdbpro:distdb555@ds023570.mlab.com:23570/distdata";
$m = new MongoClient($uri);

$db = $m->selectDB("distdata");

$coll = $db->reviews;
if ($_POST) {
$rate = intval($_POST['rate']);
$coll = $db->rate;
$cursor = $coll->find(array('SID' => $_POST['SID']));
foreach ($cursor as $doc ) {
$up = $doc;
}
$newrate = $up['rate'] + $rate;
$newcount = $up['count'] + 1;
$newavg = (float)($newrate/$newcount);
$coll->update($up,
array('$set'=>array("title"=>$_POST['title'], "SID" => $_POST['SID'],"rate" => $newrate,
    "count" => $newcount,
    "avgrate" => $newavg)));
$coll = $db->reviews;
$review = array( "SID" => $_POST['SID'],
    "title" => $_POST['title'],
    "category" => $_POST['category'],
	"location" => $_POST['location'],
    "credit" => $_POST['credit'],
    "grade" => $_POST['grade'],
    "description" => $_POST['descrip'],
    "rate" => $rate,
    "reviewer" => $_POST['name'] );
$coll->insert($review); 


}
 ?>

</body>
</html>
