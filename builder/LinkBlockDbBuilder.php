<?php


namespace builder;


use entity\LinkBlock;
use stdClass;
use strategy\LinkPrivateStrategy;

class LinkBlockDbBuilder implements LinkBlockBuilderInterface
{
    public function __construct(LinkPrivateStrategy $linkPrivateStrategy)
    {
    }

    public function build(stdClass $data): LinkBlock
    {

    }

}