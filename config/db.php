<?php
function db_connect()
{
    $host = 'localhost';
    $db = 'example2_root';
    $user = 'example2_root';
    $pass = 'T9kSQeZZGu';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    return $pdo = new PDO($dsn, $user, $pass, $opt);
}