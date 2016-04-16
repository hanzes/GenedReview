<!DOCTYPE HTML>
<html>

<head>
  <title>Gened Reviews</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine&amp;v1" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
  <link rel="stylesheet" type="text/css" href="style/login.css" />   
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300,300italic,600italic,600&subset=latin,greek-ext,greek' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style/style2.css">
</head>
<?php 
$uri = "mongodb://distdbpro:distdb555@ds023570.mlab.com:23570/distdata";
$m = new MongoClient($uri);

$db = $m->selectDB("distdata");

$coll = $db->reviews;
?>
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
        <div >1.<br />
            2.<br>
            3.
            </div>
        </div>
      </div>
        
<!--			  <div class="login">
    <input type="text" placeholder="username" id="username">  
  <input type="password" placeholder="password" id="password">  
  <a href="#" class="forgot">forgot password?</a>
  <input type="submit" value="Login">
</div> -->
		<div id="content">
        <!-- insert the page content here -->
        <h1>Reviews</h1>
     
    <div class="container">
      <div class="starter-template">
		<div class="page-header">
		
		</div>
			<p>ค้นหา reviews ที่ต้องการ โดยสามารถ search ได้ทั้ง course name และ  course ID </p>
		<form method="post"> <!--เริ่มกล่อง-->
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
		<form role="form" method="post">
		  
		  <fieldset class="contact-inner">
		  <p class="contact-input">
         <input type="text"  class="form-control" id="keyword" placeholder="Enter keyword">
			</p>
	   </fieldset>
			<!--<input type="text" class="form-control" id="keyword" placeholder="Enter keyword">-->
		  </div>
		</form>
		<ul id="content"></ul>
		
	  </div>
    </div>

	<!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">


	$(document).ready(function() {
		$('#keyword').on('input', function() {
			var searchKeyword = $(this).val();
			if (searchKeyword.length >= 3) {
				$.post('search.php', { keywords: searchKeyword }, function(data) {
					$('ul#content').empty()
					$.each(data, function() {
						$('ul#content').append('<li><a href="showreview.php?SID=' + this.id + '">' +this.id +" "+ this.title + '</a></li>');
					});
				}, "json");
			}
		});
	});

	
	</script>  
	<style>
	







	.fancy {
  width: 500px;
  margin-left: 2px;
  padding: 10px;
  border: solid 4px;
  border-color: #fad7fa;
  border-left-style:ridge;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}
.fancy:hover {
    background-color: gray;
    color: black;
}





	
	</style>
</form>  
		<h1><font color="red">Create some reviews</font></h1>
	 
      <p class="contact-submit"><a href="createreview.php">
        <input type="submit" name="submit" value="Add Review">
      </a></p>
        <br><br>
        <h1><font color="red">Recommended</font></h1>
        <h3>Science</h3>
		<br>
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
		<a href=" <?php  echo "showreview.php?SID=" . $maxsubj['SID'];  ?>">
		<div class="fancy">
		<span class="label"></span>
		<br><p>
			<?php 
			echo $maxsubj['title'] . " " . $maxsubj['SID'];
			?>
			</p>
		<span class="endlabel">      </span>
		</div></a>
		
    
       
		<br>
		<br>
		<h3>Human</h3>
		<br>
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
		<a href=" <?php  echo "showreview.php?SID=" . $maxsubj['SID'];  ?>">
		<div class="fancy">
		<span class="label"></span>
		<br><p>
			<?php 
			echo $maxsubj['title'] . " " . $maxsubj['SID'];
			?>
			</p>
		<span class="endlabel">      </span>
		</div></a>
				<br>
		<br>
		<h3>Society</h3>
		<br>
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
		<a href=" <?php  echo "showreview.php?SID=" . $maxsubj['SID'];  ?>">
		<div class="fancy">
		<span class="label"></span>
		<br><p>
			<?php 
			echo $maxsubj['title'] . " " . $maxsubj['SID'];
			?>
			</p>
		<span class="endlabel">      </span>
		</div></a>
		<br>
		<br>
		<h3>Interdisciplinary</h3>
		<br>
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
		<a href=" <?php  echo "showreview.php?SID=" . $maxsubj['SID'];  ?>">
		<div class="fancy">
		<span class="label"></span>
		<br><p>
			<?php 
			echo $maxsubj['title'] . " " . $maxsubj['SID'];
			?>
			</p>
		<span class="endlabel">      </span>
		</div></a>
            
          </div>
		   
       
        </form>
      </div>
    </div>
    <div id="footer">
      <p> by ICE JOY SAII BOSS P &nbsp;&nbsp; #cscu21</p>
    </div>
  </div>
</body>
</html>
