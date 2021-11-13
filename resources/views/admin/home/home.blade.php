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
                    <h1 class="h2 mb-0">Config Home Page</h1>

                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item">Config Home Page</li>
                    </ol>

                </div>
            </div>

        </div>

        <div class="container page__container page-section">
            <form action="" method="POST" class="p-0 mx-auto"   enctype="multipart/form-data">
                @csrf
                <div class="row mb-32pt">
                    <div class="col-lg-12">
                        <div class="page-separator">
                            <div class="page-separator__text">Information PC</div>
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
                        <div class="form-group">
                            <label class="form-label">Tên Trang</label>
                            <div class="search-form" >
                                <input type="text" name="description" class="form-control" value="{{$homeConfig->description}}" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Kiểu Hiển Thị Trên PC</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="FullPage" value="1" @if($homeConfig->type == 1) checked @endif>
                                <label class="form-check-label" for="FullPage">
                                    Full Page
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="Fullhd" value="0" @if($homeConfig->type == 0) checked @endif>
                                <label class="form-check-label" for="Fullhd">
                                    Full Hd
                                </label>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="form-group col-lg-12 p-0">
                                <label class="form-label">File Video PC:</label>
                                
                                <li id="images" >
                                    <input class="input_image" type="hidden" name="file" id="chooseImage_inputfile"
                                        value="{{$homeConfig->file != '' ? $homeConfig->file : '' }}">
                                    <div id="chooseImage_divfile" style="display: none;">
                                        <video controls src="{{$homeConfig->file != '' ? $homeConfig->file : '' }}"
                                            id="chooseImage_imgfile"
                                            style="max-width: 150px; max-height:150px; border:dashed thin;"></video>
                                    </div>
                                    <div id="chooseImage_noImage_divfile"
                                        style="width: 150px; border: thin dashed; text-align: center; padding:70px 0px;">
                                        No image
                                    </div>
                                    <br />
                                    <a href="javascript:chooseImage('file');"><span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">library_add</span></a>
                                    <a href="javascript:clearImage('file');"><span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">delete</span></a>
                                    
                                </li>
                                
                            </div>
                        </div>

                        <div class="page-separator">
                            <div class="page-separator__text">Information Mobile</div>
                            <div class="row ml-2" role="tablist">
                                <div class="col-auto">
                                    <a @click="addRecore()"  class="btn btn-success">Thêm Video</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên Seller</th>
                                    <th scope="col">Vị Trí</th>
                                    <th scope="col">Seo ALT</th>
                                    <th scope="col">Tên Hợp Tác</th>
                                    <th scope="col">Link Liên Kết</th>
                                    <th scope="col">Gif</th>
                                    <th scope="col">Gif Mobile</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="sortable">
                                    <tr v-bind:rel="item.id" v-bind:id="'blockId'+item.idFile" class="ui-state-default" v-for="item in listVideo" v-bind:class="item.type == 'delete' ? 'hidden' : '' ">
                                        <th scope="row">((item.idFile))</th>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" v-bind:name="'filesHome['+item.idFile+'][name]'"
                                                class="form-control" v-model="item.name" class="form-control" >
                                                <input type="hidden" v-bind:name="'filesHome['+item.idFile+'][id]'"
                                                class="form-control" v-model="item.id" class="form-control" >
                                                <input type="hidden" v-bind:name="'filesHome['+item.idFile+'][type]'"
                                                class="form-control" v-model="item.type" class="form-control" >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" v-bind:name="'filesHome['+item.idFile+'][sor]'"
                                                class="form-control sor" v-bind:value="item.sor != '' ? item.sor : item.id"  >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" v-bind:name="'filesHome['+item.idFile+'][alt_seo]'"
                                                    class="form-control" v-model="item.alt_seo" class="form-control" >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" v-bind:name="'filesHome['+item.idFile+'][name_contact]'"
                                                class="form-control" v-model="item.name_contact" class="form-control" >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" v-bind:name="'filesHome['+item.idFile+'][link]'"
                                                class="form-control" v-model="item.link" class="form-control" >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group p-0">
                                                
                                                <li id="images" >
                                                    <input class="input_image" type="hidden" v-bind:name="'filesHome['+item.idFile+'][image]'" 
                                                    v-bind:id="'chooseImage_inputImage'+item.idFile" v-model="item.image">
                                                    <div v-bind:id="'chooseImage_divImage'+item.idFile" style="display: none;">
                                                        <img v-bind:src="item.image"
                                                        v-bind:id="'chooseImage_imgImage'+item.idFile" style="max-width: 150px; max-height:150px; border:dashed thin;"></img>
                                                    </div>
                                                    <div v-bind:id="'chooseImage_noImage_divImage'+item.idFile" 
                                                    style="width: 150px; border: thin dashed; text-align: center; padding:70px 0px;">
                                                        No image
                                                    </div>
                                                    <br />
                                                    <input type="file" v-bind:name="'file_gif['+item.idFile+']'" >
                                                    
                                                </li>
                                                
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group p-0">
                                                
                                                <li id="images" >
                                                    <input class="input_image" type="hidden" v-bind:name="'filesHome['+item.idFile+'][video_mobile]'" 
                                                    v-bind:id="'chooseImage_inputImageMb'+item.idFile" v-model="item.video_mobile">
                                                    <div v-bind:id="'chooseImage_divImageMb'+item.idFile" style="display: none;">
                                                        <img v-bind:src="item.video_mobile"
                                                        v-bind:id="'chooseImage_imgImageMb'+item.idFile" style="max-width: 150px; max-height:150px; border:dashed thin;"></img>
                                                    </div>
                                                    <div v-bind:id="'chooseImage_noImage_divImageMb'+item.idFile" 
                                                    style="width: 150px; border: thin dashed; text-align: center; padding:70px 0px;">
                                                        No image
                                                    </div>
                                                    <br />
                                                    <input type="file" v-bind:name="'file_gif_mb['+item.idFile+']'" >
                                                    
                                                </li>
                                                
                                            </div>
                                        </td>
                                        <td>
                                            <button @click="removeRecore(item)" type="button" class="btn btn-danger">Xoá</button>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>

                        
                    </div>
                    
                </div>
                
                <button type="submit" style="float:right;" class="btn btn-primary mb-5 mr-2">Thay Đổi</button>
                

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
<link href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="{{ asset('lib_upload/jquery.slug.js') }}"></script>

