<?php
error_reporting(0); 
require_once("include/con.php");
include("include/vals_of_table.php");


	#Определяем название полей таблицы (для дальнейшего вывода)
	$filde_name = array();
	$res=$con->query("SHOW COLUMNS FROM ".$table."");
	while ($row=$res->fetch_assoc()) {
		$filde_name[] = $row["Field"]; //Записать в массив для дальнейшего использования
	}

     
   echo "<table class=\"table\"> <tr>";
    #Создаем шапку таблицы из коментов к полям и 
    #определяем колличество столбцов, записываем в переменную $i
    $filde_coment = array();
	$res=$con->query("SELECT COLUMN_COMMENT FROM information_schema.COLUMNS WHERE TABLE_NAME = ".$table_l."");
	$i=0;
		while($row=$res->fetch_assoc()) {
			if ($i!=0)  { //исключаем первый элемент таблицы (первый всегда id_PRIMARY)
				$filde_coment[] = $row["COLUMN_COMMENT"];
				echo "<th>".$row["COLUMN_COMMENT"]."</th>";
			}
			$i++;
		}
	echo "</tr>";  //Не соответсвие столбцов в таблице

	#Выполням только по клику  радио-инпута
	if ( $_SERVER["REQUEST_METHOD"] == "POST" ) { 
	$id = $_POST['id'];	
		$result = $con->query("SELECT * FROM ".$table." WHERE ".$table.".".$filde_name[0]."='$id'");
		$row = $result->fetch_assoc();
		$name = 0;
		while ($name++ <= $i) {
			echo "+".$row[$filde_name[$name]];
		}	
}



	//Выводим таблицу
	$sql = "SELECT * FROM ".$table."";
	$result = $con->query($sql); 
   
      while ($row = $result->fetch_assoc()) {  
      $id = $row[$filde_name[0]]; 
      	$name = 0;
        	echo "<tr>";
      	while ($name++ <= $i) {
      		echo 		"<td>".$row[$filde_name[$name]]."</td>";
      	}
			echo		"<td> <input name='selection' onclick='edit_val_change(this)' type='radio' class='radio' value='".$id."'></td>
		 </tr>";	 	
} 

#Функция обновления инпутов при выборе поля для редактирования
echo "<script type='text/javascript'>
function edit_val_change(el) {
var id = el.value
	$.ajax({
		type: 'POST',
		url: 'get_data.php',
		data: {id: id},
		success: function(html){
	
			var j=0	
			while (j<=".$i.") {
			j++;
			var filde = '#filde'+j
				$(filde).val(html.split('+')[j])

				// Повторяем выражение
				//$('#filde1').val(a[1])
			}

		}
	});

}
</script>";

echo "<div class=\"edit_panel\">";  
echo "<h3 style='margin-left: 10px;'> Открыта таблица: ".$table." <span class='glyphicon glyphicon-chevron-right'></span> </h3>";
echo "</div>";

echo "</table>";
echo "<table class=\"table\"> <tr>";

$input_count = 0;
while ($input_count<$i - 1) {
	$input_count++;
	 echo "<td> <input type='text' style='margin-top: 20px;' placeholder='".$filde_coment[$input_count-1]."' class='filde".$input_count."' id='filde".$input_count."'></td>";
}
echo "</table>";




//$con->close_connection();
?>
