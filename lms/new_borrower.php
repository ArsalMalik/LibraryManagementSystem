<!DOCTYPE html>
<!--  Establish connection -->
<?php include 'connect_db.php' ?> 
<!-- connection -->	
<?php 

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
				<h1><span class="label label-primary"><b><i> New Borrower </i></b></span></h1><br/>
				<form action="borrower_insert.php" method="GET">
				  <div class="form-group">
				    <label class="">Name* </label>
				    <div class="row">
				    	<div class="col-lg-4">
				    		<input name="name" class="form-control" placeholder="Name " maxlength="100"  required>
				  		</div>
				  	</div><br>
				  	<label class="">SSN* </label>
				    <div class="row">
				    	<div class="col-lg-4">
				    		<input name="ssn" class="form-control" placeholder="SSN# = e.g 000-00-0000" title="Social Security Number: 000-00-0000" pattern="[0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9][0-9][0-9]" maxlength="11" minlength="11" required>
				  		</div>
				  	</div><br>
				  <label class="">Address* </label>
				    <div class="row">
				    	<div class="col-lg-4">
				    		<input name="address" class="form-control" placeholder="Address"  required>
				  		</div>
				  	</div><br>
				  <label class="">Phone </label>
				    <div class="row">
				    	<div class="col-lg-4">
				    		<input name="phone" class="form-control" placeholder="Phone# = e.g (000) 000-0000" title="Social Security Number: (000) 000-0000" pattern="\(\d{3}\)\s\d{3}-\d{4}">
				  		</div>
				  	</div><br>
				  	<div class="row">
				    	<div class="col-lg-4" style="margin-left: 10em;">
				  			<button type="submit" class="btn btn-primary">Create</button>
						</div>
					</div>	
				</div>
				</form>
				<p><b><i>* fields are reuired</i></b></p>
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