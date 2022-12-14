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
          
          echo "Already In The Cart";
          
        }else{
          $query= $db-> insert('carts',$data);
          if($query){
            echo "Added to Cart";
            
          }
        }
       
        break;
        default :
        echo 500;
    }
    
  }
 
  // echo "<script>window.location.href='index.php'</script>";
}else{
  echo 401;
}

?>