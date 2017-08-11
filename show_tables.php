<?php

require_once("include/con.php");

echo "<label for='select_table'>Выбор таблиц: </label><br>";
echo "<select id='select_table' class='btn btn-default'>";
$id=0;
$res = $con->query("SHOW TABLES FROM torg");
while ($row=$res->fetch_assoc()) {
	#ОТредактировать наименование БД в Tables_in_torg
	echo "<option value='".$row["Tables_in_torg"]."'>".$row["Tables_in_torg"]."</option>";
	}
echo "</select>  </div> <button type='button' class='btn btn-default' onclick='table_change()'>Принять</button>";
?>
