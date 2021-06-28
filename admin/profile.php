
<?php include "includes/admin_header.php"; ?>

<?php

if(isset($_SESSION['username'])){

    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_profile_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_profile_query)){
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_password = $row['user_password'];
        $user_role = $row['user_role'];
    }
}
?>

<div id="wrapper">

    <!-- Navigation -->

    <?php include "includes/admin_navigation.php"; ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Admin Profile
                        <small><?php echo $_SESSION['user_firstname']; ?></small>
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="firstname">Firstname</label>
                            <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
                        </div>

                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label></br>
                            <select name="user_role" id="">
                                <option value="subscriber"><?php echo $user_role; ?></option>
                                <?php

                                if($user_role == 'admin'){
                                    echo "<option value='subscriber'>subscriber</option>";
                                }else{
                                    echo "<option value='admin'>admin</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!--    <div class="form-group">-->
                        <!--        <label for="image">Image</label>-->
                        <!--        <input type="file" name="image">-->
                        <!--    </div>-->

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input value="<?php echo $user_email; ?>" type="email" class="form-control" name="user_email">
                        </div>


                        <div class="form-group">
                            <label for="password">Password</label>
                            <input value="<?php echo $user_password; ?>" type="password" class="form-control" name="user_password">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="update_user" value="Update Profile">
                        </div>

                    </form>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
    </div>

    <?php


    if(isset($_POST['update_user'])){

        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_role = $_POST['user_role'];
//        $user_image = $_FILES['image']['name'];
//        $user_image_temp = $_FILES['image']['tmp_name'];
//
//        move_uploaded_file($user_image_temp, "../images/$user_image");

//        if (empty($user_image)){
//
//            $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
//            $select_image = mysqli_query($connection, $query);
//
//            while($row = mysqli_fetch_array($select_image)){
//                $user_image = $row['user_image'];
//            }
//        }
        $query = "UPDATE users SET ";
        $query .= "username = '{$username}', ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_password = '{$user_password}', ";
        $query .= "user_role = '{$user_role}' ";
        $query .= "WHERE username = '{$username}' ";
//        $query .= "user_image = '{$user_image}' ";

        $update_user_query = mysqli_query($connection, $query);
        if(!$update_user_query){
            die("Query Failed" . mysqli_error($connection));
        }
    }

    ?>

    <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>