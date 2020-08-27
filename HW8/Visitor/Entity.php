<?php

namespace src\Visitor;

interface Entity
{
    /**
     * @param VisitorInterface $visitor
     * @return mixed
     */
    public function accept(VisitorInterface $visitor);
}
