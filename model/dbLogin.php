<?php
/**
 * Created by PhpStorm.
 * User: Toni
 * Date: 12.7.2016.
 * Time: 17:08
 * 
 * Returns connection to database
 */

// Create connection
$conn = new mysqli("localhost","tpap", "CnSs.964","tpap");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
return $conn;
