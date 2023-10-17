<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Cart;


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

            $user_id = Auth::id();
            $count = cart::where('user_id',$user_id)->count();

            return view('home',compact('data','chef','count'));

        }


    }

    public function addcart(Request $request,$id)
    {

        $cart = new cart;

        if(Auth::user()){

            $cart->user_id = Auth::id();
            $cart->food_id = $id;
            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back()->with('message','Food Item Added to Cart ');

        }
        else{

            return redirect('/login');
        }


    }


}
