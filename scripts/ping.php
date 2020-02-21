<?php

set_time_limit(5);

$pingResponse = shell_exec('ping -c 1 admin.vseti-goroda.aftaa.ru');
mail('after@ya.ru', 'kubaping', $pingResponse);

exit(0);
