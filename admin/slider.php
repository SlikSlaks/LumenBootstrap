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
				if(isset($_GET['delete'])){
					$query=mysql_query("delete from slider where id='".mysql_escape_string($_GET['delete'])."'") or die(mysql_error());
				}

				if($_FILES['icon']['name']){

					$icon=mysql_real_escape_string($_FILES['icon']['name']);

	  				if(is_uploaded_file($_FILES["icon"]["tmp_name"]))
	  					 move_uploaded_file($_FILES["icon"]["tmp_name"], "../assets/".$_FILES["icon"]["name"]);
	  				else
	   					die("Ошибка загрузки файла");
		  			$desc=mysql_query("INSERT INTO slider (`img`) 
		  				VALUES ('".$icon."')")or die(mysql_error());	
				}

				if($_GET['act']=='show'){
					echo "<a href=slider.php>Назад</a><br><br>";
					$query=mysql_query("select* from slider") or die(mysql_error());
         			while($result=mysql_fetch_assoc($query)){
						echo "
						<div>
			              <div>
			              	<img class='slider_icon_admin' src='../assets/".$result['img']."' alt='sale' />
			              </div>
			              <a href=slider.php?delete=".$result['id']."&act=show>Удалить</a>
			            </div>
			            <br><br>

						";
					}
				}
				if($_GET['act']=='add'){
					echo "
						<a href=slider.php>Назад</a><br><br>
						<form method=post action=slider.php enctype='multipart/form-data'>
							<label >Изображение (высота 800px!): <input type='file' name='icon' required></label><br><br>
							<input type=submit value='Добавить'>
						</form>
					";
				}
/*		if(isset($_GET['edit'])){
					$query=mysql_query("select * from sales where id='".mysql_escape_string($_GET['edit'])."'") or die(mysql_error());
					$result=mysql_fetch_assoc($query);
					echo "
						<a href=sales.php?act=show>Назад</a><br><br>
						<form method=post action=sales.php?act=show enctype='multipart/form-data'>
							<input type=hidden name=id value=".$result['id'].">
							<input type=hidden name=edit value=true>
							<input type=text name=name placeholder='Название акции' required value='".$result['name']."'><br><br>
							<textarea name=text required rows='6' id=text placeholder='Текст акции'>".$result['text']."</textarea><br><br>
							<label >Изображение: <input type='file' name='icon'></label><br><br>
							<input type=submit value='Изменить'>
						</form>
					";
				}
*/				
				if(!isset($_GET['act'])){
					$query=mysql_query("select count(id) as 'num' from slider") or die(mysql_error());
					$result=mysql_fetch_assoc($query);
					echo"
					<a href=index.php>Назад</a><br>
					<a href=slider.php?act=show>Посмотреть элементы слайдера [".$result['num']."]</a><br>
					<a href=slider.php?act=add>Добавить элементы</a><br>
					";
				}
			}
		?>
		
	</body>
</html>