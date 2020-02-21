<?php

namespace builder;


use entity\LinkBlock;
use factory\IconFactory;
use stdClass;
use strategy\LinkPrivateStrategy;
use vo\Icon;
use vo\Link;
use vo\LoadedFavicon;

class LinkBlockJsonBuilder implements LinkBlockBuilderInterface
{
    /**
     * @var LinkPrivateStrategy
     */
    private $linkPrivateStrategy;

    /**
     * LinkBlockJsonBuilder constructor.
     *
     * @param LinkPrivateStrategy $linkPrivateStrategy
     */
    public function __construct(LinkPrivateStrategy $linkPrivateStrategy)
    {
        $this->linkPrivateStrategy = $linkPrivateStrategy;
    }

    /**
     * @param stdClass $data
     *
     * @return LinkBlock
     */
    public function build(stdClass $data): LinkBlock
    {
        $linkBlock = new LinkBlock($data->name, null);
        foreach ($data->links as $datum) {

            if (null !== $datum->icon) {
                $datum->icon = new Icon($datum->icon);
            }

            $icon = IconFactory::getIcon($datum->icon, $datum->href);

            $link = new Link(
                $datum->name,
                $datum->href,
                $this->linkPrivateStrategy->isPrivate($datum->private),
//                $icon
                new LoadedFavicon($datum->name, $icon->getHref())
            );

            if (!$link->isPrivate()) {
                $linkBlock->addLink($link);
            }
        }
        return $linkBlock;
    }
}
