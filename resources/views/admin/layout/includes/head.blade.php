<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- ===============================================-->
<!--    Document Title-->
<!-- ===============================================-->

<!-- ===============================================-->
<!--    Favicons-->
<!-- ===============================================-->
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('admin/assets/img/favicons/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('admin/assets/img/elektrod_logo.svg') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/assets/img/elektrod_logo.svg') }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/assets/img/elektrod_logo.svg') }}">
<link rel="manifest" href="{{ asset('admin/assets/img/favicons/manifest.json') }}">
<meta name="msapplication-TileImage" content="{{ asset('admin/assets/img/favicons/mstile-150x150.png')}}">
<meta name="theme-color" content="#ffffff">

<!-- Summernote Plugin -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<!--  -->
<script src="{{ asset('admin/assets/vendors/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/config.js') }}"></script>

<!-- ===============================================-->
<!--    Stylesheets-->
<!-- ===============================================-->
<link rel="preconnect" href="{{ asset('admin/https://fonts.googleapis.com') }}">
<link rel="preconnect" href="{{ asset('admin/https://fonts.gstatic.com') }}" crossorigin="">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
    rel="stylesheet">
<script>
document.addEventListener('DOMContentLoaded', function() {
    var phoenixIsRTL = window.config.config.phoenixIsRTL;

    if (phoenixIsRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');


        if (linkDefault) {
            linkDefault.setAttribute('disabled', true);
        } else {
            console.error('Element with ID style-default not found');
        }

        if (userLinkDefault) {
            userLinkDefault.setAttribute('disabled', true);
        } else {
            console.error('Element with ID user-style-default not found');
        }
    }
});
</script>

{{-- <link href="{{asset('admin/assets/vendors/leaflet/leaflet.css')}}" rel="stylesheet">
<link href="{{asset('admin/assets/vendors/leaflet.markercluster/MarkerCluster.css')}}" rel="stylesheet">
<link href="{{asset('admin/assets/vendors/leaflet.markercluster/MarkerCluster.Default.css')}}" rel="stylesheet"> --}}