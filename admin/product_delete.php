<?php 
include '../config/db.php';
session_start();
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $db = new Database();
  $db->delete('products','id='.$id);
  $delete = $db->getResult();
  if($delete){
    $_SESSION['message'] = "Products Deleted";
    header('location:products_all.php');
    
  }
}else{
  header('location:products_all.php');
}