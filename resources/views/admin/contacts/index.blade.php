@extends('layouts.app')


@section('page_title')
Contacts
@endsection


@section('content')



    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List of Contacts</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          @include('flash::message')
          @if(count($records))
            <div class="table-responsive">
               <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Title</th>
                      <th>Message</th>

                      
                      <th class="text-center">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($records as $record)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$record->name}}</td>
                      <td>{{$record->email}}</td>
                      <td>{{$record->phone}}</td>
                      <td>{{$record->title}}</td>
                      <td>{{$record->message}}</td>

                      
                    
                      <td class="text-center">
                      
                      {!!Form::open([
                          'action'=>['Admin\ContactsController@destroy',$record->id],
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
