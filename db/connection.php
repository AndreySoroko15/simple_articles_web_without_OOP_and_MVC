<?php

$config = parse_ini_file('config/config.ini');

$connectDB = mysqli_connect($config['host'], $config['login'], $config['pass'], $config['db']);

if ($connectDB === false) echo 'Ошибка при подключении БД';
