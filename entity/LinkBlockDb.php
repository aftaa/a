<?php


namespace entity;


use vo\DbLink;

class LinkBlockDb extends LinkBlock
{
    /**
     * @return DbLink[]
     */
    public function getLinks(): array
    {
        return $this->links;
    }

}
