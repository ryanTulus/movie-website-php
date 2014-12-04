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

  $id = htmlspecialchars($_GET["id"]);
  $movies = $db->get_movie_details_by_movie_id_text($id);
  
  $m = $movies[0];
  $movie = new Movie($m);
  $movieID = $m->id;
  $directorID = $m->director;

  // genres
  $genres = $db->get_movie_genres_by_movie_id($movieID);

  foreach ($genres as $genre) {
    $movie->addGenre($genre->name);
  }
  
  // writers
  $writers = $db->get_movie_writers_by_movie_id($movieID);

  foreach ($writers as $writer) {
    $movie->addWriter($writer->name);
  }
  
  // casts
  $casts = $db->get_movie_casts_by_movie_id($movieID);

  foreach ($casts as $cast) {
    $movie->addCast($cast->name);
  }
  
  // director
  $director = $db->get_movie_director_by_director_id($directorID);

  $movie->setDirector($director[0]->name);
  
  echo json_encode($movie, JSON_NUMERIC_CHECK);

?>