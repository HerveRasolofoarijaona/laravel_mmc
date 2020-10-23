<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;

class LanguageController extends Controller
{
    public function set($locale)
	{
		if (in_array($locale, Config::get('app.locales'))) {
			session(['locale' => $locale]);
		}

		return back();
	}
}
