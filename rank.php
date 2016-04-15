<!DOCTYPE HTML>
<html>
<?php 

function array_sort($array, $on, $order=SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
            break;
            case SORT_DESC:
                arsort($sortable_array);
            break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}

$uri = "mongodb://distdbpro:distdb555@ds023570.mlab.com:23570/distdata";
$m = new MongoClient($uri);
$db = $m->selectDB("distdata");
$coll = $db->rate;
$cursor = $coll->find(array('category' => "Society"));
$cursor2 =  $coll->find(array('category' => "Science"));
$cursor3 = $coll->find(array('category' => "Interdisciplinary"));
$cursor4 = $coll->find(array('category' => "Human"));
$i=0;
foreach ($cursor as $doc) {
	$sname = array(0 =>$doc['title'],1 => $doc['rate'], 2=>$doc['SID']);
	if($i==0){
	$arr = array(array($doc['title'], $doc['rate'], $doc['SID']));
	}
	else{
	$arr = array_merge($arr,array($sname));
	}
	
	$i++;

}
$i=0;
foreach ($cursor2 as $doc) {
	$sname2 = array(0 =>$doc['title'],1 => $doc['rate'], 2=>$doc['SID']);
	if($i==0){
	$arr2 = array(array($doc['title'], $doc['rate'], $doc['SID']));
	}
	else{
	$arr2 = array_merge($arr2,array($sname));
	}
	
	$i++;

}
$i=0;
foreach ($cursor3 as $doc) {
	$sname3 = array(0 =>$doc['title'],1 => $doc['rate'], 2=>$doc['SID']);
	if($i==0){
	$arr3 = array(array($doc['title'], $doc['rate'], $doc['SID']));
	}
	else{
	$arr3 = array_merge($arr3,array($sname));
	}
	
	$i++;

}
$i=0;
foreach ($cursor4 as $doc) {
	$sname4 = array(0 =>$doc['title'],1 => $doc['rate'], 2=>$doc['SID']);
	if($i==0){
	$arr4 = array(array($doc['title'], $doc['rate'], $doc['SID']));
	}
	else{
	$arr4 = array_merge($arr4,array($sname));
	}
	
	$i++;

}



$arrsoc = array_sort($arr,'rate',SORT_ASC);
$arrsci = array_sort($arr,'rate',SORT_ASC);
$arrin = array_sort($arr,'rate',SORT_ASC);
$arrhum = array_sort($arr,'rate',SORT_ASC);


?>
<head>
  <title>Gened Reviews</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine&amp;v1" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <h1><a href="#">Gened </a>Reviews</h1>
          <h2 class="slogan">&nbsp;&nbsp;&nbsp;Chulalongkorn University </h2>
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
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="current" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="home.php"><i class="material-icons w3" style="font-size:24px;">home</i>Home</a></li>
          <li><a href="reviews.php"><i class="material-icons w3" style="font-size:24px; ">description</i>Reviews</a></li>
          <li class="current"><a href="rank.php"><i class="material-icons w3" style="font-size:24px; "> assessment</i>Rank</a></li>
          <li><a href="map.php"><i class="material-icons w3" style="font-size:24px; "> map</i>Map</a></li>
          <li><a href="contact.php"><i class="material-icons w3" style="font-size:24px; ">announcement</i>Contact Us</a></li>
        </ul>
      </div>
    </div>
   <!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Price</title>
    
    
    
    
        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

    <html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Document</title>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css">
</head>
<body>
<section class="container">
  <div class="row white">
				<div class="block">

					<div class="col-xs-12 col-sm-6 col-md-3">
							<ul class="pricing p-green">
								<li>
									<img src="http://bread.pp.ua/n/settings_g.svg" alt="">
									<big>Science</big>
								</li>
								<li>Responsive Design</li>
								<li>Color Customization</li>
								<li>HTML5 & CSS3</li>
								<li>Styled elements</li>
								<li>
									<h3>Top</h3>
									<span>per month</span>
								</li>
								<li>
									<button>Join Now</button>
								</li>
							</ul>
					</div>

					<div class="col-xs-12 col-sm-6 col-md-3">
							<ul class="pricing p-yel">
								<li>
									<img src="http://bread.pp.ua/n/settings_y.svg" alt="">
									<big>Interdisciplinary</big>
								</li>
								<li>Responsive Design</li>
								<li>Color Customization</li>
								<li>HTML5 & CSS3</li>
								<li>Styled elements</li>
								<li>
									<h3>5</h3>
									<span>per month</span>
								</li>
								<li>
									<button>Join Now</button>
								</li>
							</ul>
					</div>

					<div class="col-xs-12 col-sm-6 col-md-3">
							<ul class="pricing p-red">
								<li>
									<img src="http://bread.pp.ua/n/settings_r.svg" alt="">
									<big>Human</big>
								</li>
								<li>Responsive Design</li>
								<li>Color Customization</li>
								<li>HTML5 & CSS3</li>
								<li>Styled elements</li>
								<li>
									<h3>For</h3>
									<span>per month</span>
								</li>
								<li>
									<button>Join Now</button>
								</li>
							</ul>
					</div>

					<div class="col-xs-12 col-sm-6 col-md-3">
							<ul class="pricing p-blue">
								<li>
									<img src="http://bread.pp.ua/n/settings_b.svg" alt="">
									<big>Society</big>
								</li>
								<li><?php echo $arrsoc[0][0]?></li>
								<li>Color Customization</li>
								<li>HTML5 & CSS3</li>
								<li>Styled elements</li>
								<li>
									<h3>You</h3>
									<span>per month</span>
								</li>
								<li>
									<button>Join Now</button>
								</li>
							</ul>
					</div>


				</div><!-- /block -->
			</div><!-- /row -->
  </section>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    
    
    
    
  </body>
</html>

    <div id="footer">
      <p> by ICE JOY SAII BOSS P &nbsp;&nbsp; #cscu21</p>
    </div>
  </div>
</body>
</html>
