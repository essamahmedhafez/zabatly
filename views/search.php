<div id="frame3">
		<form class="form-inline" action="doSearch.php" method="POST">
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
		    	<option value=<?php echo $location?>><?php echo $location ?></option>
<?php
		}
    }
?>
			</select>
		</div>
		<div class="form-group">
			<input type="text" name="workername" id="search" class="form-control input-sm" placeholder="Worker name">
		</div>
		<div class="form-group">
			<input type="submit" value="Search" class="btn btn-info btn-sm">
	    </div>
	    </form>
</div>
