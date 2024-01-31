<?php
include "nav.php";
if ($_SESSION["login"] == 0) {
    echo "<script type='text/javascript'>document.location='login.php'</script>";
}
else{
    $tr = "";
    $username = $_SESSION["username"];
    if($db->sel("select * from topup where username='$username'")){
        while($row = $db->res->fetch_assoc()){
            $id = $row["topup_id"];
            $username = $row["username"];
            $amount = $row["amount"];
            $date = $row["dtime"];
            $tr .= "
            <tr>
                <td>$id</td>
                <td>$username</td>
                <td>$amount</td>
                <td>$date</td>
            </tr>";

        }
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
                            <table>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                                <?=$tr?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
