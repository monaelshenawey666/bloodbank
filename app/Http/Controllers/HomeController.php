<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

//    public function index1()
//    {
//        //
//        $records = Governorate::paginate(10);
//        return view('admin.governorates.index',compact('records'));
//    }
    public function index()
    {
        return view('home');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('home');
    }

}
