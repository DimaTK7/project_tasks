<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin')}}" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AProject</span>
    </a>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Проекты
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('project.create')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Создать</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('project.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Список</p>
                        </a>
                    </li>
                </ul>
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
                            <p>Создать</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('task.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Список</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Роли и правила
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('role.create')}}" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>Создать роль</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('role.index')}}" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>Список ролей</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('permission.create')}}" class="nav-link">
                            <i class="nav-icon far fa-circle text-warning"></i>
                            <p>Создать правило</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('permission.index')}}" class="nav-link">
                            <i class="nav-icon far fa-circle text-warning"></i>
                            <p>Список правил</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>Список пользователей</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('logout')}}" class="nav-link">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p>Выйти</p>
                </a>
            </li>

        </ul>
    </nav>

    <!-- /.sidebar -->
</aside>
