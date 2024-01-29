<?php
include "nav.php";
if ($_SESSION["login"] == 0) {
    echo "<script type='text/javascript'>document.location='login.php'</script>";
}
else{
    $status_message = "";
    $success_message = "";
    $username = $_SESSION["username"];
    if(isset($_POST["topup"])){
        $wallet_link = $_POST["topup_link"];
        include "topup_process.php";
    
        $arr_verify = $voucher->verify();
        $arr_redeem = $voucher->redeem();

        //test json
        // var_dump($voucher->verify());
        // echo "<br>";
        // echo "<hr>";
        // echo "<br>";
        // var_dump($voucher->redeem());
    
        $error_status= $arr_verify->error; // if voucher is wrong
    
        $voucher_status = $arr_verify->status->message; //status of voucher
        $amount = $arr_redeem->data->voucher->redeemed_amount_baht; //count amount of redeem bath
        $amount_show = $arr_redeem->data->voucher->redeemed_amount_baht; //count amount of redeem bath

        if($error_status == "Not Found"){
            $status_message = "ลิงค์ซองไม่ถูกต้อง";
        }
        elseif($voucher_status == "Voucher is expired."){
            $status_message = "ซองนี้หมดอายุแล้ว";
        }
        elseif($voucher_status == "Voucher ticket is out of stock."){
            $status_message = "ซองนี้ถูกรับเงินจนหมดแล้ว";
        }
        else{
            if($db->sel("select * from user where username='$username'")){
                $row = $db->res->fetch_assoc();
                $balance = $row["balance"];
                $balance += $amount;
                if($db->update("user","balance='$balance'","username='$username'")){
                    $success_message = "เติมเงินสำเร็จ : $amount_show บาท";
                    $db->add("topup","username,amount","'$username','$amount'");
                }
                else{
                    $status_message = "เติมเงินไม่สำเร็จ กรุณาตรวจสอบซอง หรือติดต่อผู้ดูแล";
                }
            }

        
        }
    }
}
?>
<section>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12 col-sn-8 col-nd-6">
                    <div class="card">
                        <h1>Topup</h1>
                        <div class="card-body">
                            <form action="" method="post">
                                <img class="center" src="img/angpao.webp" alt="">
                                <input type="text" name="topup_link" id="" class="form-control my-4 py-2" placeholder="วางลิงค์ซองอั่งเปา">
                                <div class="error-message"><?=$status_message?></div>
                                <div class="success-message"><?=$success_message?></div>
                                <div class="text-center mt-3">
                                    <input class="btn btn-purple" type="submit" value="เติมเงิน" name="topup">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
