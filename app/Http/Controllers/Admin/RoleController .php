<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $records = Role::paginate(10);
        return view('admin.roles.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $rules=[
            'name' => 'required|unique:roles,name',
            'display_name' => 'required',

            'permissions_list' => 'required|array',

         ];
         $messages=[
            'name.required' => 'name is required',
            'display_name.required' => 'display_name is required',

            'permissions_list.required' => 'permission list is required',

        ];
        $this->validate($request,$rules,$messages);


        $records = Role::create($request->all());
        $records->permissions()->attach($request->permissions_list);

        flash()->success("تم اضافه الرتبه بنجاح ");
       // return redirect('admin/role');
        return redirect(route('role.index'));

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
        $model = Role::findOrFail($id);
        return view('admin.roles.edit', compact('model'));

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
        //dd($request->all());
        $rules=[
            'name' => 'required|unique:roles,name,'.$id,
            'display_name' => 'required',

            'permissions_list' => 'required|array',

         ];
         $messages=[
            'name.required' => 'name is required',
            'display_name.required' => 'display_name is required',

            'permissions_list.required' => 'permission list is required',

        ];
        $this->validate($request,$rules,$messages);


        $records = Role::findOrFail($id);
        //dd($records);
        $records->update($request->all());
        $records->permissions()->sync($request->permissions_list);



        flash()->success('Edited Successfully');
        return redirect(route('role.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $records = Role::findOrFail($id);
        $records->delete();
        flash()->success('Deleted Successfully');
        return back();
    }




    //333
}
