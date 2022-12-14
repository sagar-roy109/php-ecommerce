<?php 
include '../config/db.php';
session_start();
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $db = new Database();
  $db->delete('categories','cat_id='.$id);
  $delete = $db->getResult();
  if($delete){
    $_SESSION['message'] = "Category Deleted";
    header('location:category_all.php');
    
  }
}else{
  header('location:category_all.php');
}