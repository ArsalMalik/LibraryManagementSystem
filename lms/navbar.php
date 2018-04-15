<?php echo '
	<div class="row">
			<nav class="navbar navbar-default  navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					<button type="button" id="togglebtn" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>	
				</div>		
				
				<div class="collapse navbar-collapse navbar-inverse" id="collapse">
					<ul class="nav  navbar-nav ">
						<p class="navbar-text" id="navbar-heading"><b>Library Management System</b></p>
					</ul>
				
					<ul class="nav  navbar-nav navbar-right" id="heading" style="padding-right: 2em;">	
						<li id="home"><a href="index.php">Home</a></li>
						<li id="borrower"><a href="borroweraccount.php">Borrower</a></li>
						<li><a href="searchcheckin.php">Check In</a></li>
						<li><a href="fines.php">Fines</a></li>
						<li id="browse"><a href="About.php">About</a></li>
						<li id="contact"><a href="Contact.php">Contact</a></li>
					</ul>
				
				<form action="search.php" class="nav navbar-form navbar-right" method="GET">
					<div class="form-group">
						<input type="text" name="search" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default btn-sm" id="searchbtn">
						<span class="glyphicon glyphicon-search"></span> 
					</button>
				</form>
				</div>		
			</nav>
</div>' ?>