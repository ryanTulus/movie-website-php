<?php
  class DBQueryResult {
    private $_results = array();

    public function __construct() {}

    public function __set($var, $val) {
      $this->_results[$var] = $val;
    }

    public function __get($var) {
      if (isset($this->_results[$var])) {
        return $this->_results[$var];
      } else {
        return null;
      }
    }
    
    public function getKeys() {
      return array_keys($_results);
    }
    
  }

  class DatabaseLayer {

    private $conn = null;

    public function __construct() {}

    public function connectToDB() {
      $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DBNAME) or die ("<br/>Could not connect to MySQL server");

      // mysql_select_db(DB_DBNAME, $this->conn) or die ("<br/>Could not select the indicated database");

      return $this->conn;
    }

    public function closeDB() {
      if ($this->conn) {
        mysqli_close($this->conn);
        $this->conn = null;
      }
    }

    private function query($sql) {
      $res = mysqli_query($this->conn, $sql);

      if ($res) {
        if (strpos($sql, 'SELECT') === false) {
          return true;
        }
      } else {
        if (strpos($sql, 'SELECT') === false) {
          return false;
        } else {
          return null;
        }
      }

      $results = array();

      while ($row = mysqli_fetch_array($res)) {
        $result = new DBQueryResult();

        foreach ($row as $key=>$value) {
          // echo "$key, $value | ";
          $result->$key = $value;
        }

        $results[] = $result;
      }

      return $results;
    }

    public function get_movie_list() {
      $sql = "SELECT id, id_text, title, time, brief_summary, rating from movie_item";
      return $this->query($sql);
    }

    public function get_movie_genres_by_movie_id($movie_id) {
      $sql = "SELECT genres.name as name FROM movie_genres INNER JOIN genres ON movie_genres.genre_id = genres.id " . 
             "WHERE movie_genres.movie_id = '$movie_id';";
      return $this->query($sql);
    }
    
    public function get_movie_details_by_movie_id_text($id_text) {
      $sql = "SELECT * FROM movie_item WHERE id_text = '$id_text'";
      return $this->query($sql);
    }
    
    public function get_movie_writers_by_movie_id($movie_id) {
      $sql = "SELECT people.name FROM movie_writers INNER JOIN people ON movie_writers.people_id = people.id ".
             "WHERE movie_writers.movie_id = '$movie_id';";
      return $this->query($sql);
    }
    
    public function get_movie_casts_by_movie_id($movie_id) {
      $sql = "SELECT people.name FROM movie_casts INNER JOIN people ON movie_casts.people_id = people.id ".
             "WHERE movie_casts.movie_id = '$movie_id';";
      return $this->query($sql);
    }
    
    public function get_movie_director_by_director_id($director_id) {
      $sql = "SELECT name FROM people WHERE id = '$director_id';";
      return $this->query($sql);
    }
  }
?>