@include('_layouts.header')

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-icon"></div>
        <span>Loading...</span>
    </div>
    <!-- ./ Preloader -->

    <!-- Sidebar group -->
    {{-- <div class="sidebar-group"> --}}

        <!-- BEGIN: Settings -->
        {{-- @include('_layouts.sidebar') --}}
        <!-- END: Settings -->

        <!-- BEGIN: Chat List -->
        <!-- END: Chat List -->

    {{-- </div> --}}
    <!-- ./ Sidebar group -->

    <!-- Layout wrapper -->
    <div class="layout-wrapper">

        <!-- Header -->
        @include('_layouts.navbar')
        <!-- ./ Header -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- begin::navigation -->
            @include('_layouts.sidebar')
            <!-- end::navigation -->

            <!-- Content body -->
            <div class="content-body">
                <!-- Content -->

                <div class="content ">
                    {{-- @include('_layouts.chardTitle') --}}

                    @yield('content')

                </div>
                <!-- ./ Content -->

                <!-- Footer -->
                @include('_layouts.footer')
                <!-- ./ Footer -->
            </div>
            <!-- ./ Content body -->
        </div>
        <!-- ./ Content wrapper -->
    </div>
    <!-- ./ Layout wrapper -->

    @include('_layouts.cssScript')
</body>

</html>
