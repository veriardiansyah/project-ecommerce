<?php 
// Include file koneksi database
require_once 'dbkoneksi.php';

// Ambil data dari form
$name = $_POST['name'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$card_id = $_POST['card_id'];

$process = $_POST['process'];

// Simpan data ke dalam array

$ar_data[]=$name;
$ar_data[]=$gender;
$ar_data[]=$phone;
$ar_data[]=$email;
$ar_data[]=$address;
$ar_data[]=$card_id;

// Cek aksi yang dilakukan: Simpan atau Update
if($process == "Simpan"){
    // Jika Simpan, buat SQL INSERT
    $sql = "INSERT INTO `customer` (name,gender,phone,email,address,
    card_id) VALUES (?,?,?,?,?,?)";
}else if($process == "Update"){
    // Jika Update, tambahkan ID ke array dan buat SQL UPDATE
    $ar_data[]=$_POST['id'];
    $sql = "UPDATE `customer` SET name=?,gender=?,phone=?,email=?,
    address=?,card_id=? WHERE id=?";
}

// Jika ada perintah SQL, jalankan perintah prepare dan execute dengan array data
if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

// Redirect ke halaman daftar customer
header('location:list_customer.php');
?>
