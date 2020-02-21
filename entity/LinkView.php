<?php


namespace entity;


class LinkView
{
    /** @var int */
    private $id;
    /** @var int */
    private $link_id;
    /** @var \DateTime */
    private $date_time;
    /** @var int */
    private $ip4;

    /**
     * LinkView constructor.
     * @param int $id
     * @param int $link_id
     * @param \DateTime $date_time
     * @param int $ip4
     */
    public function __construct(int $id, int $link_id, \DateTime $date_time, int $ip4)
    {
        $this->id = $id;
        $this->link_id = $link_id;
        $this->date_time = $date_time;
        $this->ip4 = $ip4;
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

    /**
     * @return int
     */
    public function getLinkId(): int
    {
        return $this->link_id;
    }

    /**
     * @param int $link_id
     */
    public function setLinkId(int $link_id): void
    {
        $this->link_id = $link_id;
    }

    /**
     * @return \DateTime
     */
    public function getDateTime(): \DateTime
    {
        return $this->date_time;
    }

    /**
     * @param \DateTime $date_time
     */
    public function setDateTime(\DateTime $date_time): void
    {
        $this->date_time = $date_time;
    }

    /**
     * @return int
     */
    public function getIp4(): int
    {
        return $this->ip4;
    }

    /**
     * @param int $ip4
     */
    public function setIp4(int $ip4): void
    {
        $this->ip4 = $ip4;
    }


}