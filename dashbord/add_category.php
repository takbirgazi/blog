<?php
if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
}
if (isset($_POST['add_cat'])) {
    $add_cat = $config_obj->cat_insert($_POST);
}
?>
<h5>Add Category</h5>
<p class="small text-success">
    <?php
    // Post Category Message show
    if (isset($add_cat)) {
        echo $add_cat;
    } ?>
</p>
<form action="" method="POST">
    <div class="form-group">
        <label for="cta_name">Category Name</label>
        <input required name="cat_title" type="text" class="form-control" placeholder="Write Your Category Name...">
    </div>
    <div class="form-group">
        <label for="cat_desc">Category Descripton</label>
        <textarea required class="form-control" placeholder="Write Your Category Descripton..." rows="3"
            name="cat_desc"></textarea>
    </div>
    <input name="add_cat" type="submit" class="btn btn-primary" value="Add">
    <?php
    // Home Button show
    if (isset($add_cat)): ?>
        <a class="btn btn-primary" href="dashboard.php">Home</a>
    <?php endif; ?>
</form>