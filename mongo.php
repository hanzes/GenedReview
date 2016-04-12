<?php
$uri = "mongodb://distdbpro:distdb555@ds023570.mlab.com:23570/distdata";
$m = new MongoClient($uri);

$db = $m->selectDB("distdata");

$coll = $db->reviews;

/*$review = array( "title" => "human re",
"id" => 2 );
$coll->insert($review);

$coll->update(array("title"=>"subject"),
array('$set'=>array("title"=>"updated subject")));*/
/*$str = "human";
$create = "/" . $str . "/i";
$regex = new MongoRegex($create);*/
$cursor = $coll->find();

foreach ($cursor as $doc) {
	print_r($doc['title']);
}
?>