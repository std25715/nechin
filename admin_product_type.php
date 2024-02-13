<?php
$tr = "";
$update = "";
$del = "";
if($db->sel("select * from product_type")){
    while($row = $db->res->fetch_assoc()){
        $pdtype_id = $row["pdtype_id"];
        $name = $row["name"];
        $img = $row["img"];
        $price = $row["price"];
        $modal_id = "product_$pdtype_id";
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
                    <form action="product_type_process.php?pdtype_id='.$pdtype_id.'" method="post">
                        <label for="" class="col-form-label">ID :</label>
                        <input type="text" class="form-control" name="pdtype_id" value="'.$pdtype_id.'" disabled>
                        <label for="" class="col-form-label">Name :</label>
                        <input type="text" class="form-control" name="name" value="'.$name.'">
                        <label for="" class="col-form-label">Img :</label>
                        <input type="file" class="form-control" id="inputGroupFile02" name="img" value="'.$img.'">                          
                        <label for="" class="col-form-label">Price :</label>
                        <input type="text" class="form-control" name="price" value="'.$price.'">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    <input type="submit" class="btn btn-primary" name="update_type" value="ยืนยัน">
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
                    ต้องการลบรายการ '.$name.' ราคา '.$price.' บาท หรือไม่ ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                  <form action="product_type_process.php?pdtype_id='.$pdtype_id.'" method="post">
                    <input type="submit" class="btn btn-primary" name="del_type" value="ยืนยัน">
                  </form>
                </div>
              </div>
            </div>
          </div>';
        $tr .= "
            <tr class=\"border\">
                <td>$pdtype_id</td>
                <td>$name</td>                
                <td><img src=\"img/$img\"></td>
                <td>$price</td>
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
                        <h1>จัดการประเภทสินค้า</h1>
                        <button type="button" class="btn btn-success btn-add" data-toggle="modal" data-target="#add_type">เพิ่มรายการ</button>
                        <!-- <a href="#" class="btn btn-success btn-add">เพิ่มรายการ</a> -->
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

<!-- update -->
<?=$update?>

<!-- del -->
<?=$del?>

<!-- add_type -->
<div class="modal fade" id="add_type" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายการ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="product_type_process.php" method="post">
                    <label for="" class="col-form-label">Name :</label>
                    <input type="text" class="form-control" name="name" value="">
                    <label for="" class="col-form-label">Img :</label>
                    <input type="file" class="form-control" id="inputGroupFile02" name="img" value="">                                                          
                    <label for="" class="col-form-label">Price :</label>
                    <input type="text" class="form-control" name="price" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                <input type="submit" class="btn btn-primary" name="add_type" value="ยืนยัน">
                </form>
            </div>
        </div>
    </div>
</div>