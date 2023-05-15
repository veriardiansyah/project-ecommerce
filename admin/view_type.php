<?php 
require_once 'dbkoneksi.php';
?>

<?php
    // Mendapatkan nilai id dari parameter GET
    $_id = $_GET['id'];

    // Membuat query SQL untuk mengambil data product_type dengan id tertentu
    $sql = "SELECT * FROM product_type WHERE id=?";
    $st = $dbh->prepare($sql);

    // Menjalankan query dengan parameter id yang telah didapatkan sebelumnya
    $st->execute([$_id]);

    // Mengambil hasil query dan menyimpannya ke dalam variabel $row
    $row = $st->fetch();
?>

<!-- Menampilkan data product_type dalam bentuk tabel -->
<table class="table table-striped">
    <tbody>
        <tr>
            <td>Id</td>
            <td><?=$row['id']?></td>
        </tr>
        <tr>
            <td>Nama Produk</td>
            <td><?=$row['name']?></td>
        </tr>
    </tbody>
</table>
