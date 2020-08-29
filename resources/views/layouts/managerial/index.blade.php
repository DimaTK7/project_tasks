<!DOCTYPE html>
<html lang="en">
@include('layouts.managerial.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Navbar -->
    @include('layouts.managerial.blocks.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.managerial.blocks.sidebar')
    <div class="content-wrapper">
    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->
    </div>
    <!-- Footer -->
    @include('layouts.managerial.footer')
</div>

<script src="{{mix('js/admin.js')}}"></script>

</body>
</html>
