<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/handler/functions.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/parser/Post.php";
session_start();
?>
<!doctype html>
<html lang=ru>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Справочник</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- пакет jQuery и Bootstrap (включает Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/script.js"></script>
</head>
<body>
<div class="container">
    <div class="row mt-2">
        <form action="/handler/add_post_in_table.php">
            <input type="text" name="description" placeholder="Описание" autocomplete="off">
            <input type="text" name="url" placeholder="Ссылка" autocomplete="off">
            <button>ADD</button>
        </form>
        <p style="color: tomato"><? if ($_SESSION["post_add"]) echo display_flash_message("post_add"); ?></p>
    </div>
    <div class="row mt-2">
        <div class="col-12 col-sm-6 col-md-2 menu-item" data-page="JS">
            <a href="#">JS/Jquery</a>
        </div>
        <div class="col-12 col-sm-6 col-md-2 menu-item" data-page="PHP">
            <a href="#">PHP</a>
        </div>
        <div class="col-12 col-sm-6 col-md-2 menu-item" data-page="CURL">
            <a href="#">CURL</a>
        </div>
        <div class="col-12 col-sm-6 col-md-2 menu-item" data-page="BITRIX">
            <a href="#">BITRIX</a>
        </div>
        <div class="col-12 col-sm-6 col-md-2 menu-item" data-page="GIT">
            <a href="#">GIT</a>
        </div>
        <div class="col-12 col-sm-6 col-md-2 menu-item" data-page="#">
            <a href="#">SQL</a>
        </div>
    </div>
    <div class="row">
        <!--        <div class="col-12 col-sm-3 row">-->
        <!--            <div class="col-12 menu-sidebar">-->
        <!--                <a href="#">не заполненно</a>-->
        <!--            </div>-->
        <!--            <div class="col-12 menu-sidebar">-->
        <!--                <a href="#">не заполненно</a>-->
        <!--            </div>-->
        <!--            <div class="col-12 menu-sidebar">-->
        <!--                <a href="#">не заполненно</a>-->
        <!--            </div>-->
        <!--            <div class="col-12 menu-sidebar">-->
        <!--                <a href="#">не заполненно</a>-->
        <!--            </div>-->
        <!--        </div>-->
        <div class="col-12 row content">
<!--            --><?//
//            $JS = get_post();
//            foreach ($JS as $item) {
//                $item = new Post($item["link"], $item["title"]);
//                ?>
<!--                <div class="col-12 col-sm-4" style="padding: 5px;">-->
<!--                    <a href="--><?//= $item->getlink() ?><!--" target="blanlk">-->
<!---->
<!--                        <div class="post">-->
<!--                            <div class="post-inner">-->
<!--                                <div class="post-image">-->
<!--                                     <img src="" alt="идут работы ..."> -->
<!--                                </div>-->
<!--                                <div class="post-header">-->
<!--                                    <div class="post-type">-->
<!--                                        <img src="https://www.softvelopers.com/wp-content/uploads/2017/09/tech-js.png"-->
<!--                                             alt="JS" width="50" height="50">-->
<!--                                        <img src="https://f.ua/statik/images/products/150/bitrix/bitrix_b24_1116_694189185225.jpg"-->
<!--                                             alt="JS" width="50" height="50">-->
<!--                                    </div>-->
<!--                                    <div class="post-title">--><?//= $item->getTitle() ?><!--</div>-->
<!--                                </div>-->
<!--                                <div class="post-description">--><?//= $item->getDescription() ?><!--</div>-->
<!--                                <div class="post-footer">-->
<!--                                    <div class="post-url">Открыть</div>-->
<!--                                    <div class="post-date">20.20.20</div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </a>-->
<!--                </div>-->
<!--                --><?//
//            }
//            ?>









                        <?
                        $posts = get_posts_info();
                        foreach ($posts as $post) {
                            ?>
                            <div class="col-12 col-sm-4" style="padding: 5px;">
                                <a href="<?= $post["post_url"] ?>" target="blanlk">

                                    <div class="post">
                                        <div class="post-inner">
<!--                                            <div class="post-image">-->
<!--                                                 <img src="" alt="идут работы ...">-->
<!--                                            </div>-->
                                            <div class="post-header">
                                                <div class="post-type">
                                                    <?php
                                                    switch (mb_strtolower($post['post_type'])) {
                                                        case 'js':
                                                            echo "<img src=\"https://www.softvelopers.com/wp-content/uploads/2017/09/tech-js.png\"
                                                         alt=\"JS\" width=\"50\" height=\"50\">";
                                                            break;
                                                        case "php":
                                                            echo "<img src=\"/image/icon_php.png\" alt=\"JS\" width=\"50\" height=\"50\">";
                                                            break;
                                                    }
                                                    ?>

                                                </div>
                                                <div class="post-title"><?= $post['post_title'] ?></div>
                                            </div>
                                            <div class="post-description"><?= $post['post_description'] ?></div>
                                            <div class="post-footer">
                                                <div class="post-url">Открыть</div>
                                                <div class="post-date"><?= $post['post_created'] ?></div>
                                            </div>
                                        </div>
                                    </div>

                                </a>
                            </div>
                            <?
                        }
                        ?>
        </div>
    </div>
</div>
</body>
</html>