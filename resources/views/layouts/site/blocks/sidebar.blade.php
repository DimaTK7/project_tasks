<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('main')}}" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AProject</span>
    </a>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('main')}}" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>Список проектов</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('taskNew')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Новые</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('taskProgress')}}" class="nav-link">
                    <i class="nav-icon far fa-circle text-warning"></i>
                    <p>В процессе</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('taskDone')}}" class="nav-link">
                    <i class="nav-icon far fa-circle text-info"></i>
                    <p>Готовые</p>
                </a>
            </li>
            @if(\Illuminate\Support\Facades\Auth::check())
            <li class="nav-item">
                <a href="{{route('taskDone')}}" class="nav-link">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p>Мои задачи</p>
                </a>
            </li>
            @endif
        </ul>
    </nav>
    <!-- /.sidebar -->
</aside>
