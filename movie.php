<?php
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = 'root';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  if(! $conn )
  {
    die('Could not connect: ' . mysql_error());
  }
  $id = htmlspecialchars($_GET["id"]);
  $sql = "SELECT * FROM movie_item WHERE id_text = '$id'";

  mysql_select_db('movies');
  $retval = mysql_query( $sql, $conn );
  if(! $retval )
  {
    die('Could not get data: ' . mysql_error());
  }
  $row = mysql_fetch_assoc($retval);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movie: <?php echo "{$row['title']}"?></title>

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
          <button class='btn btn-primary'>Register</button>
          <button class='btn btn-success'>Sign In</button>
        </form>
        
      </div>
    </nav>
    
    <!--  movie list  -->
    <?php
      $movieID = $row['id'];
      $directorID = $row['director'];
      $sql = "SELECT genres.name ". 
             "FROM movie_genres INNER JOIN genres ".
             "ON movie_genres.genre_id = genres.id ".
             "WHERE movie_genres.movie_id = '$movieID';";
           
      $genres = mysql_query($sql, $conn);
      if(!$genres)
      {
        die('Could not get data: ' . mysql_error());
      }
      
      $sql = "SELECT people.name ".
             "FROM movie_writers INNER JOIN people ".
             "ON movie_writers.people_id = people.id ".
             "WHERE movie_writers.movie_id = '$movieID';";
             
      $writers = mysql_query($sql, $conn);
      if (!$writers)
      {
        die('Could not get data: ' . mysql_error());
      }
      
      $sql = "SELECT people.name ".
             "FROM movie_casts INNER JOIN people ".
             "ON movie_casts.people_id = people.id ".
             "WHERE movie_casts.movie_id = '$movieID';";
      
      $casts = mysql_query($sql, $conn);
      if (!$casts)
      {
        die('Could not get data: ' . mysql_error());
      }

      $sql = "SELECT name ".
             "FROM people ".
             "WHERE id = '$directorID';";
      
      $director = mysql_query($sql, $conn);
      if (!$director)
      {
        die('Could not get data: ' . mysql_error());
      }

      printMovieDetails($row, $genres, $writers, $casts, $director);

      mysql_close($conn);
      
      function printMovieDetails($data, $genres, $writers, $casts, $director) {
        
        while ($row = mysql_fetch_assoc($genres)) {
          if (!$genre) {
            $genre = $row['name'];
          } else {
            $genre = $genre . ' | ' . $row['name'];
          } 
        }
        $row = mysql_fetch_assoc($director);
        $director = $row['name'];
        
        echo "<div>".
             "<div class='panel'>".
             "<div class='panel-body'>".
             "<div class='col-sm-3'>".
             "<img src='images/{$data['id_text']}.0.jpg' class='img-rounded col-sm-12'/>".
             "</div>".
             "<div class='col-sm-9'>".
             "<div class='panel panel-default'>".
             "<div class='panel-heading panel-title'>".
              "<a href='movie.php?id={$data['id_text']}'><p class='text-primary'>{$data['title']}</p></a>".
             "</div> ".
             "<div class='panel-body'>".
             "<p><strong>Time :</strong> {$data['time']} min </p> ".
             "<p><strong>Rating :</strong> {$data['rating']} </p> ".
             "<p><strong>Genres :</strong> {$genre} </p>".
             "<strong>Storyline:</strong>".
             "<p>{$data['storyline']} </p>".
             "<p><strong>Director :</strong> {$director} </p>";
        
        while ($row = mysql_fetch_assoc($writers)) {
          if (!$writer) {
            $writer = $row['name'];
          } else {
            $writer = $writer . ', ' . $row['name'];
          } 
        }
        
        echo "<p><strong>Writers :</strong> {$writer} </p>".
             "<strong>Casts:</strong>".
             "<ul>";
             
        while ($row = mysql_fetch_assoc($casts)) {
          echo "<li>{$row['name']}</li>";
        }
        
        echo "</ul>".
             "</div></div></div></div></div></div>";
        
      }
    ?>
  
  </body>
</html>