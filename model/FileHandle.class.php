<?php

/**
 * Created by PhpStorm.
 * User: toni
 * Date: 27.07.16.
 * Time: 14:43
 */
class FileHandle
{
    function __construct()
    {
    }

    public function getFile($file,$target_link)
    {
        $db = DataBase::getInstance();
        $result = $db->query("SELECT * FROM asset WHERE reference=?",Array($target_link));
        if($result != 0)
        {
            if($result[0]['private'] == "off" || ($result[0]['private'] == "on" && isset($_SESSION['user']) && $_SESSION['user_id'] == $result[0]['user_id'])) {
                $db->upDownloads($result[0]['id']);
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="' . basename($result[0]['name']) . '"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                readfile($file);
                exit;
            }else return 0;
        }
        else return 0;
    }

    //$_FILES['fileToUpload']['name'],$_FILES["fileToUpload"]["tmp_name"],$_FILES['fileToUpload']['size']
    public function upFile($file, $filename, $filesize, $private)
    {
        $path_info = pathinfo($filename);
        $filename = (string)$filename;
        $target_dir = BP . "/uploads/";
        $target_file = $target_dir . basename(md5($filename . $_SESSION['user'])) . "." . pathinfo($filename, PATHINFO_EXTENSION);
        $uploadOk = 1;
        $target_link = URL . "/files/" . basename(md5($filename . $_SESSION['user'])) . "." . pathinfo($filename, PATHINFO_EXTENSION);
        //echo "dir".$target_dir."<br/>"."file".$target_file."<br/>".$target_link."  ". $filename;
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
            return $uploadOk;
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($file, $target_file)) {//$_FILES["fileToUpload"]["tmp_name"]
                //echo "The file " . basename($filename) . " has been uploaded.";
                $db = DataBase::getInstance();
                $db->addAsset($filename, $target_link, $filesize, $private);
                return $uploadOk;
            } else {
                return "move uploaded failed file: ".$filename." target: ".$target_file ;
            }
        }
    }
    public function delFile($id){

    }
}