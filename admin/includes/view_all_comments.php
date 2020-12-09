<table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>Id</th>
                        <th>Author</th>
                        <th>Comment</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>In Response to</th>
                        <th>Date</th>
                        <th>Approved</th>
                        <th>Not Approved</th>
                        <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = 'SELECT * FROM comments';
                            $select_comments = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($select_comments)) {
                                $comment_id = $row['comment_id'];
                                $comment_email = $row['comment_email'];
                                $comment_author = $row['comment_author'];
                                $comment_content = $row['comment_content'];
                                $comment_post_id = $row['comment_post_id'];
                                $comment_date = $row['comment_date'];
                                $comment_status = $row['comment_status'];

                                echo "<tr>";
                                echo "<td>{$comment_id}</td>";
                                echo "<td>{$comment_author}</td>";
                                echo "<td>{$comment_content}</td>";

                                // $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
                                // $select_categories = mysqli_query($connection, $query);
                                // while($row = mysqli_fetch_assoc($select_categories)) {
                                //     $cat_id = $row['cat_id'];
                                //     $cat_title = $row['cat_title'];
                                // }

                                // echo "<td>{$cat_title}</td>";

                                echo "<td>{$comment_email}</td>";
                                echo "<td>{$comment_status}</td>";
                                echo "<td>Some Post Title</td>";
                                echo "<td>{$comment_date}</td>";
                                echo "<td><a href=''>lonk</a></td>";
                                echo "<td><a href=''>lonk</a></td>";
                                echo "<td><a href=''>lonk</a></td>";
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
                