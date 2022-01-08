<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/layout_header.php";
?>

<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

<body>
<div class="container-fluid">
    <div class="row" id="app">
        <div class="aside">
            <form action="">
                <input type="text" placeholder="Поиск">
            </form>
            <ul>
                <li @click="sortingType" data-type="all" class="current"><a href="#">ВСЕ</a></li>
                <li @click="sortingType" data-type="bitrix"><a href="#">Bitrix</a></li>
                <li @click="sortingType" data-type="bitrix24"><a href="#">Bitrix 24</a></li>
                <li @click="sortingType" data-type="js"><a href="#">JS/jQuery</a></li>
                <li @click="sortingType" data-type="sql"><a href="#">SQL</a></li>
                <li @click="sortingType" data-type="php"><a href="#">PHP</a></li>
            </ul>
            <form class="mt-auto">
                <div class="text-center mb-2" id="message" style="color: aliceblue"></div>
                <input type="text" name="description" placeholder="Описание" autocomplete="off" required="">
                <input type="text" name="url" placeholder="Ссылка" autocomplete="off" required="">
                <button type="button" class="btn btn-info mt-1" @click="createPost">Добавить <i
                            class="fa fa-plus-circle"></i></button>
            </form>
        </div>
        <div class="row content">
            <form class="is-admin d-none" action="../../create_post.php">
                <input type="text" name="password" placeholder="Пароль">
                <button type="button" class="btn btn-info" @click="createPost">Добавить <i
                            class="fa fa-plus-circle"></i></button>
            </form>
            <div class="col-12 row m-0">
                <div class="col-6 sort"><a href="#">Сортировка</a></div>
                <div class="col-6 grid">
                    <i class="fa fa-th"></i>
                    <i class="fa fa-th-list"></i>
                </div>
            </div>
            <div class="col-12 row m-0 mt-4">
                <div class="col-12 col-md-6 col-lg-4 post-inner" v-for="post in postsCopy">
                    <div class="post" @click="openModal"data-toggle="modal" data-target="#exampleModal"
                         :data-id=post.ID >
                        <div class="post-header">
                            <img :src="`/image/icon/icon_${post.TYPE}.png`" width="40" height="40" alt="">
                            <div class="post-title">{{post.INTRO_TITLE}}</div>
                        </div>
                        <div class="post-body">{{post.INTRO_TEXT}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--модальное окно-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        </div>
    </div>
</div>
</body>

</html>
