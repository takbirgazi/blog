<?php
/*
 * This is header file 
 */
// Header Section code file
require_once("tmp/dash_header.php");
// Functional Code File
include_once("tmp/functions.php");
// Class Object of Functon File.
$config_obj = new Configration();
// Session Set
session_start();
if (!isset($_SESSION["name"])) {
    header("Location: index.php");
}
//Log out Option
if (isset($_GET['logout'])) {
    if ($_GET['logout'] == 'logedout') {
        $config_obj->admin_log_out();
    }
}
// Dashbord data showing object
$dash_dat = $config_obj->dash_show_data();

?>
<div class="col-md-10">
    <div class="main-content">
        <!-- The Changable Content Strat Here-->
        <?php
        // file include base of condation
        if (isset($_GET['id'])) {
            $manage = $_GET['id'];
            if ($manage == 'cat_manage' || $manage == 'delete_cat') {
                // Manage Category
                require_once("manage_category.php");
            } else if ($manage == 'cat_add') {
                // Add Category
                require_once("add_category.php");
            } else if ($manage == 'post_add') {
                // Add Post
                require_once("add_post.php");
            } else if ($manage == 'post_manage' || $manage == 'delete_post') {
                // Manage Post
                require_once("manage_post.php");
            } else if ($manage == 'edit_cat' && $_GET['sl']) {
                // Edit Category
                require_once("edit_category.php");
            } else if ($manage == 'edit_post' && $_GET['sl']) {
                // Edit Category
                require_once("edit_post.php");
            }
        } else { ?>

            <h5>Dashboard</h5>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">S/N</th>
                            <th scope="col">Post Title</th>
                            <th scope="col">Post Summery</th>
                            <th scope="col">Category</th>
                            <th scope="col">Date</th>
                            <th scope="col">Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($dash_dat)): ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $i++; ?>
                                </th>
                                <td>
                                    <?php
                                    // Dashbord Data Show
                                    if (strlen($row["post_title"]) >= 30) {
                                        // Post Title show shortly 
                                        $strcunt = $row["post_title"];
                                        echo substr("$strcunt", 0, 30) . "<b> .....</b>";
                                    } else {
                                        echo $row["post_title"];
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php

                                    if (strlen($row["post_summery"]) >= 50) {
                                        // Post summery show shortly 
                                        $strcunt = $row["post_summery"];
                                        echo substr("$strcunt", 0, 50) . "<b> .....</b>";
                                    } else {
                                        echo $row["post_summery"];
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php echo $row['cat_name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['post_date']; ?>
                                </td>
                                <td>
                                    <?php echo $row['post_auth']; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
        <!-- The Changable Content Eand Here-->
    </div>
</div>
<?php
/*
 * Footer File  
 */
require_once("tmp/dash_footer.php");

?>