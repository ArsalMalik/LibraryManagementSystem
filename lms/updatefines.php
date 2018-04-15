<!DOCTYPE html>
<!--  Establish connection -->
<?php include 'connect_db.php' ?> 
<!-- connection -->	
<?php 
	
	$card_id = $_GET['card_id'];

	$query = "UPDATE fines SET paid = 1 ";
	$query.= "WHERE loan_id IN ";
	$query.= "(SELECT loan_id FROM book_loans ";
	$query.= "WHERE date_in IS NOT NULL AND card_id = '" . $card_id ."') ";
	
	$result = mysqli_query($db, $query) or die('Error querying database.');


	
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
			<h1><span class="label label-primary"><b><i> Fines </i></b></span></h1><br/>	
			<table class="table table-striped">
			 <?php if(mysqli_affected_rows($db) > 0)
			 { ?>
			  	<?php echo "<td>Fines successfully paid for Card #: " . $card_id ; ?></td>
			  
			  <?php  } else {
			  	echo "<td> Uh-oh! Fines cannot be paid unless all books are returned! <br> Make Sure all books are returned by Card #: " . $card_id." before accepting the fines" ; }?></td>
			  	</table>
			  	<form action="fines.php" style="text-align: center;">
				<button type="" class="btn btn-primary btn-lg" >
				Go to fines 
				</button>
			</form>	
			</div>
		</div>
	</div>
</div></div>

<!-- javascript -->
<script src="js/bootstrap.min.js"></script>
<?php include 'footer.php' ?>
</body>

</html>
<?php
	//5. Close database connection
	mysqli_close($db);
?>