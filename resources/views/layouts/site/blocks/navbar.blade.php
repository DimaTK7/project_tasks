<nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark">
<!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('admin')}}" class="nav-link">@lang('app.Administration')</a>
        </li>
        <form class="nav-link" action="{{url('/locale')}}" method="post">
            @csrf
            <input type="hidden" value="en" name="locale">
            <button type="submit" class="btn btn-block btn-default btn-xs">English</button>
        </form>
        <form class="nav-link" action="{{url('/locale')}}" method="post">
            @csrf
            <input type="hidden" value="ru" name="locale">
            <button type="submit" class="btn btn-block btn-default btn-xs">Русский</button>
        </form>
    </ul>
</nav>
