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
                        <li class="breadcrumb-item"><a href="/admin">TRANG CHỦ</a></li>
                        <li class="breadcrumb-item"><a href="/admin/storys">STORY SELLERS</a></li>
                        <li class="breadcrumb-item active">THÊM STORY SELLERS</li>
                    </ol>

                </div>
            </div>

        </div>

        <div class="container page__container page-section">
            <form action="" method="POST" class="p-0 mx-auto form-data" >
                @csrf
                <div class="row mb-32pt">
                    <div class="col-lg-12">
                        <div class="page-separator">
                            <div class="page-separator__text">Thông Tin Chung</div>
                        </div>
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
                        <div class="flex" style="max-width: 100%">
                            <div class="form-group ">
                                <label class="form-label">Tên</label>
                                <div class="search-form" >
                                    <input type="text" value="{{@$data->name != '' ? @$data->name : '' }}" name="name"  class="form-control" required >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Mô Tả</label>
                                <div class="search-form" >
                                    <input type="text" value="{{@$data->description != '' ? @$data->description : '' }}" name="description"  class="form-control" required >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Khách Hàng</label>
                                <div class="search-form" >
                                    <input type="text" value="{{@$data->khachhang != '' ? @$data->khachhang : '' }}" name="khachhang"  class="form-control" required >
                                </div>
                            </div>
                            <div class="d-flex">
                            <div class="form-group col-lg-3 p-0">
                                    <label class="form-label">Gif PC:</label>
                                    
                                    <li id="images" >
                                        <input class="input_image" type="hidden" name="slide_gif_pc" id="chooseImage_inputslide_gif_pc"
                                            value="{{@$data->slide_gif_pc != '' ? @$data->slide_gif_pc : '' }}">
                                        <div id="chooseImage_divslide_gif_pc" style="display: none;">
                                            <img controls src="{{@$data->slide_gif_pc != '' ? @$data->slide_gif_pc : '' }}"
                                                id="chooseImage_imgslide_gif_pc"
                                                style="max-width: 150px; max-height:150px; border:dashed thin;"></img>
                                        </div>
                                        <div id="chooseImage_noImage_divslide_gif_pc"
                                            style="width: 150px; border: thin dashed; text-align: center; padding:70px 0px;">
                                            No image
                                        </div>
                                        <br />
                                        <input type="file" name="file_gif">
                                        
                                    </li>
                                    
                                </div>
                                
                                <div class="form-group col-lg-3 p-0">
                                    <label class="form-label">Gif Mobile:</label>
                                    
                                    <li id="images" >
                                        <input class="input_image" type="hidden" name="slide_gif_mobile" id="chooseImage_inputslide_gif_mobile"
                                            value="{{@$data->slide_gif_mobile != '' ? @$data->slide_gif_mobile : '' }}">
                                        <div id="chooseImage_divslide_gif_mobile" style="display: none;">
                                            <img controls src="{{@$data->slide_gif_mobile != '' ? @$data->slide_gif_mobile : '' }}"
                                                id="chooseImage_imgslide_gif_mobile"
                                                style="max-width: 150px; max-height:150px; border:dashed thin;"></img>
                                        </div>
                                        <div id="chooseImage_noImage_divslide_gif_mobile"
                                            style="width: 150px; border: thin dashed; text-align: center; padding:70px 0px;">
                                            No image
                                        </div>
                                        <br />
                                        <input type="file" name="file_gif_mobile">
                                    </li>
                                    
                                </div>
                                <div class="form-group col-lg-3 p-0">
                                    <label class="form-label">Background PC:</label>
                                    
                                    <li id="images" >
                                        <input class="input_image" type="hidden" name="image_pc" id="chooseImage_inputimage_pc"
                                            value="{{@$data->image_pc != '' ? @$data->image_pc : '' }}">
                                        <div id="chooseImage_divimage_pc" style="display: none;">
                                            <img controls src="{{@$data->image_pc != '' ? @$data->image_pc : '' }}"
                                                id="chooseImage_imgimage_pc"
                                                style="max-width: 150px; max-height:150px; border:dashed thin;"></img>
                                        </div>
                                        <div id="chooseImage_noImage_divimage_pc"
                                            style="width: 150px; border: thin dashed; text-align: center; padding:70px 0px;">
                                            No image
                                        </div>
                                        <br />
                                        <a href="javascript:chooseImage('image_pc');"><span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">library_add</span></a>
                                        <a href="javascript:clearImage('image_pc');"><span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">delete</span></a>
                                        
                                    </li>
                                    
                                </div>
                                <div class="form-group col-lg-3 p-0">
                                    <label class="form-label">Background Mobile:</label>
                                    
                                    <li id="images" >
                                        <input class="input_image" type="hidden" name="image_mobile" id="chooseImage_inputimage_mobile"
                                            value="{{@$data->image_mobile != '' ? @$data->image_mobile : '' }}">
                                        <div id="chooseImage_divimage_mobile" style="display: none;">
                                            <img controls src="{{@$data->image_mobile != '' ? @$data->image_mobile : '' }}"
                                                id="chooseImage_imgimage_mobile"
                                                style="max-width: 150px; max-height:150px; border:dashed thin;"></img>
                                        </div>
                                        <div id="chooseImage_noImage_divimage_mobile"
                                            style="width: 150px; border: thin dashed; text-align: center; padding:70px 0px;">
                                            No image
                                        </div>
                                        <br />
                                        <a href="javascript:chooseImage('image_mobile');"><span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">library_add</span></a>
                                        <a href="javascript:clearImage('image_mobile');"><span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">delete</span></a>
                                        
                                    </li>
                                    
                                </div>
                            </div>
                            
                            
                            
                        </div>
                    </div>
                    
                </div>


                

                <div class="row mb-32pt">
                    <div class="col-lg-12 overflow-auto">
                        <div class="page-separator">
                            <div class="page-separator__text">Danh Sách Phim</div>
                            <div class="row ml-2" role="tablist">
                                <div class="col-auto">
                                    <a @click="addRecore()"  class="btn btn-success">Thêm Video</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 align-items-center overflow-auto">
                        
                        <div :class="'flex mb-5 style-group-add hidden added_record'+item.idFile" v-for="item in listVideo" v-if="item.type != 'delete'">
                            <div class="form-group">
                                    <b class="form-label">((item.name))</b>
                            </div>
                            <a class="btnToggleShowList btn btn-success" onClick="toggleClick(this);" :rel="item.idFile">
                                <i class="fa fa-th-list" aria-hidden="true"></i>
                            </a>
                            <div :class="item.type == 'update' ? 'form-content hidden form-data-'+item.idFile : 'form-content form-data-'+item.idFile  ">
                                <div class="form-group">
                                    <label class="form-label">Tên</label>
                                    <input type="text" v-bind:name="'filesData['+item.idFile+'][name]'"
                                    class="form-control" v-model="item.name" class="form-control">
                                    <input type="hidden" v-bind:name="'filesData['+item.idFile+'][id]'"
                                    class="form-control" v-model="item.id" class="form-control" >
                                    <input type="hidden" v-bind:name="'filesData['+item.idFile+'][type]'"
                                    class="form-control" v-model="item.type" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label class="form-label">ALT SEO</label>
                                    <input type="text" v-bind:name="'filesData['+item.idFile+'][alt_seo]'"
                                    class="form-control" v-model="item.alt_seo" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">MeMe</label>
                                    <input type="text" v-bind:name="'filesData['+item.idFile+'][meme]'"
                                    class="form-control" v-model="item.meme" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Link Video Vimeo</label>
                                    <input type="text" v-bind:name="'filesData['+item.idFile+'][link_video]'"
                                    class="form-control" v-model="item.link_video" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Link Video Youtube</label>
                                    <input type="text" v-bind:name="'filesData['+item.idFile+'][link_youtube]'"
                                    class="form-control" v-model="item.link_youtube" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nội Dung</label>
                                    <div class="search-form" >
                                        <textarea type="text" v-bind:name="'filesData['+item.idFile+'][description]'" class="form-control textarea ckeditor" >((item.description))</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Video Chủ Đạo</label>
                                    <input type="checkbox" :value="item.idFile" :checked='additional == item.idFile' @change="uniqueCheck" v-bind:name="'filesData['+item.idFile+'][type_display]'">
                                </div>
                                <div class="d-flex">
                                    <div class="form-group col-lg-4 p-0">
                                        <label class="form-label">Video</label>    
                                        <li id="images" >
                                            <input class="input_image" type="hidden" v-bind:name="'filesData['+item.idFile+'][video]'" 
                                            v-bind:id="'chooseImage_inputVideo'+item.idFile" v-model="item.video">
                                            <div v-bind:id="'chooseImage_divVideo'+item.idFile" style="display: none;">
                                                <video  controls v-bind:src="item.video"
                                                v-bind:id="'chooseImage_imgVideo'+item.idFile" style="max-width: 150px; max-height:150px; border:dashed thin;"></video>
                                            </div>
                                            <div v-bind:id="'chooseImage_noImage_divVideo'+item.idFile" 
                                            style="width: 150px; border: thin dashed; text-align: center; padding:70px 0px;">
                                                No image
                                            </div>
                                            <br />
                                            <a :href="'javascript:chooseImage('+ '`Video' + item.idFile + '`);'"><span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">library_add</span></a>
                                            <a :href="'javascript:clearImage('+ '`Video' + item.idFile + '`);'"><span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">delete</span></a>
                                            
                                        </li>
                                        
                                    </div>
                                    <div class="form-group col-lg-4  p-0">
                                        <label class="form-label">Image PC</label>    
                                        <li id="images" >
                                            <input class="input_image" type="hidden" v-bind:name="'filesData['+item.idFile+'][image_pc]'" 
                                            v-bind:id="'chooseImage_inputImage'+item.idFile" v-model="item.image_pc">
                                            <div v-bind:id="'chooseImage_divImage'+item.idFile" style="display: none;">
                                                <img v-bind:src="item.image_pc"
                                                v-bind:id="'chooseImage_imgImage'+item.idFile" style="max-width: 150px; max-height:150px; border:dashed thin;"></img>
                                            </div>
                                            <div v-bind:id="'chooseImage_noImage_divImage'+item.idFile" 
                                            style="width: 150px; border: thin dashed; text-align: center; padding:70px 0px;">
                                                No image
                                            </div>
                                            <br />
                                            <a :href="'javascript:chooseImage('+ '`Image' + item.idFile + '`);'"><span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">library_add</span></a>
                                            <a :href="'javascript:clearImage('+ '`Image' + item.idFile + '`);'"><span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">delete</span></a>
                                            
                                        </li>
                                        
                                    </div>

                                    <div class="form-group col-lg-4  p-0">
                                        <label class="form-label">Image Mobile</label>
                                        <li id="images" >
                                            <input class="input_image" type="hidden" v-bind:name="'filesData['+item.idFile+'][image_mobile]'" 
                                            v-bind:id="'chooseImage_inputImageImageMobile'+item.idFile" v-model="item.image_mobile">
                                            <div v-bind:id="'chooseImage_divImageImageMobile'+item.idFile" style="display: none;">
                                                <img v-bind:src="item.image_mobile"
                                                v-bind:id="'chooseImage_imgImageImageMobile'+item.idFile" style="max-width: 150px; max-height:150px; border:dashed thin;"></img>
                                            </div>
                                            <div v-bind:id="'chooseImage_noImage_divImageImageMobile'+item.idFile" 
                                            style="width: 150px; border: thin dashed; text-align: center; padding:70px 0px;">
                                                No image
                                            </div>
                                            <br />
                                            <a :href="'javascript:chooseImage('+ '`ImageImageMobile' + item.idFile + '`);'"><span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">library_add</span></a>
                                            <a :href="'javascript:clearImage('+ '`ImageImageMobile' + item.idFile + '`);'"><span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">delete</span></a>
                                            
                                        </li>
                                        
                                    </div>
                                </div>
                                <button type="button" @click="removeRecore(item)" class="btn btn-danger">Xóa</button>
                            </div>
                        </div>
                        
                    </div>

                </div> 
                

                <button type="submit"  style="float:right; margin-bottom : 30px" class="btn btn-primary btn-submit">Lưu Lại</button>
            </form>

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

