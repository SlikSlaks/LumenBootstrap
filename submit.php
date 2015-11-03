<?PHP 
include("connect.php");

$location = "result.php";


$query=mysql_query("INSERT into responds (`name`, `text`) values ('".mysql_escape_string($_POST['contactname'])."','".mysql_escape_string($_POST['message'])."')") or die(mysql_error());

    header ("Location:$location"); 


?>