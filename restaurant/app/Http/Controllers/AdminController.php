<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Food;
use Illuminate\Http\Request;

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

    public function foodmenu()
    {
        return view('admin.foodmenu');
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
}
