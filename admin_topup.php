<?php
$tr = "";
if($db->sel("select * from topup")){
    while($row = $db->res->fetch_assoc()){
        $topup_id = $row["topup_id"];
        $username = $row["username"];
        $amount = $row["amount"];
        $time = $row["dtime"];
        $tr .= "
            <tr class=\"border\">
                <td>$topup_id</td>
                <td>$username</td>                
                <td>$amount</td>
                <td>$time</td>
            </tr>";
    }
}
?>

<section>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12 col-sn-8 col-nd-6">
                    <div class="card">
                        <h1>ประวัติการเติมเงิน</h1>
                        <div class="card-body">
                            <table class="border">
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Amount</th>
                                    <th>Time</th>
                                </tr>
                                <?=$tr?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>