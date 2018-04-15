<!DOCTYPE html>
<!--  Establish connection -->
<?php include 'connect_db.php' ?> 
<!-- connection -->	
<?php 
	$card_id = $_GET['card_id'];

	$query = "SELECT card_id, bname, ssn, address FROM borrowers WHERE card_id = '".$card_id."'  ";
	
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
			 <?php if($row)
			 { ?>
			  	<tr><td><?php echo "<b>Card #: </b>" . $row['card_id'] . "</td></tr><tr><td><b>Name: </b>" . $row['bname'] . "</td></tr><tr><td><b>SSN#: </b>" . $row['ssn'] . "</td></tr><tr><td><b>Address: </b>" . $row['address']  ; ?></td></tr>
			  
			  <?php 
			  	echo "<form action='checkin.php' method='GET'><tr><td><h4><button type='submit' class='btn btn-primary'>See checked out Books</button></h4></td></tr>";
			  		?> <input type="hidden" name="card_id" value="<?php echo $card_id ?>" ></form> 
			 <?php } else { 
			 			echo "The account doesn't exist!"; ?>
			  		<br><br><form style="text-align: center;">
			  			<input class="btn btn-lg btn-primary" type="button" value="Create New Borrower" onclick="location.href = 'new_borrower.php';" />
			  			</form>	
			<?php  } ?>
			  </tbody></table>
			   
			   <form style="text-align: center;">
				<input class="btn btn-lg btn-primary" type="button" value="Back" onclick="window.history.back()" /> 
			  </form>	
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