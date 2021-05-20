<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Author</th>
      <th>Title</th>
      <th>Category</th>
      <th>Status</th>
      <th>Image</th>
      <th>Tags</th>
      <th>Comments</th>
      <th>Date</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>

<?php

$query = "SELECT * FROM posts ORDER BY post_id DESC";
$select_posts = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($select_posts)) {
$post_id = $row['post_id'];
$post_author = $row['post_author'];
$post_title = $row['post_title'];
$post_category_id = $row['post_category_id'];
$post_status = $row['post_status'];
$post_image = $row['post_image'];
$post_tags = $row['post_tags'];
$post_comment_counts = $row['post_comment_counts'];
$post_date = $row['post_date'];

echo "<tr>";
echo "<td>$post_id</td>";
echo "<td>$post_author</td>";
echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";

$query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
$select_categories_id = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($select_categories_id)) {
  $cat_id = $row['cat_id'];
  $cat_title = $row['cat_title'];
  echo "<td>{$cat_title}</td>";
}

echo "<td>$post_status</td>";
echo "<td><img width='100px' src='../images/$post_image'></td>";
echo "<td>$post_tags</td>";
echo "<td>$post_comment_counts</td>";
echo "<td>$post_date</td>";
echo "<td><a href='admin_posts.php?source=admin_edit_post&p_id={$post_id}'>Edit</a></td>";
echo "<td><a href='admin_posts.php?delete={$post_id}'>X</a></td>";
echo "</tr>";
}
?>

  </tbody>
</table>

<?php

if(isset($_GET['delete'])) {
  $the_post_id = $_GET['delete'];
  $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
  $delete_query = mysqli_query($link, $query) or die("QUERY FAILED" . mysqli_error($link));
  header("Location: admin_posts.php");
}

?>