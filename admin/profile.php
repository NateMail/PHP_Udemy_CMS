<?php include 'includes/admin_header.php' ?>
<?php
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];

        $query = "SELECT * FROM users WHERE username = '{$username}' ";

        $select_user_profile = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_user_profile)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_email = $row['user_email'];
            $user_first_name = $row['user_first_name'];
            $user_last_name = $row['user_last_name'];
            $user_role = $row['user_role'];
            $user_image = $row['user_image'];
            $user_password = $row['user_password'];
        }
    }
?>

<?php

if(isset($_POST['edit_user'])) {
    $user_first_name = $_POST['user_first_name'];
    $user_last_name = $_POST['user_last_name'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    // $user_image = $_FILES['image']['name'];
    // $user_image_temp = $_FILES['image']['tmp_name'];

    // move_uploaded_file($user_image_temp, "../images/$user_image");

    // if(empty($user_image)) {
    //     $query = "SELECT * FROM users WHERE user_id = $user_id ";
    //     $select_image = mysqli_query($connection, $query);

    //     while($row = mysqli_fetch_array($select_image)) {
    //         $user_image = $row['user_image'];
    //     }
    // }

    // NEED TO ADD PICTURE BACK FOR FINAL 
    $query = "UPDATE users SET username = '{$username}', user_first_name = '{$user_first_name}', user_last_name = '{$user_last_name}', user_email = '{$user_email}', user_role = '{$user_role}', user_password = '{$user_password}' WHERE username = '{$username}' ";

    $update_user = mysqli_query($connection, $query);

    confirm($update_user);

}

?>
    <div id="wrapper">
        <!-- Navigation -->
       <?php include 'includes/admin_navigation.php' ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                <h1 class="page-header">
                    Welcome to Admin
                    <small><?php echo $username; ?></small>
                </h1>

                <h3 class='text-center'>Edit Profile</h3>
                <!--Edit user form-->
                <form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_first_name">First Name</label>
        <input type="text" class="form-control" value="<?php echo $user_first_name; ?>" name="user_first_name">
    </div>

    <div class="form-group">
        <label for="user_last_name">Last Name</label>
        <input type="text" class="form-control" value="<?php echo $user_last_name; ?>" name="user_last_name">
    </div>

        <div class="form-group">
            <select name="user_role" id="">
            <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
            <?php 
                if($user_role == 'admin') {
                    echo "<option value='subscriber'>subscriber</option>";
                } else {
                    echo "<option value='admin'>admin</option>";
                }
            ?>
            </select>
        </div>
    
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
    </div>


    <!-- <div class="form-group">
        <label for="user_image">User Image</label>
        <input type="file" name="image">
        <br />
        <img src="../images/ !!! ADD PHP TAG HERE !!!  echo $user_image; ?>" width="100">
    </div> -->


    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
    </div>

</form>


                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
   <?php include 'includes/admin_footer.php' ?>