<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <base href="">
    <title>{{ $title ?? 'Default Title' }}</title>
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
    <link rel="shortcut icon" href="{{ asset('images/vtc-logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('admin_assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin_assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin_assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/pre.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <div class="container-fluid p-0">
                <header class="d-flex justify-content-between align-items-center p-5 text-white fixed-top shadow"
                    style="background-color:#d6e542;">
                    <div class="logo">
                        <a href="{{ route('welcome') }}">
                            <img src="{{ asset('images/vtc-logo.png') }}" alt="Logo"
                                style="height: auto; width: 75px;">
                        </a>
                    </div>
                    @if (Auth::check())
                        @php
                            $user = Auth::user();
                        @endphp
                        @if ($user->hasRole('admin'))
                            <div class="dashboard">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-dark"
                                    style="background-color: #1fa6dd">Go to Dashboard</a>
                            </div>
                        @elseif ($user->hasRole('editor'))
                            <div class="dashboard">
                                <a href="{{ route('editor.dashboard') }}" class="btn btn-dark"
                                    style="background-color: #1fa6dd">Go to Dashboard</a>
                            </div>
                        @else
                            <div class="dashboard">
                                <a href="{{ route('user.dashboard') }}" class="btn btn-dark"
                                    style="background-color: #1fa6dd">Go to Dashboard</a>
                            </div>
                        @endif
                    @else
                        <div class="login">
                            <a href="{{ route('login') }}" class="btn btn-dark"
                                style="background-color: #1fa6dd">Login</a>
                        </div>
                    @endif
                </header>

                <section class="hero pt-5 shadow-sm" style="padding-top: 5rem; margin-top: 5.2rem;">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                                aria-label="Slide 4"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('images/banner01.png') }}" class="d-block w-100" alt="Slide 1">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/banner02.png') }}" class="d-block w-100" alt="Slide 2">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/banner03.png') }}" class="d-block w-100" alt="Slide 3">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/banner04.png') }}" class="d-block w-100" alt="Slide 4">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </section>
                <style>
                    .carousel-control-prev-icon,
                    .carousel-control-next-icon {
                        background-color: black;
                    }
                </style>

                <section class="bookshelf mt-5 p-4 shadow-sm">
                    <div style="position:relative;padding-top:max(60%,324px);width:100%;height:0;"><iframe
                            style="position:absolute;border:none;width:100%;height:100%;left:0;top:0;"
                            src="https://fliphtml5.com/bookcase/edihj/" seamless="seamless" scrolling="no"
                            frameborder="0" allowtransparency="true" allowfullscreen="true"></iframe></div>
                </section>
                <section class="events mt-5 p-4 shadow-sm" style="background-color: #f8f9fa;">
                    <div class="container">
                        <h2 class="mb-4 text-center display-6"
                            style="color:#d6e542; font-family: 'Cursive', sans-serif;">
                            UPCOMING <span class="text-dark" style="font-family: 'Cursive', sans-serif;">EVENTS</span>
                        </h2>
                        <div class="row">
                            @forelse($events as $event)
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100 shadow">
                                        <img src="{{ $event->image }}" class="card-img-top"
                                            alt="{{ $event->title }}">
                                        <div class="card-body">
                                            <h5 class="card-title" style="color:#d6e542;">{{ $event->title }}</h5>
                                            <p class="card-text text-dark">{{ Str::limit($event->summary, 100) }}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="card-text text-muted mt-2 mb-0"><small>Event Date:
                                                        {{ $event->date->format('M d, Y') }}</small></p>
                                                <a href="{{ route('event.show', $event->id) }}"
                                                    style="color:#d6e542; text-decoration: underline;">Read More>>></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center">No Events available.</p>
                            @endforelse
                        </div>
                    </div>
                </section>


                <section class="news mt-5 p-4 shadow-sm" style="background-color: #f8f9fa;">
                    <div class="container">
                        <h2 class="mb-4 text-center display-6"
                            style="color:#d6e542; font-family: 'Cursive', sans-serif;">
                            LATEST <span class="text-dark" style="font-family: 'Cursive', sans-serif;">NEWS</span>
                        </h2>
                        <div class="row">
                            @forelse($blogs as $blog)
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100 shadow">
                                        <img src="{{ $blog->image }}" class="card-img-top"
                                            alt="{{ $blog->title }}">
                                        <div class="card-body">
                                            <h5 class="card-title" style="color:#d6e542;">{{ $blog->title }}</h5>
                                            <p class="card-text text-dark">{{ Str::limit($blog->summary, 100) }}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="card-text text-muted mt-2 mb-0"><small>Published on
                                                        {{ $blog->created_at->format('M d, Y') }}</small></p>
                                                <a href="{{ route('blog.show', $blog->slug) }}"
                                                    style="color:#d6e542; text-decoration: underline;">Read More>>></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center">No News available.</p>
                            @endforelse
                        </div>
                    </div>
                </section>

                <footer class="mt-5 text-white p-5 text-center shadow" style="background-color:#d6e542;">
                    <p>&copy; {{ date('Y') }} Vocational Training Council. All rights reserved.</p>
                </footer>
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
    <script src="{{ asset('admin_assets/js/custom/apps/user-management/users/list/table.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom/apps/file-manager/list.js') }}"></script>
    @include('sweetalert::alert')
</body>

</html>
