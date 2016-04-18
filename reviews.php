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
   <!--  <link rel="stylesheet" type="text/css" href="style/login.css" />-->
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
        <p >1.<br />
            2.<br>
            3.
            </p>
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
   <!--เริ่มกล่อง-->
    <div class="container">
      <div class="starter-template">
		<div class="page-header">
		
		</div>
			<p>ค้นหา reviews ที่ต้องการ โดยสามารถ search ได้ทั้ง course name และ  course ID </p>
   
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
   

	<!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
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
  border-color: #e6f5fa;
  border-left-style:ridge;
	border-bottom-color: #ccd1d6;
  border-radius: 3px;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
}
.fancy:hover {
    background-color: #e6f5fa;
    color: black;
	border: solid white;
	border-bottom-color: #ccd1d6;
	  border-left-style:ridge;
  border-radius: 3px;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
}





	
	</style>
</form>  
		<h1><font color="red">Create some reviews</font></h1>
		<br>
			<?php
			if($_SESSION['check'] == 1){
				?>
 <a href="createreview.php">
		  
		 <p class="contact-submit1">
        <input type="submit" name="submit" value="Add Review">
      </p></a>
				
				<?php
			}
			else{
					?>

  <a href="reviews.php" onclick="myFunction()">
		  
		 <p class="contact-submit1">
        <input type="submit" name="submit" value="Add Review">
      </p></a>
	  <script>
function myFunction() {
    alert("Please login!");
}
</script>

				<?php
					
			}			
			?>
		
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
		
	<div class="search-boxen">
<div class="search-result">
  <div class="benchmarks table">	 
    <ul class="table-body"> 
      <li class="tr"> 
        <span class="td percentile-67"><span class="number"><?php  echo $maxsubj['title'] . " " . $maxsubj['SID']; ?></span></span>
  </li>
    </ul>
</a></div></div>
</div>		
    
       
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
		
		 
  <div class="search-boxen">
<div class="search-result">
  <div class="benchmarks table">	 
    <ul class="table-body"> 
      <li class="tr"> 
        <span class="td percentile-91"><span class="number"><?php  echo $maxsubj['title'] . " " . $maxsubj['SID']; ?></span></span>
  </li>
    </ul>
</a></div></div>
</div>		
    
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
		
		 
   <div class="search-boxen">
<div class="search-result">
  <div class="benchmarks table">	 
    <ul class="table-body"> 
      <li class="tr"> 
        <span class="td percentile-42"><span class="number"><?php  echo $maxsubj['title'] . " " . $maxsubj['SID']; ?></span></span>
  </li>
    </ul>
</a></div></div>
</div>		
    
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
		
		 
    <div class="search-boxen">
<div class="search-result">
  <div class="benchmarks table">	 
    <ul class="table-body"> 
      <li class="tr"> 
        <span class="td percentile-14"><span class="number"><?php  echo $maxsubj['title'] . " " . $maxsubj['SID']; ?></span></span>
  </li>
    </ul>
</a></div></div>
</div>		
    
          </div>
		   
       
        </form>
      </div>
    </div>
	 </div>
    <div id="footer">
      <p> by ICE JOY SAII BOSS P &nbsp;&nbsp; #cscu21</p>
    </div>
  </div>
</body>
<script src='//assets.codepen.io/assets/editor/live/console_runner-ba402f0a8d1d2ce5a72889b81a71a979.js'></script><script src='//assets.codepen.io/assets/editor/live/events_runner-902c66a0175801ad4cdf661b3208a97b.js'></script><script src='//assets.codepen.io/assets/editor/live/css_live_reload_init-bad5f8d322020126e7b4287d497c7efe.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="canonical" href="http://codepen.io/pnts/pen/nJvDr" />

