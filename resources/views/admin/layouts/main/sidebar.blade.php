<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(auth()->user()->image!=null)
                <img src="{{asset(auth()->user()->image)}}" class="img-circle elevation-2" alt="User Image">
                @else
                <img src="{{asset('dashboard/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                    alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                {{-- <li class="nav-header">EXAMPLES</li> --}}
                <li class="nav-item">
                    <a href="{{route('dashboard.index')}}" class="nav-link {{$class=='dashboard' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            {{__('site.dashboard')}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link {{$class=='users' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            {{__('site.users')}}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('categories.index')}}" class="nav-link {{$class=='categories' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            {{__('site.categories')}}
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>