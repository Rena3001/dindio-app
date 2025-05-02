<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- ===============================================-->
<!--    Document Title-->
<!-- ===============================================-->


<!-- ===============================================-->
<!--    Favicons-->
<!-- ===============================================-->
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('admin/assets/img/elektrod_logo.svg')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('admin/assets/img/elektrod_logo.svg')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin/assets/img/elektrod_logo.svg')}}">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets/img/elektrod_logo.svg')}}">
<link rel="manifest" href="{{asset('admin/assets/img/favicons/manifest.json')}}">
<meta name="msapplication-TileImage" content="{{asset('admin/assets/img/elektrod_logo.svg')}}">
<meta name="theme-color" content="#ffffff">
<script src="{{asset('admin/assets/vendors/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('admin/assets/js/config.js')}}"></script>

<!-- ===============================================-->
<!--    Stylesheets-->
<!-- ===============================================-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
<link href="{{asset('admin/assets/vendors/simplebar/simplebar.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/assets/css/theme.min.css')}}" type="text/css" rel="stylesheet" id="style-default">
<link href="{{asset('admin/assets/css/user.min.css')}}" type="text/css" rel="stylesheet" id="user-style-default">
<script>
var phoenixIsRTL = window.config.config.phoenixIsRTL;
if (phoenixIsRTL) {
    var linkDefault = document.getElementById('style-default');
    var userLinkDefault = document.getElementById('user-style-default');
    linkDefault.setAttribute('disabled', true);
    userLinkDefault.setAttribute('disabled', true);
    document.querySelector('html').setAttribute('dir', 'rtl');
}
</script>


<link href="{{ asset('admin/assets/css/custom.css') }}" type="text/css" rel="stylesheet" id="user-style-default">