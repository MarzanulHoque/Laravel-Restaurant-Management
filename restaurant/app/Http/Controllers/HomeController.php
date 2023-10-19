<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Cart;
use App\Models\Order;


class HomeController extends Controller
{
    public function index()  {

        $data = food::all();
        $chef = foodchef::all();
         $user_id = Auth::id();
        $count = cart::where('user_id',$user_id)->count();


        return view('home',compact('data','chef','count'));

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

    public function showcart($id)
    {
        $user_id = Auth::id();

        $count = cart::where('user_id',$user_id)->count();
        $data2 = cart::select('*')->where('user_id', '=' , $id)->get();

        $data = cart::where('user_id',$user_id)->join('food','carts.food_id','=','food.id')->get();

        return view('showcart',compact('count','data','data2'));
    }

    public function remove_cart($id)
    {
        $data = cart::find($id);
        $data->delete();

        return redirect()->back()->with('message','Product Removed From the Cart');
    }

    public function confirmorder(Request $request){

        foreach ($request->foodname as $key => $foodname) {

            $data = new order;

            $data->foodname = $foodname;
            $data->price = $request->price[$key];
            $data->quantity = $request->quantity[$key];
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->address = $request->address;

            $data->save();


        }
        return redirect()->back()->with('message','Ordered Placed Successfully');


    }

}
