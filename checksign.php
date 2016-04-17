 <?php			
$uri = "mongodb://distdbpro:distdb555@ds023570.mlab.com:23570/distdata";
$m = new MongoClient($uri);
$db = $m->selectDB("distdata");
$coll = $db->users;					
$signup = array("user" => $_POST['username'],
    "password" => $_POST['password'],
	"email" => $_POST['email'],
	"stdid" => $_POST['stdid'],
	"fac" => $_POST['fac']);
$coll->insert($signup); 
header("location:home.php");
 ?>