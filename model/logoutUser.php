<?php
/**
 * Created by PhpStorm.
 * User: Toni
 * Date: 20.7.2016.
 * Time: 15:29
 */
session_start();
session_unset();
session_destroy();
$output = '<html><meta http-equiv="refresh" content="0;url='.URL.'index.php"/></html>';
echo $output;