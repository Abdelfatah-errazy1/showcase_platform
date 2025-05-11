<!DOCTYPE html>
<html lang="en">
<head>
    <base href="">
    <title>EZD Showcase Platform</title>
    <meta charset="utf-8" />
    <meta name="description" content="Showcase platform for web development projects with demos, downloads, and documentation." />
    <meta name="keywords" content="EZD, showcase, portfolio, web development, Laravel, projects" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="EZD Showcase Platform" />
    <meta property="og:url" content="https://ezdpro.com" />
    <meta property="og:site_name" content="EZD Showcase" />
    <link rel="canonical" href="https://ezdpro.com" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://ezdpro.com/fonts/poppins.css" />

    <!-- Vendor CSS -->
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!-- Global CSS -->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">

            <!-- Sidebar -->
            @include('components._navSide')

            <!-- Wrapper -->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                <!-- Header -->
                @include('components._header')

                <!-- Content -->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!-- Toolbar -->
                    @include('components._toolbar')

                    <!-- Main Content -->
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <div id="kt_content_container" class="container-xxl">
                            <!-- Your page content here -->
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                @include('components._footer')

            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>var hostUrl = "{{ asset('assets') }}/";</script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/modals/upgrade-plan.js') }}"></script>

</body>
</html>
