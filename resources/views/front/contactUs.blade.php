
@extends('front.master')
@section('content')

    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;"><a href="{{url('index')}}" >Home</a></div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Contact Us</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- login Start -->
    <section id="contact">
        <div class="container">
           @include('flash::message')
            <div class="row">
                <div class="col-md-6 call">
                    <div class="title">Head</div>
                    <img src={{asset('front/imgs/logo.png')}} alt="">
                    <hr>
                    <h4>Mobile:  +{{$settings->phone}}</h3>
                        <h4>Fax: +2 455 6646</h3>
                            <h4>Email: InfoBloodBank@gmail.com</h3>
                                <hr>
                                <h3>Find Us On</h3>
                                <div class="icons">

                                    <a href="{{$settings->fb_link}}" target="_blank"><i class="fab fa-facebook-square fa-3x"></i></a>
                                    <i class="fab fa-google-plus-square fa-3x"></i>
                                    <i class="fab fa-twitter-square fa-3x"></i>
                                    <i class="fab fa-whatsapp-square fa-3x"></i>
                                    <i class="fab fa-youtube-square fa-3x"></i>
                                </div>
                </div>
                <div class="col-md-6 info">
                    <div class="title">Head</div>

                    @include('partials.validation_errors')
                    {!!Form::open([ 'action'=>'Front\MainController@contactUs' ]) !!}
                    <input type="text" name="name" id="" placeholder="Name" required="">
                    <input type="email" name="email" id="" placeholder="Email" required="">
                    <input type="number" name="phone" id="" placeholder="Phone" required="">
                    <input type="text" name="title" id="" placeholder="Title" required="">
                    <textarea name="message" id="" cols="10" rows="5" placeholder="Message"></textarea>

                    <div class="reg-group">
                        <button type="submit">Send</button>
                    </div>


                    {!! Form::close()!!}

                </div>
            </div>
        </div>
    </section>
    <!-- login End -->

  @stop
