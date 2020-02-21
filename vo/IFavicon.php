<?php


namespace vo;


interface IFavicon
{
    /**
     * @return string
     */
    public function getHref(): string;

    /**
     * @return string
     */
    public function __toString(): string;
}