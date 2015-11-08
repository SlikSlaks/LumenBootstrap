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
			if($_POST['login']=='admin' && $_POST['password']=='admin'){
				$_SESSION['auth']=true;
			} 
			if($_SESSION['auth']){
				if(isset($_GET['delbrand'])){
					$query=mysql_query("DELETE FROM catalog WHERE brand='".mysql_escape_string($_GET['delbrand'])."'") or die(mysql_error());
					$query=mysql_query("DELETE FROM brands WHERE id='".mysql_escape_string($_GET['delbrand'])."'") or die(mysql_error());
				}
				if(isset($_GET['delmodel'])){
					$query=mysql_query("DELETE FROM catalog WHERE id='".mysql_escape_string($_GET['delmodel'])."'") or die(mysql_error());
				}
				if(isset($_POST['brandname'])){

					$icon=mysql_real_escape_string($_FILES['icon']['name']);

	  				if(is_uploaded_file($_FILES["icon"]["tmp_name"]))
	  					 move_uploaded_file($_FILES["icon"]["tmp_name"], "../assets/".$_FILES["icon"]["name"]);
	  				else
	   					die("Ошибка загрузки файла");
		  			$desc=mysql_query("INSERT INTO brands (`brand`,`img`) 
		  				VALUES ('".$_POST['brandname']."','".$icon."')")or die(mysql_error());	
				}
				if(isset($_POST['modelname'])){

					$icon=mysql_real_escape_string($_FILES['icon']['name']);

	  				if(is_uploaded_file($_FILES["icon"]["tmp_name"]))
	  					 move_uploaded_file($_FILES["icon"]["tmp_name"], "../assets/".$_FILES["icon"]["name"]);
	  				else
	   					die("Ошибка загрузки файла");
		  			$desc=mysql_query("INSERT INTO catalog (`brand`,`model`,`img`) 
		  				VALUES ((SELECT id FROM brands WHERE brand='".mysql_escape_string($_POST['brand'])."'),'".mysql_escape_string($_POST['modelname'])."','".$icon."')")or die(mysql_error());	
				}

				if(!isset($_GET['act'])and!isset($_GET['brand'])){
					$query=mysql_query("select count(id) as 'num' from brands") or die(mysql_error());
					$result=mysql_fetch_assoc($query);
					echo"
					<a href=index.php>Назад</a><br>
					<a href=catalog.php?act=show>Посмотреть Бренды [".$result['num']."]</a><br>
					<a href=catalog.php?act=addbrand>Добавить Бренд</a><br>
					<a href=catalog.php?act=addmodel>Добавить Модель</a><br>
					";
				}
				if(isset($_GET['brand'])){
					echo"
					<a href=catalog.php?act=show>Назад</a><br><br>
					";
					$query=mysql_query("select * from catalog where brand='".mysql_escape_string($_GET['brand'])."'") or die(mysql_error());
					$query2=mysql_query("select brand from brands where id='".mysql_escape_string($_GET['brand'])."'") or die(mysql_error());
					$result2=mysql_fetch_assoc($query2);
					echo"
					<h2>".$result2['brand']."</h2><br><br>
					";

					while($result=mysql_fetch_assoc($query)){
						echo"
						<div>".$result['model']."</div>
						<img class=sale_icon_admin src='../assets/".$result['img']."'><br>
						<a href=catalog.php?brand=".$_GET['brand']."&delmodel=".$result['id'].">Удалить модель</a><br><br>
						";
					}
				}
				if($_GET['act']=='show'){
					$query=mysql_query("select * from brands") or die(mysql_error());
					echo"
					<a href=catalog.php>Назад</a><br><br>
					";
					while($result=mysql_fetch_assoc($query)){
						$query2=mysql_query("SELECT count(id) as 'num' FROM catalog WHERE brand='".$result['id']."'") or die(mysql_error());
						$result2=mysql_fetch_assoc($query2);
						echo"
						<a href=catalog.php?brand=".$result['id']."><div>".$result['brand']." [".$result2['num']."]</div>
						<img class=sale_icon_admin src='../assets/".$result['img']."'></a><br>
						<a href=catalog.php?act=show&delbrand=".$result['id'].">Удалить бренд</a><br><br>
						";
					}
				}
				if($_GET['act']=='addbrand'){
					echo "
						<a href=catalog.php>Назад</a><br><br>
						<form method=post action=catalog.php enctype='multipart/form-data'>
							<input type=text name=brandname placeholder='Название бренда' required><br><br>
							<label >Изображение: <input type='file' name='icon' required></label><br><br>
							<input type=submit value='Добавить'>
						</form>
					";
				}
				if($_GET['act']=='addmodel'){
					$query=mysql_query("select * from brands") or die(mysql_error());
					echo "
						<a href=catalog.php>Назад</a><br><br>
						<form method=post action=catalog.php enctype='multipart/form-data'>
							<input type=text name=modelname placeholder='Модель' required><br><br>
							<label >Бренд: <select name=brand>";
					while($result=mysql_fetch_assoc($query)){
						echo"
						  <option>".$result['brand']."</option>
						";
					}
					echo "</select></label><br><br>
						<label >Изображение: <input type='file' name='icon' required></label><br><br>
						<input type=submit value='Добавить'>
						</form>
					";
				}

			}
		?>
		
	</body>
</html>