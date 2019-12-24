@extends('front.master')
@section('content')
    @inject('bloodtypes','App\Models\BloodType')
    @inject('cities','App\Models\City')
    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Donations</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <section id="navigator">
        <div class="container">
            <div>
                <a href="{{url('createDonation')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New Donation </a><br><br>

            </div>

        </div>
    </section>

    <!-- Requests Start -->
    <section id="requests">
        <div class="title">
            <h2>Donations</h2>
            <hr class="line">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    {!! Form::open(['method'=>'get']) !!}
                    {!! Form::select('blood_type_id',$bloodtypes->pluck('name','id')->toArray(),null,[
                     'class' =>'form-control',
                     'placeholder' => 'Select Blood Type'
                     ])!!}
{{--                    <select name="Type" id="">--}}
{{--                        <option value="" disabled selected>Select Blood Type</option>--}}
{{--                        <option value="AB+">AB+</option>--}}
{{--                        <option value="O">O</option>--}}
{{--                        <option value="B">B</option>--}}
{{--                    </select>--}}
                </div>
                <div class="col-lg-5">
                    {!! Form::select('city_id',$cities->pluck('name','id')->toArray(),null,[
                          'class' =>'form-control',
                          'placeholder' => 'Select City'
                      ])!!}
                </div>
                <div class="search">
                    <button type="submit"><i class="col-lg-2 fas fa-search"></i></button>
                </div>
            </div>


            @foreach($donations as $donation)
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="type">
                                    <h2>{{($donation->bloodtype)->name}}</h2>
                                </div>
                            </div>
                            <div class="data col-lg-6">
                                <h4>Name: {{ $donation->patient_name }}</h4>
                                <h4>Hospital: {{$donation->hospital_name}}</h4>
                                <h4>City: {{($donation->city)->name}}</h4>
                            </div>
                            <div class="col-lg-3">
                                <a href = "{{url('donatorDetails/'.$donation->id)}}" class="btn btn-primary">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-3">--}}
{{--                            <div class="type">--}}
{{--                                <h2>AB+</h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="data col-lg-6">--}}
{{--                            <h4>Name: Ahmed Mohamed</h4>--}}
{{--                            <h4>Hospital: Andalusia Hospitals</h4>--}}
{{--                            <h4>City: Cairo</h4>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-3">--}}
{{--                            <button onclick= "window.location.href = 'donator.html';">Details</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-3">--}}
{{--                            <div class="type">--}}
{{--                                <h2>B</h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="data col-lg-6">--}}
{{--                            <h4>Name: Ahmed Mohamed</h4>--}}
{{--                            <h4>Hospital: Andalusia Hospitals</h4>--}}
{{--                            <h4>City: Giza</h4>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-3">--}}
{{--                            <button onclick= "window.location.href = 'donator.html';">Details</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-3">--}}
{{--                            <div class="type">--}}
{{--                                <h2>AB+</h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="data col-lg-6">--}}
{{--                            <h4>Name: Ahmed Mohamed</h4>--}}
{{--                            <h4>Hospital: Andalusia Hospitals</h4>--}}
{{--                            <h4>City: Cairo</h4>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-3">--}}
{{--                            <button onclick= "window.location.href = 'donator.html';">Details</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-3">--}}
{{--                            <div class="type">--}}
{{--                                <h2>O</h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="data col-lg-6">--}}
{{--                            <h4>Name: Ahmed Mohamed</h4>--}}
{{--                            <h4>Hospital: Andalusia Hospitals</h4>--}}
{{--                            <h4>City: Giza</h4>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-3">--}}
{{--                            <button onclick= "window.location.href = 'donator.html';">Details</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-3">--}}
{{--                            <div class="type">--}}
{{--                                <h2>AB+</h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="data col-lg-6">--}}
{{--                            <h4>Name: Ahmed Mohamed</h4>--}}
{{--                            <h4>Hospital: Andalusia Hospitals</h4>--}}
{{--                            <h4>City: Cairo</h4>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-3">--}}
{{--                            <button onclick= "window.location.href = 'donator.html';">Details</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="page-num">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
        </div>
    </section>
    <!-- Requests End -->

@stop
