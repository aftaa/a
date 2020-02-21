<?php

namespace builder;

use stdClass;
use entity\LinkBlock;
use strategy\LinkPrivateStrategy;

interface LinkBlockBuilderInterface
{
    /**
     * ILinkBlockStorage constructor.
     * @param LinkPrivateStrategy $linkPrivateStrategy
     */
    public function __construct(LinkPrivateStrategy $linkPrivateStrategy);

    /**
     * @param stdClass $data
     * @return LinkBlock
     */
    public function build(stdClass $data): LinkBlock;
}
