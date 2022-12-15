<?php 
session_start();
include 'config/db.php'; 
if(isset($_POST['submit'])){
  if($_POST['user_name'] == "" || $_POST['email'] == ""|| $_POST['phone'] == "" || $_POST['address'] == ""){
    $_SESSION['message'] = "All fields are require";
    header('Location: checkout.php');
  }else{
    $data['user_name'] = $_POST['user_name'];
    $data['email'] = $_POST['email'];
    $data['address'] = $_POST['address'];
    $data['phone'] = $_POST['phone'];
    $data['total_price'] = $_POST['total_price'];
    $data['user_id'] = $_SESSION['auth_user']['user_id'];
    $user_id = $_SESSION['auth_user']['user_id'];
    $data['tracking_no'] = $_POST['user_name'].rand(111,9999);

    $db = new Database();
    $order = $db->insert('orders', $data);
    if($order){
      $order_data= [];
      $order_data['order_id'] =  $db->mysqli->insert_id;
      
      $db->sql("SELECT c.id as cid, c.product_id, c.product_qty, p.id as pid, p.name, p.image, p.sale_price FROM carts c, products p WHERE c.product_id = p.id AND c.user_id='$user_id'");
      $items = $db->getResult();
      foreach($items as $item){
        $order_data['product_id'] = $item['product_id'];
        $order_data['qty'] = $item['product_qty'];
        $order_data['price'] = $item['sale_price'];

        $order_items = $db->insert('order_items', $order_data);
        if($order_items){
          $db->delete('carts', 'user_id='.$user_id);
          header("Location:my_order.php");
        }

      }
    }

  }
}
print_r($_POST);