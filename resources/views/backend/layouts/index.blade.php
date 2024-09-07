<!DOCTYPE html>
<html lang="en">

<head>
    <base href="">
    {{-- {!! SEOMeta::generate() !!} --}}
    <meta charset="utf-8" />
    <meta name="description"
        content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('images/Favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('admin_assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin_assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin_assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/pre.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    @livewireStyles
</head>

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            @include('backend.layouts.aside')
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('backend.layouts.header')
                <div class="container">
                    @yield('content')

                </div>
                @include('backend.layouts.footer')
            </div>
        </div>
    </div>

    <script>
        var hostUrl = "assets/";
    </script>
    <script src="{{ asset('js/pre.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('admin_assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/custom/vis-timeline/vis-timeline.bundle.js') }}"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="{{ asset('admin_assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom/utilities/modals/new-target.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom/utilities/modals/create-project/type.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom/utilities/modals/create-project/budget.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom/utilities/modals/create-project/settings.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom/utilities/modals/create-project/team.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom/utilities/modals/create-project/targets.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom/utilities/modals/create-project/files.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom/utilities/modals/create-project/complete.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom/utilities/modals/create-project/main.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom/apps/ecommerce/sales/listing.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom/account/settings/signin-methods.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('admin_assets/js/custom/apps/inbox/reply.js') }}"></script>
    @include('sweetalert::alert')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>
