<?php
include "nav.php";
if ($_SESSION["login"] == 0) {
    echo "<script type='text/javascript'>document.location='login.php'</script>";
}
else{
    $tr = "";
    $username = $_SESSION["username"];
    if($db->sel("select * from history where username='$username'")){
        while($row = $db->res->fetch_assoc()){
            $id = $row["history_id"];
            $username = $row["username"];
            $product_id = $row["product_id"];
            $name = $row["name"];
            $id_pass = $row["id_pass"];
            $price = $row["price"];
            $date = $row["dtime"];
            $tr .= "
            <tr>
                <td>$id</td>
                <td>$username</td>                
                <td>$product_id</td>
                <td>$name</td>
                <td>$id_pass</td>
                <td>$price</td>
                <td>$date</td>
            </tr>";

        }
    }
} 
?>
<section>
        <div class="container mt-5 pt-5">
            <!-- <div class="row">
                <div class="col-12 col-sn-8 col-nd-6"> -->
                    <div class="card">
                        <h1>ประวัติการสั่งซื้อ</h1>
                        <div class="card-body">
                            <table>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Product ID</th>                                    
                                    <th>ชื่อสินค้า</th>
                                    <th>รายละเอียด</th>
                                    <th>ราคา</th>
                                    <th>วันที่</th>
                                </tr>
                                <?=$tr?>
                            </table>
                        </div>
                    </div>
                <!-- </div>
            </div> -->
        </div>
    </section>
