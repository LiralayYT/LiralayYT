<?php

$server = "localhost";
$login = "root";
$pass="";
$name_db="lead_form";

$induction = mysqli_connect($server,$login,$pass,$name_db);
mysqli_set_charset($induction,'utf8mb4');
if ($induction==false)
{
    echo "Ошибка подключения";
}
else {//echo "We did it!";

// echo "Соединение с MySQL установлено!" .PHP_EOL;
//echo "Информация о сервере: " .mysqli_get_host_info($induction) .PHP_EOL;
}

?>

