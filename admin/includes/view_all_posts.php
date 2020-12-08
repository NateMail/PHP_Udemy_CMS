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
                        <th>Update</th>
                        <th>Delete</th>
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
                                echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Update</a></td>";
                                echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>

                <?php

                    if(isset($_GET['delete'])) {
                        $post_id = $_GET['delete'];

                    $query = "DELETE FROM posts WHERE id = {$post_id}";
                    $delete_query = mysqli_query($connection, $query);
                    if($delete_query) {
                        header("Location: posts.php");
                    }
                    }
                
                ?>