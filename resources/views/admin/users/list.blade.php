@extends('admin.layouts.main')

@section('parentPageTitle', 'Admin')
@section('title', 'Nhân Viên')


@section('content')
<div class="main-content-inner" id="list-data">


    <div class="page-content">
        <div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
            <h3>
                <span class="hidden-320 ng-binding">Nhân Viên</span>
            </h3>

            <div class="toolbar">
                <a class="btn btn-success btn-primary" type="button" href="{{route('admin.addUser')}}">
                    <i class="icon-plus white"></i>
                    <span class="hidden-480">Thêm</span>
                </a>
            </div>
        </div>


        <div class="page-content">
            <div class="row ">
                <div class="search-box">
                    <div class="col-sm-12">
                        <div class="col-xs-12 col-sm-6 no-padding-left">
                            <div class="input-group">

                                <input type="text" placeholder="Nhập Tên Cần Tìm" v-on:keyup.enter="onSearch"
                                    class="width-100" v-model="conditionName">
                                <span class="input-group-btn">
                                    <!-- <select  class="form-control hidden-768 ng-scope ng-pristine ng-valid"
                                        style="margin-left: 5px; width: 145px;">
                                        <option value="0" selected="selected">Đơn hàng</option>
                                        <option value="1">Đơn hàng đã xóa</option>
                                        <option value="2">Đơn hàng còn nợ</option>
                                        <option value="3">Đơn xuất trả NCC</option>
                                    </select> -->
                                    <button class="btn btn-primary" type="button" @click="onSearch"
                                        style="margin-left: 5px; z-index: 10;" title="Tìm kiếm">
                                        <i class="icon-search icon-on-right bigger-110"></i>
                                        <span class="hidden-1200"> Tìm kiếm</span>
                                    </button>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                        <div class="col-xs-12 relative">
                            <div class="loadding-table" v-if="loadingTable == 1">
                                <img src="{{ asset('assets/img/loading.gif') }}" />
                            </div>
                            <table id="simple-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="center">Hình Ảnh</th>
                                        <th class="center">Code</th>
                                        <th>Tên</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Địa Chỉ</th>
                                        <th>Tình Trạng</th>
                                        <th>Hành Động</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="item in list">
                                        
                                        <td class="center">
                                            <img src="{{ asset('templates/images/cafe.png') }}" v-if="!item.avatar" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="rounded-circle w35">
                                            <img v-bind:src="((item.avatar))" v-if="item.avatar" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="rounded-circle w35">
                                        </td>
                                        <td class="center">((item.user_code))</td>
                                        <td>
                                            <p>((item.name))</p>
                                        </td>
                                        <td>
                                            <p>((item.phone))</p>
                                        </td>
                                        <td>
                                            <p>((item.email))</p>
                                        </td>
                                        <td>
                                            <p>((item.address))</p>
                                        </td>
                                        <td>
                                            <label>
                                                <input v-on:change="updateStatus(item)" v-model="item.is_active" true-value="1" false-value="0" class="ace ace-switch ace-switch-2" type="checkbox" />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="hidden-sm hidden-xs btn-group">

                                                <a class="btn btn-xs btn-info" :href="'/admin/user/edit/' + item.id">
                                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                </a>

                                                <a class="btn btn-xs btn-danger" @click="deleteRecore(item)" >
                                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                </a>
                                                <button class="btn btn-xs btn-warning" @click="togglePermission(item)">
                                                    <i class="ace-icon fa fa-list bigger-120"></i>
                                                    Phân Quyền
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div><!-- /.span -->
                    </div><!-- /.row -->

                    <div class="hr hr-18 dotted hr-double"></div>
                    <div class="row" v-if="count > 1">
                        <div class="col-xs-12">
                            <div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button previous" v-bind:class="page <= 1 ? 'hidden' : ''"
                                        aria-controls="dynamic-table" tabindex="0" @click="onPrePage()">
                                        <a>Previous</a>
                                    </li>

                                    <li class="paginate_button" v-for="item in listPage" @click="onPageChange(item)"
                                        v-bind:class="page == item ? 'active' : ''">
                                        <a>((item))</a>
                                    </li>

                                    <li @click="onNextPage()" class="paginate_button next"
                                        v-bind:class="page > count - 1 ? 'hidden' : ''">
                                        <a>Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div><!-- /.col -->


                <div class="modal-container" v-if="permission == 2">
                    <div class="container-popup col-xs-4">
                        <div class="breadcrumbs">
                            <h3>
                                <span class="hidden-320 ng-binding">((setPeri.name))</span>
                            </h3>

                            <div class="toolbar">
                                <button class="btn btn-primary btn-primary" @click="confirmPermission" type="button" >
                                    <i class="icon-check white"></i>
                                    <span class="hidden-480">Lưu Lại</span>
                                </button>
                                <button @click="disablePermission" type="button" class="btn btn-danger btn-primary">
                                    <i class="icon-undo white"></i>
                                    <span class="hidden-480">Hủy</span>
                                </button>
                            </div>
                        </div>
                        <div class="form-horizontal col-xs-12 mt-10">
                            <div v-for="e in listPermission" class="groups-permission col-xs-12 ">
                                <div class="title-permission">
                                    <i class="fa fa-plus"  @click="toggleTree(e)" v-if="e.edit == 0"></i>
                                    <i class="fa fa-minus"  @click="toggleTree(e)" v-if="e.edit == 1"></i>
                                    <b class="title" @click="toggleTree(e)">((e.name))</b>
                                </div>
                                <div v-for="_ichild in e.childrent" v-if="e.edit == 1" class="value-permission">
                                    <input type="checkbox" v-model="_ichild.checked" true-value="1" false-value="0">
                                    <p class="title">((_ichild.name))</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- /.row -->


    </div>
