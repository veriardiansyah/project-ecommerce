<?php 
    require_once 'dbkoneksi.php';
    include_once 'header.php';
?>

<?php 
    // select all data from table "product_type"
    $sql = "SELECT * FROM product_type";
    // execute the query
    $rs = $dbh->query($sql);
?>

            <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                        <h1 class="mt-4">Jenis produk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../sb_admin/index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Jenis Produk</li>
                        </ol>
                    <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                <a class="btn btn-success" href="form_type.php" role="button">Create Jenis produk</a>
                            </div>
                            <div class="card-body" style="text-align: center;">
                            <table style="text-align: center;" class="table" width="100%" border="4" cellspacing="2" cellpadding="2">
                       <thead>
                           <tr>
                               <th>Id</th>
                               <th>Nama Produk</th>
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
                               <td><?=$row['name']?></td>
                               <td>
                                   <!-- buttons to view, edit, and delete a product -->
                                   <a class="btn btn-primary" href="view_type.php?id=<?=$row['id']?>">View</a>
                                  <a class="btn btn-primary" href="form_type.php?id=<?=$row['id']?>">Edit</a>
                                   <a class="btn btn-primary" href="delete_type.php?id=<?=$row['id']?>"
                                   onclick="if(!confirm('Anda Yakin Hapus Data product_type <?=$row['name']?>?')) {return false}"
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
                    </div>
                    <?php
include_once 'footer.php';
?>
