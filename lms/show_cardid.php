<!DOCTYPE html>
<!--  Establish connection -->
<?php include 'connect_db.php' ?> 
<!-- connection -->	
<?php 
	$ssn = $_GET['ssn'];

	$query = "SELECT card_id, bname, address FROM borrowers WHERE ssn = '".$ssn."'  ";
	
	mysqli_query($db, $query) or die('Error querying database.');

	$result = mysqli_query($db, $query);
	$row=mysqli_fetch_assoc($result);

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
			<h1><span class="label label-primary"><b><i> Account Details </i></b></span></h1><br/>	
			
			 <table class="table table-striped">
			 <thead></thead>
			 <tbody>
			  	<tr><td><?php echo "<b>Card #: </b>" . $row['card_id'] . "</td></tr><tr><td><b>Name: </b>" . $row['bname'] . "</td></tr><tr><td><b>Address: </b>" . $row['address'] ; ?></td></tr>
			  </tbody>
			  </table>
			  <form action="showbooks.php" style="text-align: center;">
				<button type="" class="btn btn-primary btn-lg" >
				Browse Books 
				</button>
			</form>	
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