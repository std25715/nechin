<?php
include "nav.php";
$pdtype_id = $_GET["pdtype_id"];
if(isset($_POST["add_type"])){
    $target_dir = "img/upload/";
    
    // Get the filename and extension
    $filename = basename($_FILES["img"]["name"]);
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

    // Generate a unique filename
    $unique_filename = uniqid() . '_' . $filename; // Appending a unique identifier
    
    $target_file = $target_dir . $unique_filename;

    // Move the uploaded file to the desired directory
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        // echo "The file ". $filename. " has been uploaded with a unique name: " . $unique_filename;
    } 



    $name = $_POST["name"];
    $img = $unique_filename;
    $price = $_POST["price"];
    if($db->add("product_type","name,img,price","'$name','$img','$price'")){
        echo "<script type='text/javascript'>document.location='admin_dashboard.php?mod=product_type'</script>";
    }   
}
if(isset($_POST["update_type"])){
    //check if file upload
    if(isset($_FILES["img"]) && $_FILES["img"]["error"] == 0) {
        $target_dir = "img/upload/";
    
        // Get the filename and extension
        $filename = basename($_FILES["img"]["name"]);
        $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
    
        // Generate a unique filename
        $unique_filename = uniqid() . '_' . $filename; // Appending a unique identifier
        
        $target_file = $target_dir . $unique_filename;
    
        // Move the uploaded file to the desired directory
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {            
            $img = $unique_filename;
        } 
    }
    else{
        if($db->sel("select * from product_type where pdtype_id='$pdtype_id'")){
            $row = $db->res->fetch_assoc();
            $img = $row["img"];
        }
    }

    $name = $_POST["name"];
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