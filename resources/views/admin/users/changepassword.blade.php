
@extends('layouts.app')
@inject('model', 'App\User')
@inject('role', 'App\Models\Role')
@inject('users', 'App\User')




@section('page_title')
   change user password
@endsection


@section('content')



    <!-- Main content -->
    <section class="content">
			
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">change user password</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>


        @include('flash::message')
        <div class="card-body">
                    {!! Form::model($model, ['action' => 'Admin\UserController@changePasswordSave']) !!}
				    	
				    	<div class="form-group">
				    		<label for="oldPassword">Old Password</label>
				    		{!!Form::password('oldPassword', ['class'=>'form-control'])!!}
                        </div>
                        
				    	<div class="form-group">
				    		<label for="password">Password</label>
				    		{!!Form::password('password', ['class'=>'form-control'])!!}
				    	</div>

                        <div class="form-group">
				    		<label for="password_confirmation">Password Confirm</label>
				    		{!!Form::password('password_confirmation', ['class'=>'form-control'])!!}
                        </div>
                        
          
				    	<div class="form-group">
				    		<button class="btn btn-primary" type="submit">Save</button>
				    	</div>
			    	{!!Form::close()!!}

       
        </div>
        <!-- /.card-body -->



       
      </div>
      <!-- /.card -->

    </section>

@endsection



