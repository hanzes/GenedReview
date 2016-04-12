<?php
$m = new MongoClient();

$db = $m->gendb;

$coll = $db->reviews;

/*$review = array( "title" => "human re",
"id" => 2 );
$coll->insert($review);

$coll->update(array("title"=>"subject"),
array('$set'=>array("title"=>"updated subject")));*/
$str = "human";
$create = "/" . $str . "/i";
$regex = new MongoRegex($create);
$cursor = $coll->find(array('title' => $regex));

foreach ($cursor as $doc) {
	print_r($doc['title']);
}
?>