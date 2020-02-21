<?php

namespace entity;


use vo\LinkInterface;

class LinkBlock
{
    /** @var string */
    private $name = '';

    /** @var LinkInterface[] */
    protected $links = [];

    /**
     * LinkBlock constructor.
     *
     * @param string $name
     * @param LinkInterface[]|null $links
     */
    public function __construct(string $name, ?array $links)
    {
        $this->name = $name;
        if (null !== $links) {
            $this->links = $links;
        }
    }


    /**
     * @param LinkInterface $link
     */
    public function addLink(LinkInterface $link): void
    {
        $this->links[$link->getName()] = $link;
//        echo '<pre>'; print_r($this->links[$link->getName()]); echo '</pre>'; die;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Link[]
     */
    public function getLinks(): array
    {
        $links = $this->ksort();
        return $links;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return count($this->links);
    }

    /**
     * @return Link[]
     */
    private function ksort(): array
    {
        $links = $this->links;
        ksort($links);
        return $links;
    }
}
