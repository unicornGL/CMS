<?php include 'includes/db.php' ?>

<!-- Header -->
<?php include 'includes/header.php' ?>

    <!-- Navigation -->
    <?php include 'includes/nav.php' ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

<?php

$query = "SELECT * FROM posts ORDER BY post_id DESC";
$select_all_posts_query = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = substr($row['post_content'], 0, 300);
    $post_status = $row['post_status'];

    if ($post_status == 'published') {

?>

                <!-- <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> -->

                <!-- First Blog Post -->
                <div class="articel-wrapper">
                    <h2>
                        <a href="post.php?p_id=<?= $post_id; ?>"><?= $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?= $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?= $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?= $post_image; ?>" alt="">
                    <hr>
                    <p><?= $post_content; ?></p>
                    <a class="btn btn-primary" href="post.php?p_id=<?= $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <hr>
                </div>

<?php }} ?>


            <!-- Blog Sidebar Widgets Column -->
            </div>
            <?php include 'includes/sidebar.php' ?>
            
        </div>

<!-- Footer -->
<?php include 'includes/footer.php' ?>