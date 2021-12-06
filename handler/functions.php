<?php
function db_connect()
{
    $host = 'localhost';
    $db = 'posts';
    $user = 'root';
    $pass = 'root';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    return $pdo = new PDO($dsn, $user, $pass, $opt);
}

function add_post($title, $link)
{
    $pdo = db_connect();

    $sth = $pdo->prepare("INSERT INTO `js` SET `title` = :title, `link` = :link");
    $sth->execute(array('title' => $title, 'link' => $link));

    set_flash_message('post_add', 'Пост добавлен');
}

function get_post($page)
{
    $pdo = db_connect();

//    $sth = $pdo->prepare("SELECT * FROM `posts_info`WHERE `post_type` = `js`");
    $sth = $pdo->prepare("SELECT * FROM `post_info` WHERE `post_id` = 6");
    $sth->execute();
    $array = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $array;
}
function get_posts_info()
{
    $pdo = db_connect();

    $sth = $pdo->prepare("SELECT * FROM `posts_info`ORDER BY `post_created` DESC");
    $sth->execute();
    $array = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $array;
}

function set_flash_message($key, $message)
{
    $_SESSION[$key] = $message;
}

function display_flash_message($key)
{
    if (isset($_SESSION[$key])) {
        echo $_SESSION[$key];
        unset ($_SESSION[$key]);
    }
}
function redirect_to($path)
{
    header("Location: " . $path);
    exit();
}

function debug($val){
    echo '<pre>';
    print_r($val);
    echo '<pre>';
    die();
}