<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/handler/functions.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/parser/Post.php";
session_start();

$description = $_REQUEST["description"];
$url = $_REQUEST["url"];

//$description = "jQuery Promise. Как заставить промисы работать на себя";
//$url = 'https://webdevkin.ru/posts/frontend/jquery-promise';


$js = '#JS JavaScript jQuery js';
$php = "#php php";

$desc = explode(' ', mb_strtolower($description));
$types_of_posts = array(
    "js" => explode(' ', mb_strtolower($js)),
    "php" => explode(' ', mb_strtolower($php)),
);


function post_type($types_of_posts, $desc) {
    foreach ($types_of_posts as $type_post => $words_post) {
        foreach ($words_post as $word_post) {
            if (in_array($word_post, $desc)) {
                return $type_post;
            }
        }
    }
};

$post_type = post_type($types_of_posts, $desc);
$post = new Post($url, $description);

$pdo = db_connect();
$sth = $pdo->prepare("
    INSERT INTO `posts_info` SET
    `post_created` = :post_created,
    `post_type` = :post_type,
    `post_image` = :post_image,
    `post_title` = :post_title,
    `post_description` = :post_description,
    `post_url` = :post_url
");
$sth->execute(array(
    'post_created' => date('Y-m-d H:i:s'),
    'post_type' => $post_type,
    'post_image' => NULL,
    'post_title' => $post->getTitle(),
    'post_description' => $post->getDescription(),
    'post_url' => $url
));

set_flash_message('post_add', 'Пост добавлен');
redirect_to("/");

