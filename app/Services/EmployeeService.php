<?php

namespace App\Services;

use App\Models\Employee;

class EmployeeService extends BaseService
{
	public function __construct(Employee $employeeModel)
	{
		$this->model = $employeeModel;
	}
}