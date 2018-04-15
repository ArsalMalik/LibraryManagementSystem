<!DOCTYPE html>
<!--  Establish connection -->
<?php include 'connect_db.php' ?> 
<!-- connection -->	
<?php 
	$query = $_GET['search'];

	$query = htmlspecialchars($query); 
	$query = explode(',', $query);
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
			<h1><span class="label label-primary"><b><i> Search Results for:</i></b></span> <?php echo implode(",",$query) ?></h1><br/>	
			 <table class="table table-striped col-lg-12">
			  <?php 
			  	if(count($query)<=3) {
			        $searchquery = "(SELECT a.loan_id as loan_id, a.card_id AS card_id, b.bname AS name, a.isbn AS isbn, a.date_out AS date_out, a.due_date AS due_date "; 
					$searchquery.= "FROM book_loans a, borrowers b ";
					$searchquery.= "WHERE a.card_id = b.card_id AND a.date_in IS NULL AND (b.bname LIKE '%".$query[0]."%'" ;

									if(count($query)==2) { 

					$searchquery.= " OR b.bname LIKE '%".$query[1]."%' ";
								 	} if(count($query)==3) { 
					$searchquery.= " OR b.bname LIKE '%".$query[2]."%' "; } 
					$searchquery.= " )) " ;
					$searchquery.= "UNION ";
					$searchquery.= "(SELECT a.loan_id as loan_id, a.card_id AS card_id, b.bname AS name, a.isbn AS isbn, a.date_out AS date_out, a.due_date AS due_date ";
					$searchquery.= "FROM book_loans a, borrowers b ";
					$searchquery.= "WHERE a.card_id = b.card_id AND a.date_in IS NULL  AND (a.card_id LIKE '%".$query[0]."%' ";
									if(count($query)==2) {
					$searchquery.= "OR a.card_id LIKE '%".$query[1]."%' ";
									} if(count($query)==3) {
					$searchquery .= "OR a.card_id LIKE '%".$query[2]."%' ) "; }
					$searchquery.= " )) " ;
					$searchquery.= "UNION ";
					$searchquery.= "(SELECT a.loan_id as loan_id, a.card_id AS card_id, b.bname AS name, a.isbn AS isbn, a.date_out AS date_out, a.due_date AS due_date "; 
					$searchquery.= "FROM book_loans a, borrowers b ";
					$searchquery.= "WHERE a.card_id = b.card_id AND a.date_in IS NULL  AND (a.isbn LIKE '%".$query[0]."%' ";
									if(count($query)==2) { 
					$searchquery.= "OR a.isbn LIKE '%".$query[1]."%' ";
									} if(count($query)==3) {
					$searchquery.= "OR a.isbn LIKE	%".$query[2]."%')  "; } 
					$searchquery.= " )) " ;


					$result = mysqli_query($db, $searchquery) or die('Error querying database.');
			  	
			 	 	if($result -> num_rows > 0)
			 	 	{ ?>
						<thead><td><b>CARD ID</b></td><td><b>NAME</b></td><td><b>ISBN</b></td><td><b>CHECK OUT DATE</b></td><td><b>DUE DATE</b></td></thead>
						<?php
						 	 while( $row = mysqli_fetch_array($result)) { ?>
							 <tbody>
								<tr>
									<td><?php echo $row['card_id'] ?></td><td><?php echo $row['name'] ?></td><td><?php echo $row['isbn'] ?></td><td><?php echo $row['date_out'] ?></td><td><?php echo $row['due_date'] ?></td>
									<td><form action='updatebookloans.php' method='GET'><button type='submit' class='btn btn-primary'>Check In</button>
										<input type="hidden" name="card_id" value="<?php echo $row['card_id'] ?>" >
										<input type="hidden" name="isbn" value="<?php echo $row['isbn'] ?>" >
									</form></td></tr> 
									<?php } 
					} else {
						echo "<tr><td>No search results found!<br>"; 
						echo "<b>Note: If you have more than one value in your query, make sure they are separated by a comma ","(also no spaces before/after comma) in your search.</b><br><br><br>";
						echo "Acceptable queries, <br><li>name,isbn,cardID</li><li>isbn,name,cardID<li>cardID,isbn,name</li>or similar</td></tr>";
					} 
				} else {
					echo "<tr><td>You cannot search for more than 3 values at once!<br><li>name,isbn,cardID</li><li>isbn,name,cardID<li>cardID,isbn,name</li>or similar</td></tr>"; 
				} ?>
				  	</tbody>
				 </table>
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