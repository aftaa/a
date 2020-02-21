<?php

use helper\Visitor;
use storage\FaviconParser;

require_once 'config/config.php';

if (!Visitor::isAftaa()) {
    exit(404);
}


$parser = new FaviconParser(file_get_contents("http://$_SERVER[SERVER_NAME]/index.php?aftaa=1"));
$parser->parse();
echo count($parser->icons);
$folderName = 'favicons';
@mkdir($folderName);
@chmod($folderName, 0777);


foreach ($parser->icons as $alt => $src) {
    $alt = str_replace(' ', '_', $alt);
    $ext = pathinfo($src, PATHINFO_EXTENSION);
    $newName = "$folderName/$alt.$ext";

    if (file_exists($newName) && filesize($newName) > 0) {
        continue;
    }

    $iconContent = file_get_contents($src);
    file_put_contents($newName, $iconContent);
    unset($iconContent);

    chmod($newName, 0777);
}
