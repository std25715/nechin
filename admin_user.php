<?php
$tr = "";
if($db->sel("select * from user")){
    while($row = $db->res->fetch_assoc()){
        $username = $row["username"];
        $email = $row["email"];
        $role = $row["role"];
        $balance = $row["balance"];
        $time = $row["dtime"];
        $tr .= "
            <tr class=\"border\">
                <td>$username</td>
                <td>$email</td>                
                <td>$role</td>
                <td>$balance</td>
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
                        <h1>จัดการผู้ใช้</h1>
                        <div class="card-body">
                            <table class="border">
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Balance</th>
                                    <th>Register At</th>
                                </tr>
                                <?=$tr?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>