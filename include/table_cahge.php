<?php 
session_start(); 
if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    $new_table = $_POST['table_name'];  
    $_SESSION['table'] = $new_table;
  echo " Таблица ".$new_table." выбрана";
} 
?>
