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
                            <h1>Confirm Account Details</h1>
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
                                    <span class="text"><span>Call us toll free at 855-200-8272 or at 973-873-7700 if calling internationally</span></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="contact-form-wrap">
                            <h4 class="contact-title">In order to vote you must confirm the last name and zip code as it appears on your shareholder account registration. Please enter the necessary information below</h4>
                            <form id="contact-form" action="" method="post">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="contact-form-style mb-20">
                                            <input name="last" placeholder="Last Name*" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="contact-form-style mb-20">
                                            <input name="zip" placeholder="Zip Code*" type="text" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="contact-form-style">
                                            <button class="btn" type="submit"><span>Submit</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!--Contact section end-->

     
    
@stop