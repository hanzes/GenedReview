<?php


$uri = "mongodb://distdbpro:distdb555@ds023570.mlab.com:23570/distdata";
$m = new MongoClient($uri);
$db = $m->selectDB("distdata");
$coll = $db->reviews;
$arr = array();
if (!empty($_POST['keywords'])) {
	$keywords = $_POST['keywords'];
	$toregex = "/" . $keywords . "/i";
	$regex = new MongoRegex($toregex);
	$result = $coll->find(array('title' => $regex));
	if (count($result) > 0) {
		foreach ($result as $obj) {
			$arr[] = array('id' => $obj['SID'] ,'title' => $obj['title'] );
	
		}
	}
}

echo json_encode($arr);
?>