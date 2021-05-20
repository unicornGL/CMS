<?php

if(isset($_GET['p_id'])) {
  $the_post_id = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = $the_post_id";
$select_posts_by_id = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
  $post_id = $row['post_id'];
  $post_author = $row['post_author'];
  $post_title = $row['post_title'];
  $post_category_id = $row['post_category_id'];
  $post_status = $row['post_status'];
  $post_image = $row['post_image'];
  $post_content = $row['post_content'];
  $post_tags = $row['post_tags'];
  $post_comment_counts = $row['post_comment_counts'];
  $post_date = $row['post_date'];
}

if(isset($_POST['update_post'])) {
  $post_title = $_POST['post_title'];
  $post_author = $_POST['post_author'];
  $post_category_id = $_POST['post_category'];
  $post_status = $_POST['post_status'];
  $post_image = $_FILES['image']['name'];
  $post_image_temp = $_FILES['image']['tmp_name'];
  move_uploaded_file($post_image_temp, "../images/$post_image");
  $post_tags = $_POST['post_tags'];
  $post_content = $_POST['post_content'];

  if(empty($post_image)) {
    $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
    $select_image = mysqli_query($link, $query) or die("QUERY FAILED" . mysqli_error($link));

    while ($row = mysqli_fetch_array($select_image)) {
      $post_image = $row['post_image'];
    }
  }

  $query = "UPDATE posts SET ";
  $query .= "post_title = '{$post_title}', ";
  $query .= "post_category_id = '{$post_category_id}', ";
  $query .= "post_date = now(), ";
  $query .= "post_author = '{$post_author}', ";
  $query .= "post_status = '{$post_status}', ";
  $query .= "post_tags = '{$post_tags}', ";
  $query .= "post_content = '{$post_content}', ";
  $query .= "post_image = '{$post_image}' ";
  $query .= "WHERE post_id = {$the_post_id}";

  $update_post = mysqli_query($link, $query) or die("QUERY FAILED" . mysqli_error($link));

  header("Location: admin_posts.php");
}
?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="post_title">Post Title</label>
    <input value="<?= $post_title; ?>" type="text" class="form-control" name="post_title">
  </div>
  <div class="form-group">
    <label for="post_category">Post Category</label><br />
    <select name="post_category" id="">

<?php

$query = "SELECT * FROM categories";
$select_categories = mysqli_query($link, $query) or die("QUERY FAILED" . mysqli_error($link));

while ($row = mysqli_fetch_assoc($select_categories)) {
  $cat_id = $row['cat_id'];
  $cat_title = $row['cat_title'];

  echo "<option value='{$cat_id}'>{$cat_title}</option>";
}

?>

    </select>
  </div>
  <div class="form-group">
    <label for="post_author">Post Author</label>
    <input value="<?= $post_author; ?>" type="text" class="form-control" name="post_author">
  </div>
  <div class="form-group">
    <label for="post_status">Post Status</label><br />
    <select name="post_status" id="">
      <option value="<?= $post_status; ?>"><?= $post_status; ?></option>

<?php

if ($post_status == 'published') {
  echo "<option value='draft'>draft</option>";
} else {
  echo "<option value='published'>publish</option>";
}

?>
    </select>
  </div>
  <div class="form-group">
    <img width="100px" src="../images/<?= $post_image; ?>" alt="">
  </div>
  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input value="<?= $post_tags; ?>" type="text" class="form-control" name="post_tags">
  </div>
  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" name="post_content" id="editor" cols="30" rows="10"><?= $post_content; ?></textarea>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_post" value="Edit Post">
  </div>
</form>