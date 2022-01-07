<?php

class Post
{
    public function __construct($url, $description)
    {
        $this->link = $url;
        $this->description = $description;
    }

    // получаем содержимое страницы
    public function getContent()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->link);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curlinfo = curl_exec($curl);
        $response = curl_getinfo($curl);
        curl_close($curl);
        return $curlinfo;
    }

    public function getlink()
    {
        return $this->link;
    }

    //получаем h1 со страницы, обрезаем до 50 символов
    public function getIntroTitle()
    {
        preg_match('/<h1[^>]*?>(.*?)<\/h1>/si', self::getContent(), $matches);
        $res =  mb_substr($matches[1], 0, 50, 'UTF-8');
        return strip_tags($res);
    }

    //получаем h1 со страницы полный
    public function getTitle()
    {
        preg_match('/<h1[^>]*?>(.*?)<\/h1>/si', self::getContent(), $matches);
        $res =  $matches[1];
        return strip_tags($res);
    }

    //получаем интротекст, обрезаем до 200 символов
    public function getIntroText()
    {
        // если строка начинатеся с #
        if (strpos($this->description, '#') === 0) {
            $desc = strstr($this->description, ' ');
            $desc = substr($desc, 1);
        } else $desc = $this->description;

        // если строка содержит pre то удаляем содержимое pre из строки
        preg_match('/<pre[^>]*?>(.*?)<\/pre>/si', $desc, $matches);
        if ($matches[1]) {
            $res =  str_replace($matches[1], '', $desc);
            return strip_tags($res);
        }
        $desc = strip_tags($desc);
        return mb_substr($desc, 0, 200, 'UTF-8');
    }

    //получаем полное описание
    public function getDescription()
    {
        // если строка начинатеся с #
        if (strpos($this->description, '#') === 0) {
            $desc = strstr($this->description, ' ');
            $desc = substr($desc, 1);
        } else $desc = $this->description;
        return $desc;
    }
}
