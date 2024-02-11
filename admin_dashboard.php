<?php
include "nav.php";
?>

<div class="container">
    <div class="dash_bar">
        <div class="dash_item">
            <div class="dash_content">
                <a href="admin_dashboard.php" class="btn btn-primary">แดชบอร์ด</a>
            </div>
        </div>
        <div class="dash_item">
            <div class="dash_content">
                <a href="admin_dashboard.php?mod=product_type" class="btn btn-primary">จัดการประเภทสินค้า</a>
            </div>
        </div>
        <div class="dash_item">
            <div class="dash_content">
                <a href="admin_dashboard.php?mod=product" class="btn btn-primary">จัดการสินค้า</a>
            </div>
        </div>
        <div class="dash_item">
            <div class="dash_content">
                <a href="admin_dashboard.php?mod=user" class="btn btn-primary">จัดการผู้ใช้</a>
            </div>
        </div>
        <div class="dash_item">
            <div class="dash_content">
                <a href="admin_dashboard.php?mod=topup" class="btn btn-primary">ประวัติการเติมเงิน</a>
            </div>
        </div>
        <div class="dash_item">
            <div class="dash_content">
                <a href="admin_dashboard.php?mod=buy" class="btn btn-primary">ประวัติการซื้อสินค้า</a>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_GET["mod"])){
    $mod = $_GET["mod"];
}
else{
    $mod = "n/a";
}

switch ($mod) {
    case 'product_type':
        include "admin_product_type.php";
        break;
    case 'product':
        include "admin_product.php";
        break;
    case 'user':
        include "admin_user.php";
        break;
    case 'topup';
        include "admin_topup.php";
        break;
    case 'buy';
        include "admin_buy.php";
        break;
    default:
        include "admin_index.php";
        break;
}
?>