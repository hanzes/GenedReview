<?php 

$uri = "mongodb://distdbpro:distdb555@ds023570.mlab.com:23570/distdata";
$m = new MongoClient($uri);
$db = $m->selectDB("distdata");

$coll2 = $db->rate;
$coll = $db->reviews;

$cursor = $coll->find();
$cursor2 = $coll2->find();
foreach ($cursor as $doc) {
	$match = 0;
	foreach($cursor2 as $doc2){
		if($doc['SID'] == $doc2['SID']) {
			$add = $doc2;
			echo "<br>";
			$match = 1;
		}}
	if($match == 1){
		echo $add['title'];echo '<br>';
		$rate = $doc['rate'];
		$newrate = $add['rate'] + $rate;
		$newcount = $add['count'] + 1;
		$newavg = (float)($newrate/$newcount);
	$coll2->update($add,
	array('$set'=>array("title"=>$add['title'], "SID" => $add['SID'],"rate" => $newrate,
    "count" => $newcount,
    "avgrate" => $newavg)));

	}
	else{
	$nrate = array( "SID" => $doc['SID'],
    "title" => $doc['title'],
    "category" => $doc['category'],
	"rate" => $doc['rate'],
    "count" => 1,
    "avgrate" => $doc['rate'] );
	$coll2->insert($nrate);
	
	
	
	}
}





?>