<?php

namespace vo;


class Favicon extends Icon
{
    const FAVICON = 'favicon.ico';

    /**
     * Favicon constructor.
     *
     * @param string $href
     */
    public function __construct(string $href)
    {
        $href = $this->modifyHref($href);
        parent::__construct($href);
    }

    /**
     * @param string $href
     *
     * @return string
     */
    private function modifyHref(string $href): string
    {
        if (preg_match('{vg.aftaa.ru.ico}')) {
            return 'vg.aftaa.ru.ico';
        }

        $components = parse_url($href);
        $href = implode('', [
            $components['scheme'],
            '://',
            $components['host'],
            '/',
            self::FAVICON,
        ]);
        return $href;
    }
}
