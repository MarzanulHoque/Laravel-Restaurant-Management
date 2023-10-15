<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Foodchef;
class HomeController extends Controller
{
    public function index()  {

        $data = food::all();
        $chef = foodchef::all();

        return view('home',compact('data','chef'));

    }

    public function redirects()
    {
         $data = food::all();
        $chef = foodchef::all();

        $usertype = Auth::user()->usertype;

        if($usertype=='1'){

            return view('admin.home');

        }
        else{

            return view('home',compact('data','chef'));
        }


    }
}
