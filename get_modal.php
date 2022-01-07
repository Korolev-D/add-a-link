<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/config/db.php";

$_REQUEST = json_decode(file_get_contents("php://input"), true);
$id = $_REQUEST['id'];

$pdo = db_connect();
$sth = $pdo->prepare("SELECT * FROM `posts_info` WHERE `ID` = :id");
$sth->execute(array('id' => $id));
$post_info = $sth->fetchAll(PDO::FETCH_ASSOC);
$content_str = '';
foreach ($post_info as $post) {
    $content_str = '
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">' . strip_tags($post["TITLE"]) . '</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">' . $post["DESCRIPTION"] . '</div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <a target="_blank" href="' . $post["URL"] . '" class="btn btn-primary">Открыть</a>
    </div>';
}
echo json_encode($content_str, JSON_UNESCAPED_UNICODE);
