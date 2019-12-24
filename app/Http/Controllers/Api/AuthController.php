<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Token;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

//use Mail;
//use Symfony\Component\CssSelector\Parser\Token;

class AuthController extends Controller
{

    public function Register(Request $request)
    {
        //return $request->all();
        $validator = validator()->make($request->all(), [
            'name' => 'required',
            'city_id' => 'required|exists:cities,id',
            'phone' => 'required',
            //  'blood_type'   => 'required |in:O,O+,A+,A-,B+,B-,AB+,AB-',
            'blood_type_id' => 'required|exists:blood_types,id',
            'password' => 'required|confirmed',
            'email' => 'required|unique:clients',
            'last_donation_date' => 'required|date_format:Y-m-d',
            // dob
        ]);
        if ($validator->fails()) {
            //return responseJson(0,'validation error',$validator->errors());
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }
        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = Str::random(60);
        $client->save();

        //return $this->apiResponse(1,'added successful',$client);
        return responseJson(1, 'added client successful', [
            'api_token' => $client->api_token,
            'client' => $client
        ]);
    }

    public function Login(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'phone' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }
        $client = Client::where('phone', $request->phone)->first();
        if ($client) {
            if (Hash::check($request->password, $client->password)) {
                return responseJson(1, 'login success', [
                    'api_token' => $client->api_token,
                    'client' => $client
                ]);
            } elseif ($client->active == 'deActive') {
                return responseJson(0, 'تم حظر حسابك .. اتصل بالادارة');
            } else {
                return responseJson(0, 'there is no account or wrong passward');
            }
        } else {
            return responseJson(0, 'بيانات الدخول غير صحيحه');
        }
    }


    public function registerToken(Request $request)
    {
        $validation = validator()->make($request->all(), [
            'token' => 'required',
            'platform' => 'required|in:android,ios',
        ]);
        if ($validation->fails()) {
            $data = $validation->errors();
            return responseJson(0, $validation->errors()->first(), $data);
        }
        Token::Where('token', $request->token)->delete();
        $request->user()->tokens()->create($request->all());
        return responseJson(1, 'تم التسجيل بنجاح');

    }

    public function resetpassword(Request $request)
    {
        //dd(config('mail.username'));
        $user = Client::where('phone', $request->phone)->first();
        if ($user) {
            $code = rand(1111, 9999);
            $update = $user->update(['pin_code' => $code]);
            if ($update) {
                Mail::to($user->email)
                    // ->bcc("elshenaweymona92@gmail.com")
                    ->send(new ResetPassword($code));
            }
            //return responseJson(1,'success',$user);
            return responseJson(1, ' برجاء فحص الايميل', [
                'pin_code_for-reset' => $code,
                'user' => $user,
                //'mail_fails'=>Mail::failures()
                //'user'=>$user->email
            ]);
        } else {
            return responseJson(0, 'not exist');
        }

    }


    public function newpassword(Request $request)
    {
        //return $request->all();
        $validaton = validator()->make($request->all(), [
            'pin_code' => 'required',
            'phone' => 'required',
            'password' => 'required|confirmed',
        ]);
        if ($validaton->fails()) {
            $data = $validaton->errors();
            return responseJson(0, $validaton->errors()->first(), $data);
        }
        $user = Client::where('pin_code', $request->pin_code)
            ->where('phone', $request->phone)->first();
        if ($user) {
            $user->password = bcrypt($request->password);
            $user->pin_code = null;
            if ($user->save()) {
                return responseJson(1, ' تم تغيير كلمه المرور بنجاح');
            } else {
                return responseJson(0, ' حدث خطا حاول مره اخري');
            }
        } else {
            return responseJson(0, 'هذا الكود غير صالح');
        }
    }


    public function profile(Request $request)
    {
        $user = $request->user();
        if ($request->input('password')) {
            $request->merge(['password' => bcrypt($request->password)]);
        }
        if ($user) {
            $update = $user->update($request->all());
            return responseJson(1, 'your profile  updated success', $request->user());


            /* $user->update([
                  'email' =>$request->email,
                 'name'	=>$request->name,
                 'password' => $request->password,
                 'phone' => $request->phone,
                 'date_of_birth'	=>$request->date_of_birth,
                 'blood_type_id'	=>$request->blood_type_id,
                 'last_donation_date'=>$request->last_donation_date,
                  'city_id' =>$request->city_id,

              ]);
           // return responseJson(1,'your profile ',$request->user()->all());
            return responseJson(1,'your profile ',$user);*/

        } else {
            return responseJson(0, 'there is no account', $user);
        }
    }


}
