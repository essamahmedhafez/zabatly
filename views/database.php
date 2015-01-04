<?php
	mysql_connect("localhost", "root","root") or die(mysql_error()); //Connect to server
	mysql_select_db("zabatlyDB") or die("Cannot connect to database"); //Connect to database
?>