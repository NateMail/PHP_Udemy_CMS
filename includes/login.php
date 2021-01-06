<?php include "db.php"; ?>
<?php session_start(); ?>

<?php 

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $select_user_query = mysqli_query($connection, $query);

        if(!$select_user_query) {
            die('Query failed'. mysqli_error($connection));
        }

        while($row = mysqli_fetch_array($select_user_query)){

            $db_id = $row['user_id'];
            $db_username = $row['username'];
            $db_first_name = $row['user_first_name'];
            $db_last_name = $row['user_last_name'];
            $db_role = $row['user_role'];
            $db_password = $row['user_password'];
        }

        $password = crypt($password, $db_password);

        if($username === $db_username && $password === $db_password)  {
            $_SESSION['username'] = $db_username;
            $_SESSION['first_name'] = $db_first_name;
            $_SESSION['last_name'] = $db_last_name;
            $_SESSION['role'] = $db_role;

            header("Location: ../admin");
        } else {
            header("Location: ../index.php");
        }

    }

?>