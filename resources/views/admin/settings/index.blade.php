@extends('layouts.app')


@section('page_title')
    Settings
@endsection


@section('content')



    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List of Settings</h3>

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
                        <th>About App</th>
                        <th>Phone</th>
                        <th>Facebook</th>
                        <th>Twitter</th>
                        <th>Instagram</th>
                        <th class="text-center">Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($records as $record)
                    <tr>
                            <td>{{$record->about_app}}</td>
                            <td>{{$record->phone}}</td>
                            <td>{{$record->fb_link}}</td>
                            <td>{{$record->twiter_link}}</td>
                            <td>{{$record->insta_link}}</td>
                      <td class="text-center">
                        <a href="{{url(route('settings.edit',$record->id))}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
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
