<?php


namespace vo;


class LoadedFavicon implements IFavicon
{

    const PATH = 'favicons/';

    /** @var string */
    private $name;
    /** @var string */
    private $src;

    /**
     * LoadedFavicon constructor.
     * @param string $name
     * @param string $src
     */
    public function __construct($name, $src)
    {
        $this->name = strip_tags($name);
        $this->src = $src;
    }

    /**
     * @return string
     */
    public function getHref(): string
    {
        $this->src = basename($this->src);
        $ext = pathinfo($this->src, PATHINFO_EXTENSION);
        $href = ['/'];
        $href[] = self::PATH;
        $this->name = str_replace(' ', '_', $this->name);
        $href[] = $this->name;
        $href[] = '.';
        $href[] = $ext;
        return implode('', $href);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getHref();
    }

}