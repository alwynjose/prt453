<?php
########## MySql details (Replace with yours) #############
$username = "root"; //mysql username
$password = ""; //mysql password
$hostname = "localhost"; //hostname
$databasename = 'mfs'; //databasename

$connection = mysql_connect($hostname, $username, $password)or die('could not connect to database');
mysql_select_db($databasename,$connection);

?>