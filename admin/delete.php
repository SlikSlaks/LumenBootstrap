<?php session_start(); ?>
<?php include("../connect.php"); ?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Risk more, buy cheaper!</title>
	<link rel="shortcut icon" type="image/x-icon" href="../assets/favicon.ico">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body>
		<a href=index.php>Back</a>
		<?php 
			if(!$_SESSION['auth'])
				die('not authorized!');
			if(isset($_GET['id'])){
				$query=mysql_query("delete from staff where id='".mysql_escape_string($_GET['id'])."'") or die(mysql_error());
				echo"All right!<br>";	


			}else{
				$query=mysql_query("select* from staff");
				while($result=mysql_fetch_assoc($query)){//ассоциативный массив
					echo " 
					<a href=delete.php?id=".$result['id'].">
					<div class='item'>
						<img src='../assets/".$result['icon']."'>
						<div class=caption>
							<p>".$result['name']."</p>							
						</div>                        
					</div>
					</a>";
				}
			}
			?>
	</body>
</html>