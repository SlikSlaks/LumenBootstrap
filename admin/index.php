<?php session_start(); ?>
<?php include("../connect.php"); ?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Административная Панель - Люмен Оптика</title>
	<link rel="shortcut icon" href="../assets/favicon.png">
	<link rel="stylesheet" type="text/css" href="../css/custom.css">
	</head>
	<body>
		<?php 
			if($_GET['act']=='logout'){
				unset($_SESSION['auth']);
			}
			if($_POST['login']=='admin' && $_POST['password']=='admin'){
				$_SESSION['auth']=true;
			} 
			if($_SESSION['auth']){
				echo"
				<a href=catalog.php>Каталог</a><br>
				<a href=sales.php>Акции</a><br>
				<a href=respond.php>Отзывы</a><br>
				<a href=slider.php>Слайдер</a><br>
				<a href=index.php?act=logout>Выйти</a><br>
				";
			}else{ 
				echo" 
				<a href=../index.php>На главную</a><br><br>
				<form method=post>
				<input type=text placeholder=Логин name=login><br><br>
				<input type=password placeholder=Пароль name=password><br><br>
				<input type=submit value=Войти>
				</form>";
			}


		?>
		
	</body>
</html>