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
                    <h1 class="h2 mb-0">Intro Page</h1>

                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item">Intro - SEO</li>
                    </ol>

                </div>
            </div>

        </div>

        <div class="container page__container page-section">
            <form action="" method="POST" class="p-0 mx-auto">
                @csrf
                <div class="row mb-32pt">
                    <div class="col-lg-12">
                        <div class="page-separator">
                            <div class="page-separator__text">Information</div>
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
                            <label class="form-label">Tên Website</label>
                            <div class="search-form" >
                                <input type="text" name="descriptionTitle" class="form-control" value="{{$titleAllPage->description}}" >
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="form-label">Background Home</label>
                            
                            <div class="search-form" >
                                <div class="bfh-colorpicker" data-name="descriptionbgHome" data-color="{{$bgHome->description}}"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Background Story</label>
                            <div class="search-form" >
                                <div class="bfh-colorpicker" data-name="descriptionbgStory" data-color="{{$bgStory->description}}"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Background Directory</label>
                            <div class="search-form" >
                                <div class="bfh-colorpicker" data-name="descriptionbgDirectory" data-color="{{$bgDirectory->description}}"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Script Footer</label>
                            <div class="search-form" >
                                <textarea type="text" name="scriptFooter" class="form-control textarea ckeditor" >{{$scriptFooter->description}}</textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Nội Dung Website</label>
                            <div class="search-form" >
                                <input type="text" name="descriptionPage" class="form-control" value="{{$description->description}}" >
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="form-group col-lg-3 p-0">
                                <label class="form-label">File Intro:</label>
                                
                                <li id="images" >
                                    <input class="input_image" type="hidden" name="file" id="chooseImage_inputfile"
                                        value="{{$introFile->file != '' ? $introFile->file : '' }}">
                                    <div id="chooseImage_divfile" style="display: none;">
                                        <img src="{{$introFile->file != '' ? $introFile->file : '' }}"
                                            id="chooseImage_imgfile"
                                            style="max-width: 150px; max-height:150px; border:dashed thin;"></img>
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


                            <div class="form-group  col-lg-3 p-0">
                                <label class="form-label">Logo Menu:</label>
                                
                                <li id="images" >
                                    <input class="input_image" type="hidden" name="imageLgR" id="chooseImage_inputimageLgR"
                                        value="{{$logoRed->image_pc != '' ? $logoRed->image_pc : '' }}">
                                    <div id="chooseImage_divimageLgR" style="display: none;">
                                        <img src="{{$logoRed->image_pc != '' ? $logoRed->image_pc : '' }}"
                                            id="chooseImage_imgimageLgR"
                                            style="max-width: 150px; max-height:150px; border:dashed thin;"></img>
                                    </div>
                                    <div id="chooseImage_noImage_divimageLgR"
                                        style="width: 150px; border: thin dashed; text-align: center; padding:70px 0px;">
                                        No image
                                    </div>
                                    <br />
                                    <a href="javascript:chooseImage('imageLgR');"><span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">library_add</span></a>
                                    <a href="javascript:clearImage('imageLgR');"><span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">delete</span></a>
                                    
                                </li>
                                
                            </div>
                            <div class="form-group  col-lg-3 p-0">
                                <label class="form-label">Logo Header:</label>
                                
                                <li id="images" >
                                    <input class="input_image" type="hidden" name="imageLgW" id="chooseImage_inputimageLgW"
                                        value="{{$logowhite->image_pc != '' ? $logowhite->image_pc : '' }}">
                                    <div id="chooseImage_divimageLgW" style="display: none;">
                                        <img src="{{$logowhite->image_pc != '' ? $logowhite->image_pc : '' }}"
                                            id="chooseImage_imgimageLgW"
                                            style="max-width: 150px; max-height:150px; border:dashed thin;"></img>
                                    </div>
                                    <div id="chooseImage_noImage_divimageLgW"
                                        style="width: 150px; border: thin dashed; text-align: center; padding:70px 0px;">
                                        No image
                                    </div>
                                    <br />
                                    <a href="javascript:chooseImage('imageLgW');"><span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">library_add</span></a>
                                    <a href="javascript:clearImage('imageLgW');"><span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">delete</span></a>
                                    
                                </li>
                                
                            </div>
                            <div class="form-group  col-lg-3 p-0">
                                <label class="form-label">Image Background Share Link:</label>
                                
                                <li id="images" >
                                    <input class="input_image" type="hidden" name="imageSeo" id="chooseImage_inputimageSeo"
                                        value="{{$imageSeo->image_pc != '' ? $imageSeo->image_pc : '' }}">
                                    <div id="chooseImage_divimageSeo" style="display: none;">
                                        <img src="{{$imageSeo->image_pc != '' ? $imageSeo->image_pc : '' }}"
                                            id="chooseImage_imgimageSeo"
                                            style="max-width: 150px; max-height:150px; border:dashed thin;"></img>
                                    </div>
                                    <div id="chooseImage_noImage_divimageSeo"
                                        style="width: 150px; border: thin dashed; text-align: center; padding:70px 0px;">
                                        No image
                                    </div>
                                    <br />
                                    <a href="javascript:chooseImage('imageSeo');"><span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">library_add</span></a>
                                    <a href="javascript:clearImage('imageSeo');"><span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">delete</span></a>
                                    
                                </li>
                                
                            </div>
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
<link href="{{ asset('lib_upload/jquery-ui/css/ui-lightness/jquery-ui.css') }}" rel="stylesheet" type="text/css"/>
<script src="{{ asset('lib_upload/jquery-ui/js/jquery-ui.js') }}"></script>
<script src="{{ asset('lib_upload/jquery.slug.js') }}"></script>
<link href="{{ asset('assets/css/bootstrap-formhelpers.min.css') }}" rel="stylesheet" media="screen">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ asset('assets/js/bootstrap-formhelpers.min.js') }}"></script>

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
    },
    delimiters: ["((", "))"],
    mounted() {
        
    },
    methods: {
        
    },
});
</script>

@stop