<?php

namespace src\Visitor;

class ReportsVisitor implements VisitorInterface
{
    /**
     * @var int
     */
    private $totalSalary = 0;

    /**
     * @var int
     */
    private $totalNumberOfEmployees = 0;

    /**
     * @var array
     */
    private $numberOfEmployeePerDepartment = array();

    /**
     * @return int
     */
    public function totalSalaryReport(): int
    {
        return $this->totalSalary;
    }

    /**
     * @return int
     */
    public function totalNumberOfEmployeesReport(): int
    {
        return $this->totalNumberOfEmployees;
    }

    /**
     * @return int
     */
    public function averageSalaryReport(): int
    {
        return $this->totalSalary / $this->totalNumberOfEmployees;
    }

    /**
     * @return array
     */
    public function numberOfEmployeePerDepartmentReport(): array
    {
        return $this->numberOfEmployeePerDepartment;
    }

    /**
     * @param Company $company
     */
    public function visitCompany(Company $company): void
    {
        $companyEmployees = $company->getEmployees();

        foreach ($companyEmployees as $employee) {
            /**@var Employee $employee */
            $this->totalSalary += $employee->getSalary();
            $this->totalNumberOfEmployees++;

            if (!array_key_exists($employee->getDepartment(), $this->numberOfEmployeePerDepartment)) {
                $this->numberOfEmployeePerDepartment[$employee->getDepartment()] = 0;
            }

            $this->numberOfEmployeePerDepartment[$employee->getDepartment()]++;
        }
    }
}
