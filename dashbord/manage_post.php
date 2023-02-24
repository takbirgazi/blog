<?php
if (!isset($_GET['id'])) {
    // not accssing manage_caegory.php file without id.
    header("Location: dashboard.php");
} else {
    // Show Post
    $posts = $config_obj->show_post();
    // Delete Post
    if (isset($_GET['id'])) {
        if ($_GET['id'] == 'delete_post') {
            $sl_id = $_GET['sl'];
            $delete_post = $config_obj->delete_post($sl_id);
        }
    }
}
?>
<h5>Your Posts</h5>
<p class="small text-danger">
    <?php 
    // Delete Category Massege Showing.
    if (isset($delete_post)) {
        echo $delete_post;
    }
    ?>
</p>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">S/N</th>
                <th scope="col">Title</th>
                <th scope="col">Summary</Summary>
                </th>
                <th scope="col">Category</th>
                <th scope="col">Thumbnail</th>
                <th scope="col">Author</th>
                <th scope="col">Published</th>
                <th scope="col">Comments</th>
                <th scope="col">Tags</th>
                <th scope="col">Stutas</th>
                <th scope="col">Acion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($posts) > 0) {
                $i = 1;
                while ($row = mysqli_fetch_assoc($posts)) { ?>
                    <tr>
                        <input type="hidden" vlue="<?php echo $row["post_id"]; ?>">
                        <th scope="row">
                            <?php echo $i++; ?>
                        </th>
                        <td>
                            <?php if (strlen($row["post_title"]) >= 30) {
                                // Post Title show shortly 
                                $strcunt = $row["post_title"];
                                echo substr("$strcunt", 0, 30) . " <a style='color:#0263c1' href='#'>...more</a>";
                            } else {
                                echo $row["post_title"];
                            } ?>
                        </td>
                        <td>
                            <?php if (strlen($row["post_summery"]) >= 50) {
                                // Post Summery show shortly 
                                $strcunt = $row["post_summery"];
                                echo substr("$strcunt", 0, 50) . " <a style='color:#0263c1' href='#'>...more</a>";
                            } else {
                                echo $row["post_summery"];
                            } ?>
                        </td>
                        <td>
                            <?php
                            if ($row["post_catagory"]) {
                                $id = $row["post_catagory"];
                                $cat_post_name = $config_obj->post_cat_name($id);
                                echo $cat_post_name["cat_name"];
                            } else {
                                echo "Uncategotize";
                            }
                            ?>
                        </td>
                        <td class="thumb_img"><img src="upload/<?php echo $row["post_thumbnil"]; ?>" alt="Thumbnail"></td>
                        <td>
                            <?php echo $row["post_auth"]; ?>
                        </td>
                        <td>
                            <?php echo $row["post_date"]; ?>
                        </td>
                        <td>
                            <?php echo $row["post_cmnt_cunt"]; ?>
                        </td>
                        <td>
                            <?php
                            if (strlen($row["post_tag"]) >= 30) {
                                // Post Tag show shortly 
                                $strcunt = $row["post_tag"];
                                echo substr("$strcunt", 0, 30) . " <a style='color:#0263c1' href='#'>...more</a>";
                            } else {
                                echo $row["post_tag"];
                            }


                            ?>
                        </td>
                        <td>
                            <?php if ($row["post_stutas"] == 1) {
                                echo "Public";
                            } else {
                                echo "Unpublic";
                            } ?>
                        </td>
                        <td><a href="?id=edit_post&sl=<?php echo $row['post_id']; ?>" class="btn btn-success btn-block">Edit</a> <a onclick="return confirm('Are you sure?')"
                                href="?id=delete_post&sl=<?php echo $row['post_id']; ?>"
                                class="btn btn-danger btn-block">Delete</a></td>
                    </tr>
                <?php }
            } ?>
        </tbody>
    </table>
</div>