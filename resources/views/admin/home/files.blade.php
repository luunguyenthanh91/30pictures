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
        <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
            <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

                <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                    <h1 class="h2 mb-0">Manager Files</h1>

                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item">Manager Files</li>
                    </ol>

                </div>
            </div>

        </div>

        <div class="container page__container page-section">
            <!-- ckfinder -->

            <div id="ckfinder1"></div>

            <input type="text" size="48" name="url" id="url" /> <button onclick="openPopup()">Select file</button>


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
<link href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="{{ asset('lib_upload/jquery.slug.js') }}"></script>
<script type="text/javascript" language="javascript" src=" {{ asset('ckfinder/ckfinder.js') }}"></script>

<script>
    function openPopup() {
        CKFinder.popup({
            chooseFiles: true,
            onInit: function(finder) {
                finder.on('files:choose', function(evt) {
                    var file = evt.data.files.first();
                    document.getElementById('url').value = file.getUrl();
                });
                finder.on('file:choose:resizedImage', function(evt) {
                    document.getElementById('url').value = evt.data.resizedUrl;
                });
            }
        });
    }
</script>


<script type="text/javascript">
    //<![CDATA[

    jQuery(document).ready(function() {

    });


    //]]>
</script>




@stop