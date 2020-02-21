<?php


namespace vo;


interface LinkInterface
{
    public function getName(): string;
    public function getHref(): string;
}