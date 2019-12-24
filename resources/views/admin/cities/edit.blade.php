@extends('layouts.app')
@inject('governrates', 'App\Models\Governrate')

@section('page_title')
   Edit Cities
@endsection


@section('content')



    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">edit of cities</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>



        <div class="card-body">
        @include('flash::message')

          {!!Form::model($model,[
                  'action'=>['Admin\CitiesController@update',$model->id],
                  'method'=>'put'
                ]) !!}

          @include('partials.validation_errors')
          @include('admin.cities.form')

          {!! Form::close()!!}
        </div>
        <!-- /.card-body -->



       
      </div>
      <!-- /.card -->

    </section>




@endsection
