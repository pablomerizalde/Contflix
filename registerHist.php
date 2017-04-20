
<?php 
            
      

 ?>

<!DOCTYPE html>
<html>
<head>
      <title>History - Contflix</title>
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
                    <li role="presentation"><a href="history.php">Select</a></li>
                    <li role="presentation" class="active"><a href="registerHist.php">Create</a></li>
                    <li role="presentation"><a href="updateHist.php">Update</a></li>
                    <li role="presentation"><a href="deleteHist.php">Delete</a></li>       
                </ul>

                        <div class="row">

                              <?php 
                                   if (!isset ($_POST['register']) ||($_POST['register'] != 'Register')) {
                                    ?>
                                    <div class="col-md-8 col-md-offset-2" style="margin-top: 40px;">
                                          <form method="post" action="registerHist.php" role="form" data-toggle="validator">
                                                <div class="form-group">
                                                    <label for="name" class="control-label">User's id</label>
                                                    <input type="text" class="form-control" id="inputName" placeholder="for Example: 58f17d65923faa17d80003c3" name="usId" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="premier" class="control-label">Content's id</label>

                                                    <select id="country" class="form-control" name="conId" required>
                                                    <option value=""></option>
                                                    <?php 
                                                      showCont();
                                                     ?>
                                                     </select>
                                                   <!--  <input type="text" class="form-control" id="inputDate" placeholder="for Example: 58f17d65923faa17d80003c3" name="conId" required> -->
                                                </div>
                                                <div class="form-group">
                                                <button type="submit" name='register' value='Register' class="btn btn-primary" > submit</button>
                                                </div>
                                                                         
                                          </form>
                                    </div>
                                    <?php } else {   
                                                if(insertHist($_POST['usId'],$_POST['conId'])){

                                    ?>
                                    <div class="col-md-8 col-md-offset-2" style="margin-top: 40px;">
                                         Work it
                                    </div>      

                                    <?php 
                                                }else{
                                    ?>
                                           <div class="col-md-8 col-md-offset-2" style="margin-top: 40px;">
                                               <h4>User's id or Content's id not found</h4>
                                          </div>      
                                    <?php
                                                }
                                          }?>


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
      
      function insertHist($usId,$conId){
         try{
            $MongoIdUs = new MongoDB\BSON\ObjectID($usId);
            $MongoIdCon = new MongoDB\BSON\ObjectID($conId);
            require 'vendor/autoload.php';
            $client = new MongoDB\Client;
            $contdb = $client->contdb;


            $userCollection = $contdb->userCollection;
            $contCollection = $contdb->contCollection;
           
                $document1 = $userCollection->findone(
                    ['_id'=>$MongoIdUs]
                );

                $document2 = $contCollection->findone(
                    ['_id'=>$MongoIdCon]
                );
            }catch(Exception $e){
                $document1 = NULL;
                $document2 = NULL;
            }

            
            if(!is_null($document1) and !is_null($document2)){
            $histCollection = $contdb->histCollection;
            $insertOneResult = $histCollection->insertOne(
                        ['usId' => $usId,'conId'=>$conId, 'time'=>date('Y-m-d H:i:s',time())] 
            );
            return true;
            }else{
                return false;
            }
      }


      function showCont(){
      

        require 'vendor/autoload.php';
        $client = new MongoDB\Client;
        $contdb = $client->contdb;
        $contCollection = $contdb->contCollection;

        $documentList = $contCollection->find();
        $numb = 1;
        foreach ($documentList as $doc) {
          $año = explode("-",$doc->date);
          echo "<option value=\"";
          echo "$doc->_id";
          echo "\">";
          echo "$doc->name (";
          echo($año[0]);
          echo ")</option>";
        }
      }
      
 ?>

