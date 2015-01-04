<?php require_once 'header.php'; ?>
        <h2>Login Page</h2>
        <a href="home.php">Click here to go back</a><br/><br/>
        <form action="checklogin.php" method="POST">
           Enter email: <input type="text" name="email" required="required" /> &nbsp
           Enter password: <input type="password" name="password" required="required" />
           <input type="submit" value="Login"/>
        </form>
<?php require_once 'footer.php'; ?>     