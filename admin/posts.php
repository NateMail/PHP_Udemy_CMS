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

                <?php 
                
                if(isset($_GET['source'])) {
                    $source = $_GET['source'];
                } else {
                    $source = '';
                }

                switch($source) {
                    case "400":
                        echo '400';
                    break;
                    default:
                        include "includes/view_all_posts.php";
                    break;
                }
                
                ?>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
   <?php include 'includes/admin_footer.php' ?>