<?php

namespace App\Observers;

use App\Mail\CompanyCreated;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;

class CompanyObserver
{
    /**
     * Handle the company "created" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function created(Company $company)
    {
        Mail::to('danbkag@gmail.com')
			->send(new CompanyCreated($company));
    }
}
