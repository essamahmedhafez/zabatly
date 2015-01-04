<?php   
    session_start();
    $userid = $_SESSION['userid'];
    $reviewtext = mysql_real_escape_string($_POST['reviewtext']);
    $rating = mysql_real_escape_string($_POST['rating']);
    $wid = mysql_real_escape_string($_POST['wid']);
    $bool = true;
    $query = mysql_query("Select * from reviews"); //Query the users table
   /* while($row = mysql_fetch_array($query)) //display all rows from query
    {
        $user = $row['userid']; // the first username row is passed on to $table_users, and so on until the query is finished
        if($email == $table_users) // checks if there are any matching fields
        {
            $bool = false; // sets bool to false
            Print '<script>alert("email has been taken!");</script>'; //Prompts the user
            Print '<script>window.location.assign("registerworker.php");</script>'; // redirects to register.php
        }
    }*/
    if($bool) // checks if bool is true
    {
        mysql_connect("localhost", "root","root") or die(mysql_error()); //Connect to server
        mysql_select_db("zabatlyDB") or die("Cannot connect to database"); //Connect to database
        
        mysql_query("INSERT INTO reviews (review,workerid,userid) VALUES ('$reviewtext',$wid,$userid)"); //Inserts the value to table users
        mysql_query("INSERT INTO ratings (rating,workerid,userid) VALUES ('$rating',$wid,$userid)"); //Inserts the value to table users
        Print '<script>alert("Successfully reviewed!");</script>'; // Prompts the user
    }
?>

<html>
<script type="text/javascript">
    window.location.assign("profile.php?id=<?php echo $wid?>");
</script>
</html>