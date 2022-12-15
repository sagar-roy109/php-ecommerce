<?php 

session_start();
include 'config/db.php'; 
$userId = $_SESSION['auth_user']['user_id'];
$db = new database();
$db->delete('carts', 'user_id='.$userId);
$_SESSION['auth'] = false;
session_destroy();
header('Location:login.php');