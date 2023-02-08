@include('_partials.header')

<body>
    <!-- Left Panel -->
    @include('_partials.sidebar')
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        @include('_partials.navbar')
        <!-- /#header -->
        <!-- Content -->

        <div class="content">

            <!-- Animated -->
            @yield('content')
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        @include('_partials.footer')
    </div>
    @include('_partials.cssScript')

    @yield('script')


</body>


</html>
