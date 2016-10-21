<?php

namespace App\Http\Controllers;

use App\Stuff;
use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function getIndex()
    {
//        $Stuffs=Stuff::orderBy('created_at','desc')->limit(4)->get();
//        return view("pages.welcome")->withStuffs($Stuffs);
        return redirect()->route('stuff.index');
    }

    public function getAbout()
    {
        return view("pages.about");
    }
     public function getContact()
    {
        return view("pages.contact");
    }

    public function getTest()
    {
        return view('layouts.app2');
    }

}
