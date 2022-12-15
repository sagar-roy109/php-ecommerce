<?php 
session_start();
require('fpdf185/fpdf.php');
include ('config/db.php');
include('config/functions.php');

// print_r($_SESSION);

$order_id = $_GET['id'] ;

$db = new Database();
 $db->sql("SELECT * FROM orders WHERE id = '$order_id'");

 $orders = $db->getResult();


$pdf = new FPDF();

$pdf-> AddPage();
$pdf-> SetFont('Arial','', 12);
// Cell(width,height,'Text', Border,new line,'text Allign');


$pdf->Cell(15,5,'Invoice', 0, 1, 'c');
$pdf->Cell(50,10,'Tracking Number:' , 0, 0);
$pdf->Cell(10,10,$orders[0]['tracking_no'], 0, 1);
$pdf->Cell(50,10,'Name:', 0, 0);
$pdf->Cell(10,10,$orders[0]['user_name'], 0, 1);
$pdf->Cell(50,10,'Address:', 0, 0);
$pdf->Cell(10,10,$orders[0]['address'], 0, 1);
$pdf->Cell(50,10,'Phone:', 0, 0);
$pdf->Cell(10,10,$orders[0]['phone'], 0, 1);

$db->sql("SELECT products.name, products.sale_price, order_items.qty FROM products,order_items,orders WHERE order_items.product_id = products.id AND order_items.order_id = orders.id");

$products_all = $db->getResult();

// print_r($products_all);

foreach($products_all as $products){
  // echo "pre>";
  $pdf->Cell(150,10,small($products['name']) , 0, 0);
  $pdf->Cell(10,10,$products['sale_price'], 0, 1);
  // echo "</pre>";
}





$pdf->Cell(150,10,'Total:', 0, 0);
$pdf->Cell(10,10,'$ '.$orders[0]['total_price'], 0, 1);


$pdf->Output();
