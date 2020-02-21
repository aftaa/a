<?php

namespace vo;


use strategy\LinkPrivateStrategy;

/**
 * Class Icon
 *
 * @package vo
 */
class Icon implements IFavicon
{
    /** @var string */
    private $href = '';

    /**
     * Icon constructor.
     *
     * @param string $href
     */
    public function __construct(string $href)
    {
        $this->href = $href;
    }

    /**
     * @return string
     */
    public function getHref(): string
    {
        return $this->href;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getHref();
    }
}
