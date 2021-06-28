
<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

    <!-- Navigation -->

    <?php include "includes/admin_navigation.php"; ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Blog Category
                        <small></small>
                    </h1>

                    <div class="col-xs-6">

                    <!-- Adding Category Query-->
                    <?php insert_categories(); ?>

                        <!--Add Category Form-->
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>

                        </form>

                    <!--Update_categories-->
                    <?php

                    if(isset($_GET['edit'])){
                        $cat_id = $_GET['edit'];

                        include "includes/update_categories.php";
                    }
                    ?>

                    </div>
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Title</th>
                                <th>Update</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                    <!--Find All Categories Query-->
                    <?php find_all_categories(); ?>

                    <!--Delete Categories Query-->
                    <?php delete_categories(); ?>

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