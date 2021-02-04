<?php
require ("banco.php");
session_start();
$banco = new Banco_bateria();
$link = $banco -> conecta_mysql();

$data = $_GET["data"];

str_replace("/","-",$data);

$date = date_create($data);
$data2 = date_format(date_add($date,date_interval_create_from_date_string("-6 days")),"Y-m-d");
$date1 = date_create($data);
$data3 = date_format(date_add($date1,date_interval_create_from_date_string("1 days")),"Y-m-d");

$_SESSION['data1'] = $data3;

$_SESSION['data2'] = $data2;

header("location:layoutReserva.php?erro=222");

