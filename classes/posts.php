<?php

include 'database.php';

/**
 *
 */
class Posts extends Database {

  public function showPosts($q) {
    $this->query($q);
    $rows = $this->showAll();
    return $rows;
  }

  public function add($title, $body, $q){
    $this->query($q);
    $this->bind(':title', $title);
    $this->bind(':body', $body);
    $this->execute();
    header('Location: '.ROOT);
  }
}

$posts = new Posts;
