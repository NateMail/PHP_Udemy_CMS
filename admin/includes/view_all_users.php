<table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Update</th>
                        <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = 'SELECT * FROM users';
                            $select_users = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($select_users)) {
                                $user_id = $row['user_id'];
                                $username = $row['username'];
                                $user_email = $row['user_email'];
                                $user_first_name = $row['user_first_name'];
                                $user_last_name = $row['user_last_name'];
                                $user_role = $row['user_role'];
                                $user_image = $row['user_image'];
                                $user_password = $row['user_password'];

                                echo "<tr>";
                                echo "<td>{$user_id}</td>";
                                echo "<td>{$username}</td>";
                                echo "<td>{$user_first_name}</td>";
                                echo "<td>{$user_last_name}</td>";
                                echo "<td>{$user_email}</td>";
                                echo "<td>{$user_role}</td>";

                                // $query = "SELECT * FROM posts WHERE id = $comment_post_id ";
                                // $select_post_id_query = mysqli_query($connection, $query);
                                // while($row = mysqli_fetch_assoc($select_post_id_query)){
                                //     $post_title = $row['post_title'];
                                //     $post_id = $row['id'];
                                // }
                                
                                echo "<td><a href='comments.php?approved='>Update</a></td>";


                                echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                                echo "</tr>";
                            }
                        ?>
                        
                    </tbody>
                </table>

                <?php

                   if(isset($_GET['approved'])) {
                        $comment_id = $_GET['approved'];
                        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $comment_id ";
                        $approved_query = mysqli_query($connection, $query);
                        header("Location: comments.php");
                   }

                if(isset($_GET['delete'])) {
                    $user_id = $_GET['delete'];

                $query = "DELETE FROM users WHERE user_id = {$user_id}";
                $delete_query = mysqli_query($connection, $query);
                if($delete_query) {
                    header("Location: users.php");
                }
                }
                ?>