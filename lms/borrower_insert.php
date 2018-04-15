<!DOCTYPE html>
<!--  Establish connection -->
<?php include 'connect_db.php' ?> 
<!-- connection -->	
<?php 

	$query = "INSERT INTO borrowers (ssn, bname, address, phone) ";
	$query.= "VALUES ('$_GET[ssn]', '$_GET[name]', '$_GET[address]', '$_GET[phone]')";
	$ssn = $_GET['ssn'];

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
			<h1><span class="label label-primary"><b><i> Borrower </i></b></span></h1><br/>	
			<?php 
			if(!mysqli_query($db,$query))
			{ ?>
			
			<?php	echo ("Borrower with the input SSN already Exists!");
				?>
				<form action="new_borrower.php" >
					<button type="submit" class="btn btn-primary btn-md" >
					Go Back 
					</button>
				</form>
			
								
		<?php } else { ?>
			<h3><?php echo "Account Created Successfuly!";  ?></h3>
			
				<?php echo "<a href='show_cardid.php?ssn=" . $ssn . "'>";  ?>See your account details here!</a>
			</div> <?php } ?>
		</div>
	</div>
</div>

<!-- javascript -->
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php
	//5. Close database connection
	mysqli_close($db);
?>