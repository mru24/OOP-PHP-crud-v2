<?php
include 'classes/posts.php';

include 'inc/header.php';

?>

<div class="container">
  <div class="jumbotron">
    <h1>Some title</h1>
  </div>

  <div class="main">
    <?php
      $q = 'SELECT * FROM learn ORDER BY time DESC';
      $rows = $posts->showPosts($q);

    foreach ($rows as $row): ?>
      <div class="post">
        <h3><?php echo $row->title; ?></h3>
        <p><?php echo $row->body; ?></p>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="aside">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  </div>

  <div class="clear-float"></div>
  <a href="pages/add.php">
    <button type="button" name="button">Add Post</button>
  </a>

</div>


<?php
include 'inc/footer.php';
?>
