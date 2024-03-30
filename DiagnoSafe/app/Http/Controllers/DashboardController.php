<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests; 
use App\Http\Controllers\Controller;
use App\Models\Testrec;

class DashboardController extends Controller
{
    public function index(){
        $tests = Testrec::where('user_id',\Auth::user()->id)->latest()->limit(3)->get();
        return view('dashboard',['tests'=> $tests]);
    }
}
