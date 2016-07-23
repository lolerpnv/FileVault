<?php
/**
 * Created by PhpStorm.
 * User: Toni
 * Date: 23.7.2016.
 * Time: 12:54
 */
if(session_status()!= 2)session_start();
if(isset($_SESSION['user'])) {
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/FileVault/uploads/";
    $target_file = $target_dir . basename(md5($_FILES["fileToUpload"]["name"].$_SESSION['user'])) . "." . pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
    $uploadOk = 1;
    $target_link = "http://localhost/FileVault/uploads/".basename(md5($_FILES["fileToUpload"]["name"].$_SESSION['user'])) . "." . pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
// Check if file already exists
    if (file_exists($target_file)) {
        echo "File with that name already exists.<br/>";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.<br/><a href='http://localhost/FileVault/model/user_index.php'><button>Homepage</button></a>";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            addAsset($_FILES['fileToUpload']['name'],$target_link,$_FILES['fileToUpload']['size'],$_POST['private'],1);
            echo '<html><meta http-equiv="refresh" content="0;url=http://localhost/FileVault/model/user_index.php"/></html>';
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }




}else echo '<html><meta http-equiv="refresh" content="0;url=http://localhost/FileVault/index.php"/></html>';


function addAsset($name,$loc,$size,$private,$accesable)
{
    $conn = new mysqli("localhost","tpap", "CnSs.964","tpap");

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $user = $_SESSION['user_id'];
    $sql = "INSERT INTO asset (name,reference,size,private,access,user_id) VALUES('$name','$loc','$size','$private','$accesable','$user')";
    if($conn->query($sql)===TRUE)
    {
        return true;
    }else return "error : ".$conn->error;
}