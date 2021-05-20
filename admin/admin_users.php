<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_nav.php"; ?>
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                      <h1 class="page-header">
                        Hi <b><?= $_SESSION['username']; ?></b>, welcome to the admin page
                      </h1>
<?php

if (isset($_GET['source'])) {
  $source = $_GET['source'];
} else {
  $source = '';
}

switch ($source) {
  case 'admin_add_user':
  include "includes/admin_add_user.php";
  break;

  case 'admin_edit_user':
  include "includes/admin_edit_user.php";
  break;

  default:
  include "includes/admin_view_all_users.php";
  break;
}

?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>