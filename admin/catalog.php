<?php session_start(); ?>
<?php include("../connect.php"); ?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Lumen-Optika</title>
	<link rel="shortcut icon" type="image/x-icon" href="../assets/favicon.ico">
	</head>
	<body>
		<?php 
			if($_POST['login']=='admin' && $_POST['password']=='admin'){
				$_SESSION['auth']=true;
			} 
			if($_SESSION['auth']){
				echo"
				<a href=index.php>Назад</a><br>
				<a href=>Add position</a><br>
				<a href=>Remove position</a><br>
				<a href=>Modify position</a><br>
				";
			} 
		?>
		
	</body>
</html>