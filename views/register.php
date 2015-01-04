<?php require_once 'header.php'; ?>
        <form action="register.php" method="POST">
 <div class="container" id="container1">
        <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Please Register</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <div class="form-group">
                                <input type="text" name="username" id="first_name" class="form-control input-sm" placeholder="User Name">
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                            </div>
                             <div class="form-group">
                                <input type="text" name="phone" id="phone" class="form-control input-sm" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <input type="text" name="location" id="location" class="form-control input-sm" placeholder="Location">
                            </div>

                            <input type="submit" value="Register" class="btn btn-info btn-block">
                        </form>
                        	 <a href="home.php">Click here to go back</a><br/><br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<style>
#container1 {
    background-color: #e2dada;
}

.centered-form {
    margin-top: 120px;
    margin-bottom: 120px;
}

.centered-form .panel {
    background: rgba(255, 255, 255, 0.8);
    box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}
</style>
<?php require_once 'footer.php'; ?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$email = mysql_real_escape_string($_POST['email']);
	$password = mysql_real_escape_string($_POST['password']);
    $username = mysql_real_escape_string($_POST['username']);
    $phone = mysql_real_escape_string($_POST['phone']);
    $location = mysql_real_escape_string($_POST['location']);
    $bool = true;
	mysql_connect("localhost", "root","root") or die(mysql_error()); //Connect to server
	mysql_select_db("zabatlyDB") or die("Cannot connect to database"); //Connect to database
	$query = mysql_query("Select * from users"); //Query the users table
	while($row = mysql_fetch_array($query)) //display all rows from query
	{
		$table_users = $row['email']; // the first username row is passed on to $table_users, and so on until the query is finished
		if($email == $table_users) // checks if there are any matching fields
		{
			$bool = false; // sets bool to false
			Print '<script>alert("email has been taken!");</script>'; //Prompts the user
			Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
		}
	}
	if($bool) // checks if bool is true
	{
		mysql_query("INSERT INTO users (name,email,password,phone,location) VALUES ('$username','$email','$password','$phone','$location')"); //Inserts the value to table users
		Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
		Print '<script>window.location.assign("home.php");</script>'; // redirects to register.php
	}
}
?>