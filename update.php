<?php
error_reporting(0); 
require_once("include/con.php");
include("include/vals_of_table.php");

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
$id = $_POST['id'];
$data_got = $_POST['data_send'];   //получаем данные
$fildes = explode('+', $data_got); //формируем массив из полученных данных

$i=0;
while ($i<=$count-1) { //(без id)
	$str_sql = $filde_name[$count-$i]." = '".$fildes[$count-$i]."', ".$str_sql;
$i++;
}

$sql_update = mb_substr($str_sql, 0, -2);

$sql = "UPDATE ".$table." SET ".$sql_update." WHERE ".$table.".".$filde_name[0]." = '$id'";
   $result = $con->query($sql); 
   if($result == True) { echo "Данные обновлены";}
  else {echo "Ошибка при обновлении";} 
}

?>