<div class="container" id="cnt1">
   <div class="row feature">
    <?php
        mysql_connect("localhost", "root","root") or die(mysql_error()); //Connect to server
        mysql_select_db("zabatlyDB") or die("Cannot connect to database"); //Connect to database
        $query = mysql_query("SELECT COUNT(DISTINCT type) AS no FROM types;"); //Query the users table if there are matching rows equal to $username
        $exists = mysql_num_rows($query); //Checks if username exists
        $query2 = mysql_query("SELECT DISTINCT type,id FROM types;");
        $exists2 = mysql_num_rows($query2);
        $row = mysql_fetch_assoc($query);
        $no = $row['no'];
        $count = 0;
        $countDivs = false;
        $j = 0;
          while($row2 = mysql_fetch_assoc($query2)) //display all rows from query
        {
          $j++;
          if($count == 4){

            $count = 0 ;
    ?>
          </div>
          <div class="row feature">
    <?php
            //$contDivs = true;
          }
          $type = $row2['type'];
          $id = $row2['id'];
    ?>
          <div class="col-md-3">
            <div>
                <img src="http://lorempixel.com/200/200/city/1/" alt="Texto Alternativo" class="img-suqare img-thumbnail">
                <h2><a href="quickSearch.php?s=r&type=<?php echo $type;?>&loc=a&name=a"><?php echo $type?></a></h2>

            </div>
          </div>

    <?php
          $count++;
        }
    ?>
   
</div>

<style>
 #cnt1 {            
     background-color:#FFFFFF;
     margin-bottom:70px;
 }
  
 .feature{
     padding: 20px 0;
    text-align: center;
 }
 .feature > div > div{
    padding: 10px;
    border: 1px solid transparent;
    border-radius: 4px;
    transition: 0.2s;
 }
 .feature > div:hover > div{
    margin-top: -10px;
    border: 3px solid #4f77cb;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 5px 5px 5px;
    background: rgba(232, 215, 215, 0.10);
    transition: 0.3s;
 }
</style>