<?php
$m = new MongoClient();
var_dump($m);
$db = $m->gendb;
var_dump($db);
$coll = $db->Gened;
var_dump($coll);
$coll->insert(array(
    'key1' => 'Another Row',
    'AnArray' => array(
        'embedded array value 1', 
        'embedded array value 2'
    ),
    'embeddedDoc1' => array(
        'embedDoc1Key1' => 'Embedded text in Doc1',
        'embedDoc1Key2' => 'More text for fun'
    )
    ));
    echo '<h2 style="color:red">Below is our Document</h2>';
$myDoc = $coll->findOne(array('key1' => 'Another Row'));
print_r($myDoc);
echo '</pre>';
?>