<script type="text/javascript" src="{{ asset('lib_upload/ckeditor/ckeditor.js') }}"></script> 
<script type="text/javascript" src="{{ asset('lib_upload/ckfinder/ckfinder.js') }}"></script>  
<link href="{{ asset('lib_upload/jquery-ui/css/ui-lightness/jquery-ui.css') }}" rel="stylesheet" type="text/css"/>
<script src="{{ asset('lib_upload/jquery-ui/js/jquery-ui.js') }}"></script>
<script src="{{ asset('lib_upload/jquery.slug.js') }}"></script>

<script type="text/javascript">
    //<![CDATA[

        jQuery(document).ready(function (){
        CKFinder.setupCKEditor( null, '/lib_upload/ckfinder/' );
        jQuery(".input_image[value!='']").parent().find('div').each( function (index, element){
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
        $('#chooseImage_input' + imgId).val(fileUrl)[0].dispatchEvent(new Event('input'));
        document.getElementById('chooseImage_div' + imgId).style.display = '';
        document.getElementById('chooseImage_noImage_div' + imgId).style.display = 'none';
    }

    function clearImage(imgId) {
        document.getElementById('chooseImage_img' + imgId).src = '';
        document.getElementById('chooseImage_input' + imgId).value = '';
        document.getElementById('chooseImage_div' + imgId).style.display = 'none';
        document.getElementById('chooseImage_noImage_div' + imgId).style.display = '';
    }


    function chooseFile(event)
    {   
        id= event.rel;
        imgId = id;
        console.log('chooseImage_input' + imgId);
        // You can use the "CKFinder" class to render CKFinder in a page:
        var finder = new CKFinder();
        finder.basePath = '/lib_upload/ckfinder/'; // The path for the installation of CKFinder (default = "/ckfinder/").
        finder.selectActionFunction = setFileFieldFile;
        finder.popup();
    } 
    // This is a sample function which is called when a file is selected in CKFinder.
    function setFileFieldFile( fileUrl )
    {
        document.getElementById( 'chooseImage_input' + imgId).value = fileUrl;
        $("#chooseImage_input"+ imgId).val(fileUrl)[0].dispatchEvent(new Event('input'));

    }
    function clearFile(event)
    {
        imgId= event.rel;
        document.getElementById( 'chooseImage_input' + imgId ).value = '';
        $("#chooseImage_input"+ imgId).val('')[0].dispatchEvent(new Event('input'));
    }


    function addMoreImg()
    {
        jQuery("ul#images > li.hidden").filter(":first").removeClass('hidden');
    }
    function toggleClick(e) {
        $('.form-data-'+$(e).attr('rel')).toggleClass('hidden');
    }
//]]>
</script>
<style type="text/css">
    #images { list-style-type: none; margin: 0; padding: 0;}
    #images li { margin: 10px; float: left; text-align: center;  height: 190px;}
</style>

<script type="text/javascript">
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

new Vue({
    el: '#list-data',
    data: {
        countVideo : 0,
        listVideo : [],
        additional : 0
    },
    delimiters: ["((", "))"],
    mounted() {
        @foreach($newArr as $item)
            this.countVideo = this.countVideo + 1;
            this.listVideo.push(
                {
                    id : 'new',
                    type : 'add',
                    idFile : this.countVideo,
                    name : '',
                    meme : '',
                    description : '',
                    image_pc : '',
                    image_mobile : '',
                    video : '',
                    alt_seo : '',
                    type_display : 0,
                    link_video : '',
                    link_youtube : ''
                }
            );
        @endforeach
        this.countVideo = 0;
    },
    methods: {
        uniqueCheck(e){
            this.additional = 0;
            if (e.target.checked) {
                this.additional = e.target.value;
            }
        },
        addRecore() {
            this.countVideo = this.countVideo + 1;
            $('.added_record'+this.countVideo).removeClass('hidden');
            
        },
        removeRecore(i) {
            i.type = 'delete';
        }
        
    },
});
</script>

@stop