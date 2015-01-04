<?php require_once 'header.php'; ?>

<form action="registerworker.php" method="POST">
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
                                <input type="text" name="phone" id="phone" class="form-control input-sm" placeholder="Work Number">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone1" id="phone1" class="form-control input-sm" placeholder="Office Number (optional)">
                            </div>
							<div class="form-group">
							<select class="form-control" name="seltype">
							<?php
							    mysql_connect("localhost", "root","root") or die(mysql_error()); //Connect to server
							    mysql_select_db("zabatlyDB") or die("Cannot connect to database"); //Connect to database
							    $query = mysql_query("SELECT * from types"); //Query the users table if there are matching rows equal to $username
							    $exists = mysql_num_rows($query); //Checks if username exists
							    if($exists > 0) //IF there are no returning rows or no existing username
							    {
							    	while($row = mysql_fetch_assoc($query)) //display all rows from query
									{
										$type = $row['type'];
										$typeid = $row['id'];
							?>
									    	<option value=<?php echo $typeid?> ><?php echo $type ?></option>
							<?php
									}
							    }
							?>
					  		</select>
							</div>
							<div class="form-group">
							<select class="form-control" name="sellocation">
							<option value = Egypt>Egypt</option>
							<?php
							    mysql_connect("localhost", "root","root") or die(mysql_error()); //Connect to server
							    mysql_select_db("zabatlyDB") or die("Cannot connect to database"); //Connect to database
							    $query = mysql_query("SELECT * from places"); //Query the users table if there are matching rows equal to $username
							    $exists = mysql_num_rows($query); //Checks if username exists
							    if($exists > 0) //IF there are no returning rows or no existing username
							    {
							    	while($row = mysql_fetch_assoc($query)) //display all rows from query
									{
										$location = $row['place'];
										$locid = $row['id'];
							?>	  	
									    	<option value=<?php echo $locid?>><?php echo $location ?></option>
							<?php
									}
							    }
							?>
										</select>
							</div>

                            <input type="submit" value="registerworker" class="btn btn-info btn-block">
                        </form>
                        	 <a href="home.php">Click here to go back</a><br/><br/>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
        </form>
<?php require_once 'footer.php'; ?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$email = mysql_real_escape_string($_POST['email']);
	$password = mysql_real_escape_string($_POST['password']);
    $username = mysql_real_escape_string($_POST['username']);
    $phone = mysql_real_escape_string($_POST['phone']);
    $phone1 = mysql_real_escape_string($_POST['phone1']);
    $type = mysql_real_escape_string($_POST['seltype']);
    $location = mysql_real_escape_string($_POST['sellocation']);
    $bool = true;
	mysql_connect("localhost", "root","root") or die(mysql_error()); //Connect to server
	mysql_select_db("zabatlyDB") or die("Cannot connect to database"); //Connect to database
	$query = mysql_query("Select * from workers"); //Query the users table
	while($row = mysql_fetch_array($query)) //display all rows from query
	{
		$table_users = $row['email']; // the first username row is passed on to $table_users, and so on until the query is finished
		if($email == $table_users) // checks if there are any matching fields
		{
			$bool = false; // sets bool to false
			Print '<script>alert("email has been taken!");</script>'; //Prompts the user
			Print '<script>window.location.assign("registerworker.php");</script>'; // redirects to register.php
		}
	}
	if($bool) // checks if bool is true
	{
		mysql_query("INSERT INTO workers (name,email,password,typeid,rating) VALUES ('$username','$email','$password','$type',0)"); //Inserts the value to table users
		$query2 = mysql_query("Select * from workers where workers.email = '$email'"); //Query the users table
		$row2 = mysql_fetch_array($query2);
		$i = $row2['id'];
		mysql_query("INSERT INTO workerslocations (location,workerid) VALUES ($location,$i)"); //Inserts the value to table users
		mysql_query("INSERT INTO phones (phone,workerid) VALUES ('$phone',$i)"); //Inserts the value to table users
		mysql_query("INSERT INTO phones (phone,workerid) VALUES ('$phone1',$i)"); //Inserts the value to table users
		Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
		Print '<script>window.location.assign("home.php");</script>'; // redirects to home.php
	}
}
?>
