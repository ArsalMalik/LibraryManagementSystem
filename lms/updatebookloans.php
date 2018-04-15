<!DOCTYPE html>
<!--  Establish connection -->
<?php include 'connect_db.php' ?> 
<!-- connection -->	
<?php 
	$card_id = $_GET['card_id'];
	$isbn = $_GET['isbn'];
	

	$query = "UPDATE book_loans SET date_in=now() ";
	$query.= "WHERE card_id ='". $card_id ."' AND isbn = '". $isbn ."' ";
	
	mysqli_query($db, $query) or die('Error querying database.');

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
				
			<?php if(mysqli_query($db, $query) )
					{
						echo "<h1><span class='label label-primary'><b><i>Book succesfully checked in!</i></b></span><br/>";
					}
					else 
					{
						echo "Book can't be checked in at this time. Please try again later!";
					
			  } ?>
			  <form action="searchcheckin.php" style="text-align: center;">
				<button type="" class="btn btn-primary btn-lg" >
				Search Again  
				</button>
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