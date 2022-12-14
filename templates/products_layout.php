      <?php
      include 'config/db.php';
      include 'config/functions.php';
      if (isset($_GET['category'])) {
        $cat_id = $_GET['category'];

        $db = new Database();
        $db->sql("SELECT * FROM products WHERE category_id = '$cat_id' AND status = '1' ");
        $products = $db->getResult();
        $cat_name = $db->sql("SELECT cat_title FROM categories WHERE cat_id = '$cat_id' ");
        $cat_name = $db->getResult();
        
      ?>
       <div class="ps-hero bg--cover" data-background="images/hero/bread-1.jpg">
            <div class="ps-container">
              <h3><?php echo $cat_name[0]['cat_title'] ?></h3>
              <div class="ps-breadcrumb">
                <ol class="breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li class="active"><?php echo $cat_name[0]['cat_title'] ?></li>
                </ol>
              </div>
            </div>
          </div>
      <?php

        if (count($products) > 0) {

      ?>
         
          <div class="ps-container pt-10  ">
            <div class="ps-products-sort">
              <p><?php echo count($products) . " Products Found" ?></p>
              <select class="ps-select" title="Default Sorting">
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
              </select>
            </div>
          </div>
          <main class="ps-main ps-sidebar-layout" style="justify-content: flex-end">
            <div class="ps-content">
              <div class="ps-row">

                <?php foreach ($products as $product) { ?>

                  <?php include 'templates/products_loop.php' ?>

                <?php } ?>
              </div>
            </div>
            <?php include 'templates/side_filter.php' ?>
          </main>
      <?php
        } else {
          $html = "<div class='container'>";
          $html .= "<p class= 'mt-5 mb-5 text-center text-bold'>";
          $html .= "No products Found !";
          $html .= "</p>";
          $html .= "</div>";
          echo $html;
        }
      }else{
        
        $db = new Database();
        $db->sql("SELECT products.*, categories.cat_title FROM products JOIN categories ON products.category_id = categories.cat_id WHERE products.status ='1' ");
        $products = $db->getResult();

        ?>
        <div class="ps-hero bg--cover" data-background="images/hero/bread-1.jpg">
            <div class="ps-container">
              <h3>Shop</h3>
              <div class="ps-breadcrumb">
                <ol class="breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li class="active">Shop</li>
                </ol>
              </div>
            </div>
          </div>
        <?php
        
        if (count($products) > 0) {
          ?>
          <div class="ps-container pt-10  ">
            <div class="ps-products-sort">
              <p><?php echo count($products) . " Products Found" ?></p>
              <select class="ps-select" title="Default Sorting">
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
              </select>
            </div>
          </div>
          <main class="ps-main ps-sidebar-layout" style="justify-content: flex-end">
            <div class="ps-content">
              <div class="ps-row">

                <?php foreach ($products as $product) { ?>

                  <?php include 'templates/products_loop.php' ?>

                <?php } ?>
              </div>
            </div>
            <?php include 'templates/side_filter.php' ?>
          </main>
   <?php }
   };
      ?>