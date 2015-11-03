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
				$query=mysql_query("select* from staff where id='".mysql_escape_string($_GET['id'])."'");
				$result=mysql_fetch_assoc($query);
				echo"
					<form method=post enctype='multipart/form-data' action=edit.php>
					<input placeholder=title name=name required value=".$result['name']."><br><br>
					<input placeholder=author name=author required value=".$result['producer']."><br><br>
					<input placeholder=genre name=genre required value=".$result['genre']."><br><br>
					<textarea placeholder=description name=description required>".$result['description']."</textarea><br><br>
					<input placeholder=price name=price required value=".$result['price']."><br><br>
					<input placeholder=amount name=amount required value=".$result['amount']."><br><br>
					<input placeholder=article name=article required value=".$result['article']."><br><br>
					<label >Icon: <input type='file' name='icon'></label><br><br>
					<input type=hidden name=oldicon value=".$result['icon'].">
					<input type=hidden name=id value=".$result['id'].">
					<input type=submit value=submit><br><br>
					</form>";
			}else{
				if(isset($_POST['name'])){
					$icon=mysql_real_escape_string($_FILES['icon']['name']);
					if($icon){
		  				if(is_uploaded_file($_FILES["icon"]["tmp_name"]))
		  					 move_uploaded_file($_FILES["icon"]["tmp_name"], "../assets/".$_FILES["icon"]["name"]);
		  				else
		   					die("Ошибка загрузки файла");
	   				}else{
	   					$icon=mysql_escape_string($_POST['oldicon']);
	   				}
	  				$desc=mysql_query("UPDATE staff SET `name`='".mysql_escape_string($_POST['name'])."',`price`='".mysql_escape_string($_POST['price'])."',`producer`='".mysql_escape_string($_POST['author'])."',`amount`='".mysql_escape_string($_POST['amount'])."',`genre`='".mysql_escape_string($_POST['genre'])."',`icon`='".$icon."',`description`='".mysql_escape_string($_POST['description'])."',`article`='".mysql_escape_string($_POST['article'])."' where id='".mysql_escape_string($_POST['id'])."' ")or die(mysql_error());
					echo"All right!";
				}
				$query=mysql_query("select* from staff");
				while($result=mysql_fetch_assoc($query)){//ассоциативный массив
					echo " 
					<a href=edit.php?id=".$result['id'].">
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