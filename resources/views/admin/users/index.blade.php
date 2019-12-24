

@extends('layouts.app')


@section('page_title')
List Of users
@endsection


@section('content')




    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">  List Of users</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>

        
        <div class="card-body">
          <a href="{{url(route('users.create'))}}" class="btn btn-primary"><i class="fa fa-plus"></i>New User</a><br><br>
          @include('flash::message')
          @if(count($records))
            <div class="table-responsive">
               <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Role</th>


            

                      
                      <th class="text-center">Edit</th>
                      <th class="text-center">Delete</th>
                    </tr>
                  </thead>


                  <tbody>
                    @foreach($records as $record)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td class="text-center">{{$record->name}}</td>
                      <td class="text-center">{{$record->email}}</td>
                      <td class="text-center">
                          @foreach($record->roles as $r)
                          <li>{{$r->display_name}}</li>
                          @endforeach


                      </td>
                  
                                         
                    
                                      
                      <td class="text-center">
                        <a href="{{url(route('users.edit',$record->id))}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                      </td>
                
                      <td class="text-center">
                        {!!Form::open([
                          'action'=>['Admin\UserController@destroy',$record->id],
                          'method'=>'delete'
                        ]) !!}
     
                          <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                         {!! Form::close()!!}
                      </td>


                     
                    </tr>
                    @endforeach

                  </tbody>
              </table>
            </div>

          @else
          <div class="alert alert-danger" role="alert">
            No data
          </div>
          @endif


        </div>
        <!-- /.card-body -->
       
      </div>
      <!-- /.card -->

    </section>




@endsection





