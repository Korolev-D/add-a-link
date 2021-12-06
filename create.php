<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/handler/functions.php";
$pdo = db_connect();

$create_table =
    'CREATE TABLE posts_info( 
        post_id   INT AUTO_INCREMENT,
        post_created DATETIME,/*2021-12-05 14:43:54*/
        post_type VARCHAR(50), 
        post_image  VARCHAR(150), 
        post_title VARCHAR(100), 
        post_description   VARCHAR(300),
        PRIMARY KEY(post_id )
    )';

//$delete_table = "DROP TABLE authors";

try {
// execute SQL statements

    $pdo->exec($create_table );
    echo "Таблица создана";


} catch (PDOException $e) {
    echo $e->getMessage();//Remove or change message in production code
}
