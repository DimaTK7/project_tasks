<nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark">
<!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('admin')}}" class="nav-link">@lang('app.Administration')</a>
        </li>
        <form class="" action="{{url('/locale')}}" method="post">
            @csrf
            Locale:
            <select class="" name="locale" onchange="this.form.submit()">
                <option value="en" >English</option>
                <option value="ru" >Russian</option>
            </select>
        </form>
</nav>
