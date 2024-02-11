<?php
include "nav.php";

if ($_SESSION["login"] == 0) {
    echo "<script type='text/javascript'>document.location='login.php'</script>";
}
else{
    $flex = "";
    $modal = "";
    if($db->sel("select * from product_type")){
        while($product = $db->res->fetch_assoc()){
            $name = $product["name"];
            $price = $product["price"];
            $img = $product["img"];
            $pdtype_id = $product["pdtype_id"];
            $amount = $product["amount"];
            $modal_id = "product_$pdtype_id";
            $modal .= '<div class="modal fade" id="'.$modal_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">ยืนยันการสั่งซื้อ</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  '.$name.' ราคา '.$price.' บาท
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                  
                  <a href="store_process.php?pdtype_id='.$pdtype_id.'" class="btn btn-success">ยืนยัน</a>
                </div>
              </div>
            </div>
          </div>';
            $flex .= "
            <div class=\"store-item\">
                <div class=\"store-content-box\">
                    <img src=\"img/$img\">
                    <h3>$name</h3>
                    <h6 class=\"c-purple\">ราคา $price บาท</h6>
                    <button type=\"button\" class=\"btn btn-purple\" data-toggle=\"modal\" data-target=\"#$modal_id\">สั่งซื้อสินค้า</button>
                    <h6 class=\"c-gray\">สินค้าจำนวน $amount ชิ้น</h6>
                </div>
            </div>";
        }
    }
}
?>

<div class="container mt-5 pt-5 pb-5">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/banner.png" alt="First slide">
            </div>
        </div>
    </div>
    <div class="store">
        <?=$flex?>
        <?=$modal?>
    </div>
</div>


