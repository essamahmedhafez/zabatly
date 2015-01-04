<html >
<style>
 #b{
 	background-color:#e2dada;
 }
 #d1{
 	background-color:#4f77cb;
	float: left;
	width:17%;
	margin-left: 8%;
 }
 #d2{
 	margin-top: 50px;
 	margin-right: 3%;
	float: right;
	width: 30%;
 }
  #d3{
  	margin-top: 50px;
 	margin-left: 3%;
	float: left;
	width: 30%;
 }
  #header {            
     background-color:#4f77cb;
     text-align: right;
     height: 100px;
 }
 </style>
	<head>
		<div id="header">
			<div id="d3">
        	 	<?php require_once 'connectworker.php'; ?>  
        	</div>
			<div id="d1">
		        <title>ZABATLY</title>
		        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		        <!-- jQuery library -->
		        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		        <!-- Latest compiled JavaScript -->
		        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		        <div class="header">
	                <a href="home.php"><font size="7" color="white"><b>ZABATLY</b></font></a>
	           
	            </div>
        	</div>
        	<div id="d2">
        	 	<?php require_once 'connect.php'; ?>  
        	</div>
        </div>
	</head>
	<body id="b">
<?php require_once 'style.php'; ?>
<?php require_once 'database.php'; ?>