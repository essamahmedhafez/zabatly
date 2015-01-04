<?php require_once 'header.php'; ?>
<?php require_once 'style.php'; ?>
<?php require_once 'connect.php'; ?>  

<?php
if(isset($_GET["id"]))
    {
        $wid = $_GET["id"];
    }
    mysql_connect("localhost", "root","root") or die(mysql_error()); //Connect to server
    mysql_select_db("zabatlyDB") or die("Cannot connect to database"); //Connect to database
    $query = mysql_query("SELECT * from workers INNER JOIN types ON workers.typeid=types.id WHERE workers.id='$wid'"); //Query the users table if there are matching rows equal to $username
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
            <span class="text-muted">Rating: <img src="../images/Stars2/<?php echo $rating;?>.png"></span></br>
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
</br>
</div>

<div class="container">
    <div id="review">

<form class="form" action="review.php" method="POST">   
<input type="hidden" name="wid" id="wid" value=<?php echo $workersid?> />
 <fieldset class="rating" name="rating">
    <legend>Reviews:</legend>
    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
</fieldset>
</br>
    <div class="form-group">
        <input type="text" name="reviewtext" id="reviewtext" class="form-control input-sm" placeholder="Write your review here">
    </div>

</br>
 <input type="submit" value="review" class="btn btn-info btn-block">
</br>
</form>
        <div class="ibox float-e-margins">
           <div class="ibox-title">
           </br>
              <h5>Read below reviews:</h5>
               </div>
               <?php
                mysql_connect("localhost", "root","root") or die(mysql_error()); //Connect to server
                mysql_select_db("zabatlyDB") or die("Cannot connect to database"); //Connect to database
                $queryReviews = mysql_query("SELECT * from reviews
                    INNER JOIN users on users.id = reviews.userid
                    INNER JOIN ratings on users.id = ratings.userid
                    WHERE ratings.workerid=$workersid"); //Query the users table if there are matching rows equal to $username
                while($row4 = mysql_fetch_assoc($queryReviews)) //display all rows from query
                {
                    $review = $row4['review'];
                    $rating = $row4['rating'];
                    $user = $row4['name'];
                    $rimage = "../images/Stars2/0.png";
                    switch ($rating) {
                        case "0":
                            $rimage = "../images/Stars2/0.png";
                            break;
                        case "1":
                            $rimage = "../images/Stars2/1.png";
                            break;
                        case "2":
                            $rimage = "../images/Stars2/2.png";
                            break;
                        case "3":
                            $rimage = "../images/Stars2/3.png";
                            break;
                        case "4":
                            $rimage = "../images/Stars2/4.png";
                            break;
                        case "5":
                            $rimage = "../images/Stars2/5.png";
                            break;
                        default:
                            $rimage = "../images/Stars2/5.png";
                            break;
                    }
               ?>
               <div class="ibox-content no-padding">
                  <ul class="list-group">
                     <li class="list-group-item">
                        <p><a class="text-info" href="#">@<?php echo "$user";?> </a><?php echo "$review";?></p>
                        <img  src="<?php echo $rimage;?>">
                     </li>
                  </ul>
               </div>
               <?php
                }
               ?>
            </div>
    </div>
</div>

           




<?php require_once 'footer.php'; ?>            