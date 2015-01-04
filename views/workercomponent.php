<?php
    mysql_connect("localhost", "root","root") or die(mysql_error()); //Connect to server
    mysql_select_db("zabatlyDB") or die("Cannot connect to database"); //Connect to database
    $query = mysql_query("SELECT * from workers WHERE id='1'"); //Query the users table if there are matching rows equal to $username
    $exists = mysql_num_rows($query); //Checks if username exists
    if($exists > 0) //IF there are no returning rows or no existing username
    {
        $row = mysql_fetch_assoc($query);
        $image_url = $row['image'];
        $name = $row['name'];
        $type = $row['type'];
        $rating = $row['rating'];
    }
?>

<div class="container">
    <div class="summary">
        <img class="pull-left" src="<?php echo $image_url;?>" height="300" width="250">
        <h2 class="summary-heading"><?php echo $name;?></br>
            <span class="text-muted"><?php echo $type;?></span> </br>
            <span class="text-muted"><?php echo $rating;?></span> </br>
            <p class="lead"></p>
        </h2>
    </div>
</div>