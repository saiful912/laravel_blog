<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    public function index()
    {
        return view('backend.page.category.index');
    }

    public function create()
    {
        return view('backend.page.category.create');
    }
}
