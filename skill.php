
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>e-Campus</title>
</head>
<body>
<h1>SKILL management</h1>
<a href='index.php'><button>回首頁</button></a>
<?php
	session_start();
	print("<h3>目前使用:</h3>");	
	$database=mysqli_connect( 'localhost','root', '' ,'dwp');
	$id=$_SESSION['account'];
	if(isset($_POST['skill'])){
		if($_POST['skill']=='nothing'){			
			mysqli_query($database,"UPDATE member SET usingSkill='0' WHERE id='".$id."'");
		}
		elseif($_POST['skill']=='explosion'){
			mysqli_query($database,"UPDATE member SET usingSkill='1' WHERE id='".$id."'");
		}
	}	
	$query=mysqli_query($database,"SELECT usingSkill FROM member WHERE ID='".$id."'");
	$pass = mysqli_fetch_array($query,MYSQLI_ASSOC);
	if($pass["usingSkill"]==0){
		print("<div><img src='nothing.png'/>nothing </div><hr>");
	}
	elseif($pass["usingSkill"]==1){
		print("<div><img src='explosion_B.jpg'/></div><hr>");
	}
	print("<form method = 'post' action='skill.php'><input type='radio' name='skill' value='nothing' checked><div><img src='nothing.png'/>nothing </div><hr><input type='radio' name='skill' value='explosion'><div><img src='explosion_B.jpg'/>explosion </div><hr><div><img src='handshake.jpg'/>three-way handshake(未開放) </div><hr><div><img src='hello_world.png'/>Hello world!(未開放) </div><br><input type='submit' name = 'submit' value='確認送出'' /></form>");


?>

</body>
</html>