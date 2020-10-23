<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
use App\Services\CompanyService;
use App\Services\EmployeeService;

class EmployeeController extends Controller
{
	/**
	 * @var EmployeeService
	 */
	private $employeeService;
	/**
	 * @var CompanyService
	 */
	private $companyService;

	public function __construct(EmployeeService $employeeService, CompanyService $companyService)
	{
		$this->employeeService = $employeeService;
		$this->companyService = $companyService;
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('employee.list', [
			'employees' => $this->employeeService->with('company')->paginate()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('employee.create', [
			'companies' => $this->companyService->all()
		]);
    }

	/**
	 * @param StoreEmployeeRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function store(StoreEmployeeRequest $request)
    {
    	$this->employeeService->create($request->all());

		return redirect()->route('employees.index')->with('success', __('employee/messages.created'));
    }

	/**
	 * @param Employee $employee
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function edit(Employee $employee)
    {
		return view('employee.edit', [
			'employee' => $employee,
			'companies' => $this->companyService->all()
		]);
    }

	/**
	 * @param StoreEmployeeRequest $request
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function update(StoreEmployeeRequest $request, $id)
    {
        $this->employeeService->update($id, $request->all());

		return redirect()->route('employees.index')->with('success', __('employee/messages.updated'));
    }

	/**
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function destroy($id)
    {
    	$this->employeeService->destroy($id);

		return redirect()->route('employees.index')->with('success', __('employee/messages.deleted'));
    }
}
