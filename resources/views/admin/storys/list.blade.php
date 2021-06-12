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
                    <h1 class="h2 mb-0">STORY SELLERS</h1>

                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="/admin">Trang Chủ</a></li>
                        <li class="breadcrumb-item active">STORY SELLERS</li>
                    </ol>

                </div>
            </div>

            <div class="row" role="tablist">
                <div class="col-auto">
                    <a href="/admin/storys/add" class="btn btn-outline-secondary">Thêm Mới</a>
                </div>
            </div>

        </div>

        <div class="container page__container page-section">
            <div class="row mb-32pt">
                <div class="col-lg-4">
                    <div class="page-separator">
                        <div class="page-separator__text">Tìm Kiếm</div>
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="form-label m-0">Tên</label>
                        <input type="text" class="form-control search" @change="someHandlerChange()"
                                v-on:keyup.enter="someHandlerChange()" v-model="conditionName">
                            
                    </div>
                    <div class="form-group col-lg-12 btn-center">
                        <button class="btn btn-primary col-lg-12" type="button" @click="someHandlerChange()">Tìm</button>
                    </div>

                </div>
                <div class="col-lg-8 d-flex ">
                    <div class="flex" style="max-width: 100%">

                        <div class="card m-0">

                            <div class="table-responsive">

                                <table class="table mb-0 thead-border-top-0 table-nowrap">
                                    <tbody class="list" id="search">
                                        <tr v-for="item in list">
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <div class="flex title-edit mb-0  ">
                                                        <a :href="'/admin/storys/edit/' + item.id" 
                                                            class="js-lists-values-employee-name">
                                                        <p class="mb-0">((item.name))</p></a>
                                                    </div>
                                                    <div class="flex title-edit mb-0  ">
                                                        <a :href="'/admin/storys/edit/' + item.id" 
                                                            class="js-lists-values-employee-name">
                                                            <p class="mb-0">((item.description))</p>
                                                        </a>
                                                    </div>
                                                    <button class="btn btn-danger col-lg-3 mt-2" type="button" @click="deleteRecore(item)">Xóa</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer p-8pt">

                                <ul class="pagination justify-content-start pagination-xsm m-0">
                                    <li class="page-item" v-bind:class="page <= 1 ? 'disabled' : ''"
                                        @click="onPrePage()">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true" class="material-icons">chevron_left</span>
                                            <span>Prev</span>
                                        </a>
                                    </li>
                                    <li class="page-item disabled" v-if="page > 3 ">
                                        <a class="page-link" href="#">
                                            <span>...</span>
                                        </a>
                                    </li>
                                    <li class="page-item" v-for="item in listPage"
                                        v-if="page > (item - 3) && page < (item + 3) " @click="onPageChange(item)"
                                        v-bind:class="page == item ? 'active' : ''">
                                        <a class="page-link" href="#" aria-label="Page 1">
                                            <span>((item))</span>
                                        </a>
                                    </li>
                                    <li class="page-item" @click="onNextPage()"
                                        v-bind:class="page > count - 1 ? 'disabled' : ''">
                                        <a class="page-link" href="#">
                                            <span>Next</span>
                                            <span aria-hidden="true" class="material-icons">chevron_right</span>
                                        </a>
                                    </li>
                                </ul>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="error-details" style="display:none">
        <span id="copyName"></span><br>
        <span id="copyFurigana"></span><br>
        <span id="copyPhone"></span><br>
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
        groups: [],
        conditionStatus: '',
        conditionAddress: '',
        ngay_phien_dich: '',
        name_kh: '',
        ctv_pd: '',
        ctv_sale: '',
        dateOrder: '',
        type_jobs: '',
        codeJobs: ''
    },
    delimiters: ["((", "))"],
    mounted() {
        this.onLoadPagination();
    },
    methods: {
        copyClipboad(_i) {
            $('#copyName').html(_i.name);
            $('#copyFurigana').html(_i.furigana);
            $('#copyPhone').html(_i.phone);

            var $temp = $("<textarea>");
            var brRegex = /<br\s*[\/]?>/gi;
            $("body").append($temp);
            var str = $("#error-details").html().replace(brRegex, "\r");
            str = str.replace(/<\/?span[^>]*>/g,"");
            $temp.val(str).select();
            document.execCommand("copy");
            $temp.remove();

        },
        onPageChange(_p) {
            this.page = _p;
            this.onLoadPagination();
        },
        onSearch: function() {
            this.page = 1;
            this.onLoadPagination();
        },
        someHandlerChange: function() {
            this.page = 1;
            this.onLoadPagination();
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
                    url: "/admin/storys/delete/" + _i.id,
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
        clearSearch() {
            this.conditionName = '';
            this.conditionStatus = '';
            this.conditionAddress = '';
            this.dateOrder = '';
            this.ngay_phien_dich = '';
            this.name_kh = '' ;
            this.ctv_pd = '' ;
            this.type_jobs = '' ;
            this.ctv_sale = '' ;
            this.codeJobs = '';
            this.page = 1;
            this.onLoadPagination();
        },
        
        onLoadPagination() {
            this.loadingTable = 1;
            const that = this;
            let conditionSearch = '';

            if (this.conditionAddress != '') {
                conditionSearch += '&address=' + this.conditionAddress;
            }
            if (this.conditionName != '') {
                conditionSearch += '&name=' + this.conditionName;
            }
            if (this.ctv_sale != '') {
                conditionSearch += '&ctv_sale=' + this.ctv_sale;
            }
            if (this.conditionStatus != '') {
                conditionSearch += '&status=' + this.conditionStatus;
            }
            if (this.type_jobs != '') {
                conditionSearch += '&type_jobs=' + this.type_jobs;
            }
            if (this.dateOrder != '') {
                conditionSearch += '&date_start=' + this.dateOrder;
            }
            if (this.ngay_phien_dich != '') {
                conditionSearch += '&ngay_phien_dich=' + this.ngay_phien_dich;
            }
            if (this.name_kh != '') {
                conditionSearch += '&name_kh=' + this.name_kh;
            }
            if (this.ctv_pd != '') {
                conditionSearch += '&ctv_pd=' + this.ctv_pd;
            }
            if (this.codeJobs != '') {
                conditionSearch += '&code_jobs=' + this.codeJobs;
            }

            $.ajax({
                type: 'GET',
                url: "{{route('admin.getCompany')}}?page=" + this.page  + conditionSearch ,
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