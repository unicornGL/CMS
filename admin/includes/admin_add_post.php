<?php

if (isset($_POST['create_post'])) {
  $post_title = $_POST['post_title'];
  $post_author = $_POST['post_author'];
  $post_category_id = $_POST['post_category'];
  $post_status = $_POST['post_status'];
  $post_image = $_FILES['image']['name'];
  $post_image_temp = $_FILES['image']['tmp_name'];
  move_uploaded_file($post_image_temp, "../images/$post_image");
  $post_tags = $_POST['post_tags'];
  $post_content = $_POST['post_content'];
  $post_date = date('y-m-d');

  $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status)";

  $query .= "VALUES('{$post_category_id}', '${post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}')";

  $create_post_query = mysqli_query($link, $query) or die ("QUERY FAILED" . mysqli_error($list));

  header("Location: admin_posts.php");
}

?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="post_title">Post Title</label>
    <input type="text" class="form-control" name="post_title">
  </div>
  <div class="form-group">
    <label for="post_category">Post Category</label><br />
    <select name="post_category" id="">

<?php

$query = "SELECT * FROM categories";
$select_categories = mysqli_query($link, $query) or die ("QUERY FAILED" . mysqli_error($link));

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
    <input type="text" class="form-control" name="post_author">
  </div>
  <div class="form-group">
    <label for="post_status">Post Status</label><br />
    <select name="post_status" id="">
      <option value="published">publish</option>
      <option value="draft">draft</option>
    </select>
  </div>
  <!-- <div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" class="form-control" name="post_status">
  </div> -->
  <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="image">
  </div>
  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags">
  </div>
  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" name="post_content" id="editor" cols="30" rows="10"></textarea>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
  </div>
</form>