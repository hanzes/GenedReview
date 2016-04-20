<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>Gened Reviews</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine&amp;v1" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <link rel="stylesheet" type="text/css" href="css/timeline.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 

			
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	$("#step li").each(function (i) {
		i = i+1;
		$(this).addClass("item"+i);
   });

	$("#number li").each(function (i) {
		i = i+1;
		$(this).addClass("item"+i);
   });

	$("#commentlist li").each(function (i) {
		i = i+1;
		$(this).prepend('<span class="commentnumber"> #'+i+'</span>');
   });

});
</script>
<style type="text/css">

* {
	margin: 0;
	padding: 0;
}
a {
	color: #333;
}
p.ex2 {
     font-family: 'Open Sans', sans-serif;
	padding: 0 0 20px 0;
  line-height: 1.5em;
  font-size: 14px;
  color: #F44336;
}

/* number style */
#commentlist {
	margin: 10px 0 40px;
	padding: 0;
}
#commentlist li {
	font-family: 'Open Sans', sans-serif;
	padding: 0 0 20px 0;
  line-height: 1.5em;
  font-size: 100%;
	padding: 10px 0 20px;
	list-style: none;
	border-top: solid 1px #ccc;
	position: relative;
}
#commentlist cite {
	font: bold 140%/110% Arial, Helvetica, sans-serif;
	color: #666;
}
#commentlist .time {
	color: #ccc;
	margin: 0 0 10px;
}
#commentlist .commentnumber {
	position: absolute;
	right: 0;
	top: 8px;
	font: normal 200%/100% Georgia, "Times New Roman", Times, serif;
	color: #ccc;
}

</style>
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
					include 'topmenu.php'; 	?>  
          
          
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
         
        <!-- insert the page content here -->
        <h1>Reviews</h1>
		<?php 

			
			      

$uri = "mongodb://distdbpro:distdb555@ds023570.mlab.com:23570/distdata";
$m = new MongoClient($uri);

$db = $m->selectDB("distdata");

$coll = $db->reviews;

$cursor = $coll->find(array('SID' => $_GET["SID"]));

?>

 

<?php
$rate=0;
$num=0;
foreach ($cursor as $doc) {
$sname = array('title'=> $doc['title'],'location' => $doc['location'],'category' => $doc['category'], 'credit' => $doc['credit'],'rate' => $doc['rate']) ;
$rate  = $rate + $sname['rate'];
$num = $num+1;
}
 ?>
<br>

<br>
<br>
<h2><?php echo $sname['title']; ?>
</h2>
<div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <b><span class="card-title"><?php echo $_GET["SID"]; ?></span><b>
           
            </div>
            <div class="card-action">
              <b><p class="ex2"><?php 
echo "Category : " . $sname['category'];
?>
<br>
<?php
echo "Credit : " . $sname['credit'];

?>
<br>
<?php 
echo "Location : " . $sname['location'];
?>
 <br>
<?php 
echo "	Average Rating : " . (float)($rate/$num);
?></p></b>
            </div>
          </div>
        </div>
      </div>



<ol id="commentlist">
<section id="exp" class="pfblock pfblock-gray">
        <div class="container">
                    <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="pfblock-header wow fadeInUp">
                        <h2 class="pfblock-title">Comment Lists</h2>
                        <div class="pfblock-line wow zoomIn"></div>
                        <div class="pfblock-subtitle">

                        </div>
                    </div>
                </div>
            </div>
    <div class="row wow zoomIn">
        <div class="timeline-centered">
        <article class="timeline-entry right-aligned wow zoomIn">
        <div class="timeline-entry-inner">
            <time class="timeline-time"><span></span> <span></span></time>
            <div class="timeline-icon bg-success">
                <i class="entypo-camera"></i>
            </div>
        </div>
    </article>

<?php
foreach ($cursor as $doc) {
$rname = array('reviewer'=> $doc['reviewer'],'grade' => $doc['grade'],'rate' => $doc['rate'], 'descrip' => $doc['description']) ;
?>
    <article class="timeline-entry right-aligned">
        <div class="timeline-entry-inner">
            <time class="timeline-time"><span>   <div class="chip">
    <img src="style/girl.png" alt="Contact Person">
   <?php echo $rname['reviewer']; ?>
  </div></span> <span></span></time>
            <div class="timeline-icon bg-warning">
                <i class="entypo-camera"></i>
            </div>
			<br>
            <div class="timeline-label">
                <p><?php echo "Got Grade : " . $rname['grade']; ?> <?php echo "Rate for this subject : " . $rname['rate']; ?></p>
                <blockquote><?php echo $rname['descrip']; ?></blockquote>
				
            </div>
        </div>
    </article>

	<?php }
?>
        <article class="timeline-entry begin wow zoomIn">

        <div class="timeline-entry-inner">

            <div class="timeline-icon bg-primary" style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);">
                <i class="entypo-flight"></i>
            </div>

        </div>

    </article>

</div>
    </div>
</div>
    </section>

       
      </div>
    </div>
    <div id="footer">
      <p> by ICE JOY SAII BOSS P &nbsp;&nbsp; #cscu21</p>
    </div>


	
	
</ol>

</body>
</html>
