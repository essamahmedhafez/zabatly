<?php
	session_destroy();
	session_start();
	$email = mysql_real_escape_string($_POST['email']);
	$password = mysql_real_escape_string($_POST['password']);
	mysql_connect("localhost", "root","root") or die(mysql_error()); //Connect to server
	mysql_select_db("zabatlyDB") or die("Cannot connect to database"); //Connect to database
	$query = mysql_query("SELECT * from users WHERE email='$email'"); //Query the users table if there are matching rows equal to $username
	$exists = mysql_num_rows($query); //Checks if username exists
	$table_users = "";
	$table_password = "";
	if($exists > 0) //IF there are no returning rows or no existing username
	{
		while($row = mysql_fetch_assoc($query)) //display all rows from query
		{
			$table_users = $row['email']; // the first username row is passed on to $table_users, and so on until the query is finished
			$table_password = $row['password']; // the first password row is passed on to $table_users, and so on until the query is finished
			$name = $row['name'];
			$uid = $row['id'];
		}
		if(($email == $table_users) && ($password == $table_password)) // checks if there are any matching fields
		{
				if($password == $table_password)
				{
					$_SESSION['user'] = $name; //set the username in a session. This serves as a global variable
					$_SESSION['userid'] = $uid;
					header("location: home.php"); // redirects the user to the authenticated home page
					
				}
				
		}
		else
		{
			Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
			Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
		}
	}
	else
	{
		Print '<script>alert("Incorrect Username!");</script>'; //Prompts the user
		Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
	}
?>