<?php
define('TITLE', 'one interesting post');

include '../classes/posts.php';

include ROOT.'inc/header.php';

// SHOW POST
if (isset($_GET['id'])) {
  $id = $posts->strip_bad_chars($_GET['id']);
  $q = 'SELECT * FROM learn WHERE id = :id';
  $row = $posts->showPost($q, $id);
}
?>

<div class="container">
  <?php
  include ROOT.'inc/jumbotron.php';
  ?>

  <div class="main">

    <div class="post">
      <h3><?php echo $row->title; ?></h3>

      <p><?php echo $row->body; ?></p>
    </div>

  </div>

  <div class="aside">

    <!-- <?php include ROOT.'inc/aside.php'; ?> -->

  </div>

  <div class="clear-float"></div>

  <div class="button-container">
    <a href="edit.php?id=<?php echo $row->id; ?>">
      <button type="button" name="button">Edit post</button>
    </a>
    <a href="delete.php?id=<?php echo $row->id; ?>">
      <button class="red" type="button" name="button">Delete post</button>
    </a>
    <a href="<?php echo ROOT_URL; ?>">
      <button class="green" type="button" name="button">Main page</button>
    </a>
  </div>


</div>


<?php
include ROOT.'inc/footer.php';
?>
