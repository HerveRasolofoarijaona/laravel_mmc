<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class CompanyService extends BaseService
{
	public function __construct(Company $companyModel)
	{
		$this->model = $companyModel;
	}

	public function create(array $input)
	{
		if (isset($input['logo']) and $input['logo'] instanceof UploadedFile) {
			$input['logo'] = $input['logo']->storeAs(
				'logos',
				$this->getUniqueFileName($input['logo'])
			);
		}

		return parent::create($input);
	}

	public function update($id, array $input)
	{
		$company = $this->find($id);

		if (isset($input['logo']) and $input['logo'] instanceof UploadedFile) {
			$input['logo'] = $input['logo']->storeAs(
				'logos',
				$this->getUniqueFileName($input['logo'])
			);

			if (Storage::disk('public')->exists($company->logo)) {
				Storage::disk('public')->delete($company->logo);
			}
		}

		if (isset($input['remove_logo']) and $input['remove_logo'] == 'Y') {
			if (Storage::disk('public')->exists($company->logo)) {
				Storage::disk('public')->delete($company->logo);
			}

			$input['logo'] = '';
		}

		return parent::update($id, $input);
	}

	public function destroy($id)
	{
		$model = $this->find($id);

		if (Storage::disk('public')->exists($model->logo)) {
			Storage::disk('public')->delete($model->logo);
		}

		return parent::destroy($id);
	}

	private function getUniqueFileName(UploadedFile $file)
	{
		return $file->getClientOriginalName() . '_' . time() . '.' . $file->getClientOriginalExtension();
	}
}