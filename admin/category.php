<?php include 'templates/header.php' ?>
<?php include '../config/db.php' ?>



<div class="content-wrapper">
  <?php
  if (isset($_POST['submit'])) {
    $data = [];
    $data['cat_title'] = $_POST['cat_title'];
    $data['slug'] = $_POST['slug'];
    $data['description'] = $_POST['description'];
    $data['status'] =  isset($_POST['status']) ? '1' : '0';
    $data['popular'] = isset($_POST['popular']) ? '1' : '0';
    $data['meta_title'] = $_POST['meta_title'];
    $data['meta_desc'] = $_POST['meta_desc'];
    $data['meta_keywords'] = $_POST['meta_keywords'];
    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $file_name = time() . '.' . $image_ext;
    $data['image'] = $file_name;

    echo "<pre>";
    print_r($data);
    echo "</pre>";


    $db = new Database();
    $insert = $db->insert('categories', $data);

    if ($insert) {
      move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $file_name);
      $_SESSION['message'] = "category added";
    }
  }
  ?>

  <?php include 'templates/category_add.php' ?>



  <!-- Footer -->
  <?php include 'templates/footer.php' ?>