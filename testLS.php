 <?php
			session_start();
			error_reporting(0);
			$backurl = $_SESSION["backurl"];
			if(empty($_SESSION['check'])){
				$_SESSION['check']= 0;
			}	

$uri = "mongodb://distdbpro:distdb555@ds023570.mlab.com:23570/distdata";
$m = new MongoClient($uri);

$db = $m->selectDB("distdata");

$coll = $db->rate;

			?>      
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
  <style>
  @import url(http://fonts.googleapis.com/css?family=Open+Sans:300);

* { 
  box-sizing: border-box; 
  font-family: 'Open Sans';
}

html, body{
  height: 100%;
}

body{
  margin: 0;
}

h1{
  margin: 0;
  font-size: 19px;
}

section{
  width: 100%;
  height: 100%;
  background-image: url(http://tinyurl.com/loopq2c);
  background-size: cover;
  background-position: center;
}

input[type="search"]{
  position: absolute;
  top: 20px;
  right: 20px;
  width: 200px;
  font-size: 17px;
  transition: 0.4s;
  transition-timing-function: cubic-bezier(0.7,0,0.3,1);
  outline: none;
  padding: 10px;
  color: #e74c3c;
  border: none;
  background: #ecf0f1;
  z-index: 100;
  font-weight: 800;
}

input[type="search"]::-webkit-search-cancel-button {
  /* Remove default */
  -webkit-appearance: none;
}

input[type="search"].clicked{
  top: 70px;
  right: calc(70px + 10%);
  transition: 0.6s;
  transition-timing-function: cubic-bezier(0.7,0,0.3,1);
  font-size: 90px;
  width: 75%;
  background: #ecf0f1;
}

button{
  pointer-events: auto;
  position: relative;
  top: 70px;
  right: 70px;
  float: right;
  height: 142px;
  width: 10%;
  border: none;
  background: none;
  z-index: 100;
  color: rgba(189, 195, 199, 0.5);
  font-size: 0;
  transition: 0.1s;
  cursor: pointer;
  outline: 0;
  visibility: hidden;
  background: #ecf0f1;
}

button.clicked{
  visibility: visible;
  font-size: 120px;
  transition: 0.3s 0.5s;
}

i{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.bg{
  position: absolute;
  top: 20px;
  right: 20px;
  width: 200px;
  height: 43px;
  background: #ecf0f1;
  transition: 0.5s;
  transition-timing-function: cubic-bezier(0.7,0,0.3,1);
  font-size: 0;
  text-align: center;
  overflow: hidden;
}

.bg.clicked{
  top: 0;
  right: 0;
  width: 100%;
  height: 100%;
  overflow-y: auto;
  overflow-x: hidden;
}

.close{
  position: absolute;
  top: 20px;
  right: 20px;
  width: 40px;
  height: 40px;
  cursor: pointer;
}

.close:after, .close:before{
  transition-property: height;
  transition: 0.2s 0;
}

.close:after{
  content: '';
  width: 1px;
  height: 0px;
  background: black;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) rotate(45deg);
}

.close:before{
  content: '';
  width: 1px;
  height: 0px;
  background: black;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) rotate(-45deg);
}

.close.clicked:after, .close.clicked:before{
  height: 55px;
  transition: 0.5s 0.3s;
}

.wrapper{
  position: relative;
  top: 316px;
  padding-left: 90px;
  opacity: 0;
}

.wrapper.clicked{
  opacity: 1;
}

.content {
  position: relative;
  width: calc(100% / 3 - 45px);
  height: calc(100% - 404px);
  min-height: 475px;
  float: left;
  opacity: 0;
  margin: 0 20px 0 0;
  transform: translate3d(0, 50px , 0);
  transition: transform 0.5s, opacity 0.5s;
}

.content:before{
  position: relative;
  content: attr(data-title);
  bottom: 100%;
  left: 0;
  color: black;
  width: 100%;
  font-size: 24px;
  margin: 0 0 10px;
  font-weight: 100;
  display: block;
}

.wrapper.clicked .content{
  opacity: 1;
  transform: translate3d(0, 0, 0);
}

.wrapper.clicked .content:nth-child(1){
  transition-delay: 0.4s;
}

.wrapper.clicked .content:nth-child(2){
  transition-delay: 0.45s;
}

.wrapper.clicked .content:nth-child(3){
  transition-delay: 0.5s;
}

a{
  display: block;
  width: 100%;
  height: calc(100% / 5);
  min-height: 75px;
  max-height: 90px;
  background: rgba(189, 195, 199, 0.3);
  color: white;
  font-size: initial;
  border-radius: 10px;
  margin: 0 0 5px;
  padding: 10px;
  color: rgba(0, 0, 0, 0.6);
  text-decoration: none;
  text-align: initial;
  transition: 0.4s;
}

a:hover{
  background: rgba(189, 195, 199, 0.5);
  color: #e74c3c;
}

a img, a h1{
  vertical-align: middle;
  display: inline-block;
}

a img{
  height: 70px;
  border-radius: 50%;
  margin: 0 10px 0 0;
}

a h1{
  width: calc(100% - 85px);
  font-weight: 700;
}

.content:nth-child(2) img{
  border-radius: 0px;
}

.content:nth-child(3) img{
  border-radius: 3px;
}

@media screen and (max-width: 1100px) {
  input[type="search"].clicked{
    font-size: 60px;
  }
  button.clicked{
    font-size: 90px;
    height: 102px;
  }
  .wrapper{
    padding: 0 70px;
    top: 242px;
  }
  .content{
    width: 100%;
    float: none;
    min-height: initial;
  }
  .content:first-child:before{
    margin: 0px 0 20px;
  }
  .content:before{
    margin: 10px 0 20px;
  }
}
  </style>
 </head>
 <body>
   
  <section>
  <form action="">  
    <input type="search" placeholder="Search..." id="search" type="text" data-list=".content"/>
    <button type="submit">
      <i class="fa fa-search"></i>
    </button>
  </form>
  <div class="bg">
    <div class="close"></div>
    <div class="wrapper">

	  <div class="content" data-title="Science">
        <a href="">
          Science
        </a>
				      <?php 
			  $cursor = $coll->find(array('category' => 'Science'));
			  foreach ($cursor as $doc) {
$rname = array('SID'=> $doc['SID'],'title' => $doc['title'],'category' => $doc['category']) ;
		?>
	<a href="showreview.php?SID=<?php echo $rname['SID']; ?>">
          <?php  
		echo $rname['SID'].' '.$rname['title'].' '.$rname['category']; ?>
        </a>
		<?php }
?>
      </div>
	        <div class="content" data-title="Human">

		<a href="">
          Human
        </a>
		      <?php 
			  $cursor = $coll->find(array('category' => 'Human'));
			  foreach ($cursor as $doc) {
$rname2 = array('SID'=> $doc['SID'],'title' => $doc['title'],'category' => $doc['category']) ;
		?>
	<a href="showreview.php?SID=<?php echo $rname2['SID']; ?>">
          <?php  
		echo $rname2['SID'].' '.$rname2['title'].' '.$rname2['category']; ?>
        </a>
		<?php }
?>
      </div>
      <div class="content" data-title="Society">
        <a href="">
          Society
        </a>
						      <?php 
			  $cursor = $coll->find(array('category' => 'Society'));
			  foreach ($cursor as $doc) {
$rname3 = array('SID'=> $doc['SID'],'title' => $doc['title'],'category' => $doc['category']) ;
		?>
	<a href="showreview.php?SID=<?php echo $rname3['SID']; ?>">
          <?php  
		echo $rname3['SID'].' '.$rname3['title'].' '.$rname3['category']; ?>
        </a>
		<?php }
?>
      </div>
      <div class="content" data-title="Interdisciplinary">
        <a href="">
         Interdisciplinary
        </a>
				      <?php 
			  $cursor = $coll->find(array('category' => 'Interdisciplinary'));
			  foreach ($cursor as $doc) {
$rname4 = array('SID'=> $doc['SID'],'title' => $doc['title'],'category' => $doc['category']) ;
		?>
	<a href="showreview.php?SID=<?php echo $rname4['SID']; ?>">
          <?php  
		echo $rname4['SID'].' '.$rname4['title'].' '.$rname4['category']; ?>
        </a>
		<?php }
?>
      </div>
    </div>
  </div>
</section>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	  <script type="text/javascript" src="http://vdw.github.io/HideSeek/javascripts/vendor/jquery.hideseek.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
   <script >  
	   $(".button-collapse").sideNav();
	 $(".dropdown-button").dropdown();
	 $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });

  $(document).ready(function() {
    $('select').material_select();
  });
$(document).ready(function() {
  $('#search').hideseek({
    nodata: 'No results found'
  });
});

$("input").click(function(){
  $(this).addClass("clicked");
  $("button").addClass("clicked");
  $(".bg").addClass("clicked");
  $(".close").addClass("clicked");
  $(".wrapper").addClass("clicked");
});

$(".close").click(function(){
  $("input").removeClass("clicked");
  $("button").removeClass("clicked");
  $(".bg").removeClass("clicked");
  $(this).removeClass("clicked");
  $(".wrapper").removeClass("clicked");
});

for(var i = 0; i<$(".content a").length; i++) {
  $('.content a img').eq(i).after("<h1>" + $(".content a img").eq(i).attr("alt") + "</h1>" );
}

$("button").click(function(event) {
  event.preventDefault();
});	
      </script>
 </body>
</html>
