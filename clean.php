<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
set_time_limit(0);

chdir('../../../');
$tmpFolders = ['tmp', 'tmp1'];


foreach ($tmpFolders as $tmpFolder) {
    echo $tmpFolder, ': ', file_exists($tmpFolder) && is_dir($tmpFolder);
    $glob = glob("$tmpFolder/*");
    foreach ($glob as $filename) {
        unlink($filename);
		echo "$filename\n";
    }
}
