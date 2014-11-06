<!DOCTYPE html>
<html lang="en" ng-app="movieApp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OhYeah Movie!</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/register.css">

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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0/angular.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
  </head>
  
  <body>
  
    <!--  header navigation bar   -->
    <nav class="navbar navbar-default" role="navigation">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">OhYeah Movie!</a>
      </div>
      
      <div class='collapse navbar-collapse'>
        <p class="navbar-text">Your Own Trusted Movie Guideline!</p>
      </div>
    </nav>
    
    <!-- registration form -->
    
    <div class="col-md-10">
      <form class="form-horizontal" role="form" name="regForm"
            ng-controller="registrationController as reg"
            ng-submit="regForm.$valid && reg.register()">
        
        <div class="form-group">
          <label class="col-md-2 control-label">Full Name</label>
          <div class="col-md-8">
            <input type="text" class="col-md-10 form-control" placeholder="Your Name" 
                   name='fullname' ng-model="reg.name" required>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-md-2 control-label">Email Address</label>
          <div class="col-md-8">
            <input type="email" class="col-md-10 form-control" placeholder="Your Email" 
                   ng-model="reg.email" required>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-md-2 control-label">Password</label>
          <div class="col-md-8">
            <input type="password" class="col-md-10 form-control" placeholder="Password"
                   ng-model="reg.password" ng-minlength='6' required>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-md-2 control-label">Confirm Password</label>
          <div class="col-md-8">
            <input type="password" class="col-md-10 form-control" placeholder="Confirm Password"
                   ng-model="reg.confirmPassword" ng-minlength='6' required>
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-md-offset-2 col-md-10">
            <button type="submit" class="btn btn-primary">Register Me!</button>
          </div>
        </div>
      </form>
    </div>
    
  </body>
</html>