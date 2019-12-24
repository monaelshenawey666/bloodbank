@extends('front.master')

@section('content')


    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Who we are?</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- Who Start -->
    <section id="who">
        <div class="container">
                <img src="{{asset('front/imgs/logo.png')}}" alt="">
                <p>
                    {{$settings->about_app}}
                </p>
        </div>
    </section>
    <!-- Who End -->

@stop
