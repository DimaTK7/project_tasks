<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Navbar -->
    @include('layouts.blocks.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.blocks.sidebar')

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->

    <!-- Footer -->
    @include('layouts.footer')
</div>

<script src="{{mix('js/admin.js')}}"></script>

</body>
</html>
