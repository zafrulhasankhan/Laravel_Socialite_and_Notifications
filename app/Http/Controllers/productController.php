<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use App\Notifications\productNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class productController extends Controller
{
    //
    public function store(Request $request){
       $user = User::all();
       $product = new product();
       $product->name = $request->name;
       $product->description = $request->description;
       $product->save();
       FacadesNotification::send($user,new productNotification($request->name));
       return back()->with('status','Successfully');

    }
}
