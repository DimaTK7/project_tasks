<!DOCTYPE html>
<html lang="en">
@include('layouts.site.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Navbar -->
    @include('layouts.site.blocks.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.site.blocks.sidebar')
    <div class="content-wrapper">
    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->
    </div>
    <!-- Footer -->
    @include('layouts.site.footer')
</div>

<script src="{{mix('js/admin.js')}}"></script>

</body>
</html>
