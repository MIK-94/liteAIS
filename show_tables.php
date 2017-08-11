<?php

require_once("include/con.php");

echo "<label for='select_table'>Выбор таблиц: </label><br>";
echo "<select id='select_table' class='btn btn-default'>";
$id=0;
$res = $con->query("SHOW TABLES FROM id2516673_torg");
while ($row=$res->fetch_assoc()) {
	echo "<option value='".$row["Tables_in_id2516673_torg"]."'>".$row["Tables_in_id2516673_torg"]."</option>";
	}
echo "</select>  </div> <button type='button' class='btn btn-default' onclick='table_change()'>Принять</button>";
?>