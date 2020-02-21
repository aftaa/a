<?php
exit(0);

/** @var $links LinkBlock[] */

use builder\LinkBlockJsonBuilder;
use entity\LinkBlock;
use storage\LinkBlockJsonStorage;
use strategy\LinkPrivateStrategy;

require_once 'config/config.php';

$jsonStorage = new LinkBlockJsonStorage('data');
$links = $jsonStorage->getAll(new LinkBlockJsonBuilder(new LinkPrivateStrategy));

try {
    $dbConfig = include('config/db_pdo.php');
    $dbh = new PDO($dbConfig['dsn'], $dbConfig['user'], $dbConfig['password']);
    $dbh->exec('TRUNCATE TABLE link');
    $dbh->exec('TRUNCATE TABLE link_block');

    foreach ($links as $linkBlock) {
        $blockName = $linkBlock->getName();
        $dbh->query("INSERT INTO link_block SET name='$blockName'");
        $blockId = $dbh->lastInsertId();
        $sth = $dbh->prepare('INSERT INTO link SET link_block_id=?, name=?, href=?, private=?, icon=?');
        $sth->bindValue(1, $blockId);
        foreach ($linkBlock->getLinks() as $link) {
            $sth->bindValue(2, $link->getName());
            $sth->bindValue(3, $link->getHref());
            $sth->bindValue(4, $link->isPrivate(), PDO::PARAM_INT);
            $sth->bindValue(5, $link->getIcon());
            $sth->execute();
        }
    }


} catch (PDOException $e) {
    echo "Bad database config: {$e->getMessage()}";
    exit(0);
}

