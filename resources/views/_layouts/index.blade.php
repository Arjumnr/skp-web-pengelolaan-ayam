@include('_layouts.header')

<body>
    <!-- Left Panel -->
    @include('_layouts.sidebar')
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        @include('_layouts.navbar')
        <!-- /#header -->
        <!-- Content -->

        <div class="content">

            <!-- Animated -->
            @yield('content')
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        @include('_layouts.footer')
    </div>
    @include('_layouts.cssScript')

    @yield('script')


</body>


</html>
