

@extends('front.master')
@section('content')


        @inject('cities', 'App\Models\City')
        @inject('governorates', 'App\Models\Governrate')
        @inject('bloodTypes', 'App\Models\BloodType')
       // @include('partials.validation_errors')

    <section id="sign-up">
        <div class="container">
            @include('partials.validation_errors')
{{--            <form action="{{url('createDonationSave')}}" method="post">--}}
{{--                {{csrf_field()}}--}}
            {!!Form::open([
                 'action'=>'Front\MainController@createDonationsave' ,
            ]) !!}
                    <div class="form-group">
                        <label for="name">Patient Name</label>
                        {!! Form::text('patient_name',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label for="name">Patient age</label>
                        {!! Form::number('patient_age',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label for="name">Patient phone</label>
                        {!! Form::text('patient_phone',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label for="name">Hospital name</label>
                        {!! Form::text('hospital_name',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label for="name">Bages Num</label>
                        {!! Form::number('bages_num',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label for="name">details</label>
                        {!! Form::text('details',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!!Form::label('governorate_id', 'Governorate')!!}

                        {!! Form::select('governorate_id', $governorates->pluck('name','id')->toArray(),null, [
                                  'class'=>'form-control'
                        ])!!}
                    </div>


                    <div class="form-group">
                        {!!Form::label('city_id', 'City')!!}

                        {!! Form::select('city_id', $cities->pluck('name','id')->toArray(),null, [
                                  'class'=>'form-control'
                        ])!!}
                    </div>

                    <div class="form-group">
                        {!!Form::label('blood_type_id', 'Blood Type')!!}

                        {!! Form::select('blood_type_id', $bloodTypes->pluck('name','id')->toArray(),null, [
                                  'class'=>'form-control'
                        ])!!}
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>

            {!! Form::close()!!}
{{--            </form>--}}
        </div>
    </section>





    @stop
