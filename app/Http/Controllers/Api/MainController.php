<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\Category;
use App\Models\DonationRequest;
use App\Models\Governrate;
use App\Models\City;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Contact;
use App\Models\Notification;
use App\Models\Token;

use Illuminate\Http\Request;


class MainController extends Controller
{

    /* private function apiResponse($status,$message,$data=null)
     {
         $response=[
             'status' =>$status,
             'message' =>$message,
             'data' =>$data,
         ];
         return response()->json($response);
     }*/
    public function governrates()
    {
        $governrates = Governrate::all();
        /* $response=[
             'status' =>1,
             'message' =>'success',
             'data' =>$governrates,
         ];
         return response()->json($response);*/
        return responseJson(1, 'success', $governrates);
    }

    /*public function cities(Request $request){
        $cities= City::where('governrate_id',$request->governrate_id )->get();
        return $this->apiResponse(1,'success',$cities);
    }*/
    public function cities(Request $request)
    {
        $cities = City::where(function ($query) use ($request) {
            if ($request->has('governrate_id')) {
                $query->where('governrate_id', $request->governrate_id);
            }
        }
        )->get();
        return responseJson(1, 'success', $cities);
    }

    public function posts(Request $request)
    {
        $posts = Post::where(function ($query) use ($request) {
            if ($request->input('category_id')) {
                $query->where('category_id', $request->category_id);
            }
            if ($request->input('keyword')) {
                $query->where(function ($query) use ($request) {
                    $query->where('title', 'like', '%' . $request->keyword . '%')
                        ->orwhere('content', 'like', '%' . $request->keyword . '%');
                });
            }
        })->latest()->paginate(10);
        //return $this->apiResponse(1,'success',$posts);
        return responseJson(1, 'success', $posts);
    }

    public function category()
    {
        $categories = Category::all();
        return responseJson(1, 'success', $categories);
    }

    public function bloodTypes()
    {
        $blood_types = BloodType::all();

        return responseJson(1, 'success', $blood_types);
    }

    public function settings()
    {
        $settinges = Setting::first();
        return responseJson(1, 'success', $settinges);
    }

    public function contact(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'title' => 'required',
            'message' => 'required',
        ]);
        if ($validator->fails()) {
            return responseJson(1, 'errorrrr', $validator->errors());
        }
        $contact = Contact::create($request->all());
        return responseJson(1, 'success', $contact);
    }

    public function notifications(Request $request)
    {
        $notifications = $request->user()->notifications()->paginate(10);
        return responseJson(1, 'success', $notifications);
    }

    //$name = DB::table('users')->where('name', 'John')->pluck('name');
    public function notificationSettings(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'blood_types' => 'required|array',
            'governorates' => 'required|array',
        ]);
        if ($validator->fails()) {
            return responseJson(0, 'try again', $validator->errors());
        }
        $blood_types = $request->user()->blood_types()->sync($request->blood_types);
        $governorates = $request->user()->governorates()->sync($request->governorates);

        /* $data = [
           'blood_types' => $request->user()->blood_types()->pluck('blood_types.id')->toArray(),
           'governorates' => $request->user()->governorates()->pluck('governorates.id')->toArray()

         ];*/

        return responseJson(1, 'success');
    }

    public function listNotifications(Request $request)
    {
        $data = [
            'blood_types' => $request->user()->blood_types()->pluck('blood_types.id')->toArray(),
            'governorates' => $request->user()->governorates()->pluck('governorates.id')->toArray()
        ];
        return responseJson(1, 'success', $data);

    }

    public function favouritePosts(Request $request)
    {
        $favouritePosts = $request->user()->posts()->latest()->paginate(10);
        return responseJson(1, 'success', $favouritePosts);
    }

    public function toggleFavourite(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'post_id' => 'required|exists:posts,id'
        ]);
        if ($validator->fails()) {
            return responseJson(0, 'erorr no post ', $validator->errors());
        }

        $toggle = $request->user()->posts()->toggle($request->post_id);
        return responseJson(1, 'success');
    }

    public function donationRequestCreate(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'patient_name' => 'required',
            'patient_phone' => 'required',
            'patient_age' => 'required',
            'hospital_name' => 'required',
            'hospital_address' => 'required',
            'bages_num' => 'required',
            'details' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'city_id' => 'required',
            'blood_type_id' => 'required',
            //'client_id'            =>'required',

        ]);
        if ($validator->fails()) {
            return responseJson(0, 'erorrrrr', $validator->errors());
        }
//        $donation = DonationRequest::create($request->all());
         $donation = $request->user()->donationRequests()->create($request->all());
        return responseJson(1, 'success order donation', $donation);
//dd($donation);
        //dd($donation->city->governorate);

//        $clientIds = $donation->city->governorate
//		->clients()->whereHas('blood_types', function($q) use($request){
//			$q->where('blood_types.id', $request->blood_type_id);
//		})->pluck('clients.id')->toArray();
//     // dd($clientIds);
//        if(count($clientIds))
//        {
//			$notifications = $donation->notifications()->create([
//                'title'   =>'يوجد طلب تبرع جديد',
//				'content'  =>optional($donation->bloodtype)->name . 'محتاج تبرع لفصيلة'
//			]);
//        }
//		$notifications->clients()->attach($clientIds);
//		$tokens = Token::whereIn('client_id', $clientIds)->where('token','!=',null)->pluck('token')->toArray();
//        $send= null;
//        if(count($tokens))
//        {
//			$title=$notifications->title;
//			$body =$notifications->content;
//			$data = [
//				'donation_request_id'=>$donation->id
//			];
//			$send = notifyByFirebase($title,$body, $tokens, $data);
//			//info('Firebase result:' . $send);
//		}
//		return responseJson(1, 'تم الاضافه بنجاح', $send);

    }


}
