<!DOCTYPE html>
<!--  Establish connection -->
<?php include 'connect_db.php' ?> 
<!-- connection -->	
<?php 
	$card_id = $_GET['card_id'];

	$query = "SELECT * FROM book_loans WHERE card_id = '".$card_id."'  AND date_in IS NULL  ";
	
	mysqli_query($db, $query) or die('Error querying database.');

	$result = mysqli_query($db, $query);
	
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
			<h1><span class="label label-primary"><b><i> Books currently checked out for Card #</i></b></span> <?php echo $card_id ?></h1><br/>	
			<?php if($result->num_rows > 0)
				{ ?>
					 <table class="table table-striped">
					 <thead><td><b>CARD ID</b></td><td><b>ISBN</b></td><td><b>CHECK OUT DATE</b></td><td><b>DUE DATE</b></td></thead>
					 <?php 		 while($row=mysqli_fetch_array($result)) { ?>
					 <tbody>
						<tr>
							<td><?php echo $row['card_id'] ?></td><td><?php echo $row['isbn'] ?></td><td><?php echo $row['date_out'] ?></td><td><?php echo $row['due_date'] ?></td>
							</tr> 

					  
					  <?php } } else { echo "<h3>There are no books checked out for card # " .$card_id ."</h3>"; }
					  ?></tbody></table><br><br>
					  <form action="Borroweraccount.php" style="text-align: center;">
				<button type="" class="btn btn-primary btn-lg" >
				Search Other Borrowers
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