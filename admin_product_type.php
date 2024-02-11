<?php
$tr = "";
if($db->sel("select * from product_type")){
    while($row = $db->res->fetch_assoc()){
        $pdtype_id = $row["pdtype_id"];
        $name = $row["name"];
        $img = $row["img"];
        $price = $row["price"];
        $tr .= "
            <tr class=\"border\">
                <td>$pdtype_id</td>
                <td>$name</td>                
                <td><img src=\"img/$img\"></td>
                <td>$price</td>
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
                        <h1>จัดการประเภทสินค้า</h1>
                        <div class="card-body">
                            <table class="border">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Img</th>
                                    <th>Price</th>
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