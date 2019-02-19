<?php
include '../classes/posts.php';

if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $body = $_POST['body'];
  $q = 'INSERT INTO learn (title, body) VALUES (:title, :body)';
  $posts->add($title, $body, $q);
}

include ROOT.'inc/header.php';
?>

<div class="container">
  <div class="jumbotron">
    <h1>post</h1>
  </div>
  <a href="<?php echo ROOT; ?>">
    <button type="button" name="button">Back</button>
  </a>
  <hr>
  <div class="main">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <div class="form-cell">
        <label>Title</label>
        <input type="text" name="title">
      </div>
      <div class="form-cell">
        <label>Post</label>
        <input type="text" name="body">
      </div>
      <button type="submit" name="submit">Submit</button>
    </form>
  </div>

  <div class="aside">

  </div>

</div>


<?php
include ROOT.'inc/footer.php';
?>
