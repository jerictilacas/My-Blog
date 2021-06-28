<?php

    if(isset($_GET['edit_user'])){
        $the_user_id = $_GET['edit_user'];
    }
    $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
    $update_user_by_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($update_user_by_id)){

        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_password = $row['user_password'];
//        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
    }
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

        if (empty($user_image)){

            $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
            $select_image = mysqli_query($connection, $query);

            while($row = mysqli_fetch_array($select_image)){
                $user_image = $row['user_image'];
            }
        }

        $query = "SELECT randSalt FROM users ";
        $select_randSalt_query = mysqli_query($connection, $query);

        if(!$select_randSalt_query){
            die("Query Failed" . mysqli_error($connection));
        }

        $row = mysqli_fetch_array($select_randSalt_query);
        $salt = $row['randSalt'];
        $hashed_password = crypt($user_password, $salt);

        $query = "UPDATE users SET ";
        $query .= "username = '{$username}', ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_password = '{$hashed_password}', ";
        $query .= "user_role = '{$user_role}' ";
        $query .= "WHERE user_id = {$the_user_id} ";
//        $query .= "user_image = '{$user_image}' ";

        $update_user = mysqli_query($connection, $query);
        if(!$update_user){
            die("Query Failed" . mysqli_error($connection));
        }
        echo "<div class='alert alert-success' role='alert'>SUCCESS <br>User successfully updated.</div>";

    }
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input value="<?php echo $user_lastname; ?>"type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <label for="role">Role</label></br>
        <select name="user_role" id="">
            <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
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
        <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
    </div>

</form>