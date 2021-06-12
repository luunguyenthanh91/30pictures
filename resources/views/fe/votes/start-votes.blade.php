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
                            <h1>Vote</h1>
                            <ul class="page-breadcrumb">
                                <li><a href="/">Home</a></li>
                                <li>Vote</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Banner Section End -->

        
        <!--Contact section start-->
        <div class="conact-section section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45  pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="container">
               
                <div class="row">
                    <div class="col-lg-3 col-12">
                        <div class="contact-information">
                            <h3>Contact Information</h3>
                            <ul>
                                <li>
                                    <span class="icon"><i class="pe-7s-map"></i></span>
                                    <span class="text"><span>Stock Building, 125 Main Street 1st Lane, San Francisco, USA</span></span>
                                </li>
                                <li>
                                    <span class="icon"><i class="pe-7s-call"></i></span>
                                    <span class="text"><a href="#">(001) 24568 365 987)</a><a href="#">(001) 65897 569 784)</a></span>
                                </li>
                                <li>
                                    <span class="icon"><i class="pe-7s-mail-open"></i></span>
                                    <span class="text"><a href="#">infor@example.com</a><a href="#">www.example.com</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="contact-form-wrap">
                            <div class="about-us-content">
                                <h2>Onconova Therapeutics Inc. Special Meeting</h2>
                                
                                <a class="btn" href="/votes/confirm-form/{{$slug}}"><span>Click here to vote now!</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!--Contact section end-->

     
    
@stop