<?php
include '../config/db.php';

?>
<!-- set data  -->
<?php
$db = new Database();
if (isset($_POST['submit'])) {
  $id = $_POST['cat_id'];
  $data = [];
  $data['cat_title'] = $db->mysqli->real_escape_string($_POST['cat_title']);
  $data['slug'] = $db->mysqli->real_escape_string($_POST['slug']);
  $data['description'] = $db->mysqli->real_escape_string($_POST['description']);
  $data['status'] =  isset($_POST['status']) ? '1' : '0';
  $data['popular'] = isset($_POST['popular']) ? '1' : '0';
  $data['meta_title'] = $db->mysqli->real_escape_string($_POST['meta_title']);
  $data['meta_desc'] = $db->mysqli->real_escape_string($_POST['meta_desc']);
  $data['meta_keywords'] = $db->mysqli->real_escape_string($_POST['meta_keywords']);
  $new_image = $_FILES['image']['name'];
  $old_image =  $_POST['old_image'];
  $path = "../uploads";
  $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
  $file_name = time() . '.' . $image_ext;
  if ($new_image != '') {
    $data['image'] = $file_name;
  } else {
    $data['image'] = $old_image;
  }

  $update = $db->update('categories', $data, 'cat_id =' . $id);

  if ($update) {
    if ($_FILES['image']['name'] != '') {

      move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $file_name);
    }

    $_SESSION['message'] = "category updated";
  }
}
?>
<div class="container">
  <!-- get data  -->
  <?php

  if (isset($_GET['id'])) {
    $db = new Database();
    $id = $_GET['id'];
    $db->sql("SELECT * FROM categories WHERE cat_id = $id");
    $data = $db->getResult();

    if (count($data) > 0) {

      foreach ($data as $val) {
  ?>

        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
            <div class="col-xl">
              <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Update Category</h5>

                </div>
                <div class="card-body">
                  <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <input type="hidden" value="<?php echo htmlspecialchars($val['cat_id']) ?>" name="cat_id">
                      <label class="form-label" for="basic-default-fullname">Category Title</label>
                      <input required type="text" value="<?php echo htmlspecialchars($val['cat_title']) ?>" class="form-control" name="cat_title" />

                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-fullname">Slug</label>
                      <input required type="text" value="<?php echo htmlspecialchars($val['slug']) ?>" class="form-control" name="slug" />

                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-fullname">Description</label>
                      <textarea required class="form-control" name="description"><?php echo htmlspecialchars($val['description']) ?></textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-fullname">Image</label>
                      <input type="file" class="form-control" name="image" />
                      <input type="hidden" value="<?php echo htmlspecialchars($val['image']) ?>" name="old_image">
                      <img class="mt-3" style="width: 50px; height:50px" src="../uploads/<?php echo htmlspecialchars($val['image']) ?>" alt="product_image">
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="basic-default-fullname">Meta Title</label>
                      <input required type="text" value="<?php echo htmlspecialchars($val['meta_title']) ?>" class="form-control" name="meta_title" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-fullname">Meta Description</label>
                      <input required type="text" value="<?php echo htmlspecialchars($val['meta_desc']) ?>" class="form-control" name="meta_desc" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-fullname">Meta Keywords</label>
                      <input required type="text" value="<?php echo htmlspecialchars($val['meta_keywords']) ?>" class="form-control" name="meta_keywords" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-fullname">status</label>
                      <input type="checkbox" <?= $val['status'] ? 'checked' : ''  ?> name="status" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-fullname">Popular</label>
                      <input type="checkbox" <?= $val['popular'] ? 'checked' : ''  ?> name="popular" />
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
<?php } ?>


<?php
    } else {
      echo "Category not found in this id ";
    }
  }
?>