<?php


$m = new MongoClient();
$db = $m->gendb;
$coll = $db->reviews;
$arr = array();
if (!empty($_POST['keywords'])) {
	/*$keywords = real_escape_string($_POST['keywords']); 
	$result =  $coll->find({"title": /$keywords/});
	if (count($result) > 0) {
		foreach ($result as $obj) {
			$arr[] = array('id' => $obj['id'] ,'title' => $obj['title'] );
	
		}
	}*/
}
	$arr[] = array('id' => 55555 ,'title' => "wichayaporn" );
	$arr[] = array('id' => 555 ,'title' => "navapat" );

echo json_encode($arr);
?>