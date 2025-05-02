<!DOCTYPE html>
<html data-navigation-type="default" data-navbar-horizontal-shape="default" lang="en-US" dir="ltr">

<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.layout.includes.head')
    <title>
         @stack('page_title','Dindio Admin Panel')
    </title>

    @stack('css')

    <link href="{{ asset('admin/assets/css/theme.min.css') }}" type="text/css" rel="stylesheet" id="style-default">
    <link href="{{ asset('admin/assets/css/user.min.css') }}" type="text/css" rel="stylesheet" id="user-style-default">

    <link href="{{ asset('admin/assets/css/custom.css') }}" type="text/css" rel="stylesheet" id="user-style-default">
</head>

<body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        @include('admin.layout.includes.sidebar')
        <x-admin-header-component />

        <div class="content me-0">

            <h2 class="mb-2 lh-sm">
                @stack('section_title')
            </h2>
            @yield('content')
            @if (session('message'))
            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
                <div class="text-{{session('type')}} border-{{session('type')}} bg-{{session('type')}}-subtle toast hide"
                    id="liveToast" role="alert" aria-live="assertive" aria-atomic="true" autoclick>
                    <div class="toast-header text-{{session('type')}} border-{{session('type')}}">
                        <strong class="me-auto">{{session('type')=='success'?'Uğurlu əməliyyat':'Xəta'}}</strong>
                        <button class="btn ms-2 p-0" type="button" data-bs-dismiss="toast" aria-label="Close"><span
                                data-feather="x"></span></button>
                    </div>
                    <div class="toast-body">{{session('message')}}</div>
                </div>
            </div>
            @endif
            <x-admin-footer-component />

        </div>
        
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->

    @include('admin.layout.includes.foot')
    <script>
        function getCsrfToken() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        }

        // Check if it's the user's first visit by checking sessionStorage
        if (!sessionStorage.getItem('timezoneSet')) {
            document.addEventListener("DOMContentLoaded", function() {
                var timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
                fetch('/set-timezone', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': getCsrfToken()
                    },
                    body: JSON.stringify({ timezone: timezone })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'Timezone set') {
                        // Mark that the timezone has been set
                        sessionStorage.setItem('timezoneSet', 'true');
                    }
                });
            });
        }
    </script>
    @stack('js')

    <script src="{{asset('admin/assets/js/custom.js')}}"></script>
    @stack('scripts')
</body>

</html>
