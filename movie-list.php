<?php
  
  // error reporting
  ini_set('display_startup_errors',1);
  ini_set('display_errors',1);
  error_reporting(-1);

  // include configuration
  require_once(dirname(__FILE__) . "/conf/config.php");
  require_once(dirname(__FILE__) . "/model/movie.php");


  $db = new DatabaseLayer();
  $db->connectToDB();

  $movieList = $db->get_movie_list();

  $arr = array();

  foreach($movieList as $m) {
    $genres = $db->get_movie_genres_by_movie_id($m->id);
    $movie = new Movie($m);
    foreach ($genres as $genre) {
      $movie->addGenre($genre->name);
    }
    
    $arr[] = $movie;
  }

  
  $db->closeDB();

  // encode array into json, numeric object will stay as numeric instead of becoming string
  echo json_encode($arr, JSON_NUMERIC_CHECK);
  
?>  