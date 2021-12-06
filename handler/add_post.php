<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/handler/functions.php";
session_start();

$title = $_REQUEST["title"];
$link = $_REQUEST["link"];

add_post($title, $link);
redirect_to("/");
