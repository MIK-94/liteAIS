<?php
require_once("include/con.php");
include("include/vals_of_table.php");

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
$id = $_POST['id'];


$sql = "DELETE FROM ".$table." WHERE ".$table.".".$filde_name[0]."='$id'";
   $result = $con->query($sql); 
   if($result == True) { echo "Данные удалены";}
  else {echo "Ошибка при удалении";} 

}

?>