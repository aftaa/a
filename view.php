<?php

use entity\LinkView;

require_once 'config/config.php';
$dbConfig = include('config/db_pdo.php');
$dbh = new \PDO($dbConfig['dsn'], $dbConfig['user'], $dbConfig['password']);

try {
    $sth = $dbh->prepare("INSERT INTO link_view SET link_id=?,date_time=?,ip4=INET_ATON(?)");
    $sth->bindValue(1, $_REQUEST['linkId']);
    $sth->bindValue(2, date('Y-m-d H:i:s'));
    $sth->bindValue(3, $_SERVER['REMOTE_ADDR']);
    if (!$sth->execute()) {
        print_r($sth->errorInfo());
    }
} catch (Exception $e) {
    echo $e->getMessage();
}



