<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Food;
use App\Models\Reserve;
use App\Models\Foodchef;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller

{
    public function users()
    {
        $data = User::all();
        return view('admin.user',compact('data'));
    }
    public function delete_user($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('message','User Deleted Successfully');
    }

    public function update_view($id)
    {
        $food = Food::find($id);
        return view('admin.updatefood',compact('food'));
    }

    public function update_food($id, Request $request)
    {
        $data =Food::find($id);

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->desc;

        if($image = $request->image){


            $image = $request->image;
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('foodimage',$imagename);

            $data->image = $imagename;
        }

        $data->save();
        return redirect('/foodmenu')->with('message','Food Updated Successfully');
    }

    public function delete_food($id)
    {
        $food = Food::find($id);
        $food->delete();

        return redirect()->back()->with('message','Food Deleted Successfully From The Menu');
    }

    public function foodmenu()
    {
        $data = food::all();

        return view('admin.foodmenu',compact('data'));
    }

    public function uploadfood(Request $request)
    {
        $data = new Food;

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->desc;

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);

        $data->image = $imagename;

        $data->save();
        return redirect()->back()->with('message','Product Uploaded Successfully');


    }

    public function reservation(Request $request)
    {
        $data = new Reserve;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;

        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;

        $data->save();

        return redirect()->back()->with('message','Table Reserved Successfully');

    }

    public function reservation_list()
    {
        $data = Reserve::all();
        return view('admin.reservation_list',compact('data'));
    }

    public function viewchef() {

        $data = foodchef::all();

        return view('admin.adminchef',compact('data'));
    }


    public function uploadchef(Request $request)
    {

        $data = new Foodchef;

        $data->name = $request->name;
        $data->speciality = $request->speciality;

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefimage',$imagename);

        $data->image = $imagename;

        $data->save();
        return redirect()->back()->with('message','Chef Data Uploaded Successfully');

    }

    public function updatechef($id)
    {
        $chef = foodchef::find($id);

        return view('admin.updatechef',compact('chef'));
    }

    public function update_chef(Request $request,$id)
    {
        $data = foodchef::find($id);

        $data->name = $request->name;
        $data->speciality = $request->speciality;

        if($image = $request->image){


            $image = $request->image;
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('chefimage',$imagename);

            $data->image = $imagename;
        }

        $data->save();
        return redirect('/viewchef')->with('message','Chef Data Updated Successfully');

    }

    public function delete_chef($id)
    {
        $data = foodchef::find($id);
        $data->delete();
        return redirect('/viewchef')->with('message','Chef Data Deleted Successfully');

    }


}
