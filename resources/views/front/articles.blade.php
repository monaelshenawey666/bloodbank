@extends('front.master')
@section('content')


    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-main" style="color: darkred; display:inline-block;">/ Articles</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Disease Protection</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- article Start -->
    <section id="article">
        <div class="container">
            @foreach($posts as $post)
                <img class="head-img" src="{{asset($post->image)}}" alt="">
                <div class="details-container">
                    <div class="title">{{$post->title}}</div>
                    <p>{{$post->content}}</p>
                    <strong><a>Share this article:</a></strong>
                    <div class="icons">
                        <i class="fab fa-facebook-square fa-3x"></i>
                        <i class="fab fa-google-plus-square fa-3x"></i>
                        <i class="fab fa-twitter-square fa-3x"></i>
                    </div>

                </div>
            @endforeach
            <!-- Articles Start -->
            <section id="articles">
                <div class="container">
                    <h2 style="display: inline-block;">Articles</h2>
                    <div class="swiper-container">
                        <div class="button-area" style="display: inline-block; margin-left: 850px;">
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            </button>
                        </div>
                        <div class="swiper-wrapper">
                            @foreach($posts as $post)
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card-img-top" style="position: relative;">
                                            <img src="{{asset($post->image)}}" alt="Card image">
                                            <button  id="{{$post->id}}" onclick="toggleFavourite(this)"
                                                     class="{{$post->is_favourite?'second-heart':'first-heart'}}">
                                                <i class="fas fa-heart icon-large"></i>
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">{{$post->title}}</h4>
                                            <p class="card-text">{{$post->content}}</p>
                                            <div class="btn-cont">
                                                <button class="card-btn"
                                                    onclick="window.location.href = '{{url('articles'.$post->id)}}';">Details</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </section>
            <!-- Articles End -->

        </div>
    </section>
    <!-- Article End -->

    @push('scripts')
        <script>
            function toggleFavourite(heart) {
                var post_id = heart.id;
                $.ajax({
                    url: "{{url(route('toggle-favourite'))}}",
                    type: 'post',
                    data: {_token: "{{csrf_token()}}", post_id: post_id},
                    success: function (data) {
                        if (data.status == 1) {
                            console.log(data);
                            var currentClass = $(heart).attr('class');
                            console.log(currentClass);
                            if (currentClass.includes('first')) {
                                // console.log('switch to second');
                                $(heart).removeClass('first-heart').addClass('second-heart');
                            } else {
                                // console.log('switch to first');
                                $(heart).removeClass('second-heart').addClass('first-heart');
                            }
                        }
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        alert(errorMessage);
                    }

                });

            }
        </script>
    @endpush
@stop
