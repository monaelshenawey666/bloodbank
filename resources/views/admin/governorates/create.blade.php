@extends('layouts.app')
@inject('model','App\Models\Governrate')


@section('page_title')
   create Governorates
@endsection


@section('content')



    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">create of governorates</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          {!!Form::model($model,[
                'action'=>'Admin\GovernorateController@store'
              ]) !!}


          @include('partials.validation_errors')
          @include('admin.governorates.form')
     

          {!! Form::close()!!}
        </div>
        <!-- /.card-body -->
       
      </div>
      <!-- /.card -->

    </section>




@endsection