<link rel='stylesheet prefetch' href='//codepen.io/assets/reset/normalize.css'>
<style class="cp-pen-styles">/*------------------------------------------------------------------


Functions - list functions taken directly or inspired by http://hugogiraudel.com/2013/08/08/advanced-sass-list-functions/


-------------------------------------------------------------------*/
/*------------------------------------------------------------------


Variables


-------------------------------------------------------------------*/
@font-face {
  font-family: junction-bold;
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/junction-bold.eot");
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/junction-bold.eot?#iefix") format("embedded-opentype"), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/junction-bold.woff") format("woff"), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/junction-bold.ttf") format("truetype");
}
@font-face {
  font-family: junction-light;
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/junction-light.eot");
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/junction-light.eot?#iefix") format("embedded-opentype"), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/junction-light.woff") format("woff"), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/junction-light.ttf") format("truetype");
}
@font-face {
  font-family: junction-regular;
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/junction-regular.eot");
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/junction-regular.eot?#iefix") format("embedded-opentype"), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/junction-regular.woff") format("woff"), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/junction-regular.ttf") format("truetype");
}
@font-face {
  font-family: leaguegothic-condensed-italic;
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/leaguegothic-condensed-italic.eot");
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/leaguegothic-condensed-italic.eot?#iefix") format("embedded-opentype"), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/leaguegothic-condensed-italic.woff") format("woff"), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/leaguegothic-condensed-italic.ttf") format("truetype");
}
@font-face {
  font-family: leaguegothic-condensed-regular;
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/leaguegothic-condensed-regular.eot");
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/leaguegothic-condensed-regular.eot?#iefix") format("embedded-opentype"), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/leaguegothic-condensed-regular.woff") format("woff"), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/leaguegothic-condensed-regular.ttf") format("truetype");
}
@font-face {
  font-family: leaguegothic-italic;
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/leaguegothic-italic.eot");
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/leaguegothic-italic.eot?#iefix") format("embedded-opentype"), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/leaguegothic-italic.woff") format("woff"), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/leaguegothic-italic.ttf") format("truetype");
}
@font-face {
  font-family: leaguegothic-regular;
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/leaguegothic-regular.eot");
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/leaguegothic-regular.eot?#iefix") format("embedded-opentype"), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/leaguegothic-regular.woff") format("woff"), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1643/leaguegothic-regular.ttf") format("truetype");
}
/*------------------------------------------------------------------


Placeholders and Mixins


-------------------------------------------------------------------*/
.table-body .td:not(.metric) .number, .benchmarks {
  display: -moz-inline-stack;
  display: inline-block;
  zoom: 1;
  *display: inline;
  vertical-align: top;
}

.table-header .th label, .table-body .td.metric label {
  font-size: 0.5em;
}

.table-body .td.metric span {
  font-size: 0.58333em;
}

legend:before, legend:after {
  font-size: 0.66667em;
}

.table-header, .table-body .td.metric {
  font-size: 1.5em;
}

.table-body .td:not(.metric) {
  font-size: 2em;
}

