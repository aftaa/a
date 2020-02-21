<?php


namespace vo;


use helper\Visitor;

class DbLink extends Link
{
    /** @var int */
    public $id;

    /** @var bool */
    public $is_guest;

    /** @var int */
    public $views = 0;

    /**
     * DbLink constructor.
     * @param string $name
     * @param string $href
     * @param bool|null $private
     * @param IFavicon $icon
     * @param $id
     */
    public function __construct(string $name, string $href, ?bool $private, IFavicon $icon, $id)
    {
        parent::__construct($name, $href, $private, $icon);
        $this->id = $id;
        $this->is_guest = !Visitor::isAftaa();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

}
