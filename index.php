<?php
include 'classes/posts.php';

include 'inc/header.php';

// SHOW ALL POSTS
$q = 'SELECT * FROM learn ORDER BY time DESC';
$rows = $posts->showPosts($q);

?>

<div class="container">
  <div class="jumbotron">
    <h1>My blog</h1>
    <h4>Welcome to my page</h4>
  </div>

  <div class="main">

    <?php foreach ($rows as $row): ?>

      <div class="post">
        <a href="pages/post.php?id=<?php echo $row->id; ?>">
          <h3><?php echo $row->title; ?></h3>
        </a>

        <p><?php echo $row->body; ?></p>
      </div>

    <?php endforeach; ?>

  </div>

  <div class="aside">

    <?php include 'inc/aside.php'; ?>

  </div>

  <div class="clear-float"></div>

  <div class="button-container">
    <a href="pages/add.php">
      <button type="button" name="button">Add Post</button>
    </a>
  </div>


</div>


<?php
include 'inc/footer.php';
?>
