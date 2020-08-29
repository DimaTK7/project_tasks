<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AProject</span>
    </a>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('project.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>Список проектов</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Задачи
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('task.create')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Новые</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('task.index')}}" class="nav-link">
                            <i class="nav-icon far fa-circle text-warning"></i>
                            <p>В процессе</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('task.index')}}" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>Готовые</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- /.sidebar -->
</aside>
