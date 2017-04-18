<!DOCTYPE html>
<html>
<head>
	<title>
		Conflix
	</title>
	<link rel="icon" href="img/eye.png">
	<link rel="stylesheet" href="css/bootstrap.css" media="all"/>
	<link rel="stylesheet" href="css/style.css" media="all"/>

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
			 	<a class="navbar-brand" href="index.php" >
				 	<span class="glyphicon glyphicon-eye-open"></span>
				 	ContFlix 

			 	</a>
			 </div>
			
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     		 <ul class="nav navbar-nav">
					<li><a href="users.php">Users</a></li>
					<li><a href="history.php">History</a></li>
					<li><a href="content.php">Content</a></li>
					<li><a href="info.php"><span class="glyphicon glyphicon-info-sign"></span></a></li>
				</ul>

			</div>
		</div>
	</nav>



	  <div id="myCarousel" class="carousel slide " data-ride="carousel" style="margin-top: 50px;">
		<ol class="carousel-indicators">
	        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	        <li data-target="#myCarousel" data-slide-to="1"></li>
	        <li data-target="#myCarousel" data-slide-to="2"></li>
	    </ol> 
	    <div class="carousel-inner " role="listbox" >
       		<div class="item active " >
       			<img class="first-slide imag" src="img/imga.jpg" alt="First slide">
          			<div class="container">
          				<div class="carousel-caption">
          					<h1>Create new users.</h1>
            				<p>Note: We use php and MongoDB, all your data is safe with us.</p>
          				</div>
          			</div>
       		</div>
       		 <div class="item">
	          <img class="second-slide imag" src="img/imgc.jpg" alt="Second slide">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>Mouch wow, such cute landing page.</h1>
	              <p>We use Bootstrap3 and jQeury, to make an amazing User Experience.</p>
	            </div>
	          </div>
        	</div>
        	 <div class="item">
	          <img class="third-slide imag" src="img/imgb.jpg" alt="Third slide">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>Real Time data.</h1>
	              <p>We use NoSQL engine to make a immediately response.</p>
	            </div>
	          </div>
	        </div>
       	</div>
       	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	        <span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	        <span class="sr-only">Next</span>
	    </a>
	  </div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1" >
			<div class="jumbotron">
		  <div class="container marketing" style="margin-top: 70px;">

		      <!-- Three columns of text below the carousel -->
		      <div class="row">
		        <div class="col-lg-4">
		          <img class="img-circle img-responsive center-block" src="img/girl.png" alt="Generic placeholder image" width="140" height="140" style="background-color: #bbb";>
		          <h2 class="text-center">Users</h2>
		          <p>We have a fully functional CRUD connected with a real time data base, click in the below button to start.</p>
		          <p><a class="btn btn-default center-block" href="users.php" role="button">View details &raquo;</a></p>
		        </div><!-- /.col-lg-4 -->
		        <div class="col-lg-4">
		          <img class="img-circle img-responsive center-block" src="img/video-camera.png" alt="Generic placeholder image" width="140" height="140" style="background-color: #bbb">
		          <h2 class="text-center">Content</h2>
		          <p class="text-center">Come and add new content.</p>
		          <p><a class="btn btn-default center-block" href="history.php" role="button">View details &raquo;</a></p>
		        </div><!-- /.col-lg-4 -->
		        <div class="col-lg-4">
		          <img class="img-circle img-responsive center-block" src="img/notebook.png" alt="Generic placeholder image" width="140" height="140" style="background-color: #bbb">
		          <h2 class="text-center">History</h2>
		          <p class="text-center">You could see your history, all the information it's here.</p>
		          <p><a class="btn btn-default center-block" href="content.php" role="button">View details &raquo;</a></p>
		        </div><!-- /.col-lg-4 -->
		      </div><!-- /.row -->
			</div>
		</div>
		</div>
	</div>
	<hr class="featurette-divider">
	<footer>
		<p style="float: right"><a href="#">Back to top</a></p>
			<p>© 2017 Lore and Pablo, Inc. · Thanks ·  </p>     
		

	</footer>	
	
	<script type="text/javascript" src="js/jquery-3.2.1.min.js" ></script>
	<script type="text/javascript" src="js/bootstrap.min.js" ></script>
	
</body>
</html>