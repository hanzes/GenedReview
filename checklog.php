	
			<?php
			session_start();
			if(empty($_SESSION['check'])){
				$_SESSION['check']= 0;
			}
			
			
			$uri = "mongodb://distdbpro:distdb555@ds023570.mlab.com:23570/distdata";
			$m = new MongoClient($uri);
			$db = $m->selectDB("distdata");
			$coll = $db->users;
			if(isset($_POST['username']) and isset($_POST['password'])){
					$cursor = $coll->find(array('user' => $_POST['username'],'password'=> $_POST['password']));
					foreach($cursor as $object){
						if(count($cursor)==1){
							$_SESSION['check'] = 1;			
							
							$_SESSION['username'] = $_POST['username'];
							$_SESSION['password'] = $_POST['password'];
						}
						else{
							$_SESSION['check'] = 0;
						}
					
					}
				
				}

				$backurl = $_SESSION["backurl"];
				header("location:home.php");
				?>