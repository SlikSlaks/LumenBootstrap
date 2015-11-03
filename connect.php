<?php
    $db = mysql_connect ('localhost','root','');
    mysql_select_db('lumen_optika',$db);
    mysql_query('SET NAMES utf8	',$db);          
    mysql_query('SET CHARACTER SET utf8	',$db);  
    mysql_query('SET COLLATION_CONNECTION="utf8_general_ci"',$db);

