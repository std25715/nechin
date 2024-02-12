<?php
include "nav.php";
$pdtype_id = $_GET["pdtype_id"];
if(isset($_POST["add_type"])){
    $name = $_POST["name"];
    $img = $_POST["img"];
    $price = $_POST["price"];
    if($db->add("product_type","name,img,price","'$name','$img','$price'")){
        echo "<script type='text/javascript'>document.location='admin_dashboard.php?mod=product_type'</script>";
    }   
}
if(isset($_POST["update_type"])){
    $name = $_POST["name"];
    $img = $_POST["img"];
    $price = $_POST["price"];
    if($db->update("product_type","name='$name',img='$img',price='$price'","pdtype_id='$pdtype_id'")){
        echo "<script type='text/javascript'>document.location='admin_dashboard.php?mod=product_type'</script>";
    }
}
if(isset($_POST["del_type"])){
    if($db->del("product_type","pdtype_id='$pdtype_id'")){
        echo "<script type='text/javascript'>document.location='admin_dashboard.php?mod=product_type'</script>";
    }
}
?>