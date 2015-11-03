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
				<a href=catalog.php>Каталог</a><br>
				<a href=sales.php>Акции</a><br>
				<a href=respond.php>Отзывы</a><br>
				<a href=slider.php>Слайдер</a><br>
				";
			} else{ echo" 
			<form method=post>
			<input type=text placeholder=login name=login>
			<input type=password placeholder=password name=password>
			<input type=submit value=submit>
			</form>";}
		?>
		
	</body>
</html>