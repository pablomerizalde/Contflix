<!DOCTYPE html>
<html>
<head>
	<title>History - Contflix</title>
	<link rel="icon" href="img/eye.png">
	<link rel="stylesheet" href="css/bootstrap.css" media="all"/>
	<link rel="stylesheet" href="bootstrap-theme.css" media="all"/>
</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top">
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
					<li><a href="users.php">Users </a></li>
					<li class="active"><a href="history.php">History</a></li>
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
		         <img class="img-circle img-responsive center-block" src="img/notebook.png" alt="Generic placeholder image" width="140" height="140" style="background-color: #bbb">
		              <h1 class="text-center">History</h1>
		            </div>
			
				<ul class="nav nav-tabs">
					<li role="presentation" class="active"><a href="history.php">Select</a></li>
					<li role="presentation"><a href="registerHist.php">Create</a></li>
					<li role="presentation"><a href="updateHist.php">Update</a></li>
					<li role="presentation"><a href="deleteHist.php">Delete</a></li>	
				</ul>
				
				<div class="row" style="margin-top: 40px;">
					<div class="col-md-10 col-md-offset-1">
						<table class="table table-striped table-bordered">
							<thead> 
							  <tr>
							  	<th>id</th>
							  	<th>User's id</th>
							  	<th>User name</th>
							  	<th>Content's id</th>
								<th>Content name</th>
							  	<th>Date</th>
							  </tr>
							</thead>
							<tbody>
								<?php show(); ?>
							</tbody>
						</table>
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
	$histCollection = $contdb->histCollection;
	$contCollection = $contdb->contCollection;
	$usuCollection = $contdb->userCollection;



	$documentList = $histCollection->find();
	$numb = 1;
	foreach ($documentList as $doc) {
		$MongoIdU = new MongoDB\BSON\ObjectID($doc->usId);
		$MongoIdC = new MongoDB\BSON\ObjectID($doc->conId);
		$usua = $usuCollection->findOne(
			['_id'=>$MongoIdU]
			);
		$cont = $contCollection->findOne(
			['_id'=>$MongoIdC]
			);

		echo "<tr>";
		echo "<td>$doc->_id</td>";
		echo "<td>$doc->usId</td>";
		echo "<td>$usua->name</td>";
		echo "<td>$doc->conId</td>";
		echo "<td>$cont->name</td>";
		echo "<td>$doc->time</td>";
		echo "</tr>";
		$numb++;
	}
	
}

 ?>
