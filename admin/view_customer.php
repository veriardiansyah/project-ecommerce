<?php 
require_once 'dbkoneksi.php';
?>

<?php
    // Mendapatkan nilai id dari parameter GET
    $_id = $_GET['id'];

    // Membuat query SQL untuk mengambil data customer dengan id tertentu
    $sql = "SELECT * FROM customer WHERE id=?";
    $st = $dbh->prepare($sql);

    // Menjalankan query dengan parameter id yang telah didapatkan sebelumnya
    $st->execute([$_id]);

    // Mengambil hasil query dan menyimpannya ke dalam variabel $row
    $row = $st->fetch();
?>

<!-- Menampilkan data customer dalam bentuk tabel -->
<table class="table table-striped">
    <tbody>
        <tr>
            <td>ID</td>
            <td><?=$row['id']?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?=$row['name']?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><?=$row['gender']?></td>
        </tr>
        <tr>
            <td>Nomor HP</td>
            <td><?=$row['phone']?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?=$row['email']?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?=$row['address']?></td>
        </tr>
        <tr>
            <td>Id Kartu</td>
            <td><?=$row['card_id']?></td>
        </tr>
    </tbody>
</table>
