<table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Change to Admin</th>
                        <th>Change to Subscriber</th>
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
                                
                                echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";

                                echo "<td><a href='users.php?change_to_subscriber={$user_id}'>Subscriber</a></td>";


                                echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                                echo "</tr>";
                            }
                        ?>
                        
                    </tbody>
                </table>

                <?php

                   if(isset($_GET['change_to_admin'])) {
                        $user_id = $_GET['change_to_admin'];

                        $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $user_id ";
                        $change_to_admin_query = mysqli_query($connection, $query);
                        if($change_to_admin_query) {
                            header("Location: users.php");
                        }
                   }

                   if(isset($_GET['change_to_subscriber'])) {
                    $user_id = $_GET['change_to_subscriber'];
                    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $user_id ";
                    $change_to_subscriber_query = mysqli_query($connection, $query);
                    if($change_to_subscriber_query) {
                        header("Location: users.php");
                    }
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