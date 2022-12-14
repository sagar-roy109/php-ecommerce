<?php 
  session_start();
include 'config/db.php';?>
<?php include 'templates/header.php' ?>

<?php 
  
  if(isset($_GET['product'])){

    $product_id = $_GET['product'];
    $db = new Database();
    $db->sql("SELECT * FROM products WHERE id = $product_id ");
    $details = $db->getResult();
   
  }else{
    echo "<script>window.location.href='products.php'</script>";
  }

?>

    <div class="ps-hero bg--cover" data-background="images/hero/bread-2.jpg">
      <div class="ps-container">
        <h3>Shop Page</h3>
        <div class="ps-breadcrumb">
          <ol class="breadcrumb">
            <li><a href="index-2.html">Home</a></li>
            <li class="active">Shop Page</li>
          </ol>
        </div>
      </div>
    </div>
    <main class="ps-main">
      <div class="ps-container">
        <div class="ps-product--detail">
          <div class="row">
                <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 ">
                  <div class="ps-product__thumbnail">
                    <div class="ps-product__image">
                      <div class="item"><a href="images/product/detail/large-1.jpg"><img src="uploads/<?php echo htmlspecialchars($details[0]['image'])?>" alt="product image"></a></div>
                      
                    </div>
                   
                  </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 ">
                  <div class="ps-product__info">
                    
                    <h1><?php echo htmlspecialchars($details[0]['name'])?></h1>
                    
                    <h3 class="ps-product__price"><del><span>$</span> 330</del> <span>£</span> 115</h3>
                    <div class="ps-product__short-desc">
                      <p><?php echo $details[0]['small_desc']?></p>
                    </div>
                    
                    <div class="ps-product__block ps-product__size">
                      <h4>QUANTITY</h4>
                      
                      <div class="form-group ps-number">
                        <input id="getQty" class="form-control" type="text" value="1"><span class="up"></span><span class="down"></span>
                      </div>
                    </div>
                    <div class="ps-product__shopping">
                      <a class="ps-btn addCart" value="<?php echo $details[0]['id']?>" href="cart.php">Add To Cart</a>
                    </div>
                    
                  </div>
                </div>
          </div>
          <div class="ps-product__content">
            <ul class="tab-list" role="tablist">
              <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab">Overview</a></li>
              <li><a href="#tab_03" aria-controls="tab_03" role="tab" data-toggle="tab">PRODUCT TAGs</a></li>
              
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab_01">
              <p><?php echo htmlspecialchars($details[0]['description'])?></p>
            </div>
            <div class="tab-pane" role="tabpanel" id="tab_03">
            <?php echo htmlspecialchars($details[0]['meta_keywords'])?>
            </div>
          </div>
        </div>
      </div>
    </main>

    <p id="result "></p>
    
    <?php include 'templates/related_products.php' ?>
    
   <?php include 'templates/footer.php' ?>