<?php
$user = 0;
$type = 0;
$stock = 0;
$topup = 0;

if($db->sel("select username from user")){
    $user = $db->res->num_rows;
}
if($db->sel("select pdtype_id from product_type")){
    $type = $db->res->num_rows;
}
if($db->sel("select product_id from product")){
    $stock = $db->res->num_rows;
}
if($db->sel("select amount from topup")){
    while($row = $db->res->fetch_assoc()){
        $amount = $row["amount"];
        $topup += $amount;
    }
}
?>
<div class="container">
    <div class="dashboard">
        <div class="dashboard_item">
            <div class="dashboard_content">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg>
                <h4>จำนวนสมาชิกทั้งหมด</h4>
                <p><?=$user?> คน</p>
            </div>
        </div>
        <div class="dashboard_item">
            <div class="dashboard_content">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-code-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                <path d="M6.854 4.646a.5.5 0 0 1 0 .708L4.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0m2.292 0a.5.5 0 0 0 0 .708L11.793 8l-2.647 2.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708 0"/>
            </svg>
                <h4>จำนวนประเภทสินค้า</h4>
                <p><?=$type?> ประเภท</p>
            </div>
        </div>
        <div class="dashboard_item">
            <div class="dashboard_content">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-box" viewBox="0 0 16 16">
                <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z"/>
            </svg>
                <h4>จำนวนสินค้าทั้งหมด</h4>
                <p><?=$stock?> ชิ้น</p>
            </div>
        </div>
        <div class="dashboard_item">
            <div class="dashboard_content">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z"/>
            </svg>
                <h4>ยอดเติมเงินทั้งหมด</h4>
                <p><?=$topup?> บาท</p>
            </div>
        </div>
    </div>
</div>