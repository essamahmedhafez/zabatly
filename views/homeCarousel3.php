<?php
    mysql_connect("localhost", "root","root") or die(mysql_error()); //Connect to server
    mysql_select_db("zabatlyDB") or die("Cannot connect to database"); //Connect to database
    $query = mysql_query("SELECT * from workers INNER JOIN types ON workers.typeid=types.id WHERE workers.id='3'"); //Query the users table if there are matching rows equal to $username
    $exists = mysql_num_rows($query); //Checks if username exists
    if($exists > 0) //IF there are no returning rows or no existing username
    {
        $row = mysql_fetch_assoc($query);
        $workersid = $row['id'];
        $image_url = $row['image'];
        $name = $row['name'];
        $type = $row['type'];
        $rating = $row['rating'];
    }

?>

<div class="container">
    <div class="summary">
        <img class="pull-left" src="<?php echo $image_url;?>" height="300" width="250">
        <h2 class="summary-heading">Name: <?php echo $name;?></br>
            <span class="text-muted">Type: <?php echo $type;?></span> </br>
            <span class="text-muted">Rating:<img src="../images/Stars2/<?php echo $rating;?>.png"></span> </br>
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