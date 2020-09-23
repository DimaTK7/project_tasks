<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Navbar -->
    @include('layouts.admin.blocks.navbar')
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    @include('layouts.admin.blocks.sidebar')
    <div class="content-wrapper">
    <!-- Content Wrapper. Contains page content -->
    @section('content')
        @if(session('accessDenied'))
            @include('helpers.accessDenied')
        @endif
    @yield('content')
    <!-- /.content-wrapper -->
    </div>
    <!-- Footer -->
    @include('layouts.admin.footer')
</div>

<script src="{{mix('js/admin.js')}}"></script>

</body>
</html>
