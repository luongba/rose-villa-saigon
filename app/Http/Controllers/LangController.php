<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

class LangController extends Controller
{
    public function setLanguage($language)
	{
	    Session::put('language', $language);

	    return $language;
	}
}
