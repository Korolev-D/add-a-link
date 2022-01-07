<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/config/db.php";
$pdo = db_connect();
$sth = $pdo->prepare("SELECT * FROM `posts_info`");
$sth->execute();
$posts = $sth->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($posts, JSON_UNESCAPED_UNICODE);
