<!DOCTYPE html>
<!--  Establish connection -->
<?php include 'connect_db.php' ?> 
<!-- connection -->	

<?php 
 		$isbn = $_GET['isbn'];

 		$query1 = "SELECT title from books WHERE isbn = $isbn";
		
		$query2 = "SELECT a.isbn AS isbn, a.title AS title, ";
		$query2 .= "GROUP_CONCAT(c.name ORDER BY c.name ASC SEPARATOR ', ')";
		$query2 .= "AS authors from books a, book_authors b, authors c ";
		$query2 .= "WHERE a.isbn = b.isbn AND b.author_id = c.author_id AND a.isbn = $isbn ";

		$query3 = "SELECT * FROM book_loans WHERE isbn = $isbn AND date_in IS NULL ";

		mysqli_query($db, $query1) or die('Error querying database.');			
		mysqli_query($db, $query2) or die('Error querying database.');
		mysqli_query($db, $query3) or die('Error querying database.');			

		$result = mysqli_query($db, $query1);
		$result2 = 	mysqli_query($db, $query2);
		$result3 = 	mysqli_query($db, $query3);
		
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
			<h1><span class="label label-primary"><b><i>Book: <?php while ($title = mysqli_fetch_array($result))
					{ echo $title['title'];} ?></i></b></span></h1>
			<br/>	

			<?php while ($row = mysqli_fetch_array($result2)) { ?> 
			<table class="table table-striped">
	    	<thead></thead>
	    	<tbody>
	    	<tr><td><?php echo "<b>ISBN</b>: " . $row['isbn'] . "</td></tr>" . "<tr><td><b>BOOK</b>: " . $row['title'] . "</td></tr>" . "<tr><td><b>AUTHOR(s)</b>: " . $row['authors']. "</td></tr>" . "<tr><td><b>AVAILABILITY</b>: "; 
	    	if ($result3 -> num_rows ==0) 
	    	{ 
	    		echo "Available to check out"; ?>
	    		<tr><td><form action="borrower.php" method="GET" style="text-align: center;">
					<input type="hidden" name="isbn" value="<?php echo $isbn; ?>" >
					<button type="submit" class="btn btn-primary btn-lg" >
					Check Out 
					</button>
				</form></td></tr>
	    <?php	} else { 
	    		echo "Not Available - Already Checked Out"?></td></tr>
			<?php } } ?>
					 
			
				</tbody>

			</table>
			</div>
		</div>
	</div>
</div></div>
<?php include 'footer.php' ?>
<!-- javascript -->
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php
	//5. Close database connection
	mysqli_close($db);
?>