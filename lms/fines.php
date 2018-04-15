<!DOCTYPE html>
<!--  Establish connection -->
<?php include 'connect_db.php' ?> 
<!-- connection -->	
<?php 
	$query = "INSERT INTO fines(loan_id, fine_amt) ";
	$query.= "SELECT loan_id, (date_in-due_date)*0.25 AS fineamt ";
	$query.= "FROM book_loans ";
	$query.= "WHERE date_in IS NOT NULL AND date_in>due_date ";
	$query.= "UNION ";
	$query.= "SELECT loan_id, (CURRENT_DATE-due_date) * 0.25 AS fineamt ";
	$query.= "FROM book_loans ";
	$query.= "WHERE date_in IS NULL AND CURRENT_DATE>due_date ";
	$query.= "ON DUPLICATE KEY UPDATE fine_amt = VALUES(fine_amt) ";
	
	mysqli_query($db, $query) or die('Error querying database.');


	$query2 = "SELECT b.card_id AS card, SUM(a.fine_amt) AS total_fine ";
	$query2.= "FROM book_loans b, fines a ";
	$query2.= "WHERE a.loan_id = b.loan_id AND a.paid = 0 ";
	$query2.= "GROUP BY card_id";

	$result = mysqli_query($db, $query2) or die('Error querying database.');
	
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
			
			 <table class="table table-striped" style="text-align: center;">
			 <thead><td><b>Card # </b></td><td><b>Total Fine Due</b></td></thead>
			 <tbody>
			 <?php while($row=mysqli_fetch_array($result))
			 { ?>
			  	<tr><td><a href="showprofile.php?card_id=<?php echo $row['card'] ?>"><?php echo $row['card'] . "</a></td><td>" . $row['total_fine'] ; ?>$</td>
			  
			  <?php 
			  	echo "<form action='updatefines.php' method='GET'><td><h4><button type='submit' class='btn btn-primary'>Fine Paid?</button></h4></td></tr>";
			  	?> <input type="hidden" name="card_id" value="<?php echo $row['card'] ?>" ></form>
			<?php  }  ?>
			  </tbody></table>
			</div>
		</div>
	</div>
</div>
</div>
<!-- javascript -->
<script src="js/bootstrap.min.js"></script>
<?php include 'footer.php' ?>
</body>

</html>
<?php
	//5. Close database connection
	mysqli_close($db);
?>