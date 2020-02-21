<?php


namespace storage;


use builder\LinkBlockBuilderInterface;

interface LinkBlockStorageInterface
{
    /**
     * @param LinkBlockBuilderInterface $builder
     * @return array
     */
    public function getAll(LinkBlockBuilderInterface $builder): array;
}