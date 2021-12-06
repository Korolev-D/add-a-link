<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/handler/functions.php";
$page = $_POST['data'];

$posts= get_post($page);
debug($posts);

$content_str = '';
foreach ($posts as $post) {
    $content_str .= "<li><a href=".$post["post_url"].">".$post["post_title"]."</a></li>";
}

echo $content_str;

