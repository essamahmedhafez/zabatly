<?php require_once 'header.php'; ?>
        <h2>Add type</h2>
        <a href="home.php">Click here to go back</a><br/><br/>
<form class="form-inline" action="addtype.php" method="POST">   
    <div class="form-group">
        <input type="text" name="type" class="form-control input-sm" placeholder="Type">
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-sm btn-block">Add type</button>
    </div></br>
</form>
<?php require_once 'footer.php'; ?>     

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$type = mysql_real_escape_string($_POST['type']);
    $bool = true;
	mysql_connect("localhost", "root","root") or die(mysql_error()); //Connect to server
	mysql_select_db("zabatlyDB") or die("Cannot connect to database"); //Connect to database
	$query = mysql_query("Select * from types"); //Query the users table
	while($row = mysql_fetch_array($query)) //display all rows from query
	{
		$types = $row['type']; // the first username row is passed on to $table_users, and so on until the query is finished
		if($types == $type) // checks if there are any matching fields
		{
			$bool = false; // sets bool to false
			Print '<script>alert("type has been taken!");</script>'; //Prompts the user
			Print '<script>window.location.assign("addtype.php");</script>'; // redirects to register.php
		}
	}
	if($bool) // checks if bool is true
	{
		mysql_query("INSERT INTO types (type) VALUES ('$type')"); //Inserts the value to table users
		Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
		Print '<script>window.location.assign("home.php");</script>'; // redirects to home.php
	}
}
?>
