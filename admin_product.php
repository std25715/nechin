<?php
$tr = "";
if($db->sel("select * from product")){
    while($row = $db->res->fetch_assoc()){
        $product_id = $row["product_id"];
        $id_pass = $row["id_pass"];
        $product_type = $row["product_type"];
        $tr .= "
            <tr class=\"border\">
                <td>$product_id</td>
                <td>$id_pass</td>                
                <td>$product_type</td>
                <td>
                <a href=\"index.php\" class=\"btn btn-primary\">แก้ไขรายการ</a>
                <a href=\"logout.php\" class=\"btn btn-danger\">ลบรายการ</a></td>
            </tr>";
    }
}
?>

<section>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12 col-sn-8 col-nd-6">
                    <div class="card">
                        <h1>จัดการสินค้า</h1>
                        <div class="card-body">
                            <table class="border">
                                <tr>
                                    <th>ID</th>
                                    <th>Username:Password</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                                <?=$tr?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>