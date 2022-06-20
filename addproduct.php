<?php
include_once 'components/header.php';
include_once 'components/database.php';
include_once 'components/saveProduct.php';

?>

<div class="container mt-3">
  <nav class="navbar navbar-dark bg-primary">
    <div class="col-sm-8">
      <a class="navbar-brand">Product Add</a>
    </div>
    <div class="col-sm-4">
      <div style="float:right">
        <button class="btn btn-sm btn-success" id="SAVE" type="submit" form="product_form" name="save" style="display: inline-block; margin-right: 10px">Save</button>
        <button class="btn btn-sm btn-danger" type="submit" id="cancelButton"
        style="display: inline-block; margin-right: 10px">CANCEL</button>
        <script type="text/javascript">
            $(function () {
                $("#cancelButton").click(function() {
                    $(location).attr('href', 'index.php')
                })
            });
        </script>
        <script type="text/javascript" src="js/main.js"></script>
      </div>
    </div>
  </nav>
</div>


<div class="container">

  <div class="col-8 my-3">
    <form id="product_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="form-group row">
        <label for="sku" class="col-sm-2 col-form-label">SKU</label>
        <div class="col-sm-6">
          <input class="form-control" type="text" id="sku" 
          name="sku" value="<?php echo $sku;?>">
        </div>
        <span class="error"><?php echo $errSku;?></span>
      </div>
      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">NAME</label>
        <div class="col-sm-6">
          <input class="form-control" type="text" id="name" 
          name="name" value="<?php echo $name;?>">
        </div>
        <span class="error"><?php echo $errName;?></span>
      </div>
      <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label">PRICE ($)</label>
        <div class="col-sm-6">
          <input class="form-control" type="number" id="price" 
          min="0.01" max="10000.00" step="0.01" name="price" value="<?php echo $price;?>">
        </div>
        <span class="error"><?php echo $errPrice;?></span>
      </div> *required
      
      <div class="form-group row">
        <label for="typeswitcher" class="col-sm-3 col-form-label">Type Switcher</label>
        <div class="col-sm-5">
          <select class="form-control" name="type" id="productType" >
            <option selected value="">Type Switcher</option>
            <option value="1">DVD</option>
            <option value="2">Book</option>
            <option value="3">Furniture</option>
          </select>
          <span class="error"><?php echo $errType;?></span>
        </div>
      </div>
      <div id="new_menu"></div>
    </form>
  </div>
</div>

<?php include 'components/footer.php' ?>