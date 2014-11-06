<!DOCTYPE html>
<html lang="en" ng-app="movieApp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OhYeah Movie!</title>

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
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0/angular.min.js"></script>
    <script src="js/app.js"></script>
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
        
        <form class="navbar-form navbar-right" role="search" action="index.php">
          <div class="input-group">
            
            <input type="text" class="form-control" placeholder="Search Movies" 
                   name="srch-term" id="srch-term" value="<?php echo $_GET['srch-term'];?>" />
            
            <div class="input-group-btn">
              <button class="btn btn-info" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
            
          </div>
        </form>
        
      </div>
    </nav>

    <!--  movie list  -->
    <?php
      $dbhost = 'localhost';
      $dbuser = 'root';
      $dbpass = 'root';
      $conn = mysql_connect($dbhost, $dbuser, $dbpass);
      if(! $conn )
      {
        die('Could not connect: ' . mysql_error());
      }
      $keyword = htmlspecialchars($_GET["srch-term"]);
      $sql = "SELECT * FROM movie_item WHERE title like '%$keyword%'";

      mysql_select_db('movies');
      $retval = mysql_query( $sql, $conn );
      if(! $retval )
      {
        die('Could not get data: ' . mysql_error());
      }
      while($row = mysql_fetch_assoc($retval))
      {
        $movieID = $row['id'];
        $sql = "SELECT genres.name ". 
               "FROM movie_genres INNER JOIN genres ".
               "ON movie_genres.genre_id = genres.id ".
               "WHERE movie_genres.movie_id = '$movieID';";
               
        $genres = mysql_query($sql, $conn);
        if(!$genres)
        {
          die('Could not get data: ' . mysql_error());
        }
        printMovieList($row, $genres);
      }
      mysql_close($conn);
      
      function printMovieList($data, $genres) {
        
        while ($row = mysql_fetch_assoc($genres)) {
          if (!$genre) {
            $genre = $row['name'];
          } else {
            $genre = $genre . ' | ' . $row['name'];
          } 
        }
        
        echo "<div class='row col-sm-12'>".
             "<div class='panel'>".
             "<div class='panel-body'>".
             "<div class='col-sm-2'>".
             "<img src='images/{$data['id_text']}.0.jpg' class='img-rounded col-sm-12'/>".
             "</div>".
             "<div class='col-sm-10'>".
             "<div class='panel panel-default'>".
             "<div class='panel-heading panel-title'>".
              "<a href='movie.php?id={$data['id_text']}'><p class='text-primary'>{$data['title']}</p></a>".
             "</div> ".
             "<div class='panel-body'>".
             "<p>Time : {$data['time']} min </p> ".
             "<p>Rating : {$data['rating']} </p> ".
             "<p>Genres : {$genre} </p>".
             "<p>{$data['brief_summary']} </p>".
             "</div></div></div></div></div></div>";
      }
    ?>


  </body>
</html>