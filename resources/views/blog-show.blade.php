<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <base href="">
    <title>{{ $title ?? 'Default Title' }}</title>
    <meta charset="utf-8" />
    <meta name="description" content="{{ $blog->summary }}" />
    <meta name="keywords" content="Blog, Laravel, Article" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $blog->title }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="Your Blog Site" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/vtc-logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('admin_assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed d-flex flex-column min-vh-100"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <div class="d-flex flex-column flex-root flex-grow-1">
        <div class="page d-flex flex-row flex-column-fluid flex-grow-1">
            <div class="container-fluid p-0 flex-grow-1 d-flex flex-column">
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

                <section class="blog-content pt-5 shadow-sm flex-grow-1"
                    style="padding-top: 5rem; margin-top: 6.2rem; margin-bottom: 2rem;">
                    <div class="container">
                        <h1 class="mb-5 mt-5 text-center display-6"
                            style="color:#d6e542; font-family: 'Cursive', sans-serif;">{{ $blog->title }}</h1>
                        <div class="text-center mb-4">
                            <img src="{{ $blog->image }}" alt="{{ $blog->title }}" class="img-fluid rounded"
                                style="max-width: 50%;">
                        </div>
                        <div class="blog-body text-center" style="font-size: 1.2em;">
                            {!! $blog->content !!}
                        </div>
                        <div class="text-muted m-5">
                            <small>Published on {{ $blog->created_at->format('M d, Y') }}</small>
                        </div>
                    </div>
                </section>

                <footer class="mt-5 text-white p-5 text-center shadow" style="background-color:#d6e542;">
                    <p>&copy; 2023 Your Company. All rights reserved.</p>
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
