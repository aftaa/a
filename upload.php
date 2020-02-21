<?php

$url = 'https://instrument.ru/myapp/dadata/by-inn/?debug=1&inn=';

set_time_limit(0);

while (file_exists("tmp/start.txt")) {	
	for ($id = 1000000000; $id <= 9999999999; $id++) {
		$f = file_get_contents($url . $id);
		file_put_contents("tmp/$id.txt", $f);
	}
}
