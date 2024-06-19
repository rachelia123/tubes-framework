<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Kategory;
use Illuminate\Http\Request;

class CategoryCoontroller extends Controller
{
    public function index()
    {
        $kategory   = Kategory::all();

        return new CategoryResource(true, 'List data Kategory', $kategory);
    }
}
