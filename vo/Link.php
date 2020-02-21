<?php

namespace vo;


/**
 * Class Link
 *
 * @package vo
 */
class Link implements LinkInterface
{
    /** @var string */
    private $name = '';

    /** @var string */
    private $href = '';

    /** @var bool */
    private $private = false;

    /** @var Icon */
    private $icon;

    /**
     * Link constructor.
     * @param string $name
     * @param string $href
     * @param bool|null $private
     * @param IFavicon $icon
     */
    public function __construct(string $name, string $href, ?bool $private, IFavicon $icon)
    {
        $this->name = $name;
        $this->href = $href;
        $this->private = $private ?? $private;
        $this->icon = $icon ?? $icon;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getHref(): string
    {
        return $this->href;
    }

    /**
     * @return bool
     */
    public function isPrivate(): bool
    {
        return $this->private;
    }

    /**
     * @return IFavicon|null
     */
    public function getIcon(): ?IFavicon
    {
        return $this->icon;
    }
}
