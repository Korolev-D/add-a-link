<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/config/db.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/config/functions.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/helper/Post.php";

$description = $_REQUEST["description"];
$url = $_REQUEST["url"];

// определяем тип поста
$type = getTypePost($description);
if (!$type) {
    echo json_encode('не удалось установить тип', JSON_UNESCAPED_UNICODE);
    exit;
}

$post = new Post($url, $description);
$pdo = db_connect();
$sth = $pdo->prepare("
    INSERT INTO `posts_info` SET
    `CREATED` = :post_created,
    `TYPE` = :post_type,
    `IMAGE` = :post_image,
    `TITLE` = :post_title,
    `INTRO_TITLE` = :post_intro_title,
    `INTRO_TEXT` = :post_intro_text,
    `DESCRIPTION` = :post_description,
    `URL` = :post_url
");
$sth->execute(
    array(
        'post_created' => date('Y-m-d H:i:s'),
        'post_type' => $type,
        'post_image' => NULL,
        'post_intro_title' => $post->getIntroTitle(),
        'post_title' => $post->getTitle(),
        'post_intro_text' => $post->getIntroText(),
        'post_description' => $post->getDescription(),
        'post_url' => $post->getlink()
    )
);
echo json_encode('пост добавлен!', JSON_UNESCAPED_UNICODE);
