

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>e-Campus</title>
</head>
<body>
	<?php
		session_start();
		if(!isset($_SESSION['status'])){
			$_SESSION['status']=0;
		}

		if(!isset($_POST['logout']) ){
			if($_SESSION['status']==1){


				$database=mysqli_connect( 'localhost','root', '' ,'dwp');
				$id=$_SESSION['account'];
				$query=mysqli_query($database,"SELECT image FROM member WHERE ID='".$id."'");
				$pass = mysqli_fetch_array($query,MYSQLI_ASSOC);
				if($pass["image"]!=""){
					print("<img src='");
					print($pass["image"]);
					print("' width='200'/>");
				}

				print("Hi! ");			
				print($_SESSION['account']);
				print("<form method = 'post' action='account.php'><input type = 'submit' name = 'logout' value = 'Logout'></form>");
				print("<a href='upload.php'><button>上傳頭像</button></a>");
				print("<a href='skill.php'><button>技能管理</button></a>");
						
			}
			elseif ($_SESSION['status']==0) {
				print("Welcome!<br>");
				print("<a href='signUp.php'><button>SingUp</button></a>");
				print("<a href='login.php'><button>login</button></a>");
			}
		}
		if(isset($_POST['logout'])){
            session_unset($_SESSION['account']);
            $_SESSION['status']=0;
            print("User logout.");
            header("Refresh:3; url=index.php");
        }
	?>

</body>
</html>