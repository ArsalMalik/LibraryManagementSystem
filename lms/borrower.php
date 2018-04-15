<!DOCTYPE html>
<!--  Establish connection -->
<?php include 'connect_db.php' ?> 
<!-- connection -->	
<?php 
	
	$isbn = $_GET['isbn'];

	$query = "SELECT * FROM authors ORDER BY name LIMIT 20";
	
	mysqli_query($db, $query) or die('Error querying database.');

	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_array($result);


 ?>
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
				<div class="row">
					<div class="col-lg-6">
						<h3>Existing Member?</h3>
						<br><br>
							<form action="checkout.php" method="GET">
				  				<div class="form-group">
				    				<label class="">Borrowers Card Number: </label>
									    <div class="row">
									    	<div class="col-lg-4">
									    		<input type="" name="cardid" class="form-control" placeholder="Card # = e.g ID0000id" title="Card #: ID0000id" maxlength="8" pattern="ID[0-9]{6}" required>
									    		<input type="hidden" name="isbn" value="<?php echo $isbn ?>" >
									  		</div>
									  	</div><br>
									  	<div class="row">
									    	<div class="col-lg-4">
									  			<button type="submit" class="btn btn-primary">Check Out</button>
									    	</div>
										</div>
								</div>
							</form>		
					</div>
							
					<div class="row">
						<div class="col-lg-6 pull-right">
							<h3>New Member?</h3>
							<br><br>
							<form action="new_borrower.php" method="GET">
				  				<div class="form-group">
				   					<button type="submit" class="btn btn-primary btn-lg">Create New Borrower</button>
								</div>
							</form>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div></div>
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