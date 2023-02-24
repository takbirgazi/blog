<?php
if (!isset($_GET['id'])) {
    // not accssing manage_caegory.php file without id.
    header("Location: dashboard.php");
}
// Category Update
$post_id = $_GET['sl'];
$edit_by_post_id = $config_obj->edit_post($post_id);
if (isset($_POST['edit_post'])) {
    $img=$edit_by_post_id["post_thumbnil"];
    $update_post = $config_obj->update_post($_POST,$img);
}
?>
<h5>Edit Post</h5>
<p class="small text-success">
    <?php
    // Post Update massage show.
    if (isset($update_post)) {
        echo $update_post;
    }
    ?>
</p>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="post_id" value="<?php echo $edit_by_post_id["post_id"]; ?>">
    <div class="form-group">
        <label for="title">Title</label>
        <input required name="post_title" type="text" class="form-control"
            value="<?php echo $edit_by_post_id["post_title"]; ?>">
    </div>
    <div class="form-group">
        <label for="post_summary">Summary</label>
        <textarea required name="post_summery" class="form-control"
            rows="3"><?php echo $edit_by_post_id["post_summery"]; ?></textarea>
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select name="post_cat" class="form-control">
            <?php $catgs = $config_obj->show_cat();
            while ($row = mysqli_fetch_assoc($catgs)):
                ?>
                <option <?php if ($row["cat_id"] === $edit_by_post_id["post_catagory"]) {
                    echo "selected";
                } ?>
                    value="<?php echo $row["cat_id"]; ?>"><?php echo $row["cat_name"]; ?></option>
            <?php endwhile; ?>
        </select>
    </div>
    <div class="form-group thumbnail">
        <label for="thumbnail">Thumbnail</label>
        <img src="upload/<?php echo $edit_by_post_id["post_thumbnil"]; ?>" alt="Your Thumbnail Will be Changed." class="pb-3 d-block">
        <input name="post_thumbnail" type="file" class="form-control-file small">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="post_content" required class="form-control"
            rows="3"><?php echo $edit_by_post_id["post_content"]; ?></textarea>
    </div>
    <div class="form-group">
        <label for="post_tag">Tag</label>
        <input required name="post_tag" type="text" class="form-control"
            value="<?php echo $edit_by_post_id["post_tag"]; ?>">
    </div>
    <div class="form-group">
        <label for="post_status">Status</label>
        <select name="post_status" class="form-control">
            <option <?php if ($edit_by_post_id["post_stutas"] == 1) {
                echo "selected";
            } ?> value="1">Public</option>
            <option <?php if ($edit_by_post_id["post_stutas"] == 0) {
                echo "selected";
            } ?> value="0">Unpublic</option>
        </select>
    </div>
    <?php
    // Post Update massage show.
    if (isset($update_post)) { ?>
        <a class="btn btn-primary" href="dashboard.php">Home</a>
    <?php } else { ?>
        <input name="edit_post" type="submit" class="btn btn-primary" value="Update">
    <?php } ?>
</form>