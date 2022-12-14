<div class="ps-column">
            <div class="ps-product">
              <div class="ps-product__thumbnail">
              
                <img src="uploads/<?= $product['image']?>" alt=""><a class="ps-product__overlay" href="product-detail.php?product=<?php echo $product['id'] ?>"></a>
                <div class="ps-product__content full">
              
                      <a class="ps-product__title" href="product-detail.php?product=<?php echo $product['id'] ?>"><?php shortString($product['name']) ?></a>
                  <div class="ps-product__categories"><?= isset($cat_name[0]['cat_title']) ? $cat_name[0]['cat_title']:$product['cat_title']; ?></div>
                  <p class="ps-product__price">
                    <del>$<?= isset($product['original_price'])? $product['original_price']:'' ?></del>$<?= isset($product['sale_price'])? $product['sale_price']:$product['original_price'] ?>
                  </p><a class="ps-btn ps-btn--sm ps-modal-open" href="#modal-confirm">Add to cart</a>
                  <p class="ps-product__feature"><i class="furniture-delivery-truck-2"></i>Free Shipping in 24 hours</p>
                </div>
              </div>
              <div class="ps-product__content">
                  
                    <a class="ps-product__title" href="product-detail.php?product=<?php echo $product['id'] ?>"><?php shortString($product['name']) ?></a>
                <div class="ps-product__categories"><?= isset($cat_name[0]['cat_title']) ? $cat_name[0]['cat_title']:$product['cat_title']; ?></div>
                <p class="ps-product__price">
                <del>$<?= isset($product['original_price'])? $product['original_price']:'' ?></del>$<?= isset($product['sale_price'])? $product['sale_price']:$product['original_price'] ?>
                </p>
              </div>
            </div>
          </div>