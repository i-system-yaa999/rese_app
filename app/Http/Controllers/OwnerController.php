<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OwnerRequest;
use App\Models\Owner;

class OwnerController extends Controller
{
    public function create(Request $request)
    {
    }
    public function delete(Request $request)
    {
    }
    public function index(Request $request)
    {
        return view('owner/owner');
    }
}
