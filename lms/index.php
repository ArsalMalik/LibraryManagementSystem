<!DOCTYPE html>
<!--  Establish connection -->
<?php include 'connect_db.php' ?> 
<!-- connection -->	
<?php 
	$query = "SELECT * FROM authors ORDER BY name";
	
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
			<h1><span class="label label-primary"><b><i> Authors </i></b></span></h1><br/>	
			
			<?php while ($row = mysqli_fetch_array($result)) { ?> 
			 <table class="table table-striped">
			 <thead></thead>
			 <tbody>
			  	<tr><td><?php echo "<a href='show.php?author_id=".$row['author_id']. "'>" . $row['name'] . "<br /> "; ?></a> </td></tr>
			  </tbody>
			  </table>	
			<?php	} ?> 
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