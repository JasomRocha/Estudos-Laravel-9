<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        return view('welcome');
    }
    public function contact()
    {
        return view('contact');
    }

    public function submitForm()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        dump(
            $request->all(),
            $request->only(['name', 'email']),
            $request->except(['token']),
        );
    }

}
