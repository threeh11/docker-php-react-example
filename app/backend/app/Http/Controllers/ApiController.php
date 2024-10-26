<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Hello, this is the API endpoint!',
            'status' => 'success'
        ]);
    }
}
