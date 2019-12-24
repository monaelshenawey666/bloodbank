<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use App\Models\Governrate;


class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $records = Governrate::paginate(10);
        return view('admin.governorates.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.governorates.create');
        
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
            'name'=>'required'

        ];
        $messages=[
            'name.required'=>'Name is Required'
        ];

        $this->validate($request,$rules,$messages);
        // $records = new Governorate;
        // $records->name = $request->input(name);
        // $records->save();
        //  return back();         
          $records = Governrate::create($request->all());
 
        flash()->success("added successfully");
        return redirect(route('governorate.index'));

        
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
        $model = Governrate::findOrFail($id);
        return view('admin.governorates.edit',compact('model'));
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
        $records = Governrate::findOrFail($id);
        $records->update($request->all());
        flash()->success('Edited Successful');
        return redirect(route('governorate.index'));
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
        $record = Governrate::findOrFail($id);
        if($record->cities()->count())
        {
            flash()->error('Can\'t delete bc there are  cities');
            return back();
        }
        $record->delete();
        flash()->success('Deleted Successfully');
        return back();
    }
}
