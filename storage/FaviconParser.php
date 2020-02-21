<?php


namespace storage;


class FaviconParser
{
    const PATTERN  = '/<img alt="(.+?)" src="(.+?)"/';

    /** @var string Page's HTML */
    public $html = '';

    /** @var array [alt => src] */
    public $icons = [];

    /**
     * FaviconParser constructor.
     * @param string $html
     */
    public function __construct($html)
    {
        $this->html = $html;
    }

    /**
     * Parse HTML into $icons array.
     */
    public function parse()
    {
        if (preg_match_all(self::PATTERN, $this->html, $matches)) {
            foreach ($matches[1] as $i => $alt) {
                $this->icons[$alt] = $matches[2][$i];
            }
        }
    }
}