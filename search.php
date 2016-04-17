<?php


$uri = "mongodb://distdbpro:distdb555@ds023570.mlab.com:23570/distdata";
$m = new MongoClient($uri);
$db = $m->selectDB("distdata");
$coll = $db->rate;
$arr = array();
if (!empty($_POST['keywords'])) {
	$keywords = $_POST['keywords'];
	$toregex = "/" . $keywords . "/i";
	$toid = "/^" . $keywords . "/i";
	$regex = new MongoRegex($toregex);
	$result = $coll->find(array('title' => $regex));
	if (count($result) > 0) {
		foreach ($result as $obj) {
			$arr[] = array('id' => $obj['SID'] ,'title' => $obj['title'] );
	
		}
	}
	$regex1 = new MongoRegex($toid);
	$res = $coll->find(array('SID' => $regex1));
	if (count($res) > 0) {
		foreach ($res as $object) {
			$arr[] = array('id' => $object['SID'] ,'title' => $object['title'] );
	
		}
	}
}
echo json_encode($arr);
?>