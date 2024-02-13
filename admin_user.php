<?php
$tr = "";
$update = "";
$del = "";
$option = "";
if($db->sel("select * from role")){
  while($row = $db->res->fetch_assoc()){
      $role = $row["role"];      
      $option .= "<option value=$role>$role</option>";
  }
}
if($db->sel("select * from user")){
    while($row = $db->res->fetch_assoc()){
        $username = $row["username"];
        $email = $row["email"];
        $role = $row["role"];
        $balance = $row["balance"];
        $time = $row["dtime"];
        $modal_id = "user_$username";
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
                    <form action="user_process.php?username='.$username.'" method="post">
                        <label for="" class="col-form-label">Username :</label>
                        <input type="text" class="form-control" name="username" value="'.$username.'" disabled>
                        <label for="" class="col-form-label">Email :</label>
                        <input type="text" class="form-control" name="email" value="'.$email.'" >
                        <label for="" class="col-form-label">Role :</label>
                        <select name="role" id="" class="custom-select mt-3">
                            <option selected>Role :</option>
                            '.$option.'
                        </select>
                        <label for="" class="col-form-label">Balance :</label>
                        <input type="text" class="form-control" name="balance" value="'.$balance.'" >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    <input type="submit" class="btn btn-primary" name="update_user" value="ยืนยัน">
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
                    ต้องการลบผู้ใช้ '.$username.' หรือไม่ ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                  <form action="user_process.php?username='.$username.'" method="post">
                    <input type="submit" class="btn btn-primary" name="del_user" value="ยืนยัน">
                  </form>
                </div>
              </div>
            </div>
          </div>';
        $tr .= "
            <tr class=\"border\">
                <td>$username</td>
                <td>$email</td>                
                <td>$role</td>
                <td>$balance</td>
                <td>$time</td>
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
                        <h1>จัดการผู้ใช้</h1>
                        <div class="card-body">
                            <table class="border">
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Balance</th>
                                    <th>Register At</th>
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