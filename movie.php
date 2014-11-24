<!DOCTYPE html>
<html lang="en" ng-app='movieApp'>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title ng-controller='movieDetailCtrl' idtext="<?php echo htmlspecialchars($_GET["id"]) ?>">
      Movie: {{movieDetail.movie.title}}
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
        <img ng-src="images/{{movieDetail.movie.id_text}}.0.jpg" class='img-rounded col-sm-12'/>
      </div>
  
      <div class='col-sm-9'>
        <div class='panel panel-info'>
          <div class='panel-heading panel-title'>
            <p class='text-primary'>{{movieDetail.movie.title}}</p>
          </div>
          <div class='panel-body'>
            <p><strong>Time :</strong> {{movieDetail.movie.time}} min</p>
            <p><strong>Rating :</strong> {{movieDetail.movie.rating}}</p>
            <p>
              <strong>Genres :</strong>
              <span ng-repeat='genre in movieDetail.genres'>
                <span ng-hide='$first'> | </span>{{genre}}
              </span>
            </p>
            <strong>Storyline :</strong>
            <p>{{movieDetail.movie.storyline}}</p>
            <p><strong>Director :</strong> {{movieDetail.director}}</p>
            <p>
              <strong>Writers :</strong>
              <span ng-repeat='writer in movieDetail.writers'>
                <span ng-hide='$first'>, </span>{{writer}}
              </span>
            </p>
            <Strong>Casts:</strong>
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
          <p>This feature is coming soon! =)</p>
        </div>
      </div>
    </div>
    
    
  </body>
</html>