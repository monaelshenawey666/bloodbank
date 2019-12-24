<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;


class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $records = Client::where(function($query) use($request){

            if($request->search_by_name){
                $query->where('name','like','%'.$request->search_by_name.'%');
            }
            if($request->city_id){
                
                    $query->where('city_id',$request->city_id);
            }

            if($request->blood_type_id){
                
                $query->where('blood_type_id',$request->blood_type_id);
            }
            //if($request->blood_type_id){
              //  $query->whereHas('bloodType',function($q)use($request){
                //    $q->where('name','like','%'.$request->search_by_bloodtype.'%');

               // });
           // }

           // if($request->search_by_bloodtype){
            //    $query->where('name','like','%'.$request->search_by_bloodtype.'%');
            //}

        })-> paginate(10);
        return view('admin.Clients.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $records = Client::findOrFail($id);
        $records->delete();
        flash()->success('Deleted Successfully');
        return back();
    }


    public function activate($id)
    {
        $record = Client::findOrFail($id);
        $record->active = 'active';
        $record->save();
        flash()->success('actived successful');
        //return back();
        return redirect(route('clients.index'));
    }
    public function deActive($id)
    {
        $record = Client::findOrFail($id);
        $record->active = 'deActive';
        $record->save();
        flash()->success('deActived successful ');
        //return back();
        return redirect(route('clients.index'));
    }

}
