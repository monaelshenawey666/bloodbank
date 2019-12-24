<?php

namespace App\Http\Controllers\Front;

use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Governrate;
use App\Models\Post;
use App\Models\Client;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    //
    public  function home(Request $request)
    {
        //$client=Client::first();
       // dd($request->user());
        $posts=Post::take(9)->latest()->get();
        //auth('client-web')->login($client);
        //dd($posts);
        $donations=DonationRequest::take(9)->latest()->get();
        return view('front.index',compact('posts','donations'));
    }

    public  function toggleFavourite(Request $request)
    {
        $toggle = $request->user()->posts()->toggle($request->post_id);

        return responseJson('1','success',$toggle);
    }


    public function index()
    {
        //

    }

    public function donation(Request $request)
    {

        $donations = DonationRequest::where(function($query) use($request){

            if($request->city_id){ $query->where('city_id',$request->city_id); }
            if($request->blood_type_id){ $query->where('blood_type_id',$request->blood_type_id); }
        })->latest()->with('client','bloodType','city.governorate')->paginate(10);
         return view('front.donations',compact('donations'));


       // $donations=DonationRequest:: take(3)->get();

       // return view('front.donations',compact('donations'));
    }
    public function donatorDetails($id)
    {
        $donation=DonationRequest::with('client','bloodType','city.governorate')->findOrFail($id);

        return view('front.donatorDetails',compact('donation'));
    }
    public function createDonation()
    {
        return view('front.createdonation');
    }

    public function createDonationsave(Request $request)
    {
        $this->validate($request, [
            'patient_name' => 'required',
            'patient_phone' => 'required',
            'patient_age' => 'required',
            'hospital_name' => 'required',
            'bages_num' => 'required',
        ]);
        $records = $request->user()->donationRequests()->create($request->all());
        flash()->success("added successfully");
        //return redirect('front/index');
        return redirect('index');
    }


    public  function articles()
    {
        $posts=Post::latest()->paginate(2);
        return view('front.articles',compact('posts'));
    }

    public  function whoUs()
    {
        return view('front.whoUs');
    }

    public  function about()
    {
        return view('front.whoUs');
    }

    public  function contactUs()
    {
        return view('front.contactUs');
    }

    public function contactUsSend(Request $request)
    {
        $validation = $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'title'=>'required',
            'message'=>'required',

        ]);
        $message =Contact::create($request->all());
        if(!empty($message))
        {
            flash()->success('sen successfully');
            return back();
        }
    }







}
