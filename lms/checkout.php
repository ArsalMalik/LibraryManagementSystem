<!DOCTYPE html>
<!--  Establish connection -->
<?php include 'connect_db.php' ?> 
<!-- connection -->	
<?php 

	$card = $_GET['cardid'];
	$isbn = $_GET['isbn'];
	
	$querychk = "SELECT * FROM  book_loans WHERE card_id = '".$card."' ";
	$numofrows = mysqli_query($db, $querychk) or die('Error querying database.');

	$querychk2 = "SELECT * FROM  book_loans WHERE isbn = '".$isbn."' AND date_in IS NULL ";
	$numofrows2 = mysqli_query($db, $querychk2) or die('Error querying database.');

	$querychk3 = "SELECT * FROM borrowers WHERE card_id = '".$card."' ";
	$numofrows3 = mysqli_query($db, $querychk3) or die('Error querying database');

	
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
				<h1><span class="label label-primary"><b><i> Check Out </i></b></span></h1><br/>
					<?php 
						if($numofrows3 -> num_rows > 0)
						{
							if($numofrows2 -> num_rows == 0)
							{
								if($numofrows -> num_rows < 3)
								{
									$query = "INSERT INTO book_loans(isbn, card_id) ";
									$query.= "VALUES ('$isbn', '$card') ";

									mysqli_query($db, $query) or die('Error querying database.');

									echo "<h3>Book successfully checked Out!</h3>";
									echo "<table class='table table-striped'><thead></thead><tbody><tr><td>Book ISBN: " . $isbn .  "</td></tr><tr><td>Borrower's Card #: " . $card . "</td></tr></tbody></table>";
								}	
								elseif($numofrows -> num_rows >= 3){ 
									echo "You already have the maximum number of books, i.e 3, checked out!"; 
								} 	
							} else {
								echo "This Book is already checked out!";
							} 
						} else {
							echo "The Card Number doesn't exist!" ;
							echo "<br><br><h4><span class='alert alert-danger'><a href='new_borrower.php'>Create New account</a></span><h4>";
									 
						} ?>
			</div>
			<form action="showbooks.php" style="text-align: center;">
				<button type="submit" class="btn btn-primary btn-lg" >
				Browse Books 
				</button>
			</form>
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