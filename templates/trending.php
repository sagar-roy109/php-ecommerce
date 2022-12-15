<?php
      
      include 'config/functions.php';
     

        $db = new Database();
        $db->sql("SELECT * FROM products WHERE  trending = 1 ");
        $products = $db->getResult();
  
       
      ?>
       
      <?php

        if (count($products) > 0) {

      ?>
         
          
          <main>
            <div class="ps-content">
              <div class="ps-row">

                <?php foreach ($products as $product) { ?>

                  <?php include 'templates/products_loop.php' ?>

                <?php } ?>
              </div>
            </div>
  
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
    
      ?>