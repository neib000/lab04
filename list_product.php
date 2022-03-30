<?php

require_once("./entities/product.class.php");
?>

<?php
include_once("header.php"); ?>
<div class="container">
    <h3 class="h3-title"> Sản phẩm cửa hàng </h3>
    <div class="row my-2">
        <?php
        $prods = Product::list_product();
        foreach ($prods as $item) {
            $imgDefault = "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17f89816749%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17f89816749%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2299.12312316894531%22%20y%3D%2296.3%22%3EImage%20cap%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E";
            echo "<div class='col-3 p-1'>
            <div class='card p-1'>
            <img height='200' class='card-img-top' onerror='this.onerror=null; this.src='" . $imgDefault . "'' src='" . $item["Picture"] . "' alt='" . $item["ProductName"] . "' style='object-fit:contain'>
            <div class='card-body'>
              <p class='card-text'>" . $item["ProductName"] . "</p>
              <p class ='card-text'>" .$item ["Price"]. "</p>
              <p>
              <button type ='button' class= 'btn btn-primary'> Mua hàng </button>
          </p>

            </div></div>
  </div>";
        } ?>
    </div>
</div>

<?php
include_once("footer.php");
?>