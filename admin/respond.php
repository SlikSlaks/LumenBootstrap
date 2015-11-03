<?php session_start(); ?>
<?php include("../connect.php"); ?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Lumen-Optika</title>
	<link rel="shortcut icon" type="image/x-icon" href="../assets/favicon.ico">
		<link rel="stylesheet" type="text/css" href="../css/custom.css">
	</head>
	<body>
		<?php 
			if($_POST['login']=='admin' && $_POST['password']=='admin'){
				$_SESSION['auth']=true;
			} 
			if($_SESSION['auth']){

				if(isset($_GET['delete'])){
					$query=mysql_query("delete from responds where id='".mysql_escape_string($_GET['delete'])."'") or die(mysql_error());
				}

				if(isset($_GET['allow'])){
					$query=mysql_query("UPDATE responds SET allowed='1' where id='".mysql_escape_string($_GET['allow'])."'") or die(mysql_error());
				}

				if(!isset($_GET['allowed'])){
					$query=mysql_query("select count(id) as 'num' from responds where allowed='0'") or die(mysql_error());
					$result=mysql_fetch_assoc($query);
					$allowed[0]=$result['num'];
					$query=mysql_query("select count(id) as 'num' from responds where allowed='1'") or die(mysql_error());
					$result=mysql_fetch_assoc($query);
					$allowed[1]=$result['num'];

					echo"
					<a href=index.php>Назад</a><br>
					<a href=respond.php?allowed=1>Одобренные отзывы [".$allowed[1]."]</a><br>
					<a href=respond.php?allowed=0>Непросмотренные отзывы [".$allowed[0]."]</a><br>
					";
				}else{
					echo"
						<a href=respond.php>Назад</a><br>
					";

					$query=mysql_query("select* from responds where allowed='".mysql_escape_string($_GET['allowed'])."'") or die(mysql_error());
					while($result=mysql_fetch_assoc($query)){
						echo"
						<div>
							<div>$result[name]</div>
							<div>$result[time]</div>
							<div>$result[text]</div>
							<a href=respond.php?delete=$result[id]&allowed=".$_GET['allowed'].">Удалить</a>
						";

						if(!$_GET['allowed']){
							echo"
								<a href=respond.php?allow=$result[id]&allowed=".$_GET['allowed'].">Одобрить</a>
							";
						}
					}

				}
			} 
		?>
		
	</body>
</html>