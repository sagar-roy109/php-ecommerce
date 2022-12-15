<?php 
session_start();


include ('config/db.php');

if(isset($_SESSION['auth_user'])){

  if(isset($_POST['scope'])){
    $scope = $_POST['scope'];
  
    switch ($scope){
      case "add":
        $product_id = $_POST['product_id'];
        $user_id = $_SESSION['auth_user']['user_id'];
        $data=[];
        $data['product_id'] = $_POST['product_id'];
        $data['product_qty'] = $_POST['product_qty'];
        $data['user_id'] = $_SESSION['auth_user']['user_id'];
        $db = new Database();
        $check_cart = $db->sql("SELECT * FROM carts WHERE product_id = '$product_id' AND user_id = '$user_id ' ");
        $check = $db->getResult();
        $_SESSION['check'] = $check;
        
        if(count($check)>0){
          echo $_SESSION['auth_user']['cart'];
         
          }else{
          $query= $db-> insert('carts',$data);
          if($query){
            $count = $db->sql("SELECT * FROM carts");
            $items = $db->getResult();
            $item_count = count($items);
            $_SESSION['auth_user']['cart'] = $item_count;
            
            if ($_SESSION['auth_user']['cart']){
              echo $_SESSION['auth_user']['cart'];
            }
        }
      }
       
        break;
        case "cart":
          $product_id = $_POST['product_id'];
          $user_id = $_SESSION['auth_user']['user_id'];
          $data=[];
        $data['product_id'] = $_POST['product_id'];
        $product_qty = $_POST['product_qty'];
        $data['user_id'] = $_SESSION['auth_user']['user_id'];
        $db = new Database();
        $check_cart = $db->sql("SELECT * FROM carts WHERE product_id = '$product_id' AND user_id = '$user_id ' ");
        $check = $db->getResult();
        if(count($check)>0){

          $query= $db-> mysqli->query("UPDATE carts SET product_qty = $product_qty WHERE product_id = '$product_id' AND user_id = '$user_id ' ");
          if($query){
            echo 3000;
          }
          }else{
            echo "Wrong";
      }
      break;
        default :
        echo 500;
    }
    
  }
 
  // echo "<script>window.location.href='index.php'</script>";
}else{
  echo 1000;
}

?>