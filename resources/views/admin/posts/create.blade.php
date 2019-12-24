@extends('layouts.app')
@inject('model','App\Models\Post')
@inject('model', 'App\Models\Category')
@inject('categories', 'App\Models\Category')
@inject('users', 'App\User')




@section('page_title')
   create posts
@endsection


@section('content')



    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Create of Posts</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>



        <div class="card-body">
          {!!Form::model($model,[
                'action'=>'Admin\PostsController@store',
                'files' => true
              ]) !!}


          @include('partials.validation_errors')
          
          @include('admin.posts.form')

     
        <div class="form-group">
	    		<button class="btn btn-primary" type="submit">Add Post</button>
	    	</div>
	    
          {!! Form::close()!!}
       
        </div>
        <!-- /.card-body -->



       
      </div>
      <!-- /.card -->

    </section>




@endsection
