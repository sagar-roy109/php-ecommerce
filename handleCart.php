<?php 
session_start();
include ('config/db.php');

if(isset($_SESSION['auth_user'])){
  print_r($_SESSION['auth_user']) ;
  if(isset($_POST['scope'])){
    $scope = $_POST['scope'];
    
    // if($scope == 'add'){
      
    //   $data=[];
    //   $data['product_id'] = $_POST['product_id'];
    //   $data['product_qty'] = $_POST['product_qty'];
    //   $data['user_id'] = $_SESSION['auth_user']['user_id'];
    //   $_SESSION['new'] = $data;
    //   $db = new Database();
    //   $query= $db-> insert('carts',$data);
    //   if($query){
    //     $_SESSION['result']=200;
    //     return 200;
    //   }else{
    //     $_SESSION['result']='fail';
    //   }
      
    // }
    switch ($scope){
      case "add":
        $data=[];
        $data['product_id'] = $_POST['product_id'];
        $data['product_qty'] = $_POST['product_qty'];
        $data['user_id'] = $_SESSION['auth_user']['user_id'];
        $db = new Database();
        $query= $db-> insert('carts',$data);
        if($query){
          echo "Hello";
          return "test";
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