<?php
include "nav.php";
if(isset($_GET["pdtype_id"])){
    $pdtype_id = $_GET["pdtype_id"];
}
else{
    $pdtype_id = "n/a";
}
$username = $_SESSION["username"];
if($db->sel("select * from user where username='$username'")){
    $row = $db->res->fetch_assoc();
    $balance = $row["balance"];
}
if($db->sel("select * from product_type where pdtype_id='$pdtype_id'")){
    $row = $db->res->fetch_assoc();
    $price = $row["price"];
    $amount = $row["amount"];
}
if($balance >= $price){
    $new_balance = $balance - $price;
    if($db->update("user","balance='$new_balance'","username='$username'")){
        if($db->sel("select * from product where pdtype_id='$pdtype_id'")){
            $row = $db->res->fetch_assoc();
            $product_id = $row["product_id"];
            $id_pass = $row["id_pass"];
            $product_type = $row["product_type"];
        }
        if($db->add("history","product_id,name,username,price,id_pass","'$product_id','$product_type','$username','$price','$id_pass'")){
            $db->del("product","product_id='$product_id'");
            $new_amount = $amount - 1;
            $db->update("product_type","amount='$new_amount'","pdtype_id='$pdtype_id'");
        }
        $success = true;
        $error = false;
        // echo $product_id .$id_pass .$product_type;
    }
}
else{
    $success = false;
    $error = true;
    echo "no";
}
?>



<!-- success -->
<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Success</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                การสั่งซื้อเสร็จสิ้น
            </div>
            <div class="modal-footer">
                <a href="history_order.php" class="btn btn-primary">ยืนยัน</a>
            </div>
        </div>
    </div>
</div>
<!-- error -->
<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Error</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ยอดเงินของคุณไม่เพียงพอ กรุณาเติมเงินก่อน
            </div>
            <div class="modal-footer">
                <a href="topup.php" class="btn btn-primary">ยืนยัน</a>
            </div>
        </div>
    </div>
</div>

<?php
// PHP logic to conditionally show the modal
if ($success) {
    echo "<script>$('#success').modal('show');</script>";
}
if ($error) {
    echo "<script>$('#error').modal('show');</script>";
}
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>