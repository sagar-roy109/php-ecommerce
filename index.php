<?php 
session_start();
include 'config/db.php';
include 'templates/header.php';
include 'templates/category_cards.php';


if($_SESSION['auth_user']){
  $id =$_SESSION['auth_user']['user_id'];
  $db=  new Database();
  $db->sql("SELECT role FROM users WHERE user_id = $id");
  $result = $db->getResult();
  $role =  $result[0]['role'];
  $_SESSION['auth_user']['role'] = $role;

}







?>


  
  <div class="ps-section ps-home-best-product">
    <div class="ps-container">
      <div class="ps-section__header text-center">
        <p>Choose your need item</p>
        <h3 class="ps-section__title">BEST OUR PRODUCT</h3><span class="ps-section__line"></span>
      </div>
      <?php include 'templates/trending.php' ?>
    </div>
  </div>
  

 <?php include 'templates/footer.php' ?>