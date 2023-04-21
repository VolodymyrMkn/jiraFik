<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public static function responseMessages($array, $status)
    {
        return response()->json($array, $status);
    }
}
