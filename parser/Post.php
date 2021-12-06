<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/parser/HtmlWeb.php";

use simplehtmldom\HtmlWeb;

class Post
{

    public function __construct($url, $description)
    {
        $this->link = $url;
        $this->description = $description;
    }

    private function content()
    {
        $doc = new HtmlWeb();
        return $html = $doc->load($this->link);
    }

    public function getlink()
    {
        return $this->link;
    }

    public function getTitle()
    {
        $html = $this->content();
        $post_title = $html->find( "h1" );
        $post_title = $post_title[0];
        return mb_substr($post_title, 0, 80, 'UTF-8') . ' ...';
    }


    public function getDescription()
    {

        $html = $this->content();
        $post_description = $html->plaintext;

//        $post_description = strstr($post_description, 'jQuery Promise. Как заставить промисы работать на себя');
        $post_description = strstr($post_description, $this->description);
        $post_description = mb_substr($post_description, 0, 250, 'UTF-8') . ' ...';
        return $post_description;
    }

    public function getImage()
    {
        $html = $this->content();
        $post_image = $html->find('img');
        $post_image = $post_image[1]->src;
//        $parse_post_image = parse_link($this->link);
//
//
//        if (!strpos($post_image, $parse_post_image["scheme"]) & !strpos($post_image, $parse_post_image["host"])) {
//            $post_image = $parse_post_image["scheme"] . '://' . $parse_post_image["host"] . '/' . $post_image;
//        }
//        if (substr($post_image, -1) == '/') {
//            $post_image = substr_replace($post_image, “”, –1);
//        }

        return $post_image;
    }
}

//$url = 'https://only-to-top.ru/blog/programming/2019-09-17-otpravka-dannyh-fetch-api.html';
//$parse_link = parse_link($url);
//
//// get DOM from link or file
//$doc = new HtmlWeb();
//$html = $doc->load($url);
//
//$description = "Fetch API - это современный подход для создания асинхронных запросов. Рассмотрим, как отправить данные формы на сервер, используя ";
//
//$post_title = mb_substr($description, 0, 50, 'UTF-8') . ' ...';
//$post_description = $html->plaintext;
//$post_description = strstr($post_description, $description);
//$post_description = mb_substr($post_description, 0, 200, 'UTF-8') . ' ...';
//
//$post_image = $html->find('img');
//$post_image = $post_image[1]->src;
//$postt_image = parse_link($url);
//
//
//if (!strpos($post_image, $postt_image["scheme"]) & !strpos($post_image, $postt_image["host"])) {
//    $post_image = $postt_image["scheme"] . '://' . $postt_image["host"] . '/' . $post_image;
//}
//if (substr($post_image, -1) == '/') {
//    $post_image = substr_replace($post_image, “”, –1);
//}


