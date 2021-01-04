
<?php 
    if(isset($_POST['create_user'])) {
        $user_first_name = $_POST['user_first_name'];
        $user_last_name = $_POST['user_last_name'];
        $user_role = $_POST['user_role'];
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        $user_image = $_FILES['image']['name'];
        $user_image_temp = $_FILES['image']['tmp_name'];

        move_uploaded_file($user_image_temp, "../images/$user_image");

        $query = "INSERT INTO users(username, user_password, user_first_name, user_last_name,  user_email, user_image, user_role)";

        $query .= "VALUES('{$username}', '${user_password}', '${user_first_name}', '{$user_last_name}', '{$user_email}', '{$user_image}', '{$user_role}' ) ";

        $create_user_query = mysqli_query($connection, $query);

        confirm($create_user_query);

        echo "User Created: " . " " . "<a href='users.php'>View Users</a> ";

    }
?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label for="user_first_name">First Name</label>
        <input type="text" class="form-control" name="user_first_name">
    </div>

    <div class="form-group">
        <label for="user_last_name">Last Name</label>
        <input type="text" class="form-control" name="user_last_name">
    </div>

        <div class="form-group">
            <select name="user_role" id="">
            <option value="subscriber">Select Options</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
            </select>
        </div>
    
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>


    <div class="form-group">
        <label for="user_image">User Image</label>
        <input type="file" name="image">
    </div>


    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
    </div>

</form>