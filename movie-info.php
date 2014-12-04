<!DOCTYPE html>
<html lang="en" ng-app='movieApp'>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title ng-controller='movieDetailCtrl' idtext="<?php echo htmlspecialchars($_GET["id"]) ?>">
      Movie: {{movieDetail.title}}
    </title>
    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.3/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.3/angular-route.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="js/controllers.js"></script>
    
  </head>
  
  <body>
    <!--  header navigation bar   -->
    <nav class="navbar navbar-default" role="navigation">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">OhYeah Movie!</a>
      </div>
      
      <div class='collapse navbar-collapse'>
        <p class="navbar-text">Your Own Trusted Movie Guideline!</p>
        
        <form class='navbar-form navbar-right'>
          <a class='btn btn-primary' href='register.php'>Register</a>
          <a class='btn btn-success' href='signin.php'>Sign In</a>
        </form>
        
      </div>
    </nav>
    
    <!--  movie list  -->
    <div ng-controller='movieDetailCtrl' idtext="<?php echo htmlspecialchars($_GET["id"]) ?>">
      <div class='col-sm-3'>
        <img ng-src="images/{{movieDetail.id_text}}.0.jpg" class='img-rounded col-sm-12'/>
      </div>
  
      <div class='col-sm-9'>
        <div class='panel panel-info'>
          <div class='panel-heading panel-title'>
            <p class='text-primary'>{{movieDetail.title}}</p>
          </div>
          <div class='panel-body'>
            <p><strong>Time :</strong> {{movieDetail.time}} min</p>
            <p><strong>Rating :</strong> {{movieDetail.rating}}</p>
            <p>
              <strong>Genres :</strong>
              <span ng-repeat='genre in movieDetail.genres'>
                <span ng-hide='$first'> | </span>{{genre}}
              </span>
            </p>
            <strong>Storyline :</strong>
            <p>{{movieDetail.storyline}}</p>
            <p><strong>Director :</strong> {{movieDetail.director}}</p>
            <p>
              <strong>Writers :</strong>
              <span ng-repeat='writer in movieDetail.writers'>
                <span ng-hide='$first'>, </span>{{writer}}
              </span>
            </p>
            <strong>Casts:</strong>
            <ul ng-repeat="cast in movieDetail.casts">
              <li>{{cast}}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Movie Review -->
    <div class="col-sm-offset-3 col-sm-9">
      <div class='panel panel-warning'>
        <div class='panel-heading panel-title'>
          <p class='text-warning'>Movie Review</p>
        </div>
        
        <div class='panel-body'>
          
          <div class'col-sm-12'>
            No review yet!
          </div>
          <hr>
          <h3 class='text-center text-warning'>Add Review</h3>
          <div class='col-sm-6'>
            <form role='form'>
              <div class='form-group'>
                <label class='control-label'><span class='text-warning'>Summary</span></label>
                <input class='form-control'></input>
              </div>
              
              <div class='form-group'>
                <label class='control-label'><span class='text-warning'>Rating:</span></label>
                <select class='form-control' name="rating">
                  <option value="0">Rate the movie</option>
                  <option value="5">5 stars</option>
                  <option value="4">4 stars</option>
                  <option value="3">3 stars</option>
                  <option value="2">2 stars</option>
                  <option value="1">1 stars</option>
                </select>
              </div>
              
              <div class='form-group'>
                <label class='control-label'><span class='text-warning'>Review:</span></label>
                <textarea class='form-control' rows='5'></textarea>
              </div>
              
              <div class='form-group'>
                <button type='submit' class='btn btn-warning'>Submit Review</button>
              </div>
          </div>
        </div>
      </div>
    </div>
    
    
  </body>
</html>