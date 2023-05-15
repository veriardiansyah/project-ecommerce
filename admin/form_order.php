<?php 
require_once 'dbkoneksi.php';
include_once 'header.php';

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<FIeldset>
<form method="POST" action="proses_order.php">
<div class="form-group row">
        <label for="id" class="col-4 col-form-label">id</label>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-arrow-circle-right"></i>
                    </div>
                </div>
                <input id="id" name="id" value="" type="number" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="order_number" class="col-4 col-form-label">order_namber</label>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-arrow-circle-right"></i>
                    </div>
                </div>
                <input id="order_number" name="order_number" value="" type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="date" class="col-4 col-form-label">date</label>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-adjust"></i>
                    </div>
                </div>
                <input id="date" name="date" type="date" class="form-control" value="">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="qty" class="col-4 col-form-label">qty</label>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-anchor"></i>
                    </div>
                </div>
                <input id="qty" name="qty" type="text" class="form-control" value="">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="total_price" class="col-4 col-form-label">total_price</label>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-arrow-circle-up"></i>
                    </div>
                </div>
                <input id="total_price" name="total_price" value="" type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group row">
    <label for="costumer_id" class="col-4 col-form-label">costumer_id</label> 
    <div class="col-8">
      <?php
        $sqlcust = "SELECT * FROM customer";
        $rscust = $dbh->query($sqlcust);
      ?>
      <select id="customer_id" name="customer_id" class="form-select">
        <?php
        foreach ($rscust as $rowcust) { 
        ?>
          <option value="<?= $rowcust['id'] ?>"><?= $rowcust['name'] ?></option>
          <?php
        }
          ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="costumer_id" class="col-4 col-form-label">costumer_id</label> 
    <div class="col-8">
      <?php
        $sqlproduct = "SELECT * FROM product";
        $rsproduct = $dbh->query($sqlproduct);
      ?>
      <select id="product_id" name="product_id" class="form-select">
        <?php
        foreach ($rsproduct as $rowproduct) { 
        ?>
          <option value="<?= $rowproduct['id'] ?>"><?= $rowproduct['name'] ?></option>
          <?php
        }
          ?>
      </select>
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
</FIeldset>
<?php
include_once 'footer.php';
?>
