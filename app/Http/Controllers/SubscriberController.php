<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubscriberController extends Controller
{
    public function store(Request $request){

        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();
        return redirect()->back()->with('success', 'Successfully Done!');
    }
}
