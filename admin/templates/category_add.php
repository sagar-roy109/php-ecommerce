<?php include '../config/db.php' ?>
<?php
  $db = new Database();
  if (isset($_POST['submit'])) {
    $data = [];
    $data['cat_title'] = $db->mysqli->real_escape_string($_POST['cat_title']);
    $data['slug'] = $db->mysqli->real_escape_string($_POST['slug']);
    $data['description'] = $db->mysqli->real_escape_string($_POST['description']);
    $data['status'] =  isset($_POST['status']) ? '1' : '0';
    $data['popular'] = isset($_POST['popular']) ? '1' : '0';
    $data['meta_title'] = $db->mysqli->real_escape_string($_POST['meta_title']);
    $data['meta_desc'] = $db->mysqli->real_escape_string($_POST['meta_desc']);
    $data['meta_keywords'] = $db->mysqli->real_escape_string($_POST['meta_keywords']);
    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $file_name = time() . '.' . $image_ext;
    $data['image'] = $file_name;

    
    $insert = $db->insert('categories', $data);

    if ($insert) {
      move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $file_name);
      $_SESSION['message'] = "category added";
    }
  }
  ?>

<div class="content-wrapper">

<!-- form  -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Insert Category</h5>

          </div>
          <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Category Title</label>
                <input required type="text" class="form-control" name="cat_title" />

              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Slug</label>
                <input required type="text" class="form-control" name="slug" />

              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Description</label>
                <textarea required class="form-control" name="description"></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Image</label>
                <input required type="file" required class="form-control" name="image" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Meta Title</label>
                <input required type="text" class="form-control" name="meta_title" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Meta Description</label>
                <input required type="text" class="form-control" name="meta_desc" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Meta Keywords</label>
                <input required type="text" class="form-control" name="meta_keywords" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">status</label>
                <input type="checkbox" name="status" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Popular</label>
                <input type="checkbox" name="popular" />
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>