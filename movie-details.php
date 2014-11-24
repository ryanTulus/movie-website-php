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
  $movie = mysql_fetch_assoc($retval);
  
  $movieID = $movie['id'];
  $directorID = $movie['director'];
  $sql = "SELECT genres.name ". 
         "FROM movie_genres INNER JOIN genres ".
         "ON movie_genres.genre_id = genres.id ".
         "WHERE movie_genres.movie_id = '$movieID';";
       
  $genres = mysql_query($sql, $conn);
  if(!$genres)
  {
    die('Could not get data: ' . mysql_error());
  }
  $genre = array();
  while ($r = mysql_fetch_assoc($genres)) {
    $genre[] = $r['name'];
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
  $writer = array();
  while ($r = mysql_fetch_assoc($writers)) {
    $writer[] = $r['name'];
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
  $cast = array();
  while ($r = mysql_fetch_assoc($casts)) {
    $cast[] = $r[name];
  }
  
  $sql = "SELECT name ".
         "FROM people ".
         "WHERE id = '$directorID';";
  
  $director = mysql_query($sql, $conn);
  if (!$director)
  {
    die('Could not get data: ' . mysql_error());
  }
  $row = mysql_fetch_assoc($director);
  $director = $row['name'];
  
  $arr = array('movie' => $movie, 'genres' => $genre, 'writers' => $writer, 'casts' => $cast, 'director' => $director);
  
  echo json_encode($arr, JSON_NUMERIC_CHECK);

?>