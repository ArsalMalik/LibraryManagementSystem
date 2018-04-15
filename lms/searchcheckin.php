<!DOCTYPE html>
<!--  Establish connection -->
<?php include 'connect_db.php' ?> 
<!-- connection -->	

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
 				<table><tbody>
 				<tr><td><h1><span class="label label-primary"><b><i>Check In</i></b></span></h1></td></tr>
 				<tr><td><br><form action="resultcheckin.php" class="nav navbar-form pull-right" method="GET">
					<div class="form-group">
						<input type="text" name="search" class="form-control" placeholder="Search for books to check in">
					</div>
					<button type="submit" class="btn btn-default btn-sm justified" id="searchbtn">
						<span class="glyphicon glyphicon-search"></span> 
					</button>
				</form></td></tr>
				</tbody></table>
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