@extends('layouts.app')


@section('page_title')
Donation Requests
@endsection


@section('content')



    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List of  Donation Requests</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <a href="{{url(route('donation.create'))}}" class="btn btn-primary"><i class="fa fa-plus"></i>New  Donation Request</a><br><br>
          @include('flash::message')
          @if(count($records))
            <div class="table-responsive">
               <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Patient Name</th>
                      <th>Patient Age</th>
                      <th>Patient Phone</th>
                      <th>Hospital Name</th>
                      <th>Bages Num</th>
                      <th> Details</th>
                      <th> City</th>
                      <th> Governorate</th>
                      <th> Blood type</th>


                      <th class="text-center">Edit</th>
                      <th class="text-center">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($records as $record)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$record->patient_name}}</td>
                      <td>{{$record->patient_age}}</td>
                      <td>{{$record->patient_phone}}</td>
                      <td>{{$record->hospital_name}}</td>
                      <td>{{$record->bages_num}}</td>
                      <td>{{$record->details}}</td>
                      <td class="text-center">{{($record->city)->name}}</td>
                      <td>{{$record->city->governorate->name}}</td>
                      <td class="text-center">{{($record->bloodtype)->name}}</td>


                      <td class="text-center">
                        <a href="{{url(route('donation.edit',$record->id))}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                      </td>
                      <td class="text-center">
                        {!!Form::open([
                          'action'=>['Admin\DonationController@destroy',$record->id],
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
