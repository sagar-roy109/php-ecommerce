<?php 
session_start();
include 'templates/header.php' ;
include 'config/db.php';
include 'config/functions.php';
  if(isset($_SESSION['auth_user'])){
  $user_id = $_SESSION['auth_user']['user_id'];
  $db = new Database();
 
  // get carts
  $db->sql('SELECT * FROM carts');
  $cart =  $db->getResult();

  if (count($cart)>0){
    // get products
    $db->sql("SELECT c.id as cid, c.product_id, c.product_qty, p.id as pid, p.name, p.image, p.sale_price FROM carts c, products p WHERE c.product_id = p.id AND c.user_id='$user_id'");
    $items = $db->getResult();
    // get user details
    $db->sql('SELECT * FROM users');
    $user =  $db->getResult();

    $total = 0;


  echo "<pre>";

  print_r($items);
  echo "</pre>";
    ?>

<div class="ps-hero bg--cover" data-background="images/hero/bread-1.jpg">
      <div class="ps-container">
        <h3>Check out</h3>
        <div class="ps-breadcrumb">
          <ol class="breadcrumb">
            <li><a href="index-2.html">Home</a></li>
            <li class="active">Check out</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="ps-checkout">
      <div class="ps-container">
        <form class="ps-form--checkout" action="http://warethemes.com/html/flourish/do_action" method="post">
          <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                  <div class="ps-checkout__billing">
                    <h3>Billing Details</h3>
                        <div class="form-group form-group--inline">
                          <label> Name<span>*</span>
                          </label>
                          <div class="form-group__content">
                            <input require class="form-control" name="user_name" value="<?php $user[0]['user_name'] ?>" type="text">
                          </div>
                        </div>
                        
                        <div class="form-group form-group--inline">
                          <label>Email Address<span>*</span>
                          </label>
                          <div class="form-group__content">
                            <input require class="form-control" type="email" name="email" value="<?php $user[0]['user_name'] ?>">
                          </div>
                        </div>
                        
                        <div class="form-group form-group--inline">
                          <label>Phone<span>*</span>
                          </label>
                          <div class="form-group__content">
                            <input require class="form-control" type="number" name="phone">
                          </div>
                        </div>
                        <div class="form-group form-group--inline">
                          <label>Address<span>*</span>
                          </label>
                          <div class="form-group__content">
                            <input class="form-control" type="text" name="address">
                          </div>
                        </div>
              <div class="form-group__content">
               <input type="submit" class="btn ps-btn" value="Place order">
                </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                  <div class="ps-checkout__order">
                    <header>
                      <h3>Your Order</h3>
                    </header>
                    <div class="content">
                      <table class="table ps-checkout__products">
                        <thead>
                          <tr>
                            <th class="text-uppercase">Product</th>
                            <th class="text-uppercase">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            foreach($items as $item){ ?>
                              <tr>
                            <td><?php shortString($item['name']) ?> x <?= $item['product_qty']?></td>
                            <td>$<?= $item['product_qty'] * $item['sale_price'] ?></td>
                          </tr>
                          
                          <?php
                          $total+= $item['product_qty'] * $item['sale_price'];
                            }
                          ?>
                          <tr>
                            <td>Order Total</td>
                            <td>$<?= $total ?></td>
                          </tr>
                          
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
          </div>
          
        </form>
      </div>
    </div>
    <?php include 'templates/footer.php' ?>

    <?php
  }
  
  

  else{
    echo "<script>window.location.href='cart.php'</script>";
  }

  
  // $_SESSION['auth_user']['prices'] = array();

  }else{
    echo "<script>window.location.href='login.php'</script>";
  }

?>
  
  