<?php

namespace App\Http\Controllers\Front;

use App\Models\Governrate;
use App\Models\BloodType;
use App\Models\Client;
use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    //
    public function register()
    {
        $governorates = Governrate::all();
        $bloods = BloodType::all();
        // dd($bloods);
        return view('front.register', compact('governorates', 'bloods'));
    }

    public function registerSave(Request $request)
    {
        $validation = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:clients',
            'password' => 'required',
            'phone' => 'required|unique:clients',
            'date_of_birth' => 'required',
            'last_donation_date' => 'required',
            'blood_type_id' => 'required',
            'governorate_id' => 'required',
            'city_id' => 'required',
        ]);
        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());
        // $client->save();
        //  dd('done');
        return view('front.login');
    }


    public function login()
    {
        return view('front.login');
    }

    public function logout()
    {
        // todo check auth
//        dd(auth()->guard('client-web')->user());
        auth()->guard('client-web')->logout();
//        dd(auth()->guard('client-web')->user());

        return redirect('client/login');
    }

    public function loginSave(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required',
            'password' => 'required',
        ]);
        $client = Client::where('phone', $request->input('phone'))->first();
        if ($client) {
            if (Auth::guard('client-web')->attempt($request->only('phone', 'password'))) {
                flash()->success('hello' . auth()->guard('client-web')->user()->name);
                return redirect('index');
            } else {
                flash()->error('error in login');
                return back();
            }
        }
        flash()->error('لا يوجد حساب مرتبط بهذا الرقم');
        return back();
    }


}
