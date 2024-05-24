<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="#"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>

                <h3 class="menu-title">Items</h3><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown {{ Request::is('*settings*') ? 'show' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="{{ Request::is('*settings*') ? 'true' : 'false' }}"> <i class="menu-icon fa fa-gears"></i>Settings</a>
                    <ul class="sub-menu children dropdown-menu {{ Request::is('*settings*') ? 'show' : '' }}">
                        <li><i class="menu-icon fa fa-gears"></i><a href="{{ route('settings.edit') }}">Edit Settings</a></li>
                    </ul>
                </li>
                
                <li class="menu-item-has-children dropdown {{ Request::is('*categories*') ? 'show' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="{{ Request::is('*categories*') ? 'true' : 'false' }}"> <i class="menu-icon fa fa-tasks"></i>Categories</a>
                    <ul class="sub-menu children dropdown-menu {{ Request::is('*categories*') ? 'show' : '' }}">
                        <li><i class="menu-icon fa fa-tasks"></i><a href="{{ route('categories.index') }}">List Categories</a></li>
                        <li><i class="menu-icon fa fa-plus"></i><a href="{{ route('categories.create') }}">Add New Category</a></li>
                    </ul>
                </li>
                
                
                <li class="menu-item-has-children dropdown {{ Request::is('*users*') ? 'show' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="{{ Request::is('*users*') ? 'true' : 'false' }}"> <i class="menu-icon fa fa-users"></i>Users</a>
                    <ul class="sub-menu children dropdown-menu {{ Request::is('*users*') ? 'show' : '' }}">
                        <li><i class="menu-icon fa fa-users"></i><a href="{{ route('users.index') }}">List Users</a></li>
                        <li><i class="menu-icon fa fa-plus"></i><a href="{{ route('users.create') }}">Add New User</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
