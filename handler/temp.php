<?php
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
    'post_type' => 'js',
    'post_image' => NULL,
    'post_title' => $description,
    'post_description' => 'jQuery Promise. Как заставить промисы работать на себя',
    'post_url' => $url
));

set_flash_message('post_add', 'Пост добавлен');
redirect_to("/");