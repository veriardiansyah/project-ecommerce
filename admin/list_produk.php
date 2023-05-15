<?php
require_once 'dbkoneksi.php';
include_once 'header.php';
?>
<?php 
    // select all data from table "customer"
    $sql = "SELECT * FROM `product`";
    // execute the query
    $rs = $dbh->query($sql);
?>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
                        <h1 class="mt-4">Pembeli</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../sb_admin/index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pembeli</li>
                        </ol>
                    <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                <a class="btn btn-success" href="form_produk.php" role="button">Create Pembeli</a>
                            </div>
                            <div class="card-body" style="text-align: center;">
                    <table style="text-align: center;" class="table" width="100%" border="4" cellspacing="2" cellpadding="2">
                    <thead>
        <tr>
            <th>Id</th>
            <th>sku</th>
            <th>name</th>
            <th>purchase_price</th>
            <th>sell_price</th>
            <th>stock</th>
            <th>min_stock</th>
            <th>product_type_id</th>
            <th>$_restock_id</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            // initialize counter
            $nomor = 1;
            // loop through the result set
            foreach($rs as $row) {
        ?>
        <tr>
            <td><?=$nomor?></td>
            <td><?=$row['sku']?></td>
            <td><?=$row['name']?></td>
            <td><?=$row['purchase_price']?></td>
            <td><?=$row['sell_price']?></td>
            <td><?=$row['stock']?></td>
            <td><?=$row['min_stock']?></td>
            <td><?=$row['product_type_id']?></td>
            <td><?=$row['restock_id']?></td>
            <td>
                <!-- buttons to view, edit, and delete a product -->
                <a class="btn btn-primary" href="view_product.php?id=<?=$row['id']?>">View</a>
                <a class="btn btn-primary" href="form_produk.php?id=<?=$row['id']?>">Edit</a>
                <a class="btn btn-primary" href="delete_produk.php?id=<?=$row['id']?>"
                onclick="if(!confirm('Anda Yakin Hapus Data customer <?=$row['name']?>?')) {return false}"
                >Delete</a>
            </td>
        </tr>
        <?php 
            // increment counter
            $nomor++;   
            } 
        ?>
    </tbody>
                    </table>
                            </div>
<?php
  include_once 'footer.php';
?>