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

  public function showPost($q, $id) {
    $this->query($q);
    $this->bind(':id', $id);
    $row = $this->showOne();
    return $row;
  }

  public function add($title, $body, $q) {
    $this->query($q);
    $this->bind(':title', $title);
    $this->bind(':body', $body);
    $this->execute();
  }

  public function edit($q, $title, $body, $id) {
    $this->query($q);
    $this->bind(':title', $title);
    $this->bind(':body', $body);
    $this->bind(':id', $id);
    $this->execute();
  }

  public function delete($q, $id) {
    $this->query($q);
    $this->bind(':id', $id);
    $this->execute();
  }

  public function strip_bad_chars($input) {
    $output = preg_replace("/[^a-zA-Z0-9_-]/", "", $input);
    return $output;
  }
}

$posts = new Posts;
