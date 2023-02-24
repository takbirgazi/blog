<?php
if (!isset($_GET['id'])) {
    // not accssing manage_caegory.php file without id.
    header("Location: dashboard.php");
} else {
    // Show Category
    $catgs = $config_obj->show_cat();
    // Delete Category 
    if (isset($_GET['id'])) {
        if ($_GET['id'] == 'delete_cat') {
            $sl_id = $_GET['sl'];
            $delete_cat = $config_obj->delete_cat($sl_id);
        }
    }
}

?>
<h5>Your Categorys</h5>
<p class="small text-danger">
    <?php
    // Delete Category Massege Showing.
    if (isset($delete_cat)) {
        echo $delete_cat;
    }
    ; ?>
</p>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">S/N</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Acion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Table data show
            if (mysqli_num_rows($catgs) > 0):
                $i = 1;
                while ($row = mysqli_fetch_assoc($catgs)):
                    ?>
                    <tr>
                        <input type="hidden" value="<?php echo $row["cat_id"]; ?>">
                        <th scope="row">
                            <?php echo $i++; ?>
                        </th>
                        <td>
                            <?php
                            // Category Name show shortly 
                            if (strlen($row["cat_name"]) >= 20) {
                                $strcunt = $row["cat_name"];
                                echo substr("$strcunt", 0, 20) . " <a style='color:#0263c1' href='#'>...more</a>";
                            } else {
                                echo $row["cat_name"];
                            } ?>
                        </td>
                        <td>
                            <?php
                            // Category Description show shortly 
                            if (strlen($row["cat_dec"]) >= 30) {
                                $strcunt = $row["cat_dec"];
                                echo substr("$strcunt", 0, 30) . " <a style='color:#0263c1' href='#'>...more</a>";
                            } else {
                                echo $row["cat_dec"];
                            }
                            ?>
                        </td>
                        <td><a href="?id=edit_cat&sl=<?php echo $row['cat_id']; ?>"
                                class="btn btn-success btn-block">Edit</a> <a onclick="return confirm('Are you sure?')"
                                href="?id=delete_cat&sl=<?php echo $row['cat_id']; ?>"
                                class="btn btn-danger btn-block">Delete</a></td>
                    </tr>
                    <?php
                    // Loop and condation are ending here.
                endwhile;
            endif; ?>
        </tbody>
    </table>
</div>