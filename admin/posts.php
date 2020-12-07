<?php include 'includes/admin_header.php' ?>
    <div id="wrapper">
        <!-- Navigation -->
       <?php include 'includes/admin_navigation.php' ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                <h1 class="page-header">
                           Welcome to Admin
                            <small>Author</small>
                </h1>

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>Id</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Tags</th>
                        <th>Comments</th>
                        <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = 'SELECT * FROM posts';
                            $select_posts = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($select_posts)) {
                                $post_id = $row['id'];
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_category_id = $row['post_category_id'];
                                $post_date = $row['post_date'];
                                $post_image = $row['post_image'];
                                $post_tag = $row['post_tag'];
                                $post_comment_count = $row['post_comment_count'];
                                $post_status = $row['post_status'];

                                echo "<tr>";
                                echo "<td>{$post_id}</td>";
                                echo "<td>{$post_author}</td>";
                                echo "<td>{$post_title}</td>";
                                echo "<td>{$post_category_id}</td>";
                                echo "<td>{$post_status}</td>";
                                echo "<td><img src='../images/$post_image' width='100' /></td>";
                                echo "<td>{$post_tag}</td>";
                                echo "<td>{$post_comment_count}</td>";
                                echo "<td>{$post_date}</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
   <?php include 'includes/admin_footer.php' ?>