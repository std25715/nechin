<?php
include "nav.php";

if ($_SESSION["login"] == 0) {
    echo "<script type='text/javascript'>document.location='login.php'</script>";
}
else{
    $flex = "";
    $sql = "select * from product_type";
    if($db->sel($sql)){
        while($product = $db->res->fetch_assoc()){
            $name = $product["name"];
            $price = $product["price"];
            $img = $product["img"];
            $amount = 0;
            $flex .= "
            <div class=\"store-item\">
                <div class=\"store-content-box\">
                    <img src=\"img/$img\">
                    <h3>$name</h3>
                    <h6 class=\"c-purple\">ราคา $price บาท</h6>
                    <a class=\"btn btn-purple\" href=\"#\">สั่งซื้อสินค้า</a>
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
    </div>
</div>
