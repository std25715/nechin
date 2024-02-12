<?php
include "nav.php";
$product_id = $_GET["product_id"];
if(isset($_POST["add_product"])){
    $id_pass = $_POST["id_pass"];
    $pdtype_id = $_POST["pdtype_id"];
    $db->sel("select * from product_type where pdtype_id='$pdtype_id'");
    $row = $db->res->fetch_assoc();
    $product_type = $row["name"];
    $amount = $row["amount"];
    if($db->add("product","id_pass,product_type,pdtype_id","'$id_pass','$product_type','$pdtype_id'")){
        $new_amount = $amount + 1;
        $db->update("product_type","amount='$new_amount'","pdtype_id='$pdtype_id'");
        echo "<script type='text/javascript'>document.location='admin_dashboard.php?mod=product'</script>";
    }   
}
if(isset($_POST["update_product"])){
    $id_pass = $_POST["id_pass"];
    if($db->update("product","id_pass='$id_pass'","product_id='$product_id'")){
        echo "<script type='text/javascript'>document.location='admin_dashboard.php?mod=product'</script>";
    }
}
if(isset($_POST["del_product"])){
    if($db->del("product","product_id='$product_id'")){
        echo "<script type='text/javascript'>document.location='admin_dashboard.php?mod=product'</script>";
    }
}
?>