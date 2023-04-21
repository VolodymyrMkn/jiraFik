<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return (auth()->user()->hasRole('admin')) ? view('admin.index') : to_route('homepage');
    }
}
