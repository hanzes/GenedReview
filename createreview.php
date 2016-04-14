<link rel="stylesheet" type="text/css" href="style/review.css" />
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
  <option value="sci">Science</option>
  <option value="hum">Human</option>
  <option value="soc">Society</option>
  <option value="int">Interdisciplinary</option>
</select>
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

 <?php
 $uri = "mongodb://distdbpro:distdb555@ds023570.mlab.com:23570/distdata";
$m = new MongoClient($uri);

$db = $m->selectDB("distdata");

$coll = $db->reviews;
if ($_POST) {
$rate = intval($_POST['rate']);
$review = array( "SID" => $_POST['SID'],
    "title" => $_POST['title'],
    "category" => $_POST['category'],
    "credit" => $_POST['credit'],
    "grade" => $_POST['grade'],
    "description" => $_POST['descrip'],
    "rate" => $rate,
    "reviewer" => $_POST['name'] );
$coll->insert($review); 
}
 ?>