# liteAIS
Demo: https://litebase.000webhostapp.com/ <br>
Для установки необходимо: <br> 
1) отредактировать файл констант (база, пользователь, пароль) в /include/con.php ; <br>
2) отредактировать index.php (задать хост для ajax запросов, и задать начальную таблицу) ;<br>
3) отредактировать show_tables.php (название БД).
<hr>
<i>Чтобы задать шапку таблицы нужно использовать коментарии в таблицах.</i><br>
Код еще не адаптирован к индексным ключам, Ключи Primary записываются первыми в масcиве и игнарируются при выводе.<br>
<hr>
<b>Файлы и описание: </b>
<i><ul>  
<li>index.php (главная страница)</li>
<li>get_data.php (формирует таблицу) </li>
<li>show_tables.php (определяет названия таблиц созданных в БД и выводит их для выбора)</li>
<li>insert.php (Запрос на запись нового поля)</li>
<li>update.php (Запрос на изменение поля)</li>
<li>delet.php (Запрос на удаления поля)</li>
</ul></i> 
/include:<br>
<i><ul>
<li>table_cahge.php (хранение переменной выбранной пользователем таблицы) </li>
<li>vals_of_table.php (определение полей в выбранной таблице)</li>
<li>con.php (константы,и соединение с базой) </li> 
  </ul></i> 