</div>

@stop

@section('page-script')
<link href="{{ asset('js/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('js/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('js/pages/sweet-alerts.init.js') }}"></script>

<script type="text/javascript">
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

new Vue({
    el: '#list-data',
    data: {
        message: '',
        loadingTable: 0,
        count: 0,
        page: 1,
        list: [],
        listPage: [],
        conditionName: '',
        addModal: 1,
        nameAddData: '',
        guardAddData: '',
        groupAddData: '',
        permission : 1,
        groups: [],
        listPermission : []
    },
    delimiters: ["((", "))"],
    mounted() {
        this.onLoadPagination();
        this.onLoadGourps();
    },
    methods: {
        confirmPermission(){
            const that = this;
            that.permission = 1;
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý sửa đổi quyền không?",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Có!",
                cancelButtonText: "Không!",
                allowOutsideClick: false,
                allowEscapeKey : false
            }).then(function(t) {
                if(t.dismiss == "cancel"){
                        that.permission = 2;
                        return;
                }
                var body = { 
                    _token: CSRF_TOKEN ,
                    id : that.setPeri.id,
                    data : that.listPermission,
                };
                $.ajax({
                    type: 'POST',
                    url: '/admin/user/update-permission-role/'+that.setPeri.id,
                    data: body,
                    success: function(data){
                        that.setPeri = '';
                        that.permission = 1;
                        that.listPermission = [];
                        Swal.fire({
                            title: "Thay đổi thành công!"
                        });
                    },
                    error: function(xhr, textStatus, error){
                        Swal.fire({
                            title: "Có lỗi dữ liệu nhập vào!",
                            type: "warning",

                        });
                        that.permission = 2;
                    }
                });
                
            });
        },
        toggleTree(e){
            e.edit = e.edit == 0 ? 1 : 0;
        },
        disablePermission(){
            this.permission = 1;
        },
        togglePermission(_i) {
            const that = this;
            that.setPeri = _i;
            this.permission = this.permission == 1 ? 2 : 1;
            $.ajax({
                type: 'GET',
                url: "/admin/user/check-permission-role/"+ _i.id,
                success: function(data){
                    that.listPermission = data.data;
                },
                error: function(xhr, textStatus, error){
                    Swal.fire({
                        title: "Có lỗi dữ liệu!",
                        type: "warning",

                    });
                }
            });
        },
        updateStatus(e){
            console.log(e.is_active);
            if (e.is_active == 1) {
                $.ajax({
                    type: 'GET',
                    url: "/admin/user/active-status/"+e.id,
                    success: function(data) { },
                    error: function(xhr, textStatus, error) {
                        Swal.fire({
                            title: "Có lỗi dữ liệu!",
                            type: "warning",

                        });
                    }
                });
            } else {
                $.ajax({
                    type: 'GET',
                    url: "/admin/user/deactive-status/"+e.id,
                    success: function(data) { },
                    error: function(xhr, textStatus, error) {
                        Swal.fire({
                            title: "Có lỗi dữ liệu!",
                            type: "warning",

                        });
                    }
                });
            }
        },
        toggleAdd() {
            this.addModal = this.addModal == 1 ? 2 : 1;
        },
        confirmAddData() {
            const that = this;
            this.addModal = 1;
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý thêm giá trị này không?",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Có!",
                cancelButtonText: "Không!",
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(function(t) {
                if (t.dismiss == "cancel") {

                    that.addModal = 2;
                    return;
                }
                this.loadingTable = 1;
                var body = {
                    _token: CSRF_TOKEN,
                    name: that.nameAddData,
                    guard_name: that.guardAddData,
                    group_permission_id: that.groupAddData
                };
                $.ajax({
                    type: 'POST',
                    url: '/admin/permission/add',
                    data: body,
                    success: function(data) {
                        that.loadingTable = 0;
                        that.nameAddData = '';
                        that.guardAddData = '';
                        that.groupAddData = '';
                        that.onLoadPagination();
                        Swal.fire({
                            title: "Thay đổi thành công!"
                        });
                    },
                    error: function(xhr, textStatus, error) {
                        Swal.fire({
                            title: "Có lỗi dữ liệu nhập vào!",
                            type: "warning",

                        });
                    }
                });

            });
        },
        editRecore(_i) {
            _i.edit = 2;
        },
        confirmEditData(_i) {
            const that = this;
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý thay đổi giá trị này không?",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Có!",
                cancelButtonText: "Không!",
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(function(t) {
                if (t.dismiss == "cancel") {
                    return;
                }
                that.loadingTable = 1;
                var body = {
                    _token: CSRF_TOKEN,
                    id: _i.id,
                    name: _i.name,
                    guard_name: _i.guard_name,
                    group_permission_id: _i.group_permission_id
                };
                $.ajax({
                    type: 'POST',
                    url: '/admin/permission/edit/' + _i.id,
                    data: body,
                    success: function(data) {
                        _i.edit = 1;
                        that.loadingTable = 0;
                        that.onLoadPagination();
                        Swal.fire({
                            title: "Thay đổi thành công!"
                        });
                    },
                    error: function(xhr, textStatus, error) {
                        Swal.fire({
                            title: "Có lỗi dữ liệu nhập vào!",
                            type: "warning",

                        });
                    }
                });

            });
        },
        cancleEditRecore(_i) {
            _i.edit = 1;
        },
        deleteRecore(_i) {
            const that = this;
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý xóa giá trị này không?",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Có!",
                cancelButtonText: "Không!",
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(function(t) {
                if (t.dismiss == "cancel") {
                    return;
                }
                that.loadingTable = 1;
                $.ajax({
                    url: "/admin/user/delete/" + _i.id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                        Swal.fire({
                            title: "Đã xóa!"
                        });
                        that.loadingTable = 0;
                        that.onLoadPagination();
                    },
                    error: function(xhr, textStatus, error) {
                        Swal.fire({
                            title: "Có lỗi dữ liệu nhập vào!",
                            type: "warning",

                        });
                    }
                });

            })
        },
        onPageChange(_p) {
            this.page = _p;
            this.onLoadPagination();
        },
        onSearch: function() {
            this.page = 1;
            this.onLoadPagination();
        },
        onLoadGourps() {
            const that = this;
            $.ajax({
                type: 'GET',
                url: "{{route('admin.getGroupPermissions')}}",
                success: function(data) {
                    that.groups = data.data;
                },
                error: function(xhr, textStatus, error) {
                    Swal.fire({
                        title: "Có lỗi dữ liệu!",
                        type: "warning",

                    });
                }
            });
        },
        onLoadPagination() {
            this.loadingTable = 1;
            const that = this;
            $.ajax({
                type: 'GET',
                url: "{{route('admin.getListUser')}}?page=" + this.page + "&name=" + this
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
        onPrePage() {
            if (this.page > 1) {
                this.page = this.page - 1;
            }
            this.onLoadPagination();
        },
        onNextPage() {
            if (this.page < this.count) {
                this.page = this.page + 1;
            }
            this.onLoadPagination();
        }
    },
});
</script>
@stop