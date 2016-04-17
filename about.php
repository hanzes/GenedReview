<!DOCTYPE HTML>
<html>

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
        <h1><a>Gened </a>Reviews</h1>
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

<<<<<<< HEAD
<<<<<<< HEAD
$uri = "mongodb://distdbpro:distdb555@ds023570.mlab.com:23570/distdata";
$m = new MongoClient($uri);

$db = $m->selectDB("distdata");

$coll = $db->reviews;
$cursor = $coll->find(array('reviewer' => $_SESSION['username']));
=======

>>>>>>> origin/master
=======

>>>>>>> origin/master
			?>         
      </div>
      <div id="menubar">
        <ul id="menu">
<<<<<<< HEAD
<<<<<<< HEAD
=======
          <!-- put class="current" in the li tag for the selected page - to highlight which page you're on -->
>>>>>>> origin/master
=======
          <!-- put class="current" in the li tag for the selected page - to highlight which page you're on -->
>>>>>>> origin/master
          <li class="current"><a href="home.php"><i class="material-icons w3" style="font-size:24px;">home</i>Home</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
    <!--insert your sidebar items here-->      
      <div id="sidebar_container">
        <br><br><br><br>  

        
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <h1>สวัสดี <?php echo $_SESSION['username'];?></h1>
        			
            
<<<<<<< HEAD
<<<<<<< HEAD
         <table class="highlight">
        <thead>
          <tr>
              <th data-field="id">รหัสวิชา</th>
              <th data-field="name">ชื่อวิชา</th>
              <th data-field="price">หมวด</th>
          </tr>
        </thead>
<?php 
foreach ($cursor as $doc) {
$rname = array('SID'=> $doc['SID'],'title' => $doc['title'],'category' => $doc['category']) ;
?>
        <tbody>
         <tr>
            <td> <a href="showreview.php?SID=<?php echo $rname['SID']; ?>"><?php echo $rname['SID']; ?></a></td>
            <td><?php echo $rname['title']; ?></td>
            <td><?php echo $rname['category']; ?></td>
          </tr>
<?php }
?>
       
        </tbody>
      </table>
=======
        <p> รายละเอียด เราอยากได้วิชาที่เคยรีวิว</p>
>>>>>>> origin/master
=======
        <p> รายละเอียด เราอยากได้วิชาที่เคยรีวิว</p>
>>>>>>> origin/master
  
      </div>
    </div>
    <div id="footer">
      <p> by ICE JOY SAII BOSS P &nbsp;&nbsp; #cscu21</p>
    </div>
  </div>
</body>
</html>
