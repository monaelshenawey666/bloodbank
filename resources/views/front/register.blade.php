@extends('front.master')
@section('content')

    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Sign up</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- Sign Up Start -->
    <section id="sign-up">
        <div class="container">
            <img src="{{asset('front/imgs/logo.png')}}" alt="">
            @include('partials.validation_errors')

            <form action="{{url(route('client/registerSave'))}}" method="post">
                {{csrf_field()}}
                <input name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="date" name="date_of_birth" placeholder="Birth date">


                @inject('$bloods', 'App\Models\BloodType')
                {!!  Form::select('blood_type_id',$bloods->pluck('name','id')->toArray(),null,[
                                 'id'=>'blood','placeholder'=>'select blood Type'
                                 ]) !!}


                @inject('governorate', 'App\Models\Governrate')
                {!! Form::select('governorate_id', $governorate->pluck('name', 'id')->toArray(), null,[
                   // 'class'=>'custom-select ',
                    'id'   =>'Gov',
                    'placeholder'=>'اختر المحافظة'
                  ]) !!}

                {!! Form::select('city_id', [], null,[
                 // 'class'=>'custom-select ,
                  'id'   =>'cities',
                  'placeholder'=>'اختر مدينة'
                ]) !!}


                <input type="Phone" name="phone"  placeholder="Phone Number" required="">
                <input type="password" placeholder="password" required="" name="password">

                <input type="date"  name="last_donation_date">
                <div class="reg-group">
                    <input class="check" type="checkbox" required=""
                           style="height: auto; display:inline; margin: 0 auto;">Agree on terms and conditions<br>
                    <button class="submit" type="submit" style="background-color: rgb(51, 58, 65);">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <!-- Sign Up End -->

    @push('scripts')
        <script>
            $("#Gov").change(function (e) {
                ///////  alert('testtt');
                e.preventDefault();
                var governorate_id = $("#Gov").val();

                if (governorate_id) {
                    $.ajax(
                        {
                            url: "{{url('api/v1/cities?governorate_id=')}}" + governorate_id,
                            type: 'get',
                            success: function (data) {
                                if (data.status == 1) {
                                    console.log(data);
                                    $("#cities").empty();
                                    $("#cities").append('<option value="">اختر مدينة</option>');

                                    $.each(data.data, function (index, city) {
                                        $("#cities").append('<option value="' + city.id + '">' + city.name + '</option>');
                                    });
                                }

                            },
                            error: function (jqXhr, textStatus, errorMessage) {
                                alert(errorMessage);
                            }


                        });
                } else {
                    $("#cities").empty();
                    $("#cities").append('<option value="">اختر مدينة</option>');

                }

            });

        </script>
    @endpush

@stop
