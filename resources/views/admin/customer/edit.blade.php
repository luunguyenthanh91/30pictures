@extends('admin.layouts.main')
@section('title', 'Dashboard')
@section('content')



<div class="mdk-drawer-layout__content page-content">

    <!-- Header -->

    @include('admin.component.header')

    <!-- // END Header -->

    <!-- BEFORE Page Content -->

    <!-- // END BEFORE Page Content -->

    <!-- Page Content -->
    <div id="list-data">
        <div
            class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
            <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

                <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                    <h1 class="h2 mb-0">Update Customer</h1>

                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item"><a href="/admin/customer">Customer</a></li>
                        <li class="breadcrumb-item active">Update Customer</li>
                    </ol>

                </div>
                
            </div>
            <div class="row" role="tablist">
                <div class="col-auto">
                    <a @click="deleteRecore('{{$id}}')"  class="btn btn-danger"><i class="material-icons">delete</i></a>
                </div>
            </div>

        </div>

        <div class="container page__container page-section">
            <div class="row mb-32pt">
                <div class="col-lg-4">
                    <div class="page-separator">
                        <div class="page-separator__text">Basic information</div>
                    </div>
                </div>
                <div class="col-lg-8 d-flex align-items-center">
                    <div class="flex" style="max-width: 100%">
                        <form action="" method="POST" class="p-0 mx-auto">
                            @csrf
                            <div class="form-group">
                                @if ( @$message && @$message['status'] === 1 )
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <strong>{{ $message['message'] }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                                @endif
                                @if ( @$message && @$message['status'] === 2 )
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{ $message['message'] }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="tenNganHang">Ctrl:</label>
                                <input type="text" name="ctrl" class="form-control" id="tenNganHang" value="{{$data->ctrl}}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="tenNganHang">Shares:</label>
                                <input type="text" name="shares" class="form-control" id="tenNganHang" value="{{$data->shares}}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="chiNhanhNganHang">Email:</label>
                                <input type="text" name="email" class="form-control" id="chiNhanhNganHang" value="{{$data->email}}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="tenNganHang">First:</label>
                                <input type="text" name="first" class="form-control" id="tenNganHang" value="{{$data->first}}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="tenNganHang">Last:</label>
                                <input type="text" name="last" class="form-control" id="tenNganHang" value="{{$data->last}}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="tenNganHang">Street:</label>
                                <input type="text" name="street" class="form-control" id="tenNganHang" value="{{$data->street}}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="soTaiKhoan">City:</label>
                                <input type="text" name="city" class="form-control" id="tenNganHang" value="{{$data->city}}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="soTaiKhoan">State:</label>
                                <input type="text" name="state" class="form-control" id="tenNganHang" value="{{$data->state}}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="soTaiKhoan">Zip:</label>
                                <input type="text" name="zip" class="form-control" id="tenNganHang" value="{{$data->zip}}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="soTaiKhoan">Link:</label>
                                <input type="text" name="link" class="form-control" id="tenNganHang" value="{{$data->link}}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="soTaiKhoan">Bycode:</label>
                                <input type="text" name="bycode" class="form-control" id="tenNganHang" value="{{$data->bycode}}">
                            </div>



                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- // END Page Content -->

    <!-- Footer -->

    @include('admin.component.footer')

    <!-- // END Footer -->

</div>
@include('admin.component.left-bar')
<!-- // END drawer-layout__content -->

<!-- Drawer -->

@stop

@section('page-script')
<link href="{{ asset('js/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('js/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('js/pages/sweet-alerts.init.js') }}"></script>

<script type="text/javascript">
    //<![CDATA[

    jQuery(document).ready(function (){
        

        $(window).keydown(function(event){
            if((event.which== 13) && ($(event.target)[0]!=$("textarea")[0])  && ($(event.target)[0]!=$("textarea")[1])  && ($(event.target)[0]!=$("textarea")[2])  && ($(event.target)[0]!=$("textarea")[3])) {
                event.preventDefault();
                return false;
            }
        });

    });
</script>

<script type="text/javascript">
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

new Vue({
    el: '#list-data',
    data: {

    },
    delimiters: ["((", "))"],
    mounted() {},
    methods: {
        deleteRecore(_i) {
            const that = this;
            Swal.fire({
                title: "X??c Nh???n",
                text: "Do you agree to delete this value?",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes!",
                cancelButtonText: "No!",
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(function(t) {
                if (t.dismiss == "cancel") {
                    return;
                }
                that.loadingTable = 1;
                $.ajax({
                    url: "/admin/customer/delete/" + _i,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                        Swal.fire({
                            title: "Delete successfuly!"
                        });
                        location.href = "/admin/customer";
                    },
                    error: function(xhr, textStatus, error) {
                        Swal.fire({
                            title: "There was an error in the input data!",
                            type: "warning",

                        });
                    }
                });

            })
        },
    },
});
</script>

@stop