<?php
include "nav.php";

if ($_SESSION["login"] == 0) {
    echo "<script type='text/javascript'>document.location='login.php'</script>";
}
?>
    <div class="container mt-5 pt-5">
        <div class="history">
            <div class="history-item">
                <div class="history-content-box">
                    <h3>ประวัติการสั่งซื้อ</h3>
                    <img src="img/logo.png" alt="">
                    <a class="btn btn-purple" href="history_order.php">เรียกดู</a>
                </div>
            </div>
            <div class="history-item">
                <div class="history-content-box">
                    <h3>ประวัติการเติมเงิน</h3>
                    <img src="img/logo.png" alt="">
                    <a class="btn btn-purple" href="history_topup.php">เรียกดู</a>
                </div>
            </div>
        </div>
    </div>
