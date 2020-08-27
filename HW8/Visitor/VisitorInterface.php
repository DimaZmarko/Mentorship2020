<?php

namespace src\Visitor;

interface VisitorInterface
{
    /**
     * @param Company $company
     * @return mixed
     */
    public function visitCompany(Company $company);
}