/*------------------------------------------------------------------


The meat and potatoes - relies on the list functions at the top of this file


-------------------------------------------------------------------*/
.table .percentile-67 {
  background: #54bab3;
}
.table .percentile-67 .number {
  text-shadow: 0.08em 0.08em #388a84;
}
.table .percentile-68 {
  background: #55bbb1;
}
.table .percentile-68 .number {
  text-shadow: 0.08em 0.08em #388c83;
}
.table .percentile-69 {
  background: #57bbb0;
}
.table .percentile-69 .number {
  text-shadow: 0.08em 0.08em #398d83;
}
.table .percentile-70 {
  background: #59bcae;
}
.table .percentile-70 .number {
  text-shadow: 0.08em 0.08em #3a8f83;
}
.table .percentile-71 {
  background: #5abcac;
}
.table .percentile-71 .number {
  text-shadow: 0.08em 0.08em #3a8f81;
}
.table .percentile-72 {
  background: #5cbcaa;
}
.table .percentile-72 .number {
  text-shadow: 0.08em 0.08em #3b9080;
}
.table .percentile-73 {
  background: #5ebda9;
}
.table .percentile-73 .number {
  text-shadow: 0.08em 0.08em #3c9280;
}
.table .percentile-74 {
  background: #5fbda7;
}
.table .percentile-74 .number {
  text-shadow: 0.08em 0.08em #3d937f;
}
.table .percentile-75 {
  background: #61bda5;
}
.table .percentile-75 .number {
  text-shadow: 0.08em 0.08em #3e947d;
}
.table .percentile-76 {
  background: #62bea3;
}
.table .percentile-76 .number {
  text-shadow: 0.08em 0.08em #3e967c;
}
.table .percentile-77 {
  background: #64bea2;
}
.table .percentile-77 .number {
  text-shadow: 0.08em 0.08em #3f967b;
}
.table .percentile-78 {
  background: #66bfa0;
}
.table .percentile-78 .number {
  text-shadow: 0.08em 0.08em #40997a;
}
.table .percentile-79 {
  background: #67bf9e;
}
.table .percentile-79 .number {
  text-shadow: 0.08em 0.08em #409978;
}
.table .percentile-80 {
  background: #69bf9c;
}
.table .percentile-80 .number {
  text-shadow: 0.08em 0.08em #429a76;
}
.table .percentile-81 {
  background: #6bc09b;
}
.table .percentile-81 .number {
  text-shadow: 0.08em 0.08em #429c75;
}
.table .percentile-82 {
  background: #6cc099;
}
.table .percentile-82 .number {
  text-shadow: 0.08em 0.08em #439c73;
}
.table .percentile-83 {
  background: #6ec197;
}
.table .percentile-83 .number {
  text-shadow: 0.08em 0.08em #449f71;
}
.table .percentile-84 {
  background: #70c195;
}
.table .percentile-84 .number {
  text-shadow: 0.08em 0.08em #459f6e;
}
.table .percentile-85 {
  background: #71c193;
}
.table .percentile-85 .number {
  text-shadow: 0.08em 0.08em #46a06c;
}
.table .percentile-86 {
  background: #73c292;
}
.table .percentile-86 .number {
  text-shadow: 0.08em 0.08em #47a26a;
}
.table .percentile-87 {
  background: #75c290;
}
.table .percentile-87 .number {
  text-shadow: 0.08em 0.08em #48a368;
}
.table .percentile-88 {
  background: #76c28e;
}
.table .percentile-88 .number {
  text-shadow: 0.08em 0.08em #49a365;
}
.table .percentile-89 {
  background: #78c38c;
}
.table .percentile-89 .number {
  text-shadow: 0.08em 0.08em #49a562;
}
.table .percentile-90 {
  background: #7ac38b;
}
.table .percentile-90 .number {
  text-shadow: 0.08em 0.08em #4ba660;
}
.table .percentile-91 {
  background: #7bc489;
}
.table .percentile-91 .number {
  text-shadow: 0.08em 0.08em #4ba85d;
}
.table .percentile-92 {
  background: #7dc487;
}
.table .percentile-92 .number {
  text-shadow: 0.08em 0.08em #4ca859;
}
.table .percentile-93 {
  background: #7ec485;
}
.table .percentile-93 .number {
  text-shadow: 0.08em 0.08em #4da856;
}
.table .percentile-94 {
  background: #80c584;
}
.table .percentile-94 .number {
  text-shadow: 0.08em 0.08em #4eab53;
}
.table .percentile-95 {
  background: #82c582;
}
.table .percentile-95 .number {
  text-shadow: 0.08em 0.08em #4fab4f;
}
.table .percentile-96 {
  background: #83c580;
}
.table .percentile-96 .number {
  text-shadow: 0.08em 0.08em #52ab4e;
}
.table .percentile-97 {
  background: #85c67e;
}
.table .percentile-97 .number {
  text-shadow: 0.08em 0.08em #55ac4c;
}
.table .percentile-98 {
  background: #87c67d;
}
.table .percentile-98 .number {
  text-shadow: 0.08em 0.08em #58ab4b;
}
.table .percentile-99 {
  background: #88c77b;
}
.table .percentile-99 .number {
  text-shadow: 0.08em 0.08em #5aac49;
}
.table .percentile-100 {
  background: #8ac779;
}
.table .percentile-100 .number {
  text-shadow: 0.08em 0.08em #5eac48;
}
.table .percentile-34 {
  background: #927fb9;
}
.table .percentile-34 .number {
  text-shadow: 0.08em 0.08em #6a5398;
}
.table .percentile-35 {
  background: #9081b9;
}
.table .percentile-35 .number {
  text-shadow: 0.08em 0.08em #675599;
}
.table .percentile-36 {
  background: #8e82b9;
}
.table .percentile-36 .number {
  text-shadow: 0.08em 0.08em #645699;
}
.table .percentile-37 {
  background: #8c84b9;
}
.table .percentile-37 .number {
  text-shadow: 0.08em 0.08em #615799;
}
.table .percentile-38 {
  background: #8a86b8;
}
.table .percentile-38 .number {
  text-shadow: 0.08em 0.08em #5e5998;
}
.table .percentile-39 {
  background: #8888b8;
}
.table .percentile-39 .number {
  text-shadow: 0.08em 0.08em #5b5b99;
}
.table .percentile-40 {
  background: #868ab8;
}
.table .percentile-40 .number {
  text-shadow: 0.08em 0.08em #595e98;
}
.table .percentile-41 {
  background: #848bb8;
}
.table .percentile-41 .number {
  text-shadow: 0.08em 0.08em #586098;
}
.table .percentile-42 {
  background: #838db8;
}
.table .percentile-42 .number {
  text-shadow: 0.08em 0.08em #576398;
}
.table .percentile-43 {
  background: #818fb8;
}
.table .percentile-43 .number {
  text-shadow: 0.08em 0.08em #556697;
}
.table .percentile-44 {
  background: #7f91b8;
}
.table .percentile-44 .number {
  text-shadow: 0.08em 0.08em #546997;
}
.table .percentile-45 {
  background: #7d93b8;
}
.table .percentile-45 .number {
  text-shadow: 0.08em 0.08em #526c96;
}
.table .percentile-46 {
  background: #7b94b7;
}
.table .percentile-46 .number {
  text-shadow: 0.08em 0.08em #516d95;
}
.table .percentile-47 {
  background: #7996b7;
}
.table .percentile-47 .number {
  text-shadow: 0.08em 0.08em #507094;
}
.table .percentile-48 {
  background: #7798b7;
}
.table .percentile-48 .number {
  text-shadow: 0.08em 0.08em #4e7293;
}
.table .percentile-49 {
  background: #759ab7;
}
.table .percentile-49 .number {
  text-shadow: 0.08em 0.08em #4d7493;
}
.table .percentile-50 {
  background: #739cb7;
}
.table .percentile-50 .number {
  text-shadow: 0.08em 0.08em #4b7692;
}
.table .percentile-51 {
  background: #719db7;
}
.table .percentile-51 .number {
  text-shadow: 0.08em 0.08em #4a7792;
}
.table .percentile-52 {
  background: #6f9fb7;
}
.table .percentile-52 .number {
  text-shadow: 0.08em 0.08em #497991;
}
.table .percentile-53 {
  background: #6da1b7;
}
.table .percentile-53 .number {
  text-shadow: 0.08em 0.08em #477b90;
}
.table .percentile-54 {
  background: #6ba3b7;
}
.table .percentile-54 .number {
  text-shadow: 0.08em 0.08em #467c90;
}
.table .percentile-55 {
  background: #69a4b6;
}
.table .percentile-55 .number {
  text-shadow: 0.08em 0.08em #457d8e;
}
.table .percentile-56 {
  background: #67a6b6;
}
.table .percentile-56 .number {
  text-shadow: 0.08em 0.08em #447e8d;
}
.table .percentile-57 {
  background: #65a8b6;
}
.table .percentile-57 .number {
  text-shadow: 0.08em 0.08em #427f8c;
}
.table .percentile-58 {
  background: #63aab6;
}
.table .percentile-58 .number {
  text-shadow: 0.08em 0.08em #41818b;
}
.table .percentile-59 {
  background: #62acb6;
}
.table .percentile-59 .number {
  text-shadow: 0.08em 0.08em #41828b;
}
.table .percentile-60 {
  background: #60adb6;
}
.table .percentile-60 .number {
  text-shadow: 0.08em 0.08em #3f828a;
}
.table .percentile-61 {
  background: #5eafb6;
}
.table .percentile-61 .number {
  text-shadow: 0.08em 0.08em #3e8389;
}
.table .percentile-62 {
  background: #5cb1b6;
}
.table .percentile-62 .number {
  text-shadow: 0.08em 0.08em #3d8488;
}
.table .percentile-63 {
  background: #5ab3b5;
}
.table .percentile-63 .number {
  text-shadow: 0.08em 0.08em #3c8586;
}
.table .percentile-64 {
  background: #58b5b5;
}
.table .percentile-64 .number {
  text-shadow: 0.08em 0.08em #3b8585;
}
.table .percentile-65 {
  background: #56b6b5;
}
.table .percentile-65 .number {
  text-shadow: 0.08em 0.08em #3a8685;
}
.table .percentile-66 {
  background: #54b8b5;
}
.table .percentile-66 .number {
  text-shadow: 0.08em 0.08em #388785;
}
.table .percentile-67 {
  background: #52bab5;
}
.table .percentile-67 .number {
  text-shadow: 0.08em 0.08em #378985;
}
.table .percentile-1 {
  background: #e34c4d;
}
.table .percentile-1 .number {
  text-shadow: 0.08em 0.08em #c41f20;
}
.table .percentile-2 {
  background: #e04d51;
}
.table .percentile-2 .number {
  text-shadow: 0.08em 0.08em #bf2126;
}
.table .percentile-3 {
  background: #de4f54;
}
.table .percentile-3 .number {
  text-shadow: 0.08em 0.08em #bd2329;
}
.table .percentile-4 {
  background: #db5057;
}
.table .percentile-4 .number {
  text-shadow: 0.08em 0.08em #b9262d;
}
.table .percentile-5 {
  background: #d9525a;
}
.table .percentile-5 .number {
  text-shadow: 0.08em 0.08em #b62831;
}
.table .percentile-6 {
  background: #d7535e;
}
.table .percentile-6 .number {
  text-shadow: 0.08em 0.08em #b42a35;
}
.table .percentile-7 {
  background: #d45561;
}
.table .percentile-7 .number {
  text-shadow: 0.08em 0.08em #b02d39;
}
.table .percentile-8 {
  background: #d25664;
}
.table .percentile-8 .number {
  text-shadow: 0.08em 0.08em #ad2e3d;
}
.table .percentile-9 {
  background: #d05867;
}
.table .percentile-9 .number {
  text-shadow: 0.08em 0.08em #ab3040;
}
.table .percentile-10 {
  background: #cd596b;
}
.table .percentile-10 .number {
  text-shadow: 0.08em 0.08em #a73244;
}
.table .percentile-11 {
  background: #cb5b6e;
}
.table .percentile-11 .number {
  text-shadow: 0.08em 0.08em #a53447;
}
.table .percentile-12 {
  background: #c85c71;
}
.table .percentile-12 .number {
  text-shadow: 0.08em 0.08em #a1364b;
}
.table .percentile-13 {
  background: #c65e74;
}
.table .percentile-13 .number {
  text-shadow: 0.08em 0.08em #9f384e;
}
.table .percentile-14 {
  background: #c45f78;
}
.table .percentile-14 .number {
  text-shadow: 0.08em 0.08em #9d3a52;
}
.table .percentile-15 {
  background: #c1617b;
}
.table .percentile-15 .number {
  text-shadow: 0.08em 0.08em #993c55;
}
.table .percentile-16 {
  background: #bf627e;
}
.table .percentile-16 .number {
  text-shadow: 0.08em 0.08em #973e58;
}
.table .percentile-17 {
  background: #bd6482;
}
.table .percentile-17 .number {
  text-shadow: 0.08em 0.08em #953f5c;
}
.table .percentile-18 {
  background: #ba6585;
}
.table .percentile-18 .number {
  text-shadow: 0.08em 0.08em #91415f;
}
.table .percentile-19 {
  background: #b86788;
}
.table .percentile-19 .number {
  text-shadow: 0.08em 0.08em #8f4362;
}
.table .percentile-20 {
  background: #b5688b;
}
.table .percentile-20 .number {
  text-shadow: 0.08em 0.08em #8c4565;
}
.table .percentile-21 {
  background: #b36a8f;
}
.table .percentile-21 .number {
  text-shadow: 0.08em 0.08em #8a4669;
}
.table .percentile-22 {
  background: #b16b92;
}
.table .percentile-22 .number {
  text-shadow: 0.08em 0.08em #88486b;
}
.table .percentile-23 {
  background: #ae6d95;
}
.table .percentile-23 .number {
  text-shadow: 0.08em 0.08em #854a6e;
}
.table .percentile-24 {
  background: #ac6e98;
}
.table .percentile-24 .number {
  text-shadow: 0.08em 0.08em #834b71;
}
.table .percentile-25 {
  background: #a9709c;
}
.table .percentile-25 .number {
  text-shadow: 0.08em 0.08em #804d74;
}
.table .percentile-26 {
  background: #a7719f;
}
.table .percentile-26 .number {
  text-shadow: 0.08em 0.08em #7e4e77;
}
.table .percentile-27 {
  background: #a573a2;
}
.table .percentile-27 .number {
  text-shadow: 0.08em 0.08em #7c5079;
}
.table .percentile-28 {
  background: #a274a5;
}
.table .percentile-28 .number {
  text-shadow: 0.08em 0.08em #79507c;
}
.table .percentile-29 {
  background: #a076a9;
}
.table .percentile-29 .number {
  text-shadow: 0.08em 0.08em #795181;
}
.table .percentile-30 {
  background: #9e77ac;
}
.table .percentile-30 .number {
  text-shadow: 0.08em 0.08em #775185;
}
.table .percentile-31 {
  background: #9b79af;
}
.table .percentile-31 .number {
  text-shadow: 0.08em 0.08em #755289;
}
.table .percentile-32 {
  background: #997ab2;
}
.table .percentile-32 .number {
  text-shadow: 0.08em 0.08em #73528e;
}
.table .percentile-33 {
  background: #967cb6;
}
.table .percentile-33 .number {
  text-shadow: 0.08em 0.08em #6f5293;
}
.table .percentile-34 {
  background: #947db9;
}
.table .percentile-34 .number {
  text-shadow: 0.08em 0.08em #6d5298;
}

