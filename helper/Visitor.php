<?php

namespace helper;


/**
 * Class Visitor
 *
 * @package helper
 */
class Visitor
{
    const GET_KEY = 'aftaa';
    const MY_IPS = [
        '127.0.0.1',
        '192.168.1.2',
        '128.0.142.30',
        '213.87.130.45',
    ];

    /**
     * @return bool
     */
    public static function isAftaa()
    {
        $isAftaa = !empty($_REQUEST[self::GET_KEY]);
        $isAftaa = $isAftaa && self::checkIPs();
        if ('127.0.0.1' == $_SERVER['REMOTE_ADDR']) {
            $isAftaa = true;
        }
        return $isAftaa;
    }

    /**
     * @return bool
     */
    private static function checkIPs(): bool
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        return in_array($ip, self::MY_IPS);
    }
}
