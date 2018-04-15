<!DOCTYPE html>
<!--  Establish connection -->
<?php include 'connect_db.php' ?> 
<!-- connection -->	

<html>
 <head>
 	<?php include 'header.php' ?>
 	<link href="css/mainpage.css" rel="stylesheet">
	<title>Library Management System </title>
</head>
<body>
<?php include 'navbar.php' ?>

<?php include 'jumbotron.php' ?>		

<?php include 'sidenav.php' ?>

<div class="container col-lg-9 pull-right">
	<div class="row" id="main">
		<div class="col-lg-12">					
			<div class="thumbnail">
 				<h1><span class="label label-primary"><b><i>Contact</i></b></span></h1>
 				<br/><p> This project is done by <b>Muhammad Arsalan Malik</b> and my NET-ID is <i>mxm162431</i>.
			</div>
		</div>
	</div>
</div>
</div>
<!-- javascript -->
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<?php include 'footer.php' ?>
</body>

</html>
<?php
	//5. Close database connection
	mysqli_close($db);
?>