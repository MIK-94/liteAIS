<?php
error_reporting(0); 
require_once("include/con.php");
include("include/vals_of_table.php");

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
$data_got = $_POST['data_send'];   //получаем данные
$fildes = explode('+', $data_got); //формируем массив из полученных данных

$i=0;
while ($i<=$count-1) { //(без id)
	$str_names_fildes = $filde_name[$count-$i].", ".$str_names_fildes; 	
	$str_fildes = "'".$fildes[$count-$i]."', ".$str_fildes;
$i++;
}

$sql_names = mb_substr($str_names_fildes, 0, -2);
$sql_values = mb_substr($str_fildes, 0, -2);



#Запрос на запись
$sql = "INSERT INTO ".$table." (".$sql_names.") VALUES (".$sql_values.")";
   $result = $con->query($sql); 
   if($result == True) { echo "Данные записаны";}
  else {echo "Ошибка при записи данных";} 
}


?>