<?php

function confirmQuery($result){

    global $connection;

    if(!$result){
        die("Query Failed" . mysqli_error($connection));
    }
}

function insert_categories(){

    global $connection;

    //Adding Category Query
    if(isset($_POST['submit'])){

        $cat_title = $_POST['cat_title'];
        if ($cat_title == "" || empty($cat_title)){

            echo "<div class='alert alert-danger' role='alert'><strong>WARNING</strong><br>This field should not be empty.</div>";

        }else{

            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('{$cat_title}') ";

            $create_category_query = mysqli_query($connection, $query);

            if(!$create_category_query){
                die('Query Failed' . mysqli_error($connection));
            }
            echo "<div class='alert alert-success' role='alert'>SUCCESS <br>Category successfully added.</div>";
        }
    }
}

function find_all_categories(){

    global $connection;

    // Find All Categories Query
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories)){
        $cat_id= $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "</tr>";
    }

}

function delete_categories(){

    global $connection;

    // Delete Category
    if(isset($_GET['delete'])){

        $get_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$get_cat_id}";

        $delete_category_query = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
}

function is_admin($username = ''){

    global $connection;

    $query = "SELECT user_role FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    $row = mysqli_fetch_array($result);

    if ($row['user_role'] == 'admin'){
        return true;
    }else{
        return false;
    }
}

function insert_posts ($posts){

    global $connection;

    $query = "INSERT INTO posts ";
    $query .= "(post_author, post_title, post_category_id, post_status, post_image, post_tags )";
    $query .= " VALUES (";
    $query .= "'" . ($posts['post_author']) . "',";
    $query .= "'" . ($posts['post_title']) . "',";
    $query .= "'" . ($posts['post_category_id']) . "',";
    $query .= "'" . ($posts['post_status']) . "',";
    $query .= "'" . ($posts['post_image']) . "',";
    $query .= "'" . ($posts['post_tags']) . "' ";
    $query .= ")";
    $create_post_query = mysqli_query($connection, $query);

    confirmQuery($create_post_query);

}
