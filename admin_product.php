<?php
$tr = "";
$option = "";
$update = "";
$del = "";
if($db->sel("select * from product_type")){
    while($row = $db->res->fetch_assoc()){
        $pdtype_id = $row["pdtype_id"];
        $name = $row["name"];
        $option .= "<option value=$pdtype_id>$name</option>";
    }
}
if($db->sel("select * from product")){
    while($row = $db->res->fetch_assoc()){
        $product_id = $row["product_id"];
        $id_pass = $row["id_pass"];
        $product_type = $row["product_type"];
        $modal_id = "product_$product_id";
        $update .= '<div class="modal fade" id="update_'.$modal_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">แก้ไขรายการ</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="product_process.php?product_id='.$product_id.'" method="post">
                        <label for="" class="col-form-label">Username:Password :</label>
                        <input type="text" class="form-control" name="id_pass" value="'.$id_pass.'">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    <input type="submit" class="btn btn-primary" name="update_product" value="ยืนยัน">
                    </form>
                </div>
              </div>
            </div>
          </div>';

          $del .= '<div class="modal fade" id="del_'.$modal_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">ลบรายการ</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    ต้องการลบรายการ '.$id_pass.' หรือไม่ ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                  <form action="product_process.php?product_id='.$product_id.'" method="post">
                    <input type="submit" class="btn btn-primary" name="del_product" value="ยืนยัน">
                  </form>
                </div>
              </div>
            </div>
          </div>';
        $tr .= "
            <tr class=\"border\">
                <td>$product_id</td>
                <td>$id_pass</td>                
                <td>$product_type</td>
                <td>
                <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#update_$modal_id\">แก้ไขรายการ</button>
                <button type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#del_$modal_id\">ลบรายการ</button></td>
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
                        <button type="button" class="btn btn-success btn-add" data-toggle="modal" data-target="#add_product">เพิ่มรายการ</button>
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

<!-- add_product -->
<div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายการ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="product_process.php" method="post">
                    <label for="" class="col-form-label">Username:Password :</label>
                    <input type="text" class="form-control" name="id_pass" value="">
                    <select name="pdtype_id" id="" class="custom-select mt-3">
                        <option selected>เลือกประเภทสินค้า</option>
                        <?=$option?>
                    </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                <input type="submit" class="btn btn-primary" name="add_product" value="ยืนยัน">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- update -->
<?=$update?>

<!-- del -->
<?=$del?>