<script type="text/javascript">
    //<![CDATA[

    jQuery(document).ready(function (){
        CKFinder.setupCKEditor( null, '/lib_upload/ckfinder/' );
        jQuery(".input_image[value!='']").parent().find('div').each( function (index, element){
            jQuery(this).toggle();
        });
        $( "#sortable" ).sortable({
            update: function (event, ui) {
                //db id of the item sorted
                var idLast = ui.item[0].id;
                var idFirst = ui.item.next().attr("id");
                var sorLas = $('#'+idLast + ' .sor').val();
                var sorFirs = $('#'+idFirst + ' .sor').val();
                $('#'+idLast + ' .sor').val(sorFirs);
                $('#'+idFirst + ' .sor').val(sorLas);
            }
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
        listVideo : [],
        countVideo : 0
    },
    delimiters: ["((", "))"],
    mounted() {
        @foreach($listVideoMobile as $item)
            if (this.countVideo < {{$item->id}}) {
                this.countVideo = {{$item->id}};
            }
            
            this.listVideo.push(
                {
                    id : '{{$item->id}}',
                    type : 'update',
                    idFile : '{{$item->id}}',
                    name : '{{$item->name}}',
                    image : '{{$item->image}}',
                    video : '{{$item->video}}',
                    link : '{{$item->link}}',
                    sor : '{{$item->sor}}',
                    alt_seo : '{{$item->alt_seo}}',
                    video_mobile : '{{$item->video_mobile}}',
                    name_contact : '{{$item->name_contact}}',
                }
            );
        @endforeach
    },
    methods: {
        addRecore() {
            this.countVideo = this.countVideo + 1;
            this.listVideo.push(
                {
                    id : 'new',
                    type : 'add',
                    idFile : this.countVideo,
                    name : '',
                    image : '',
                    video : '',
                    link : '',
                    alt_seo : '',
                    video_mobile : '',
                    sor : this.countVideo,
                    name_contact : '',
                }
            );
        },
        removeRecore(i) {
            i.type = 'delete';
        }

    },
});
</script>

@stop