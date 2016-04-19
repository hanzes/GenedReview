            <?php 

			session_start();
			error_reporting(0);
			$_SESSION["backurl"] =$_SERVER['HTTP_REFERER'] ;
			$backurl = $_SESSION["backurl"];
			if(empty($_SESSION['check'])){
				$_SESSION['check']= 0;
			}
					include 'topmenu.php'; 	?>  
          
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
.panel-shadow {
    box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;
}
.panel-white {
  border: 1px solid #dddddd;
}
.panel-white  .panel-heading {
  color: #333;
  background-color: #fff;
  border-color: #ddd;
}
.panel-white  .panel-footer {
  background-color: #fff;
  border-color: #ddd;
}

.post .post-heading {
  height: 95px;
  padding: 20px 15px;
}
.post .post-heading .avatar {
  width: 60px;
  height: 60px;
  display: block;
  margin-right: 15px;
}
.post .post-heading .meta .title {
  margin-bottom: 0;
}
.post .post-heading .meta .title a {
  color: black;
}
.post .post-heading .meta .title a:hover {
  color: #aaaaaa;
}
.post .post-heading .meta .time {
  margin-top: 8px;
  color: #999;
}
.post .post-image .image {
  width: 100%;
  height: auto;
}
.post .post-description {
  padding: 15px;
}
.post .post-description p {
  font-size: 14px;
}
.post .post-description .stats {
  margin-top: 20px;
}
.post .post-description .stats .stat-item {
  display: inline-block;
  margin-right: 15px;
}
.post .post-description .stats .stat-item .icon {
  margin-right: 8px;
}
.post .post-footer {
  border-top: 1px solid #ddd;
  padding: 15px;
}
.post .post-footer .input-group-addon a {
  color: #454545;
}
.post .post-footer .comments-list {
  padding: 0;
  margin-top: 20px;
  list-style-type: none;
}
.post .post-footer .comments-list .comment {
  display: block;
  width: 100%;
  margin: 20px 0;
}
.post .post-footer .comments-list .comment .avatar {
  width: 35px;
  height: 35px;
}
.post .post-footer .comments-list .comment .comment-heading {
  display: block;
  width: 100%;
}
.post .post-footer .comments-list .comment .comment-heading .user {
  font-size: 14px;
  font-weight: bold;
  display: inline;
  margin-top: 0;
  margin-right: 10px;
}
.post .post-footer .comments-list .comment .comment-heading .time {
  font-size: 12px;
  color: #aaa;
  margin-top: 0;
  display: inline;
}
.post .post-footer .comments-list .comment .comment-body {
  margin-left: 50px;
}
.post .post-footer .comments-list .comment > .comments-list {
  margin-left: 50px;
}
</style>
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <h1><a href="#">Gened </a>Reviews</h1>
          <h2 class="slogan">&nbsp;&nbsp;&nbsp;Chulalongkorn University </h2>

          
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
  
            <div id="content">
        <!-- insert the page content here -->
        <h1>Reviews</h1>
		<?php 

			
			      

$uri = "mongodb://distdbpro:distdb555@ds023570.mlab.com:23570/distdata";
$m = new MongoClient($uri);

$db = $m->selectDB("distdata");

$coll = $db->reviews;

$cursor = $coll->find(array('SID' => $_GET["SID"]));

?>
<br>
<br>
<h2><?php echo $_GET["SID"]; ?>
</h2>

<p>	
<?php
$rate=0;
$num=0;
foreach ($cursor as $doc) {
$sname = array('title'=> $doc['title'],'location' => $doc['location'],'category' => $doc['category'], 'credit' => $doc['credit'],'rate' => $doc['rate']) ;
$rate  = $rate + $sname['rate'];
$num = $num+1;
}
echo $sname['title']; ?>
<br>
<?php 
echo "Credit : " . $sname['credit'];
?>
<br>
<?php 
echo "Category : " . $sname['category'];
?>
<br>
<?php 
echo "Location : " . $sname['location'];
?>
<br>
<?php 
echo "Avg. Rate : " . (float)($rate/$num);
?>
</p>
<?php
foreach ($cursor as $doc) {
$rname = array('reviewer'=> $doc['reviewer'],'grade' => $doc['grade'],'rate' => $doc['rate'], 'descrip' => $doc['description']) ;
?>

    <div class="row">
        <div class="col s12">
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading">
                    <div class="pull-left image">
                        <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="pull-left meta">
                        <div class="title h5">
                            <a href="#"><b><?php echo $rname['reviewer']; ?></b></a>
                           <?php echo "Got Grade : " . $rname['grade']; ?>
                        </div>
                        <h6 class="text-muted time"><?php echo "Rate for this subject : " . $rname['rate']; ?></h6>
                    </div>
                </div> 
                <div class="post-description"> 
                    <p><?php echo $rname['descrip']; ?></p>
                </div>
            </div>
        </div>
</div>


<?php }
?>


       
      </div>
    </div>
    <div id="footer">
      <p> by ICE JOY SAII BOSS P &nbsp;&nbsp; #cscu21</p>
    </div>

	
	

</body>
</html>
