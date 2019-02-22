<?php
define('TITLE', 'edit post');

include '../classes/posts.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $q = 'SELECT * FROM learn WHERE id = :id';
  $row = $posts->showPost($q, $id);

  if (isset($_POST['submit'])) {
    $id = $row->id;
    $title = htmlentities($_POST['title'], ENT_QUOTES, "UTF-8");
    $body = htmlentities($_POST['body'], ENT_QUOTES, "UTF-8");
    $q = 'UPDATE learn SET title = :title, body = :body WHERE id = :id';
    $posts->edit($q, $title, $body, $id);
    header('Location: '.ROOT_URL);
  }
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
        <input type="text" name="title" value="<?php echo $row->title; ?>">
      </div>
      <div class="form-cell">
        <label>Post</label>
        <textarea type="text" name="body"><?php echo $row->body; ?></textarea>
      </div>

      <div class="button-container">
        <button class="green" type="submit" name="submit">Save</button>
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
