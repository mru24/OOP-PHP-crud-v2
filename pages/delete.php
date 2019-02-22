<?php
define('TITLE', 'delete post');

include '../classes/posts.php';

include ROOT.'inc/header.php';

// SHOW POST
if (isset($_GET['id'])) {
  $id = $posts->strip_bad_chars($_GET['id']);
  $q = 'SELECT * FROM learn WHERE id = :id';
  $row = $posts->showPost($q, $id);

  if (isset($_POST['submit'])) {
    $id = $row->id;
    $q = 'DELETE FROM learn WHERE id = :id';
    $posts->delete($q, $id);
    header('Location: '.ROOT_URL);
  }
}
?>

<div class="container">
  <?php
  include ROOT.'inc/jumbotron.php';
  ?>

  <div class="main">

    <div class="delete">
      <h2>Are you sure to delete post:</h2>
      <h3 class="center"><?php echo $row->title; ?></h3>

      <p class="center"><?php echo $row->body; ?></p>

      <div class="button-container">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
          <button class="red" type="submit" name="submit">Delete post</button>
        </form>

        <a href="<?php echo ROOT_URL; ?>">
          <button class="green" type="button" name="button">Cancel</button>
        </a>
      </div>
    </div>

  </div>





</div>


<?php
include ROOT.'inc/footer.php';
?>
