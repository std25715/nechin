<?php
$tr = "";
if($db->sel("select * from history")){
    while($row = $db->res->fetch_assoc()){
        $history_id = $row["history_id"];
        $product_id = $row["product_id"];
        $name = $row["name"];
        $id_pass = $row["id_pass"];
        $username = $row["username"];
        $price = $row["price"];
        $dtime = $row["dtime"];
        $tr .= "
            <tr class=\"border\">
                <td>$history_id</td>
                <td>$product_id</td>                
                <td>$name</td>
                <td>$id_pass</td>
                <td>$username</td>
                <td>$price</td>
                <td>$dtime</td>
            </tr>";
    }
}
?>

<section>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12 col-sn-8 col-nd-6">
                    <div class="card">
                        <h1>ประวัติการซื้อสินค้า</h1>
                        <div class="card-body">
                            <table class="border">
                                <tr>
                                    <th>หมายเลขคำสั่งซื้อ</th>
                                    <th>หมายเลขสินค้า</th>
                                    <th>Name</th>
                                    <th>ID:PASS</th>
                                    <th>Username</th>
                                    <th>Price</th>
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
