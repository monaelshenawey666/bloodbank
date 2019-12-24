@extends('front.master')
@section('content')

    <!-- Navigator Start -->
    <section id="navigator">

        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-main" style="color: darkred; display:inline-block;">/ Donations</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Donator Details</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- donator Start -->
    <section id="donator">


        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th>Name:</th>
                            <td>{{ $donation->patient_name }}</td>
                        </tr>
                        <tr>
                            <th>Age:</th>
                            <td>{{ $donation->patient_age }}</td>
                        </tr>
                        <tr>
                            <th>Hospital:</th>
                            <td>{{ $donation->hospital_name }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th>Blood Type:</th>
                        <td>{{($donation->bloodtype)->name}}</td>
                    </tr>
                    <tr>
                        <th>Number of Required Blood Bags:</th>
                        <td>{{ $donation->bages_num }}</td>
                    </tr>
                    <tr>
                        <th>Phone:</th>
                        <td>+{{ $donation->patient_phone }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <th>Hospital Address:</th>
                        <td>{{ $donation->hospital_address }}</td>
                    </tr>
                </table>
            </div>
            </div>
            <div class="details-container">
                <p>{{ $donation->details }}
                </p>
            </div>

            <div class="show-map">
                <iframe
                    width="100%"
                    height="350"
                    frameborder="0"
                    scrolling="no"
                    marginheight="0"
                    marginwidth="0"
                    src="https://maps.google.com/maps?q={{$donation->latitude}},{{$donation->longitude}}&hl=es&z=17&amp;output=embed"
                >
                </iframe>
            </div>
        </div>
    </section>
    <!-- Who End -->
@stop
