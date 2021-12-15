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
                    <h1 class="h2 mb-0">Galary</h1>

                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item">Galary</li>
                    </ol>

                </div>
            </div>

        </div>

        <div class="container page__container page-section">
            <form action="" method="POST" class="p-0 mx-auto"   enctype="multipart/form-data">
                @csrf
                <div class="row mb-32pt">
                    <div class="col-lg-12">
                        
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
                        

                        <div class="page-separator">
                            <div class="page-separator__text">Information</div>
                            
                        </div>
                        <div class="form-group">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kiểu</th>
                                        <th scope="col">Thứ Tự</th>
                                        <th scope="col">Pc</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="sortable">
                                    <tr v-bind:rel="item.id" v-bind:id="'blockId'+item.idFile" class="ui-state-default" v-for="item in listVideo" v-bind:class="item.status == 'delete' ? 'hidden' : '' ">
                                        <th scope="row">((item.idFile))</th>
                                        <td>
                                            <div class="form-group">
                                                <p>((item.type == 1 ? 'Ảnh Dọc' : 'Ảnh Ngang' ))</p>
                                                <input type="hidden" v-bind:name="'filesData['+item.idFile+'][id]'"
                                                class="form-control" v-model="item.id" class="form-control" >
                                                <input type="hidden" v-bind:name="'filesData['+item.idFile+'][type]'"
                                                class="form-control" v-model="item.type" class="form-control" >
                                                <input type="hidden" v-bind:name="'filesData['+item.idFile+'][status]'"
                                                class="form-control" v-model="item.status" class="form-control" >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" v-bind:name="'filesData['+item.idFile+'][sor]'"
                                                class="form-control sor" v-bind:value="item.sor" v-model="item.sor" >
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div class="form-group p-0">
                                                <label>Image PC</label>
                                                <li id="images" >
                                                    <input class="input_image" type="hidden" v-bind:name="'filesData['+item.idFile+'][image_pc]'" 
                                                    v-bind:id="'chooseImage_inputImage'+item.idFile" v-model="item.image_pc">
                                                    <div v-bind:id="'chooseImage_divImage'+item.idFile" style="display: none;">
                                                        <img v-bind:src="item.image_pc"
                                                        v-bind:id="'chooseImage_imgImage'+item.idFile" style="max-width: 150px; max-height:150px; border:dashed thin;"></img>
                                                    </div>
                                                    <div v-bind:id="'chooseImage_noImage_divImage'+item.idFile" 
                                                    style="width: 150px; border: thin dashed; text-align: center; padding:20px 0px;">
                                                        No image
                                                    </div>
                                                    <br />
                                                    <a :href="'javascript:chooseImage('+ '`Image' + item.idFile + '`);'"><span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">library_add</span></a>
                                                    <a :href="'javascript:clearImage('+ '`Image' + item.idFile + '`);'"><span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">delete</span></a>
                                                    
                                                </li>
                                                
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group p-0">
                                                <label>Image Mobile</label>   
                                                <li id="images" >
                                                    <input class="input_image" type="hidden" v-bind:name="'filesData['+item.idFile+'][image_mobile]'" 
                                                    v-bind:id="'chooseImage_inputImageImageMobile'+item.idFile" v-model="item.image_mobile">
                                                    <div v-bind:id="'chooseImage_divImageImageMobile'+item.idFile" style="display: none;">
                                                        <img v-bind:src="item.image_mobile"
                                                        v-bind:id="'chooseImage_imgImageImageMobile'+item.idFile" style="max-width: 150px; max-height:150px; border:dashed thin;"></img>
                                                    </div>
                                                    <div v-bind:id="'chooseImage_noImage_divImageImageMobile'+item.idFile" 
                                                    style="width: 150px; border: thin dashed; text-align: center; padding:20px 0px;">
                                                        No image
                                                    </div>
                                                    <br />
                                                    <a :href="'javascript:chooseImage('+ '`ImageImageMobile' + item.idFile + '`);'"><span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">library_add</span></a>
                                                    <a :href="'javascript:clearImage('+ '`ImageImageMobile' + item.idFile + '`);'"><span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">delete</span></a>
                                                    
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

                <div class="row ml-2" role="tablist">
                    <div class="col-auto">
                        <a @click="addRecore()" class="btn btn-success">Thêm Ảnh Dọc</a>
                    </div>
                    <div class="col-auto">
                        <a @click="addRecoreWith()"  class="btn btn-success">Thêm Ảnh Ngang</a>
                    </div>
                </div>
                

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
    #images li { margin: 10px; float: left; text-align: center;  height: 50px;}
    #images li img{   height: 50px; width: 100%; object-fit: cover; object-position: center;}
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
        @foreach($listGalary as $item)
            if (this.countVideo < {{$item->id}}) {
                this.countVideo = {{$item->id}};
            }
            this.listVideo.push(
                {
                    id : '{{$item->id}}',
                    status : 'update',
                    idFile : '{{$item->id}}',
                    image_pc : '{{$item->image_pc}}',
                    image_mobile : '{{$item->image_mobile}}',
                    sor : '{{$item->sor}}',
                    type : '{{$item->type}}',
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
                    status : 'add',
                    idFile : this.countVideo,
                    image_pc : '',
                    image_mobile : '',
                    sor : '',
                    type : 1,
                }
            );
        },
        addRecoreWith() {
            this.countVideo = this.countVideo + 1;
            this.listVideo.push(
                {
                    id : 'new',
                    status : 'add',
                    idFile : this.countVideo,
                    image_pc : '',
                    image_mobile : '',
                    sor : '',
                    type : 2,
                }
            );
        },
        removeRecore(i) {
            i.status = 'delete';
        }

    },
});
</script>

@stop