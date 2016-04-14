
<head>
<link rel="stylesheet" type="text/css" href="style/review.css" />
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
</head>   
<body>
<div id="comment_form">
 <form method="post">
 <div>
  <input type="text" name="name" required="required" placeholder="Reviewer Name">
 </div>
 <div>
  <input type="text" name="SID" required="required" placeholder="Subject ID">
 </div>
 <div>
  <input type="text" name="title" required="required" placeholder="Subject Title">
 </div>
 <select name="category">
  <option value="Science">Science</option>
  <option value="Human">Human</option>
  <option value="Society">Society</option>
  <option value="Interdisciplinary">Interdisciplinary</option>
</select>
 <div>
  <input type="text" name="location" required="required" placeholder="Class Location">
 </div>
 <div>
  <input type="text" name="credit" required="required" placeholder="Subject Credit">
 </div>
 <div>
  <input type="text" name="grade" required="required" placeholder="Reviewer Grade">
 </div>

 <div>
  <input type="text" name="rate" required="required" placeholder="Rate (min at 0 max at 10)">
 </div>
 <div>
  <textarea rows="10" name="descrip" required="required" placeholder="Describe on this subject"></textarea>
 </div>
 <div>
 </form>
  <input type="submit" name="submit" value="Add Review">
 </div>
</body>
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