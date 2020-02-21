<?php

namespace strategy;


use helper\Visitor;

/**
 * Class LinkPrivateStrategy
 *
 * @package strategy
 */
class LinkPrivateStrategy
{
    /**
     * @param bool $private
     *
     * @return bool
     */
    public function isPrivate(bool $private)
    {
        if (Visitor::isAftaa()) {
            return false;
        }
        return $private;
    }
}