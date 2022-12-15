<?php 
session_start();
include 'templates/header.php' ;
include 'config/db.php';
?>
<?php  
 
  if(isset($_SESSION['auth_user'])){
  $user_id = $_SESSION['auth_user']['user_id'];
  $db = new Database();
  $db->sql("SELECT c.id as cid, c.product_id, c.product_qty, p.id as pid, p.name, p.image, p.sale_price FROM carts c, products p WHERE c.product_id = p.id AND c.user_id='$user_id'");
  $items = $db->getResult();
  $_SESSION['auth_user']['prices'] = array();

?>

<div class="ps-hero bg--cover" data-background="images/hero/bread-1.jpg"><img src="images/hero/contact-us.html" alt="">
      <div class="ps-container">
        <h3>Shopping Cart</h3>
        <div class="ps-breadcrumb">
          <ol class="breadcrumb">
            <li><a href="index-2.html">Home</a></li>
            <li class="active">Shopping Cart</li>
          </ol>
        </div>
      </div>
    </div>

    <?php if(count($items)>0){


?>

<div class="ps-content">
      <div class="ps-container">
        <div class="ps-cart-listing">
          <table class="table ps-cart__table">
            <thead>
              <tr>
                <th>All Products</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                
              </tr>
            </thead>
            <tbody>
              <?php 
                foreach ($items as $item) { ?>
                <tr>
                <td><a class="ps-product--compare" href="product-detail.php?product<?php echo $item['product_id'] ?>"><img class="mr-15" src="uploads/<?php echo $item['image'] ?>" alt="product_image"> Air jordan One mid</a></td>
                <td><?php echo $item['sale_price'] ?></td>
                <td class="count">
                <input type="hidden" id="product_id" value="<?php echo $item['product_id'] ?>">
                <input type="hidden" class="price_cal" value="<?php echo $item['sale_price'] ?>">
                  <div class="form-group--number">
                    <button class="update_qty minus"><span>-</span></button>
                    <input class="form-control product_qty" id="product_qty" type="text" value="<?php  echo $item['product_qty'] ?>">
                    <button class="update_qty update_qty  plus"><span>+</span></button>
                  </div>
                </td>
                <td class="price">$<?php echo $t = $item['sale_price'] * $item['product_qty'];   ?></td>
                <!-- <td>
                  <div class="ps-remove"></div>
                </td> -->
              </tr>
                  <?php
                }
              ?>
              
              
            </tbody>
          </table>
          <div class="ps-cart__actions">
            <div class="ps-cart__promotion">
              <div class="form-group">
              </div>
              <div class="form-group">
                <a href='products.php' class="ps-btn ps-btn--gray">Continue Shopping</a>
              </div>
            </div>
            <div class="ps-cart__total">
              <!-- <h3>Total Price: <span> 2599.00 $</span></h3> -->
              <a class="ps-btn" href="checkout.php">Process to checkout</a>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php
    }else{

     ?>

      <div class="container mt-50 mb-50">
        <div class="ps-container">
          <h2>No Products In Your Cart</h2>
        </div>
        <div class="form-group mt-10">
                <a href='products.php' class="ps-btn ps-btn--gray">Continue Shopping</a>
              </div>
      </div>
    

<?php 
    }
} else{
  echo "<script>window.location.href='login.php'</script>";
} ?>
    
    
 <?php include 'templates/footer.php' ?>