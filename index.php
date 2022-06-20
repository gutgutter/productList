<?php
include "components/database.php";
include "components/header.php";
include_once "components/item.php";
include_once "components/delete_products.php";

?>

<div class="container mt-3">
  <nav class="navbar navbar-dark bg-primary">
    <div class="col-sm-8">
      <a class="navbar-brand">Product List</a>
    </div>
    <div class="col-sm-4">
      <div style="float:right">
        <button class="btn btn-sm btn-warning" type="submit" id="addProd" style="display: inline-block; margin-right: 10px">ADD</button>
        <script type="text/javascript">
          $(function() {
            $("#addProd").click(function() {
              $(location).attr('href', 'addproduct.php')
            })
          });
        </script>
        <form method="post" id="delete_form" style="display: inline-block; margin-right: 10px">
          <button class="btn btn-sm btn-warning" type="submit" 
          name="but_delete">MASS DELETE</button>
        </form>

      </div>
    </div>
  </nav>

  <div class="container">

    <div class="row text-center py-5">
      
      <?php include "components/main.php"; ?>     
    </div>
  </div>
</div>

<?php include "components/footer.php" ?>