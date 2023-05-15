<?php 
require_once 'dbkoneksi.php';
include_once 'header.php';

?>
            
<form method="POST" action="proses_produk.php">
  <div class="form-group row">
    <label for="sku" class="col-4 col-form-label">sku</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-anchor"></i>
          </div>
        </div> 
        <input id="sku" name="sku" type="text" class="form-control"
        value="">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="name" class="col-4 col-form-label">name</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-adjust"></i>
          </div>
        </div> 
        <input id="name" name="name" type="text" class="form-control" 
        value="">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="purchase_price" class="col-4 col-form-label">purchase_price</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-o-left"></i>
          </div>
        </div> 
        <input id="purchase_price" name="purchase_price" 
        value="" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="sell_price" class="col-4 col-form-label">sell_price</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-o-left"></i>
          </div>
        </div> 
        <input id="sell_price" name="sell_price" 
        value="" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="stock" class="col-4 col-form-label">Stock</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-up"></i>
          </div>
        </div> 
        <input id="stock" name="stock" value=""
        type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="min_stock" class="col-4 col-form-label">Min_Stock</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-right"></i>
          </div>
        </div> 
        <input id="min_stock" name="min_stock" 
        value=""
        type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="product_type_id" class="col-4 col-form-label">product_type_id</label> 
    <div class="col-8">
        <?php 
            $sqltype = "SELECT * FROM product_type";
            $rstype = $dbh->query($sqltype);
        ?>
      <select id="product_type_id" name="product_type_id" class="custom-select">
          <?php 
            foreach($rstype as $rowtype){
         ?>
            <option value="<?=$rowtype['id']?>"><?=$rowtype['name']?></option>
         <?php
            }
        ?>
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <label for="restock_id" class="col-4 col-form-label">restock_id</label> 
    <div class="col-8">
        <?php 
            $sqlrestock = "SELECT * FROM restock";
            $rsrestock = $dbh->query($sqlrestock);
        ?>
      <select id="restock_id" name="restock_id" class="custom-select">
          <?php 
            foreach($rsrestock as $rowrestock){
         ?>
            <option value="<?=$rowrestock['id']?>"><?=$rowrestock['supplier_id']?></option>
         <?php
            }
        ?>
      </select>
    </div>
  </div> 
    <div class="form-group row">
        <div class="offset-4 col-8">
            <input type="submit" name="proses" type="submit" class="btn btn-primary" value="<?php if (isset($_GET['idedit'])) {
                echo 'Update';
            } else {
                echo 'Simpan';
            } ?>" />
        </div>
    </div>
    <?php if (isset($_GET['idedit'])){ ?>
    <input type="hidden" name="idedit" value="<?php echo $_GET['idedit']; // send variable idedit ?>">
    <?php } ?>
</form>
<?php
include_once 'footer.php';
?>

