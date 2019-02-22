<?php
define('TITLE', 'add post');

include '../classes/posts.php';

if (isset($_POST['submit'])) {
  $title = htmlentities($_POST['title'], ENT_QUOTES, "UTF-8");
  $body = htmlentities($_POST['body'], ENT_QUOTES, "UTF-8");
  $q = 'INSERT INTO learn (title, body) VALUES (:title, :body)';
  $posts->add($title, $body, $q);
  header('Location: '.ROOT);
}

include ROOT.'inc/header.php';
?>

<div class="container">

  <?php
    include ROOT.'inc/jumbotron.php';
  ?>

  <div class="main">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <div class="form-cell">
        <label>Title</label>
        <input type="text" name="title">
      </div>
      <div class="form-cell">
        <label>Post</label>
        <textarea type="text" name="body"></textarea>
      </div>

      <div class="button-container">
        <button class="green" type="submit" name="submit">Submit</button>
        <a href="<?php echo ROOT; ?>">
          <button type="button" name="button">Cancel</button>
        </a>
      </div>

    </form>
  </div>

  <div class="aside">
    <?php include ROOT.'inc/aside.php'; ?>
  </div>

</div>


<?php
include ROOT.'inc/footer.php';
?>
