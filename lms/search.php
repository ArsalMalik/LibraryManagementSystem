<!DOCTYPE html>
<!--  Establish connection -->
<?php include 'connect_db.php' ?> 
<!-- connection -->	

<?php
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
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
 				<table class="table table-striped">
 		
 				<h1><span class="label label-primary"><b><i>Search Results for:</i></b></span><?php echo  implode(",",$query);  ?></h1>	
 				<?php 
 				if(count($query)<=3) { 
			        $searchquery = "(SELECT a.isbn AS isbn, a.title AS title, GROUP_CONCAT(c.name ORDER BY c.name ASC SEPARATOR ', ') as authors "; 
					$searchquery.= "FROM books a, book_authors b, authors c ";
					$searchquery.= "WHERE a.isbn = b.isbn AND b.author_id = c.author_id  AND (a.isbn LIKE '%".$query[0]."%' ";
									if(count($query)==2) { 
					$searchquery.= " OR a.isbn LIKE '%".$query[1]."%' ";
								 	} if(count($query)==3) { 
					$searchquery.= " OR a.isbn LIKE '%".$query[2]."%' "; } 
					$searchquery.= " ) " ;
					$searchquery.= "GROUP BY a.isbn, a.title ) ";
					$searchquery.= "UNION ";
					$searchquery.= "(SELECT a.isbn, a.title, GROUP_CONCAT(c.name ORDER BY c.name ASC SEPARATOR ', ') FROM books a, book_authors b, authors c
									 WHERE c.author_id=b.author_id AND a.isbn = b.isbn AND a.isbn IN
									(SELECT a.isbn FROM books a, book_authors b, authors c 
									WHERE c.author_id=b.author_id AND b.isbn=a.isbn AND (c.name LIKE '%". $query[0] ."%' " ;
									if(count($query)==2) { 
					$searchquery.= " OR c.name LIKE '%".$query[1]."%' ";
								 	} if(count($query)==3) { 
					$searchquery.= " OR c.name LIKE '%".$query[2]."%' "; } 
					$searchquery.= " )) " ;
									
					$searchquery.=	"GROUP BY a.isbn, a.title )";
					$searchquery.= "UNION ";
					$searchquery.= "(SELECT a.isbn AS isbn, a.title AS title, GROUP_CONCAT(c.name ORDER BY c.name ASC SEPARATOR ', ') as authors "; 
					$searchquery.= "FROM books a, book_authors b, authors c ";
					$searchquery.= "WHERE a.isbn = b.isbn AND b.author_id = c.author_id AND (a.title LIKE '%".$query[0]."%' ";
									if(count($query)==2) { 
					$searchquery.= " OR a.title LIKE '%".$query[1]."%' ";
								 	} if(count($query)==3) { 
					$searchquery.= " OR a.title LIKE '%".$query[2]."%' "; } 
					$searchquery.= " ) " ;
					$searchquery.= "GROUP BY a.isbn, a.title )" ;    

								
					
					$result = mysqli_query($db, $searchquery) or die('Error querying database.');

					$numofrows = $result -> num_rows;
           


	 				if($result -> num_rows > 0) { ?>
	 					<thead><td><b>Book Title</b></td><td><b>ISBN</b></td><td><b>Authors</b></td><td><b>Availability</b></td></thead>
			 				<tbody>
			 				
			 				<?php while($results = mysqli_fetch_array($result)) { 
					 					
					 					$query2 = "SELECT * FROM book_loans WHERE isbn = " . $results['isbn'] . " AND date_in IS NULL";
										
										$result2 = mysqli_query($db, $query2);
					 		?>
						  			<tr><td><?php echo "<a href='book.php?isbn=".$results['isbn']. "'>" . $results['title'] . "</a></td><td>" . $results['isbn'] . 
						  			"</td><td>" . $results['authors'] . "<br />" . "</td>
						  			<td>"; if ($result2 -> num_rows == 0) { echo "Available to check out"; } else { echo "Not Available - Already Checked Out"; } ?></td></tr>
				  			 <?php  }
	           						}
	        		else {
	            			echo "<tr><td>There are no results for '" . implode(",",$query) . "'' in the library!<br><br>";
	            			echo "<b>Note: If you have more than one value in your query, make sure they are separated by a comma ","(also no spaces before/after comma) in your search.</b><br><br>";
							echo "Acceptable queries, <br><li>Title,Isbn,Author</li><li>Author,Author,ISBN<li>Author</li><li>Title</li><li>ISBN</li>or similar</td></tr>";
	     	   			 } 
	     	   	} else {
					
						echo "<br><td>You cannot search for more than 3 values at once!<br>Acceptable queries, <br><li>Title,Isbn,Author</li><li>Author,Author,ISBN<li>Author</li><li>Title</li><li>ISBN</li>or similar"; 
				} ?>
			  			</tbody>
			  </table>
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