<?php

    if (isset($_POST["import"])) {

        $fileName = $_FILES["file"]["tmp_name"];

        if ($_FILES["file"]["size"] > 0) {

            $file = fopen($fileName, "r");

            // w/ limit
            // $header = fgetcsv($file, 1000, ",");

            $header = fgetcsv($file);
            $header = array_map('trim', $header);

            while ($row = fgetcsv($file)) {

                $data = array_combine($header, array_map('trim', $row));
                $posts = array();
                $posts['post_author'] = $data['author'];
                $posts['post_title'] = $data['title'];
                $posts['post_category_id'] = $data['category'] ?? '';
                $posts['post_status'] = $data['status'] ?? '';
                $posts['post_image'] = $data['image'] ?? '';
                $posts['post_tags'] = $data['tags'] ?? '';

                if(!empty($posts))
                {
                    $result = insert_posts($posts);
                }
            }

            header("Location: ./posts.php");
        }
} else {
    // display the blank form
    $posts = [];
    $posts["post_author"] = '';
    $posts["post_title"] = '';
    $posts["post_category_id"] = '';
    $posts["post_status"] = '';
    $posts["post_image"] = '';
    $posts["post_tags"] = '';
}

?>

<div id="content" class="form-group">


    <div class="form-control-static">
        <h3>Upload Blog Posts</h3>
<br>
        <p><?php echo _('You can use csv template provided.');?> <a href="<?php echo ('import/bulk.csv'); ?>" download><?php echo _('Download it here');?></a></p>


        <form action="" enctype="multipart/form-data" method="post">
            <dl>
                <dd><input type="file" name="file" accept=".csv"</dd>
            </dl>
<br>
<br>
<br>
<br>
<br>

            <div id="operations">
                <a class="btn btn-primary" href="./posts.php">&laquo; Back</a>
                <input class="btn btn-success" type="submit" name="import" value="Upload" />

            </div>
        </form>

    </div>

</div>