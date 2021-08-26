<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use DB; 


class DashboardController extends Controller
{
    public function index(Request $request)
    {
         return view('admin.dashboard.index');
    }
}