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
  
  $arr = array();
  while($row = mysql_fetch_assoc($retval))
  {
    $movie = $row;
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
    
    $genre = array();
    while ($r = mysql_fetch_assoc($genres)) {
      $genre[] = $r['name'];
    }
    
    $arr[] = array('movie' => $movie, 'genres' => $genre);
  }
  
  // encode array into json, numeric object will stay as numeric instead of becoming string
  echo json_encode($arr, JSON_NUMERIC_CHECK);
  
  mysql_close($conn);
?>  