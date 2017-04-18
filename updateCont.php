
<?php 
            
      

 ?>

<!DOCTYPE html>
<html>
<head>
      <title>Users - Contflix</title>
      <link rel="icon" href="img/eye.png">
      <link rel="stylesheet" href="css/bootstrap.css" media="all"/>
         
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
          <li><a href="history.php">History</a></li>
          <li class="active"><a href="content.php">Content</a></li>
          <li><a href="info.php" ><span class="glyphicon glyphicon-info-sign"></span></a></li>
        </ul>

      </div>
    </div>
  </nav>
  <div class="row">
    <div class="col-md-10 col-md-offset-1" style="margin-top: -20px;">
      
      <div class="jumbotron">
        <div class="page-header">
          <img class="img-circle img-responsive center-block" src="img/video-camera.png" alt="Generic placeholder image" width="140" height="140" style="background-color: #bbb">
          <h1 class="text-center"> Content</h1>
        </div>
        <ul class="nav nav-tabs">
          <li role="presentation"><a href="content.php">Select</a></li>
          <li role="presentation"><a href="registerCont.php">Create</a></li>
          <li role="presentation" class="active"><a href="updateCont.php">Update</a></li>
          <li role="presentation"><a href="deleteCont.php">Delete</a></li>  
        </ul>



                        <div class="row">
                               <?php   if (!isset ($_POST['idUser']) ||($_POST['idUser'] != 'IDUSER')) {
                                 ?>
                                         <div class="col-md-4 col-md-offset-2" style="margin-top: 40px;">
                                          <form method="post" action="updateCont.php" role="form" data-toggle="validator">
                                               
                                                <div class="form-group">
                                                        <label for="idUs" class="control-label">Content id</label>
                                                        <input type="text" class="form-control" id="inputId" placeholder="for Example: 58f17d65923faa17d80003c3" name="idUs" required>
                                                </div>
                                    
                                                <button type="submit" name='idUser' value='IDUSER' class="btn btn-primary" > submit</button>
                                                </div>
                                                                         
                                          </form>
                                    </div>
                                <?php
                                  }else{
                                     if( findCont($_POST['idUs'])  ){ 
                                       
                                        header ("Location: updateCont2.php");
                                       }else{
                                    ?>  
                                    <div class="col-md-6 col-md-offset-2" style="margin-top: 40px;">
                                      <h3>Content not foud, try with another id</h3>
                                      <form action="updateCont.php"</form>
                                       <button class="btn btn-primary" type="submit" >Try again</button>
                                    </div>
                                <?php }} ?>    
                        </div>





                  </div>
            </div>
      </div>


      
      
      <script type="text/javascript" src="js/jquery-3.2.1.min.js" ></script>

      <script type="text/javascript" src="js/bootstrap.min.js" ></script>



      </script>
</body>
</html>

<?php 
      function findCont($id){
            try{
            $MongoId = new MongoDB\BSON\ObjectID($id);
            require 'vendor/autoload.php';
            $client = new MongoDB\Client;
            $contdb = $client->contdb;
            $contCollection = $contdb->contCollection;


            $document = $contCollection->findOne(
              ['_id'=> $MongoId]
            );

            if(is_null($document)){
              return false;
            }else{
               session_start();
               $_SESSION['idCont']=$document;
               return true;
            }
              

            }catch(Exception $e){
              return false;
            }
      }
      
 ?>