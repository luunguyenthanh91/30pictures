@extends('admin.layouts.main')

@section('parentPageTitle', 'Admin')
@section('title', 'Nhân Viên')


@section('content')
<div class="main-content-inner" id="list-data">


    <div class="page-content">
        <form method="post" action="">
            @csrf
            <div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
                <h3>
                    <span class="hidden-320 ng-binding">Thêm Nhân Viên</span>
                </h3>
                <div class="toolbar">
                    <button class="btn btn-success btn-primary" type="submit">
                        <i class="icon-plus white"></i>
                        <span class="hidden-480">Thêm</span>
                    </button>
                </div>
            </div>


            <div class="page-content">
                <div class="row ">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="row clearfix">
                            @if ( @$message['status'] == 1 )
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <strong>{{  $message['message'] }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                            @endif
                            @if ( @$message['status'] === 2 )
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <strong>{{  $message['message'] }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                            @endif

                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                            @endif
                            <div class="tabbable">
                                <ul class="nav nav-tabs" id="myTab">
                                    <li class="active">
                                        <a data-toggle="tab" href="#home">
                                            <i class="green ace-icon fa fa-home bigger-120"></i>
                                            Thông Tin Cơ Bản
                                        </a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#messages">
                                            <i class="green ace-icon fa fa-picture-o bigger-120"></i>
                                            Hình Ảnh
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#roles">
                                            <i class="green ace-icon fa fa-lock bigger-120"></i>
                                            Vai Trò
                                        </a>
                                    </li>


                                </ul>

                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active row clearfix">
                                        <div class="col-lg-6 col-md-12 relative">
                                            <div class="form-group c_form_group ">
                                                <label>Họ Tên</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Họ Và Tên"
                                                        aria-label="Họ Và Tên" name="name" value="{{@old('name')}}"
                                                        aria-describedby="basic-addon1" required>
                                                </div>
                                            </div>
                                            <div class="form-group c_form_group ">
                                                <label>Mã Giới Thiệu</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control"
                                                        placeholder="Mã Giới Thiệu" aria-label="Nick Name"
                                                        name="referrer_id" value="{{@old('referrer_id')}}"
                                                        aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="form-group c_form_group ">
                                                <label>Số Điện Thoại</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Số Điện Thoại"
                                                        name="phone" value="{{@old('phone')}}"
                                                        aria-describedby="basic-addon1" required>
                                                </div>
                                            </div>

                                            <div class="form-group c_form_group ">
                                                <label>Địa Chỉ</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Địa Chỉ"
                                                        name="address" value="{{@old('address')}}"
                                                        aria-describedby="basic-addon1" required>
                                                </div>
                                            </div>
                                            <div class="form-group c_form_group">
                                                <label>Tỉnh</label>
                                                <div class="input-group">
                                                    <select class="custom-select" name="province_id" v-model="province"
                                                        @change="getDistricts()">
                                                        <option value="">Chọn Tỉnh Thành</option>
                                                        @foreach($listProvinces as $item)
                                                        <option value="{{$item->id}}" @if($item->id ==
                                                            @old('province_id')) selected
                                                            @endif>{{$item->province}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group c_form_group">
                                                <label>Quận</label>
                                                <div class="input-group">
                                                    <select class="custom-select" name="district_id" v-model="district"
                                                        @change="getWards()">
                                                        <option value="">Chọn Quận</option>
                                                        <option v-for="item in district_list" v-bind:value="item.id">
                                                            ((item.district))</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group c_form_group">
                                                <label>Phường</label>
                                                <div class="input-group">
                                                    <select class="custom-select" name="ward_id" v-model="ward">
                                                        <option value="">Chọn Phường</option>
                                                        <option v-for="item in ward_list" v-bind:value="item.id">
                                                            ((item.ward))
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-6 col-md-12 relative">
                                            <div class="form-group c_form_group ">
                                                <label>Email</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Email"
                                                        name="email" value="{{@old('email')}}"
                                                        aria-describedby="basic-addon1" required>
                                                </div>
                                            </div>


                                            <div class="form-group c_form_group">
                                                <label>Mật Khẩu</label>
                                                <div class="input-group">
                                                    <input type="password" value="{{@old('password')}}" required
                                                        class="form-control focus_pw" name="password"
                                                        aria-label="Mật Khẩu" value="" aria-describedby="basic-addon1">
                                                </div>
                                            </div>

                                            <div class="form-group c_form_group">
                                                <label>Ngày Sinh</label>
                                                <div class="input-group">
                                                    <input name="birthday" class="form-control birthday"
                                                        placeholder="Chọn Ngày" value="{{@old('birthday')}}">
                                                </div>
                                            </div>
                                            <div class="form-group c_form_group">
                                                <label>Trạng Thái</label>
                                                <div class="input-group">
                                                    <select class="custom-select" name="is_active">
                                                        <option value="1" @if(@old('is_active')==1) selected="selected"
                                                            @endif>Mở
                                                        </option>
                                                        <option value="0" @if(@old('is_active')==0) selected="selected"
                                                            @endif>Khóa
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group c_form_group">
                                                <label>Thông Báo</label>
                                                <div class="input-group">
                                                    <select class="custom-select" name="notification">
                                                        <option value="1" @if(@old('notification')==1)
                                                            selected="selected" @endif>Mở
                                                        </option>
                                                        <option value="0" @if(@old('notification')==0)
                                                            selected="selected" @endif>Khóa
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div id="messages" class="tab-pane fade row clearfix">
                                        <div class="input-group">
                                            <ul id="images">
                                                <li>
                                                    <input class="input_image" type="hidden" id="chooseImage_input1"
                                                        name="avatar"
                                                        value="{{@old('avatar') != '' ? @old('avatar') : '' }}">
                                                    <div id="chooseImage_div1" style="display: none;">
                                                        <img src="{{@old('avatar') != '' ? @old('avatar') : '' }}"
                                                            id="chooseImage_img1"
                                                            style="max-width: 150px; max-height:150px; border:dashed thin;"></img>
                                                    </div>
                                                    <div id="chooseImage_noImage_div1"
                                                        style="width: 150px; border: thin dashed; text-align: center; padding:70px 0px;">
                                                        No image
                                                    </div>
                                                    <br />
                                                    <a href="javascript:chooseImage(1);">Choose image</a>
                                                    |
                                                    <a href="javascript:clearImage(1);">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="roles" class="tab-pane fade row clearfix">
                                        @foreach($listRoles as $item)
                                        <div class="col-lg-2 col-md-6 relative">
                                            <div class="checkbox">
                                                <label>
                                                    <input name="role[{{$item->id}}]" @if(@old('role.'.$item->id) == 1) checked @endif type="checkbox" class="ace"
                                                        value="1" />
                                                    <span class="lbl"> {{$item->name}}</span>
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                    </div>

                                </div>
                            </div>



                        </div>


                    </div><!-- /.col -->

                </div>
            </div><!-- /.row -->
        </form>


    </div>
</div>

@stop


@section('page-script')
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/multi-select/css/multi-select.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/nouislider/nouislider.min.css') }}">
<style>
.demo-card label {
    display: block;
    position: relative;
}

.demo-card .col-lg-4 {
    margin-bottom: 30px;
}
</style>

<link href="{{ asset('js/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('js/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('js/pages/sweet-alerts.init.js') }}"></script>

<script src="{{ asset('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('assets/vendor/multi-select/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('assets/vendor/nouislider/nouislider.js') }}"></script>
<link href="{{ asset('js/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Sweet Alerts js -->
<script src="{{ asset('js/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- Sweet alert init js-->
<script src="{{ asset('js/pages/sweet-alerts.init.js') }}"></script>

<script type="text/javascript" src="{{ asset('lib_upload/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib_upload/ckfinder/ckfinder.js') }}"></script>

<script type="text/javascript">
//<![CDATA[

jQuery(document).ready(function() {
    CKFinder.setupCKEditor(null, '/lib_upload/ckfinder/');
    // jQuery( "#images" ).sortable();
    // jQuery( "#images" ).disableSelection();
    //Display images
    jQuery(".input_image[value!='']").parent().find('div').each(function(index, element) {
        jQuery(this).toggle();
    });


});
var imgId;

function chooseImage(id) {
    imgId = id;
    // You can use the "CKFinder" class to render CKFinder in a page:
    var finder = new CKFinder();
    finder.basePath = '/lib_upload/ckfinder/'; // The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = setFileField;
    finder.popup();
}
// This is a sample function which is called when a file is selected in CKFinder.
function setFileField(fileUrl) {
    document.getElementById('chooseImage_img' + imgId).src = fileUrl;
    document.getElementById('chooseImage_input' + imgId).value = fileUrl;
    document.getElementById('chooseImage_div' + imgId).style.display = '';
    document.getElementById('chooseImage_noImage_div' + imgId).style.display = 'none';
}

function clearImage(imgId) {
    document.getElementById('chooseImage_img' + imgId).src = '';
    document.getElementById('chooseImage_input' + imgId).value = '';
    document.getElementById('chooseImage_div' + imgId).style.display = 'none';
    document.getElementById('chooseImage_noImage_div' + imgId).style.display = '';
}

function addMoreImg() {
    jQuery("ul#images > li.hidden").filter(":first").removeClass('hidden');
}

//]]>
</script>
<style type="text/css">
#images {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

#images li {
    margin: 10px;
    float: left;
    text-align: center;
    height: 190px;
}
</style>

<script type="text/javascript">
$(document).ready(function() {
    $('.birthday').datepicker({
        todayBtn: "linked",
        language: "it",
        autoclose: true,
        todayHighlight: true,
        format: 'dd/mm/yyyy'
    });
});
</script>

<script type="text/javascript">
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

new Vue({
    el: '#list-data',
    data: {
        province: '{{@old("province_id")}}',
        district: '{{@old("district_id")}}',
        ward: '{{@old("ward_id")}}',
        district_list: [],
        ward_list: []
    },
    delimiters: ["((", "))"],
    mounted() {
        // this.onLoadPagination();
        if (this.province != '') {
            this.getDistricts();
            this.district = '{{@old("district_id")}}';
        }
        if (this.district != '') {
            this.getWards();
            this.ward = '{{@old("ward_id")}}';
        }
    },
    methods: {
        getWards() {
            const that = this;
            let id_ward = that.district;

            if (id_ward != '') {
                that.ward_list = [];
                that.ward = '';
                $.get("/admin/ward/list-by-district/" + id_ward).then(function(data, status) {
                    that.ward_list = data.data;
                });
            } else {
                that.ward_list = [];
                that.ward = '';
            }

        },
        getDistricts() {
            const that = this;
            let id_province = that.province;

            if (id_province != '') {
                that.ward_list = [];
                that.district_list = [];
                that.district = '';
                that.ward = '';
                $.get("/admin/district/list-by-province/" + id_province).then(function(data, status) {
                    that.district_list = data.data;
                });
            } else {
                that.ward_list = [];
                that.district_list = [];
                that.district = '';
                that.ward = '';
            }

        },
        onLoadPagination() {
            this.loadingTable = 1;
            const that = this;
            $.ajax({
                type: 'GET',
                url: "{{route('admin.getSuppliers')}}?page=" + this.page + "&name=" + this
                    .conditionName,
                success: function(data) {
                    if (data.count > 0) {
                        data.data.map(item => {
                            item.edit = 1;
                        });
                        that.count = data.pageTotal;
                        that.list = data.data;
                    } else {
                        that.count = 0;
                        that.list = [];
                    }
                    that.loadingTable = 0;
                    let pageArr = [];
                    if (that.page - 2 > 0) {
                        pageArr.push(that.page - 2);
                    }
                    if (that.page - 1 > 0) {
                        pageArr.push(that.page - 1);
                    }
                    pageArr.push(that.page);
                    if (that.page + 1 <= that.count) {
                        pageArr.push(that.page + 1);
                    }
                    if (that.page + 2 <= that.count) {
                        pageArr.push(that.page + 2);
                    }
                    that.listPage = pageArr;
                },
                error: function(xhr, textStatus, error) {
                    Swal.fire({
                        title: "Có lỗi dữ liệu nhập vào!",
                        type: "warning",

                    });
                }
            });
        },
    },
});
</script>
@stop