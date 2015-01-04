<?php require_once 'header.php'; ?>
        <h2>Add location</h2>
        <a href="home.php">Click here to go back</a><br/><br/>
<form class="form-inline" action="addlocation.php" method="POST">   
    <div class="form-group">
        <input type="text" name="place" class="form-control input-sm" placeholder="New Place">
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-sm btn-block">Add Location</button>
    </div></br>
</form>
<?php require_once 'footer.php'; ?>     

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$place = mysql_real_escape_string($_POST['place']);
    $bool = true;
	mysql_connect("localhost", "root","root") or die(mysql_error()); //Connect to server
	mysql_select_db("zabatlyDB") or die("Cannot connect to database"); //Connect to database
	$query = mysql_query("Select * from places"); //Query the users table
	while($row = mysql_fetch_array($query)) //display all rows from query
	{
		$places = $row['place']; // the first username row is passed on to $table_users, and so on until the query is finished
		if($places == $place) // checks if there are any matching fields
		{
			$bool = false; // sets bool to false
			Print '<script>alert("type has been taken!");</script>'; //Prompts the user
			Print '<script>window.location.assign("addtype.php");</script>'; // redirects to register.php
		}
	}
	if($bool) // checks if bool is true
	{
		mysql_query("INSERT INTO places (place) VALUES ('$place')"); //Inserts the value to table users
		Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
		Print '<script>window.location.assign("home.php");</script>'; // redirects to home.php
	}
}
?>
