<?php include 'templates/header.php' ?>
<?php include '../config/db.php' ?>



<div class="content-wrapper">
            <!-- Content -->
<?php 
  if(isset($_POST['submit'])){
    $test = $_POST['cat_title'];
    array_pop($_POST);
    $db = new Database();
    $insert = $db->insert('categories', $_POST);

    if($insert){
      echo "<script> alert('Category Added'); </script>";
    }
    
  }
?>
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Insert Category</h5>
                      <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                      <form method="POST">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Category Title</label>
                          <input type="text" class="form-control" name="cat_title"placeholder="Tshirt" />
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            trait_exists

 
            <!-- / Content -->


            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                </div>
                <div>
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>