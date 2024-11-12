<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $nama = Auth::user()->name;
        return view('home', compact('nama')); // View untuk User
    }


}
