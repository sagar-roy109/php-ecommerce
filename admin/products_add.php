<?php include 'templates/header.php' ?>


<?php include '../config/db.php' ?>
<?php
  $db = new Database();

  // get category list 

  $db->sql("SELECT * FROM categories ");
  $category = $db->getResult();
  

  if (isset($_POST['submit'])) {
    $product = [];
    $product['category_id'] = $db->mysqli->real_escape_string($_POST['category_id']);
    $product['name'] = $db->mysqli->real_escape_string($_POST['name']);
    $product['slug'] = $db->mysqli->real_escape_string($_POST['slug']);
    $product['small_desc'] = $db->mysqli->real_escape_string($_POST['smallDescription']);
    $product['description'] = $db->mysqli->real_escape_string($_POST['description']);
    $product['original_price'] = $db->mysqli->real_escape_string($_POST['original_price']);
    $product['sale_price'] = $db->mysqli->real_escape_string($_POST['sale_price']);
    $product['qty'] = $db->mysqli->real_escape_string($_POST['qty']);
    $product['status'] =  isset($_POST['status']) ? '1' : '0';
    $product['trending'] = isset($_POST['trending']) ? '1' : '0';
    $product['meta_title'] = $db->mysqli->real_escape_string($_POST['meta_title']);
    $product['meta_desc'] = $db->mysqli->real_escape_string($_POST['meta_desc']);
    $product['meta_keywords'] = $db->mysqli->real_escape_string($_POST['meta_keywords']);

    $image = $_FILES['image']['name'];
    
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $file_name = time() . '.' . $image_ext;
    $product['image'] = $file_name;

    
    $insert = $db->insert('products', $product);

    if ($insert) {
      move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $file_name);
      $_SESSION['message'] = "Product added";
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
            <h5 class="mb-0">Insert products</h5>

          </div>
          <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Product Title</label>
                <input required type="text" class="form-control" name="name" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Slug</label>
                <input required type="text" class="form-control" name="slug" />
              </div>

              <div class="mb-3">
                <label for="basic-default-fullname"> Category</label>
                <select class="form-control" name="category_id" id="">
                  <option selected>Select Category </option>
                <?php foreach ($category as $data) { 
                  ?>
                  <option value='<?php echo $data['cat_id']?>'><?php echo $data['cat_title'] ?> </option>
                <?php } ?>
                  
                </select>
                
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Description</label>
                <textarea required class="form-control" name="description"></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Small Description</label>
                <textarea required class="form-control" name="smallDescription"></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Image</label>
                <input required type="file" required class="form-control" name="image" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Price</label>
                <input type="number" required class="form-control" name="original_price">
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Sale Price</label>
                <input type="number" required class="form-control" name="sale_price">
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Quantity</label>
                <input type="number" required class="form-control" name="qty">
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
                <label class="form-label" for="basic-default-fullname">Trending</label>
                <input type="checkbox" name="trending" />
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Add Products</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include 'templates/footer.php' ?>