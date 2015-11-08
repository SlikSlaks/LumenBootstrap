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
					$query=mysql_query("delete from sales where id='".mysql_escape_string($_GET['delete'])."'") or die(mysql_error());
				}

				if(isset($_POST['name'])){
					if($_FILES['icon']['name']){
						$icon=mysql_real_escape_string($_FILES['icon']['name']);

		  				if(is_uploaded_file($_FILES["icon"]["tmp_name"]))
		  					 move_uploaded_file($_FILES["icon"]["tmp_name"], "../assets/".$_FILES["icon"]["name"]);
		  				else
		   					die("Ошибка загрузки файла");
		   				if($_POST['edit']=='true'){
		   					$desc=mysql_query("UPDATE sales SET `name`='".mysql_escape_string($_POST['name'])."',`text`='".mysql_escape_string($_POST['text'])."',`img`='".$icon."' where id='".mysql_escape_string($_POST['id'])."'")or die(mysql_error());
		   				}else{
			  				$desc=mysql_query("INSERT INTO sales (`name`,`text`,`img`) 
			  					VALUES ('".mysql_escape_string($_POST['name'])."','".mysql_escape_string($_POST['text'])."','".$icon."')")or die(mysql_error());	
	  					}
	  				}else{
						$desc=mysql_query("UPDATE sales SET `name`='".mysql_escape_string($_POST['name'])."',`text`='".mysql_escape_string($_POST['text'])."' where id='".mysql_escape_string($_POST['id'])."'")or die(mysql_error());

	  				}
				}

				if($_GET['act']=='show'){
					echo "<a href=sales.php>Назад</a><br><br>";
					$query=mysql_query("select* from sales") or die(mysql_error());
         			while($result=mysql_fetch_assoc($query)){
						echo "
						<div>
			              <div>".$result['name']."</div>
			              <div>
			              	<img class='sale_icon_admin' src='../assets/".$result['img']."' alt='sale' />
			              	<div><span>".$result['text']."</span></div>
			              </div>
			              <a href=sales.php?edit=".$result['id'].">Редактировать</a>
			              <a href=sales.php?delete=".$result['id']."&act=show>Удалить</a>
			            </div>
			            <br><br>

						";
					}
				}
				if($_GET['act']=='add'){
					echo "
						<a href=sales.php>Назад</a><br><br>
						<form method=post action=sales.php enctype='multipart/form-data'>
							<input type=text name=name placeholder='Название акции' required><br><br>
							<textarea name=text required rows='6' id=text placeholder='Текст акции'></textarea><br><br>
							<label >Изображение: <input type='file' name='icon' required></label><br><br>
							<input type=submit value='Добавить'>
						</form>
					";
				}
				if(isset($_GET['edit'])){
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
				
				if(!isset($_GET['act'])){
					$query=mysql_query("select count(id) as 'num' from sales") or die(mysql_error());
					$result=mysql_fetch_assoc($query);
					echo"
					<a href=index.php>Назад</a><br>
					<a href=sales.php?act=show>Посмотреть акции [".$result['num']."]</a><br>
					<a href=sales.php?act=add>Добавить акцию</a><br>
					";
				}
			}
		?>
		
	</body>
</html>