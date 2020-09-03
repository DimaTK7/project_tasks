<nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark">
<!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('admin')}}" class="nav-link">@lang('app.Administration')</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('language', 'en')}}" class="nav-link">en</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('language', 'ru')}}" class="nav-link">ru</a>
        </li>
    </ul>
</nav>
