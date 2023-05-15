<?php
require_once 'dbkoneksi.php';
include_once 'header.php';
?>
<?php 
    // select all data from table "customer"
    $sql = "SELECT * FROM `order`";
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
                                <a class="btn btn-success" href="form_order.php" role="button">Create pelanggan</a>
                            </div>
                            <div class="card-body" style="text-align: center;">
                    <table style="text-align: center;" class="table" width="100%" border="4" cellspacing="2" cellpadding="2">
                    <thead>
        <tr>
            <th>Id</th>
            <th>order_number</th>
            <th>date</th>
            <th>qty</th>
            <th>total_price</th>
            <th>customer_id</th>
            <th>product_id</th>
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
            <td><?=$row['order_number']?></td>
            <td><?=$row['date']?></td>
            <td><?=$row['qty']?></td>
            <td><?=$row['total_price']?></td>
            <td><?=$row['customer_id']?></td>
            <td><?=$row['product_id']?></td>
            <td>
                <!-- buttons to view, edit, and delete a product -->
                <a class="btn btn-primary" href="view_customer.php?id=<?=$row['id']?>">View</a>
                <a class="btn btn-primary" href="form_produk.php?id=<?=$row['id']?>">Edit</a>
                <a class="btn btn-primary" href="delete_produk.php?id=<?=$row['id']?>"
                onclick="if(!confirm('Anda Yakin Hapus Data customer <?=$row['id']?>?')) {return false}"
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