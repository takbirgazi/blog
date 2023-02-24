<?php
if (!isset($_GET['id'])) {
    // not accssing manage_caegory.php file without id.
    header("Location: dashboard.php");
}
if (isset($_POST['add_post'])) {
    // Post Added
    $add_post = $config_obj->post_insert($_POST);
}
?>
<h5>Add Post</h5>
<p class="small text-success">
    <?php
    // Post Add Message show
    if (isset($add_post)) {
        echo $add_post;
    } ?>
</p>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Title</label>
        <input required name="post_title" type="text" class="form-control" placeholder="Write Your Title...">
    </div>
    <div class="form-group">
        <label for="post_summary">Summary</label>
        <textarea required name="post_summery" class="form-control" placeholder="Write Your Summary Here..."
            rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="pos_cat">Category</label>
        <select name="pos_cat" class="form-control">
            <?php $catgs = $config_obj->show_cat();
            while ($row = mysqli_fetch_assoc($catgs)):

                ?>
                <option value="<?php echo $row["cat_id"]; ?>"><?php echo $row["cat_name"]; ?></option>
            <?php endwhile; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_thumb">Thumbnail</label>
        <input required name="post_thumb" type="file" class="form-control-file">
    </div>
    <div class="form-group">
        <label for="post_content">Content</label>
        <textarea required name="post_content" class="form-control" placeholder="Write Your Content Here..."
            rows="10"></textarea>
    </div>
    <div class="form-group">
        <label for="post_tag">Tag</label>
        <input required name="post_tag" type="text" class="form-control" placeholder="Write Your Tag...">
    </div>
    <div class="form-group">
        <label for="post_status">Status</label>
        <select name="post_status" class="form-control">
            <option value="1">Public</option>
            <option value="0">Unpublic</option>
        </select>
    </div>

    <input name="add_post" type="submit" class="btn btn-primary" value="Submit">
    <?php
    // Home Button show
    if (isset($add_post)): ?>
        <a class="btn btn-primary" href="dashboard.php">Home</a>
    <?php endif; ?>
</form>