<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubCategoryResource;
use App\Models\Subkategory;
use Illuminate\Http\Request;

class SubCategoryCoontroller extends Controller
{
    public function index()
    {
        $subkategory   = Subkategory::all();

        return new SubCategoryResource(true, 'List data Sub Kategori', $subkategory);
    }
}
