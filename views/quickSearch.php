<?php require_once 'header.php'; ?>
<?php require_once 'connect.php'; ?>
<?php require_once 'search.php'; ?>

<?php
        $typevalue = $_GET["type"];
        $locvalue = $_GET["loc"];
		$workername = $_GET["name"];
		$sort = $_GET["s"];

	mysql_connect("localhost", "root","root") or die(mysql_error()); //Connect to server
    mysql_select_db("zabatlyDB") or die("Cannot connect to database"); //Connect to database
    $q = mysql_query("SELECT * from types where types.type = '$typevalue'");
    $r = mysql_fetch_assoc($q);
    $typeid = $r['id'];
/*
    if(strcmp("a",$locvalue) == 0){
    	$query = mysql_query("SELECT * from workers 
    								INNER JOIN types ON workers.typeid=types.id 
    								INNER JOIN phones on phones.workerid = workers.id
    								WHERE workers.typeid = $typeid");
    }else{
*/
    	if(strcmp("l",$sort) == 0 ){
    		$query = mysql_query("SELECT * from workers 
							INNER JOIN types ON workers.typeid=types.id 
							INNER JOIN workerslocations on workerslocations.workerid = workers.id
							INNER JOIN places on places.id = workerslocations.location
							INNER JOIN phones on phones.workerid = workers.id
							WHERE workers.typeid = $typeid ORDER BY places.id DESC");
    	}else{
    		if(strcmp("r",$sort) == 0 ){
    			$query = mysql_query("SELECT * from workers 
							INNER JOIN types ON workers.typeid=types.id 
							INNER JOIN phones on phones.workerid = workers.id
							WHERE workers.typeid = $typeid ORDER BY workers.rating DESC");
    		}else{
    			$query = mysql_query("SELECT * from workers 
							INNER JOIN types ON workers.typeid=types.id 
							INNER JOIN phones on phones.workerid = workers.id
							WHERE workers.typeid = $typeid ORDER BY workers.rating ASC");
    		}
    	}
    //}

    
    $exists = mysql_num_rows($query); //Checks if username exists
	if($exists > 0) //IF there are no returning rows or no existing username
    {
    	$a = array();
    	$bool = true;
    	while($row = mysql_fetch_assoc($query)) //display all rows from query
		{
				if($bool){
				$bool = false;


?>
<div class="btn-group btn-group-sm" role="group" aria-label="...">
			  <a href="quickSearch.php?s=l&type=<?php echo $row['type'];?>&loc=<?php echo $locvalue;?>&name=<?php echo $workername;?>" role="button" class="btn btn-default">Location</a>
			  <a href="quickSearch.php?s=b&type=<?php echo $row['type'];?>&loc=<?php echo $locvalue;?>&name=<?php echo $workername;?>" role="button" class="btn btn-default">Best match</a>
			  <a href="quickSearch.php?s=r&type=<?php echo $row['type'];?>&loc=<?php echo $locvalue;?>&name=<?php echo $workername;?>" role="button" class="btn btn-default">Rating</a>
</div>
<?php
			}
			$workersid = $row['workerid'];
			if(array_search($workersid, $a) !== false ){

			}else{
				array_push($a,$workersid);

?>

			<div class="container">
		    <div class="summary">
	    	    <a href="profile.php?id=<?php echo $workersid?>"><img class="pull-left" src="<?php echo $row['image'];?>" height="300" width="250"></a>
	        	<h2 class="summary-heading">Name: <?php echo $row['name'];?></br>
	        	<span class="text-muted">Type: <?php echo $row['type'];?></span> </br>
	        	<span class="text-muted">Rating:<img src="../images/Stars2/<?php echo $row['rating'];?>.png"></span> </br>
	        	<span class="text-muted">Locations: </span>
	        	<?php
		            mysql_connect("localhost", "root","root") or die(mysql_error()); //Connect to server
		            mysql_select_db("zabatlyDB") or die("Cannot connect to database"); //Connect to database
		    
		            $queryLocations = mysql_query("SELECT * from workerslocations 
													INNER JOIN places on places.id = workerslocations.location
										            WHERE workerid=$workersid"); //Query the users table if there are matching rows equal to $username
		                while($row2 = mysql_fetch_assoc($queryLocations)) //display all rows from query
		                {
		                    $location = $row2['place'];
	            ?>
	            <span class="text-muted"><?php echo $location;?></span> &nbsp
		        <?php
   	            		}
       			?>
        		</br>
        		 <span class="text-muted">phones: </span>
				        <?php
				        mysql_connect("localhost", "root","root") or die(mysql_error()); //Connect to server
				        mysql_select_db("zabatlyDB") or die("Cannot connect to database"); //Connect to database

				        $queryPhones = mysql_query("SELECT * from phones WHERE workerid=$workersid"); //Query the users table if there are matching rows equal to $username
				            while($row3 = mysql_fetch_assoc($queryPhones)) //display all rows from query
				            {
				                $phone = $row3['phone'];
				        ?>
				        <span class="text-muted"><?php echo $phone;?></span> &nbsp
				        <?php
				            }
				        ?>
				        <p class="lead"></p>
				    </h2>
				</div>
				</div>
<?php
}
		}

    }else{

    }

?>
<?php require_once 'footer.php'; ?>