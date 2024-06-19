<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    function index()
    {
        $pageTitle = 'Contac';

        return view('contact', ['pageTitle' => $pageTitle]);
    }
}
