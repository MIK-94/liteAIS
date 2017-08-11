<?php 
session_start(); 
$table = strval($_SESSION['table']);
$table_l = "'".$table."'";
	#Определяем название полей таблицы (для дальнейшего вывода)
	$filde_name = array();
	$res=$con->query("show columns from $table");
	while ($row=$res->fetch_assoc()) {
		$filde_name[] = $row["Field"]; //Записать в массив
	}
	$count = count($filde_name)-1; //узнаем длину массива (без id)
?>
