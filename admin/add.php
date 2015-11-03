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

		<?php 
			if(!$_SESSION['auth'])
				die('not authorized!');
			if(isset($_POST['name'])){
				$icon=mysql_real_escape_string($_FILES['icon']['name']);
  // Если файл загружен успешно, перемещаем его
  // из временной директории в конечную
  				if(is_uploaded_file($_FILES["icon"]["tmp_name"]))
  					 move_uploaded_file($_FILES["icon"]["tmp_name"], "../assets/".$_FILES["icon"]["name"]);
  				else
   					die("Ошибка загрузки файла");
  				$desc=mysql_query("INSERT INTO staff (`name`,`price`,`producer`,`amount`,`genre`,`icon`,`description`,`article`) 
  					VALUES ('".mysql_escape_string($_POST['name'])."','".mysql_escape_string($_POST['price'])."','".mysql_escape_string($_POST['author'])."','".mysql_escape_string($_POST['amount'])."','".mysql_escape_string($_POST['genre'])."','".$icon."','".mysql_escape_string($_POST['description'])."','".mysql_escape_string($_POST['article'])."')")or die(mysql_error());
				echo"All right!";			
			}
		?>

		<a href=index.php>Back</a>
		<form method=post enctype="multipart/form-data">
			<input placeholder=title name=name required><br><br>
			<input placeholder=author name=author required><br><br>
			<input placeholder=genre name=genre required><br><br>
			<textarea placeholder=description name=description required></textarea><br><br>
			<input placeholder=price name=price required><br><br>
			<input placeholder=amount name=amount required><br><br>
			<input placeholder=article name=article required><br><br>
			<label >Icon: <input type='file' name='icon' required></label><br><br>
			<input type=submit value=submit><br><br>
		</form>
	</body>
</html>