<?php
require_once 'dbkoneksi.php';


if (isset($_POST['proses'])) {
    $_proses = $_POST['proses'];
    $_sku = $_POST['sku'];
    $_nama = $_POST['name'];
    $_purchase_price = $_POST['purchase_price'];
    $_sell_price = $_POST['sell_price'];
    $_stok = $_POST['stock'];
    $_min_stok = $_POST['min_stock'];
    $_product_type_id = $_POST['product_type_id'];
    $_restock_id = $_POST['restock_id'];

    // array data
    $ar_data[] = $_sku; // ? 1
    $ar_data[] = $_nama; // ? 2
    $ar_data[] = $_purchase_price; // 3
    $ar_data[] = $_sell_price; // 4
    $ar_data[] = $_stok; // 5
    $ar_data[] = $_min_stok;
    $ar_data[] = $_product_type_id; // 6
    $ar_data[] = $_restock_id; // ? 7

}


if ($_proses == "Simpan") {
    // Jika Simpan, buat SQL INSERT
    $sql = "INSERT INTO product (sku,name,purchase_price,sell_price,stock,min_stock,product_type_id,restock_id) VALUES (?,?,?,?,?,?,?,?)";
} else if ($_proses == "Update") {
    // Jika Update, tambahkan ID ke array dan buat SQL UPDATE
    $ar_data[] = $_POST['id'];
    $sql = "UPDATE product SET sku=?, name=?, purchase_price=?, sell_price=?, stock=?, min_stock=?, product_type_id=?, restock_id=? WHERE id=?";
}

// Jika ada perintah SQL, jalankan perintah prepare dan execute dengan array data
if (isset($sql)) {
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

header('location:list_produk.php');
