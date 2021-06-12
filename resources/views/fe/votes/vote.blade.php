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
                            <h1>Onconova Therapeutics Inc. Special Meeting</h1>
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
                  
                    <div class="col-lg-12 col-12">
                        <div class="contact-form-wrap">
                            @if ($error == '')
                            <form id="contact-form" action="" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>The Board of Onconova Therapeutics is requesting shareholder’s vote FOR on the following ballot items</p>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">
                                                        <div class="leftFloat">Make Your Selection</div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach( $allListVotes as $item)
                                                <tr>
                                                    <td data-label="Description" class="left" valign="top">
                                                        {{$item->name}}
                                                    </td>
                                                    <td class="form-group" style= "width : 120px;">
                                                        @if(in_array(1, $item->type))
                                                        <input type="radio" name="vote[{{$item->id}}]" value="1" class="form-control"><span > For</span><br>
                                                        @endif
                                                        @if(in_array(2, $item->type))
                                                        <input type="radio" name="vote[{{$item->id}}]" value="2" class="form-control"><span class=""> Withheld</span><br>
                                                        @endif
                                                        @if(in_array(3, $item->type))
                                                        <input type="radio" name="vote[{{$item->id}}]" value="3" class="form-control"><span class=""> Abstain</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="2">
                                                        <b>Optional: Enter Your Email Address for Vote Confirmation</b> 
                                                        <input style="width:300px;" required type="text" name="email" id="email" placeholder="Your Email for an email receipt" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b><span class="mrdirector blue">Click SUBMIT VOTE after making your selection.</span></b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="contact-form-style">
                                            <button class="btn" type="submit"><span>Update</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @endif
                            <p class="form-messege">{{$error}}</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!--Contact section end-->

     
    
@stop