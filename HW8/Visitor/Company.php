<?php

namespace src\Visitor;

class Company implements Entity
{
    /**
     * @var string
     */
    private $companyName;

    /**
     * @var array
     */
    private $employees;

    /**
     * @param array<Employee> $employees
     * @param string $companyName
     */
    public function __construct(array $employees, string $companyName)
    {
        $this->employees = $employees;
        $this->companyName = $companyName;
    }

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @return array
     */
    public function getEmployees(): array
    {
        return $this->employees;
    }

    /**
     * @param VisitorInterface $visitor
     */
    public function accept(VisitorInterface $visitor)
    {
        $visitor->visitCompany($this);
    }
}
