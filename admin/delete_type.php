<?php 
// Memanggil file dbkoneksi.php yang berisi koneksi ke database
require_once 'clothing.php';

// Mendapatkan nilai dari parameter 'id' pada URL
$_id = $_GET['id'];

// Query DELETE untuk menghapus data pada tabel 'product_type' dengan kondisi 'id' = $_id
$sql = "DELETE FROM product_type WHERE id = ?";

// Menyiapkan statement SQL
$st = $dbh->prepare($sql);

// Menjalankan statement SQL dengan mengirimkan nilai parameter $_id
$st->execute([$_id]);

// Mengarahkan halaman ke list_product_type.php setelah data berhasil dihapus
header('location:list_type.php');
?>
