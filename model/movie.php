<?php
  
  // require db.php
  require_once(dirname(__FILE__)."/../db/db.php");
  
  class Movie {
    public $id;
    public $id_text;
    public $title;
    public $time;
    public $rating;
    public $genres;
    public $brief_summary;
    public $storyline;
    public $director;
    public $writers;
    public $casts;
    public $user_reviews;
    
    public function __construct(DBQueryResult $movieItem){
      $this->id = $movieItem->id;
      $this->id_text = $movieItem->id_text;
      $this->title = $movieItem->title;
      $this->time = $movieItem->time;
      $this->rating = $movieItem->rating;
      $this->brief_summary = $movieItem->brief_summary;
      $this->storyline = $movieItem->storyline;
      
      $this->genres = array();
      $this->writers = array();
      $this->casts = array();
      $this->user_reviews = array();
      
    }
    
    public function setDirector($director) {
      $this->director = $director;
    }
    
    public function addGenre($genre) {
      $this->genres[] = $genre;
    }
    
    public function addWriter($writer) {
      $this->writers[] = $writer;
    }
    
    public function addCast($cast) {
      $this->casts[] = $cast;
    }
    
    public function addUserReview($review) {
      $this->user_reviews[] = $review;
    }
  }
?>