<?php

namespace storage;

use builder\LinkBlockBuilderInterface;
use Exception;

class LinkBlockJsonStorage implements LinkBlockStorageInterface
{
    /** @var string */
    private $jsonDataFilesFolder = '';

    /**
     * LinkBlockJsonStorage constructor.
     *
     * @param string $jsonDataFilesFolder
     *
     * @throws Exception
     */
    public function __construct(string $jsonDataFilesFolder)
    {
        if (!is_dir($jsonDataFilesFolder)) {
            throw new Exception("Folder $jsonDataFilesFolder isn't exists");
        }

        $this->jsonDataFilesFolder = $jsonDataFilesFolder;
    }

    /**
     * @param LinkBlockBuilderInterface $builder
     * @return array
     */
    public function getAll(LinkBlockBuilderInterface $builder): array
    {
        $linkBlocks = [];
        $files = glob("$this->jsonDataFilesFolder/*.json");
        foreach ($files as $file) {
            $jsonData = file_get_contents($file);
            $jsonData = json_decode($jsonData);
            if (is_array($jsonData)) {
                foreach ($jsonData as $jsonBlockData) {
                    $linkBlocks[$jsonBlockData->name] = $builder->build($jsonBlockData);
                }
            } else {
                $linkBlocks[$jsonData->name] = $builder->build($jsonData);
            }
        }

        return $linkBlocks;
    }
}
