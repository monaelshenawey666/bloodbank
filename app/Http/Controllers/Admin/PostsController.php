<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\User;
use Psy\Util\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $records = Post::paginate(10);
        return view('admin.posts.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.posts.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title'     =>'required',
            'content'   =>'required',
            'image'   =>'required|image|mimes:png,jpg,jpeg',
        ]; 
        $messages=[
            'title.required'=>'title is Required',
            'content.required'=>'content is Required'

        ];
        $this->validate($request,$rules,$messages);

        $img = $request->file('image');
        $directionPath = public_path().'/uploades/image/posts/';
        $extention = $img->getClientOriginalExtension();
        $name = rand('222222' , '99999999') . '.' . $extention;
        $img->move($directionPath , $name);
        
        $records = Post::create($request->all());

        $records->image = 'uploades/image/posts/'.$name;
        $records->save();

        flash()->success("added post successfully");
        return redirect(route('post.index'));


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
        $model = Post::findOrFail($id);

        return view('admin/posts/edit', compact('model'));
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
        $records = Post::findOrFail($id);
        $records->update($request->all());
        flash()->success('Edited post Successful');
        return redirect(route('post.index'));

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
        $record = Post::findOrFail($id);
       
        $record->delete();
        flash()->success(' Post Deleted Successfully');
        return back();
    }
}
