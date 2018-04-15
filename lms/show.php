<!DOCTYPE html>
<!--  Establish connection -->
<?php include 'connect_db.php' ?> 
<!-- connection -->	

<?php 
 		$author = $_GET['author_id'];

 		$authorname = "SELECT name from authors WHERE author_id = $author";
		$query = "SELECT c.isbn AS isbn, c.title AS title FROM authors a, ";
		$query .= "book_authors b, books c WHERE a.author_id = b.author_id "; 
		$query .= "AND b.isbn = c.isbn AND a.author_id = $author ";
 
		mysqli_query($db, $authorname) or die('Error querying database.');			
		mysqli_query($db, $query) or die('Error querying database.');

		$result = mysqli_query($db, $query);
		$result2 = 	mysqli_query($db, $authorname);
		
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
			<h1><span class="label label-primary"><b><i> Author: <?php while ($author = mysqli_fetch_array($result2))
					{ echo $author['name'];} ?></i></b></span></h1>
			<br/>	

			
				 <table class="table table-striped">
				 <thead><tr><td><b>Book Title(s)</b></td></tr></thead>
				
				 <tbody> 
				<?php while ($row = mysqli_fetch_array($result)) { ?> 
				  	<tr><td><?php echo "<a href='book.php?isbn=".$row['isbn'] . "'>" . $row['title']; ?></td></tr>
				  
			<?php } ?></tbody></table>	 
			</div>
		</div>
	</div></div>
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