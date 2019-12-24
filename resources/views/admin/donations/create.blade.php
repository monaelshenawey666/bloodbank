@extends('layouts.app')
@inject('model','App\Models\DonationRequest')
@inject('cities', 'App\Models\City')
@inject('governorates', 'App\Models\Governrate')

@inject('bloodTypes', 'App\Models\BloodType')




@section('page_title')
   create DonationRequest
@endsection


@section('content')



    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">create of DonationRequest</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          {!!Form::model($model,[
                'action'=>'Admin\DonationController@store'
              ]) !!}


          @include('partials.validation_errors')
          @include('admin.donations.form')
     

          {!! Form::close()!!}
        </div>
        <!-- /.card-body -->
       
      </div>
      <!-- /.card -->

    </section>




@endsection
