<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterNoticeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('auth.registration-notice');
    }
}
