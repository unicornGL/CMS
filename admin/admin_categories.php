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
                        <div class="col-xs-6">
<?php insertCategories(); ?>
                          <form action="" method="post">
                            <div class="form-group">
                              <label for="cat-title">Add Category</label>
                              <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                          </form>
<?php 

if(isset($_GET['edit'])) {
  $cat_id = $_GET['edit'];

  include "includes/admin_update_categories.php";
} 

?>
                        </div>
                        <div class="col-xs-6">
                          <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <!-- <th>ID</th> -->
                                <th>Category Title</th> 
                                <th>Edit</th> 
                                <th>Delete</th> 
                              </tr>
                            </thead>
                            <tbody>
<?php 

findAllCategories();
deleteCategory();

?>
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>