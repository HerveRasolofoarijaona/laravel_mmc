<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use App\Services\CompanyService;

class CompanyController extends Controller
{
	/**
	 * @var CompanyService
	 */
	private $companyService;

	public function __construct(CompanyService $companyService)
	{
		$this->companyService = $companyService;
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company.list', [
        	'companies' => $this->companyService->paginate()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('company.create');
    }

	/**
	 * @param StoreCompanyRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function store(StoreCompanyRequest $request)
    {
    	$this->companyService->create($request->all());

		return redirect()->route('companies.index')->with('success', __('company/messages.created'));
    }

	/**
	 * @param Company $company
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function edit(Company $company)
    {
		return view('company.edit', [
			'company' => $company
		]);
    }

	/**
	 * @param StoreCompanyRequest $request
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function update(StoreCompanyRequest $request, $id)
    {
    	$this->companyService->update($id, $request->all());

		return redirect()->route('companies.index')->with('success', __('company/messages.updated'));
    }

	/**
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function destroy($id)
    {
    	$this->companyService->destroy($id);

		return redirect()->route('companies.index')->with('success', __('company/messages.deleted'));
    }
}
