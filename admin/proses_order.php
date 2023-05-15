<?php 
// Include file koneksi database
require_once 'dbkoneksi.php';

// Ambil data dari form
$order_number = $_POST['order_number'];
$date = $_POST['date'];
$qty = $_POST['qty'];
$total_price = $_POST['total_price'];
$customer_id = $_POST['customer_id'];
$product_id = $_POST['product_id'];

$process = $_POST['proses'];

// Simpan data ke dalam array

$ar_data[]=$order_number;
$ar_data[]=$date;
$ar_data[]=$qty;
$ar_data[]=$total_price;
$ar_data[]=$customer_id;
$ar_data[]=$product_id;

// Cek aksi yang dilakukan: Simpan atau Update
if($process == "Simpan"){
    // Jika Simpan, buat SQL INSERT
    $sql = "INSERT INTO `order` (order_number,date,qty,total_price,customer_id,
    product_id) VALUES (?,?,?,?,?,?)";
}else if($process == "Update"){}
    // Jika Update, tambahkan ID ke array dan buat SQL UPDATE
    $ar_data[]=$_POST['id'];
    $sql = "UPDATE `order` SET order_number=?,date=?,qty=?,total_price=?,
    customer_id=?,product_id=? WHERE id=?";

// Jika ada perintah SQL, jalankan perintah prepare dan execute dengan array data
if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

// Redirect ke halaman daftar customer
header('location:list_order.php');
?>
