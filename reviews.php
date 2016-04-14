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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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
        <p>1.<br />
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

        <!-- insert the page content here -->
        <h1>Reviews</h1>
 
 
    
    <div class="container">
      <div class="starter-template">
		<div class="page-header">
		
		</div>
        <form role="form" method="post">
		  <div class="form-group">
			<input type="text" class="form-control" id="keyword" placeholder="Enter keyword">
		  </div>
		</form>
		<ul id="content"></ul>
		
	  </div>
    </div><!-- /.container -->
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
    background-color: #fad7fa;
    color: black;
}

p {
	color: black;
}

	
	</style>
</form>  


        <br>  
        <p>ค้นหา reviews ที่ต้องการ โดยสามารถ search ได้ทั้ง course name และ  course ID </p>
        <h1><font color="red">Recommend</font></h1>
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
		<p>
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
		<p>
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
		<p>
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
		<p>
			<?php 
			echo $maxsubj['title'] . " " . $maxsubj['SID'];
			?>
			</p>
		<span class="endlabel">      </span>
		</div></a>
        <p>The following examples show how the text (within '&lt;p&gt;&lt;/p&gt;' tags) will appear:</p>
        <p><strong>This is an example of bold text</strong></p>
        <p><i>This is an example of italic text</i></p>
        <p><a href="#">This is a hyperlink</a></p>
        <h2>Lists</h2>
        <p>This is an unordered list:</p>
        <ul>
          <li>Item 1</li>
          <li>Item 2</li>
          <li>Item 3</li>
          <li>Item 4</li>
        </ul>
        <p>This is an ordered list:</p>
        <ol>
          <li>Item 1</li>
          <li>Item 2</li>
          <li>Item 3</li>
          <li>Item 4</li>
        </ol>
        <h2>Images</h2>
        <p>images can be placed on the left, in the center or on the right:</p>
        <span class="left"><img src="style/graphic.png" alt="example graphic" /></span>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
          incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
          exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
          irure dolor in reprehenderit in voluptate velit esse cillum.
        </p>
        <span class="center"><img src="style/graphic.png" alt="example graphic" /></span>
        <span class="right"><img src="style/graphic.png" alt="example graphic" /></span>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
          incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
          exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
          irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
          pariatur.
        </p>
        <h2>Tables</h2>
        <p>Tables should be used to display data and not used for laying out your website:</p>
        <table style="width:100%; border-spacing:0;">
          <tr><th>Item</th><th>Description</th></tr>
          <tr><td>Item 1</td><td>Description of Item 1</td></tr>
          <tr><td>Item 2</td><td>Description of Item 2</td></tr>
          <tr><td>Item 3</td><td>Description of Item 3</td></tr>
          <tr><td>Item 4</td><td>Description of Item 4</td></tr>
        </table>
        <h2>Form Elements</h2>
        <form action="#" method="post">
          <div class="form_settings">
            <p><span>Form field example</span><input type="text" name="name" value="" /></p>
            <p><span>Textarea example</span><textarea rows="8" cols="50" name="name"></textarea></p>
            <p><span>Checkbox example</span><input class="checkbox" type="checkbox" name="name" value="" /></p>
            <p><span>Dropdown list example</span><select id="id" name="name"><option value="1">Example 1</option><option value="2">Example 2</option></select></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="name" value="button" /></p>
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
