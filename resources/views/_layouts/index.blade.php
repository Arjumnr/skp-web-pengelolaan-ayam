@include('_layouts.header')
@include('_layouts.cssScript')

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
    </div>
</body>
@include('_layouts.footer')


</html>
