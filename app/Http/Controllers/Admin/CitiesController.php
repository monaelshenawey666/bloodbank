<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Governrate;

class CitiesController extends Controller


{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $records = City::paginate(10);
        return view('admin.cities.index',compact('records'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('admin.cities.create');
        //$governorates = Governrate::get();
        return view('admin.cities.create');

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
        $rules=[
            'name'=>'required',
            'governrate_id' => 'required'

        ];
        $messages=[
            'name.required'=>'Name is Required'
        ];

        $this->validate($request,$rules,$messages);

        
          $records = City::create($request->all());
 
        flash()->success("added successfully");
        return redirect(route('city.index'));
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
        $model = City::findOrFail($id);
        $governorates = Governrate::get();

        return view('admin.cities.edit',compact('model','governorates'));

       
        
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
        $records = City::findOrFail($id);
        $records->update($request->all());
        flash()->success('Edited Successful');
        return redirect(route('city.index'));


    
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
        $record = City::findOrFail($id);
       
        $record->delete();
        flash()->success('Deleted Successfully');
        return back();

        
    }
}
