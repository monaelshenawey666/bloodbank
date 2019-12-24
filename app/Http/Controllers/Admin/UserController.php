<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        //permissions
        

        $records = User::paginate(10);
        return view('admin.users.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'password' => 'required|confirmed',
            'email'    => 'required',
            'roles_list'=> 'required'


        ],[
            'name.required' 	=> 'name is required',
            'password.required' => 'password is required',
            'email.required' 	=> 'email is required',

        ]);

        $request->merge(['password'=>bcrypt($request->password)]);
        $user = User::create($request->except('roles_list'));
       
        $user->roles()->attach($request->input('roles_list'));
         

        flash()->success("added successfully");
        
        return redirect(route('users.index'));
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
        $model = User::findOrFail($id);
        return view('admin/users/edit', compact('model'));
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

        $this->validate($request, [
            'name'     => 'required',
            'password' => 'confirmed',
            'email'    => 'email',
            'roles_list'=> 'required'
        ]);

        $user = User::findOrFail($id);
        $user->roles()->sync((array)$request->input('roles_list'));
        $request->merge(['password'=>bcrypt($request->password)]);
        
        $update=$user->update($request->all());
        
        flash()->success('Edited Successfully');
        return redirect(route('users.edit',$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $records = User::findOrFail($id);
        $records->delete();
        flash()->success('Deleted Successfully');
        return back();
    }


    public function changePassword()
    {
        return view('admin.users.changepassword');
    }
    public function changePasswordSave(Request $request)
    {
        $this->validate($request, [
            'oldPassword' => 'required',
            'password'      => 'required',

        ],[
            'oldPassword.required' => 'current password is required',
            'password.required'     => 'new password is required',

        ]);

        $user = auth()->user();
        if(Hash::check($request->oldPassword,$user->password))
        {
            $user->password = bcrypt($request->password);
            $user->save();
            flash()->success('تم تغيير كلمة المرور بنجاح');
            return redirect(url('users'));

        }else{
            flash()->error('حدث خطا حاول مرة اخرى');
            return view('admin.users.changepassword');
        }
      
    }

   
}
