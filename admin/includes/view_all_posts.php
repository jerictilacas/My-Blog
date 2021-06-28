<?php

include("delete_modal.php");

if(isset($_POST['checkBoxArray'])){

    foreach ($_POST['checkBoxArray'] as $postValueId ) {

        $bulk_options = $_POST['bulk_options'];

        switch ($bulk_options){

            case 'Published':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
                $update_published_query = mysqli_query($connection, $query);

                confirmQuery($update_published_query);

            case 'Draft':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
                $update_draft_query = mysqli_query($connection, $query);

                confirmQuery($update_draft_query);
            break;

            case 'Delete':
                $query = "DELETE FROM posts WHERE post_id = {$postValueId} ";
                $update_delete_query = mysqli_query($connection, $query);

                confirmQuery($update_delete_query);
            break;

            case 'Clone':

                $query = "SELECT * FROM posts WHERE post_id = '{$postValueId}' ";
                $select_post_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($select_post_query)){
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_category_id = $row['post_category_id'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_date = $row['post_date'];
                    $post_content = $row['post_content'];
                }

                $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_tags, post_status, post_content) ";
                $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_tags}', '{$post_status}' , '{$post_content}' ) ";

                $copy_query = mysqli_query($connection, $query);

                if(!$copy_query){
                    die("Query Failed" . mysqli_error($connection));
                }

            break;
        }
    }
}
?>
<form action="" method="post">
<table class="table table-bordered table-hover">

    <div id="bulkOptionsContainer" class="col-xs-4" style="padding: 0px;">

        <select class="form-control" name="bulk_options" id="">

            <option value="">Select Options</option>
            <option value="Published">Published</option>
            <option value="Draft">Draft</option>
            <option value="Clone">Clone</option>
            <option value="Delete">Delete</option>
        </select>
    </div>

    <div class="col-xs-4">
    <input type="submit" name="submit" class="btn btn-success" value="Apply">
         <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a><br><br>
    </div>
    <div class="col-xs-4" align="right" style="padding: 0px">
         <a class="btn btn-primary" href="posts.php?source=import_blog"><i class="fa fa-plus">&nbsp;</i>Bulk Add</a>
    </div>
    <thead>
    <tr>
        <th><input id="selectAllBoxes" type="checkbox"></th>
        <th>ID</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
    <!--<th>Comments</th>-->
        <th>Date</th>
        <th>FrontEnd</th>
        <th>Update</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>

    <?php

    $query = "SELECT * FROM posts ORDER BY post_id DESC ";
    $select_posts = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_posts)){
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];

        echo "<tr>";

        ?>
        <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]"value="<?php echo $post_id; ?>"></td>

        <?php

        echo "<td>$post_id</td>";
        echo "<td>$post_author</td>";
        echo "<td>$post_title</td>";

        $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
        $select_categories_id = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_categories_id)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

        echo "<td>{$cat_title}</td>";

        }

        echo "<td>$post_status</td>";
        echo "<td><img width='100' src='../images/$post_image' alt='image' </td>";
        echo "<td>$post_tags</td>";
//        echo "<td>$post_comment_count</td>";
        echo "<td>$post_date</td>";
        echo "<td><a href='../post.php?p_id={$post_id}'>View</a></td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        echo "<td><a rel='$post_id' href='javascript:void(0)' class='delete_link'>Delete</a></td>";
        echo "</tr>";
    }
    ?>
    </tbody>

</table>
</form>

<?php

if (isset($_GET['delete'])){

    $delete_post_id = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id= {$delete_post_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location: posts.php");
}
?>

<script>

    $(document).ready(function () {

        $(".delete_link").on('click' , function () {

            var id = $(this).attr("rel");
            var delete_url = "posts.php?delete="+ id +" ";

            $(".modal_delete_link").attr("href", delete_url);

            $("#myModal").modal('show');

        });

    });


</script>
