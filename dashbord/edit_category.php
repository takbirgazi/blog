<?php
if (!isset($_GET['id'])) {
    // not accssing manage_caegory.php file without id.
    header("Location: dashboard.php");
}
// Category Update
$cat_id = $_GET['sl'];
$edit_cat_id = $config_obj->edit_cat($cat_id);
if (isset($_POST['edit_cat'])) {
    $update_cat = $config_obj->update_cat($_POST);
}
?>
<h5>Edit Category</h5>
<p class="small text-success">
    <?php
    // Category Update massage show.
    if (isset($update_cat)) {
        echo $update_cat;
    }
    ?>
</p>
<form action="" method="POST">
    <input type="hidden" name="cat_id" value="<?php echo $edit_cat_id["cat_id"]; ?>">
    <div class="form-group">
        <label for="cat_name">Category Name</label>
        <input required name="cat_title" type="text" class="form-control"
            value='<?php echo $edit_cat_id["cat_name"]; ?>'>
    </div>
    <div class="form-group">
        <label for="cat_desc">Category Descripton</label>
        <textarea required class="form-control" rows="3"
            name="cat_desc"><?php echo $edit_cat_id["cat_dec"]; ?></textarea>
    </div>
    <?php
    // when data hasbeen update than show the button
    if (isset($update_cat)) { ?>
        <a class="btn btn-primary" href="dashboard.php">Home</a>
    <?php } else { ?>
        <input name="edit_cat" type="submit" class="btn btn-primary" value="Update">
    <?php } ?>
</form>