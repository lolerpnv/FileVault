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
$conn = new PDO("mysql:host=localhost;dbname=tpap","tpap", "CnSs.964");

//echo "Connected successfully";
return $conn;
