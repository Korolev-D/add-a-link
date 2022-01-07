<?php
// проверка на принадлежность к категории
function getTypePost($str)
{
    if (empty($str)) return false;
    $str = explode(' ', $str);
    $types = array(
        "js" => array("#js", "javascript", "jquery"),
        "php" => array("#php", "php"),
        "bitrix" => array("#bitrix", "bitrix"),
        "general" => array("#general", "#g"),
        "sberbank" => array("#sberbank", "sberbank"),
        "bitrix24" => array("#bitrix24", "#b24", "bitrix 24")
    );
    foreach ($types as $key => $type) {
        $result = array_intersect($str, $type);
        if ($result) return $key;
    }
    return false;
}


function debug($val)
{
    echo '<pre>';
    print_r($val);
    echo '<pre>';
    die();
}