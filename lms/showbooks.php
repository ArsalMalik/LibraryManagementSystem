<!DOCTYPE html>
<!--  Establish connection -->
<?php include 'connect_db.php' ?> 
<!-- connection -->	

<?php 

 		$Books = "SELECT * from books";
		
		mysqli_query($db, $Books) or die('Error querying database.');			
		
		$result = mysqli_query($db, $Books);
		
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
			<h1><span class="label label-primary"><b><i> Books </i></b></span></i></b></h1>
			<br/>	

			<?php while ($row = mysqli_fetch_array($result)) { ?> 
				 <table class="table table-striped">
				 <thead></thead>
				 <tbody>
				  	<tr><td><?php echo "<a href='book.php?isbn=".$row['isbn'] . "'>" . $row['title'] . "<br /> "; ?></a></td></tr>
				 </tbody>
				 </table>
			<?php } ?> 
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