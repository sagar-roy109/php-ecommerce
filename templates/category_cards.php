<?php 

$db = new Database();
// get category lists 
$db->sql("SELECT * FROM categories");
$results = $db->getResult();


?>
<div class="ps-section ps-home-categories">
    <div class="ps-container">
      <div class="ps-section__header text-center">
        <p>Wellcome to the shop</p>
        <h3 class="ps-section__title">Shop by category</h3><span class="ps-section__line"></span>
      </div>
      <div class="ps-section__content ps-col-tiny">
        <div class="row">
          <!-- show category  -->
          <?php
          foreach ($results as $key => $value) {
          ?>
          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 ">
            <div class="ps-block--category" data-mh="category">
              <a class="ps-block__overlay" href="index.php?category=<?php echo $value['cat_id'];?>"></a>
                
              <img style="width: 100px; height:100px; display:block; margin: 0 auto" src="uploads/<?php echo $value['image'];?>" alt="<?php echo $value['cat_title'];?>">
              <p style="font-weight: bold; text-transform:uppercase; margin-top:20px; color: #000"><?php echo $value['cat_title'];?></p>
              
            </div>
          </div>
          <?php
          }
          ?>
        
        </div>
      </div>
      <div class="ps-section__footer text-center"><a class="ps-btn" href="#">View all categories</a></div>
    </div>
  </div>