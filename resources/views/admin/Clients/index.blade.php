@extends('layouts.app')

@inject('cities','App\Models\City')
@inject('bloodtypes','App\Models\BloodType')

@section('page_title')
Clients
@endsection


@section('content')



    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List of Clients </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">



        <div>

                          {!!Form::open([
                                  'action'=>'ClientsController@index',
                                  'method'=>'get'
                          ]) !!}

                          <input type="text" name="search_by_name" placeholder="name" class="form-control">
                          {!! Form::select('city_id',$cities->pluck('name','id')->toArray(),null,[
                            'class' =>'form-control',
                            'placeholder' => 'اختر المدينة'
                            ])!!}

                            {!! Form::select('blood_type_id',$bloodtypes->pluck('name','id')->toArray(),null,[
                            'class' =>'form-control',
                            'placeholder' => 'اختر الفصيله'
                            ])!!}



                          <button type="submit" class="btn btn-primary "><i class="fa fa-search"></i> Search</button>
                         {!! Form::close()!!}

        </div> <br>



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
                      <th>Blood Type</th>
                      <th>City</th>

                      <th class="text-center">Activation</th>
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
                      <td>{{optional($record->bloodType)->name}}</td>
                      <td>{{($record->city)->name}}</td>



                      <td class="text-center">
                        @if($record->active=='active')
                        <a href="client/{{$record->id}}/deActive/" class="btn btn-danger btn-xs">deActive</a>
                        @else
                        <a href="client/{{$record->id}}/active/"class="btn btn-success btn-xs">Active</a>

                        @endif
                      </td>
                      <td class="text-center">

                      {!!Form::open([
                          'action'=>['ClientsController@destroy',$record->id],
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
