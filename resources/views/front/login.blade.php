@extends('front.master')
@section('content')

    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Login</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- Login Start -->
    <section id="login">
        <div class="container">
            @include('flash::message')
                <img src="imgs/logo.png" alt="">

                    <form action="{{url(route('client/loginSave'))}}" method="post">
                        {{csrf_field()}}
                    <input class="username" type="phone" placeholder="phone" required name="phone">
                    <input class="password" type="Password" placeholder="Password"  name="password" required>
                    <input class="check" type="checkbox">Remember me
                    <a href="#">Forget Password ?</a><br>
                    <div class="reg-group">
                        <button style="background-color: darkred;">Login</button>
{{--                        <button style="background-color: rgb(51, 58, 65);">Make new account</button>--}}
                        <button style="background-color: rgb(51, 58, 65);"  onclick= "window.location.href = '{{url('client/register')}}';"> Make new Account</button>

                    </div>
                </form>
        </div>
    </section>
    <!-- Login End -->
@stop
