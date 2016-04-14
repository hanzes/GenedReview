<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php 

			session_start();
			error_reporting(0);
			$_SESSION["backurl"] =$_SERVER['HTTP_REFERER'] ;
			$backurl = $_SESSION["backurl"];
			if(empty($_SESSION['check'])){
				$_SESSION['check']= 0;
			}
					include 'topmenu.php'; 	
			      

$uri = "mongodb://distdbpro:distdb555@ds023570.mlab.com:23570/distdata";
$m = new MongoClient($uri);

$db = $m->selectDB("distdata");

$coll = $db->reviews;

$cursor = $coll->find(array('SID' => $_GET["SID"]));

?>
<br>
<br>
<h1><?php echo $_GET["SID"]; ?>
</h1>
			
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
body {
	width: 500px;
	margin: 20px auto;
	color: #999;
	font: 90%/150% Arial, Helvetica, sans-serif;
}
* {
	margin: 0;
	padding: 0;
}
a {
	color: #333;
}
p.ex2 {
    font: bold 12px/30px Georgia, serif;
	font-size: 16px;
}

/* number style */
#commentlist {
	margin: 10px 0 40px;
	padding: 0;
}
#commentlist li {
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

<ol id="commentlist">
<?php
foreach ($cursor as $doc) {
$rname = array('reviewer'=> $doc['reviewer'],'grade' => $doc['grade'],'rate' => $doc['rate'], 'descrip' => $doc['description']) ;
?>
<li>
		<p><cite><?php echo $rname['reviewer']; ?>:</cite></p>
		<p><small><?php echo "Got Grade : " . $rname['grade']; ?></small></p>
		<p><small><?php echo "Rate for this subject : " . $rname['rate']; ?></small></p>
		<p class = "ex2"><?php echo $rname['descrip']; ?> </p>
	</li>
<?php }
?>
	
	
</ol>

</body>
</html>
