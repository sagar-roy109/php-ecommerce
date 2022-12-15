<?php

session_start();
include 'templates/header.php';
include 'config/db.php';


if (isset($_SESSION['auth_user'])) {
  $user_id = $_SESSION['auth_user']['user_id'];
?>

  <div class="ps-container">

    <h2>Your Orders</h2>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">SR</th>
          <th scope="col">Tracking No</th>
          <th scope="col">Price</th>
          <th scope="col">Date</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $db = new Database();
           $db->sql("SELECT * FROM orders WHERE user_id = '$user_id' ");
           $orders = $db->getResult();
           if(count($orders)>0){

            foreach($orders as $order){ ?>

<tr>
          <th scope="row"><?php echo $order['id'] ?></th>
          <td><?php echo $order['tracking_no'] ?></td>
          <td><?php echo $order['total_price'] ?></td>
          <td><?php echo $order['created_at'] ?></td>
          <td><a href="invoice.php?id=<?php echo $order['id'] ?>" class="btn btn-primary">Order Details</a></td>
        </tr>

            <?php
            }
            ?>

            
          

            <?php
           }else{
              echo "No orders found";
           }
        ?>
        
      </tbody>
    </table>

  </div>

<?php } else {
  echo "<script>window.location.href='login.php'</script>";
}

?>

<?php include 'templates/footer.php' ?>