/*------------------------------------------------------------------


Style all the things


-------------------------------------------------------------------*/



body {
  
  color: #333;
  line-height: 1rem;
}



.search-result {
  color: #333;
  margin: 1em 0 1em 0;
  padding: 0 1em;
}

.table {
  display: table;
  margin-top: 0;
}

.table-header, .table-body {
  display: table-header-group;
}

.table-header {
  text-transform: uppercase;

}
.table-header .th {
  padding-bottom: .5em;
  text-align: center;
    background: white
}
.table-header .th1 {
  padding-bottom: .5em;
  text-align: center;
}
.table-header .th label {
  display: block;
  margin-top: .7em;
}
.table-header .th1 label {
  display: block;
  margin-top: .7em;
}


.table-body li {
  display: table-row;
  width: 100%;
}
.table-body .td {
  border: 2px solid #FFF;
  ;
  padding: .5em 0;
  line-height: 1em;
}
.table-body .td.metric {
  border-bottom-color: #EFEFEF;
  border-top-color: #EFEFEF;
  background: white;
}
.table-body .td.metric label {
  text-transform: uppercase;
  display: block;
}
.table-body .td.metric span {
  text-transform: uppercase;
}
.table-body .td:not(.metric) {
  color: #FFF;
  line-height: 1.2em;
}
.table-body .td:not(.metric) .number {
  padding-top: .3em;
}

.tr:first-child .metric {
  border-top: none;
}
.tr:last-child .metric {
  border-bottom: none;
}

.th, .td {
  display: table-cell;
  width: 16%;
  text-align: center;
}

legend {
  position: relative;
  margin: 2em 0 1em 0;
  width: 100%;
  height: 1em;
  background-image: linear-gradient(to left, #8ac779, #52bab5, #947db9, #e54a4a);
}
legend:before {
  position: absolute;
  left: 0;
  margin-top: -1.5em;
}
legend:after {
  position: absolute;
  right: 0;
  margin-top: -1.5em;
}

.benchmarks {
  width: 100%;
}
</style>

</html>

