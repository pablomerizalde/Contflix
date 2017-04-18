<!DOCTYPE html>
<html>
<head>
	<title>Users - Contflix</title>
	<link rel="icon" href="img/eye.png">
	<link rel="stylesheet" href="css/bootstrap.css" media="all"/>
	<link rel="stylesheet" href="bootstrap-theme.css" media="all"/>
</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top	">
		<div class="container-fluid">
			 <div class="navbar-header">
      			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			 	<a class="navbar-brand" href="index.php">
				 	<span class="glyphicon glyphicon-eye-open"></span>
				 	ContFlix 
			 	</a>
			 </div>
			
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     		 <ul class="nav navbar-nav">
					<li class="active"><a href="users.php">Users </a></li>
				<li><a href="history.php">History</a></li>
					<li><a href="content.php">Content</a></li>
					<li><a href="info.php" ><span class="glyphicon glyphicon-info-sign"></span></a></li>
				</ul>

			</div>
		</div>
	</nav>




	<div class="row">
		<div class="col-md-10 col-md-offset-1" style="margin-top: -20px;">
			
			<div class="jumbotron">
				<div class="page-header">
		          <img class="img-circle img-responsive center-block" src="img/girl.png" alt="Generic placeholder image" width="140" height="140" style="background-color: #bbb">
		          <h1 class="text-center"> User</h1>
		        </div>
			
				<ul class="nav nav-tabs">
					<li role="presentation" class="active"><a href="users.php">Select</a></li>
					<li role="presentation"><a href="registerUser.php">Create</a></li>
					<li role="presentation"><a href="updateUser.php">Update</a></li>
					<li role="presentation"><a href="deleteUser.php">Delete</a></li>	
				</ul>
				

				<div class="row" style="margin-top: 40px;">
					<div class="col-md-10 col-md-offset-1">
						<div class="table-responsive">
							<table class="table table-striped table-bordered">
								<thead> 
								  <tr>
								  	<th>id</th>
								  	<th>Nombre</th>
								  	<th>Correo</th>
								  	<th>Telefono</th>
								  	<th>Dirección</th>
								  	<th>Country</th>
								  </tr>
								</thead>
								<tbody>
									<?php show(); ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>


			</div>
		</div>
	</div>

	




	<script type="text/javascript" src="js/jquery-3.2.1.min.js" ></script>
	<script type="text/javascript" src="js/bootstrap.min.js" ></script>
</body>
</html>

<?php 

function show(){

	require 'vendor/autoload.php';
	$client = new MongoDB\Client;
	$contdb = $client->contdb;
	$userCollection = $contdb->userCollection;

	$documentList = $userCollection->find();
	$numb = 1;
	foreach ($documentList as $doc) {
		echo "<tr>";
		echo "<td>$doc->_id</td>";
		echo "<td>$doc->name</td>";
		echo "<td>$doc->email</td>";
		echo "<td>$doc->telephone</td>";
		echo "<td>$doc->address</td>";
		echo "<td>$doc->country</td>";
		echo "</tr>";
		$numb++;
	}
	
}

 ?>