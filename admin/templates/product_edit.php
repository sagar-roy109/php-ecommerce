<?php
include '../config/db.php';

?>
<!-- set data  -->
<?php
$db = new Database();

// get category list 

$db->sql("SELECT * FROM categories");
$category = $db->getResult();

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $data = [];
  $data['category_id'] = $db->mysqli->real_escape_string($_POST['category_id']);
  $data['name'] = $db->mysqli->real_escape_string($_POST['name']);
  $data['slug'] = $db->mysqli->real_escape_string($_POST['slug']);
  $data['small_desc'] = $db->mysqli->real_escape_string($_POST['small_desc']);
  $data['description'] = $db->mysqli->real_escape_string($_POST['description']);
  $data['original_price'] = $db->mysqli->real_escape_string($_POST['original_price']);
  $data['sale_price'] = $db->mysqli->real_escape_string($_POST['sale_price']);
  $data['qty'] = $db->mysqli->real_escape_string($_POST['qty']);
  $data['status'] =  isset($_POST['status']) ? '1' : '0';
  $data['trending'] = isset($_POST['trending']) ? '1' : '0';
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

  $update = $db->update('products', $data, 'id =' . $id);

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
    $db->sql("SELECT * FROM products WHERE id = $id");
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
                      <input type="hidden" value="<?php echo htmlspecialchars($val['id']) ?>" name="id">
                      <label class="form-label" for="basic-default-fullname">Product Title</label>
                      <input required type="text" value="<?php echo htmlspecialchars($val['name']) ?>" class="form-control" name="name" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-fullname">Slug</label>
                      <input required type="text" value="<?php echo htmlspecialchars($val['slug']) ?>" class="form-control" name="slug" />

                    </div>
                    <select class="form-control mb-3" name="category_id">
                        
                    <?php foreach ($category as $cat) { 
                      ?>
                     <option value='<?php echo $cat['cat_id']?>'<?php if ($cat['cat_id'] == $val['category_id']) echo 'selected' ;  ?>><?php echo $cat['cat_title'] ?> </option>
                <?php } ?>
                  
                </select>
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-fullname">Small Description</label>
                      <textarea required class="form-control" name="small_desc"><?php echo htmlspecialchars($val['small_desc']) ?></textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-fullname">Description</label>
                      <textarea required class="form-control" name="description"><?php echo htmlspecialchars($val['description']) ?></textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-fullname">Original Price</label>
                      <input required type="number" value="<?php echo htmlspecialchars($val['original_price']) ?>" class="form-control" name="original_price" />

                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-fullname">Sale Price</label>
                      <input required type="number" value="<?php echo htmlspecialchars($val['sale_price']) ?>" class="form-control" name="sale_price" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-fullname">Image</label>
                      <input type="file" class="form-control" name="image" />
                      <input type="hidden" value="<?php echo htmlspecialchars($val['image']) ?>" name="old_image">
                      <img class="mt-3" style="width: 50px; height:50px" src="../uploads/<?php echo htmlspecialchars($val['image']) ?>" alt="product_image">
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="basic-default-fullname">QTY</label>
                      <input required type="number" value="<?php echo htmlspecialchars($val['qty']) ?>" class="form-control" name="qty" />
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
                      <label class="form-label" for="basic-default-fullname">Trending</label>
                      <input type="checkbox" <?= $val['trending'] ? 'checked' : ''  ?> name="trending" />
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