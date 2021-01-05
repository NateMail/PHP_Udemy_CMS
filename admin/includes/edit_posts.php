
<?php 

    if(isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
    }

    $query = "SELECT * FROM posts WHERE id = {$the_post_id} ";
    $select_posts_by_id = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_posts_by_id)) {
        $post_id = $row['id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_category_id = $row['post_category_id'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_tag = $row['post_tag'];
        $post_content = $row['post_content'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];
    }

    if(isset($_POST['update_post'])) {

        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_tag = $_POST['post_tag'];
        $post_content = $_POST['post_content'];
        

        move_uploaded_file($post_image_temp, "../images/$post_image");

        if(empty($post_image)) {
            $query = "SELECT * FROM posts WHERE id = $the_post_id ";
            $select_image = mysqli_query($connection, $query);

            while($row = mysqli_fetch_array($select_image)) {
                $post_image = $row['post_image'];
            }


        }

        $query = "UPDATE posts SET post_title = '{$post_title}', post_category_id = '{$post_category_id}', post_date = now(), post_author = '{$post_author}', post_status = '{$post_status}', post_tag = '{$post_tag}', post_content = '{$post_content}', post_image = '{$post_image}' WHERE id = '{$the_post_id}' ";

        $update_post = mysqli_query($connection, $query);

        confirm($update_post);

    }
    
?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
    </div>

    <div class="form-group">
        <select name="post_category" id="">
            <?php  
                
                $query = "SELECT * FROM categories";
                $select_categories = mysqli_query($connection, $query);

                confirm($select_categories);

                while($row = mysqli_fetch_assoc($select_categories)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
                }
            ?>
            
        </select>
    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
    </div>

    <div class="form-group">
    <select name="post_status" id="">
    <option value='<?php $post_status; ?>'><?php echo $post_status; ?></option>
    <?php 
    if($post_status == 'published') {
        echo "<option value='draft'>draft</option>";
    } else {
        echo "<option value='published'>published</option>";
    }
    ?>
    </select>
    </div>


    <div class="form-group">
            <label for="post_image">Post Image</label>
            <input type="file" name="image">
            <br>
            <img src="../images/<?php echo $post_image; ?>" width="100">
        </div>

    <div class="form-group">
        <label for="post_tag">Post Tags</label>
        <input type="text" class="form-control" name="post_tag" value="<?php echo $post_tag; ?>">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="body" cols="30" rows="10"><?php echo $post_content; ?>
        </textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
    </div>

</form>