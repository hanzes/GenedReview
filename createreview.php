
<html>
<head>
<link rel="stylesheet" type="text/css" href="style/review.css" />
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
			if($_SESSION['check'] == 0){
					header("location:reviews.php");
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
        <form method="post"> <!--เริ่มกล่อง-->
    <fieldset class="contact-inner">
	<div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="name"  name="name" type="text" class="validate" required="required">
          <label for="name">Reviewer Name</label>
        </div>
		 </div>
		<div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">description</i>
          <input id="SID" name="SID" type="text" class="validate" required="required">
          <label for="SID">Subject ID</label>
        </div>
      </div>
	  		<div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">language</i>
          <input id="title"  name="title" type="text" class="validate" required="required">
          <label for="title">Subject Title</label>
        </div>
      </div>
    <div class="input-field col s12">
		 <select name="category" id="select">
		 <option value="" selected>Choose Category...</option>
			<option value="Science">Science</option>
			<option value="Human">Human</option>
			<option value="Society">Society</option>
			<option value="Interdisciplinary">Interdisciplinary</option>
			</select>    
			<label>Category</label>
      </div>
	  <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">my_location</i>
          <input id="location"  name="location" type="text" class="validate" required="required">
          <label for="location">Class Location</label>
        </div>
      </div>
	  <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">receipt</i>
          <input id="credit"  name="credit" type="text" class="validate" required="required">
          <label for="credit">Subject Credit</label>
        </div>
      </div>
	<div class="input-field col s6">
    <select name="grade">
      <option value="" disabled selected>Choose your grade</option>
      <option value="A">A</option>
	  <option value="B+">B+</option>
	  <option value="B">B</option>
	  <option value="C+">C+</option>
	  <option value="C">C</option>
	  <option value="D+">D+</option>
	  <option value="D">D</option>
<option value="W">W</option>
<option value="F">F</option>
<option value="I">I</option>
    </select>
    <label>Reviewer Grade</label>
  </div>
<p class="range-field">
<label for="rate">Rate (min at 0 max at 10)</label>
      <input type="range" id="rate" name="rate" required="required" min="0" max="10" />
    </p>

	        <div class="row">
			<i class="material-icons prefix">chat_bubble_outline</i>
          <div class="input-field col s12">
            <textarea id="descrip" name="descrip" required="required" class="materialize-textarea" length="500"></textarea>
            <label for="descrip">Describe on this subject</label>
          </div>
        </div>
<button class="btn waves-effect waves-light" type="submit"name="submit" value="Add Review">Submit
    <i class="material-icons right">send</i>
  </button>

    </fieldset>
  </form>

   <!--จบกล่อง-->
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
