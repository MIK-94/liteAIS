<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "pokemon");
define("DB_NAME", "torg");
$con = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die('can`t open database');	
?>
