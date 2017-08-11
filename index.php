<?php
error_reporting(0);
session_start(); 
$_SESSION['table'] = 'tovar'; //Название для начальной таблицы

	require_once("include/con.php");
	include("include/vals_of_table.php");

echo "<!DOCTYPE html> 
<html>
<head>
<script src='//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' integrity='sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
        
	<title></title>
	<style type='text/css'>
.insert_input{
	margin-top: 3%;
	width: 60%;	
	border-radius: 30px;
	text-align: center;
}
.edit_panel{
	height: 60px;
	border-bottom: 3px solid black;
}
.panel_select_table{
float:right;
}
	</style>
</head>
<body>
<div class='panel panel-default'>
  <!-- Default panel contents -->
  <div class='panel-heading'>
	<img src='/img/logo.png' height='5%' width='5%' alt='logo'/> <font size='6'>Добро пожаловать в АИС Незнайка</font>
	<div id='selection_table' class='panel_select_table'> </div>
<script type='text/javascript'>
function table_change() {
var table_name = $('#select_table option:selected').val()
$.ajax({
		type: 'POST',
		url: host+'/include/table_cahge.php',
		data: {table_name: table_name},
		success: function(html) {
			alert(html)
			get_data()
		}
	})
}
</script>

 </div>

<!-- МЕСТО ДЛЯ  ФОРМИРОВАНИЯ ТАБЛИЦЫ -->
<div id='content_base'> </div>

<script type='text/javascript'>
var host = 'https://litebase.000webhostapp.com'; //ИЗМЕНИТЬ ЕСЛИ БУДЕШЬ ПЕРЕНОСИТЬ НА ДРУГОЙ ХОСТ

//запрос на добавление поля
function insert() {
		var data_send = ' ' 
		var j=0
		while (j<=".$count.") {
		j++;
			//var filde = 'filde'+j
			var inpute = 'input.filde'+j
			filde  = $( inpute ).val()
		data_send = data_send + '+' + filde	
}


$.ajax({
	type: 'POST',
	url: host+'/insert.php',
	data: {data_send: data_send},
	success: function (html) {
		alert(html)
		get_data()
		}		
	});  
}

//запрос на удаления поля по id
function delet() {
var id = $('input[name=selection]:checked').val()	

$.ajax({
	type: 'POST',
	url: host+'/delet.php',
	data: {id: id},
	success: function (html) {
		alert(html)
		get_data()
		}		
	});  

}

//запрос на редактирование поля
function update() {
var id = $('input[name=selection]:checked').val()
		var data_send = ' ' 
		var j=0
		while (j<=".$count.") {
		j++;
			//var filde = 'filde'+j
			var inpute = 'input.filde'+j
			filde  = $( inpute ).val()
		data_send = data_send + '+' + filde	
}	

$.ajax({
	type: 'POST',
	url: host+'/update.php',
	data: {id: id, data_send: data_send},
	success: function (html) {
		alert(html)
		get_data()
		}		
	});  
}

//маленькая отчистка полей
function clear_form() {
			var j=0	
			while (j<=".$count.") {
			j++;
			var filde_cl = '#filde'+j
				$(filde_cl).val('')
			}

}

////////////////////////////////
function get_data() {
$.ajax({
		type: 'GET',
		url: host+'/get_data.php',
      	success: function(html){
      	$('#content_base').html(html)
		}
	});
}

function selection_table() {
$.ajax({
		type: 'GET',
		url: host+'/show_tables.php',
      	success: function(html){
       	$('#selection_table').html(html)
		}
	});
}
//////////////////////////////////
$(document).ready(function(){
selection_table()	
get_data()
});

</script>
</div>
<button type='button' class='btn btn-success' onclick='insert()' style='margin-left: 15px;'>Добавить <span class='glyphicon glyphicon-plus'></span></button>
<button type='button' class='btn btn-danger'  onclick='delet()' style='margin-left: 15px;'>Удалить <span class='glyphicon glyphicon-minus'></span></button>
<button type='button' class='btn btn-default' onclick='update()' style='margin-left: 15px;'>Изменить <span class='glyphicon glyphicon-pencil'></span></button>
<button type='button' class='btn btn-default' onclick='clear_form()' style='margin-left: 15px;'>Отчистить <span class='glyphicon glyphicon-trash'></span></button>

</body>
</html>";
?> 
