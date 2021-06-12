@extends('fe.layouts.master')

@section('parentPageTitle', 'Dashboard')
@section('title', 'Index')


@section('content')

    
        <!-- Page Banner Section Start -->
        <div class="page-banner-section section bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col">
                        
                        <div class="page-banner text-center">
                            <h1>Test Company, Inc</h1>
                            <ul class="page-breadcrumb">
                                <li><a href="/">Home</a></li>
                                <li>About</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Banner Section End -->

        <!--About Us Area Start-->
        <div class="about-us-area section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 mb-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <!--About Us Image Start-->
                        <div class="about-us-img-wrapper mb-30 mb-xs-15">
                            <div class="about-us-image img-full">
                                <a href="#"><img src="{{ asset('fe/assets/images/about/about-1.jpg') }}" alt=""></a>
                            </div>
                        </div>
                        <!--About Us Image End-->
                    </div>
                    <div class="col-lg-6 col-12">
                        <!--About Us Content Start-->
                        <div class="about-us-content">
                            <h2>Votes</h2>
                            <p class="mb-20">
                                Do you agree to continue voting?    
                            </p>
                            <a href="/check-zipcode/{{$slug}}" class="btn">Yes</a>
                            <a href="/contact.html" class="btn btn-danger">No</a>
                        </div>
                        <!--About Us Content End-->
                    </div>
                </div>
            </div>
        </div>
        <!--About Us Area End-->

    
@stop