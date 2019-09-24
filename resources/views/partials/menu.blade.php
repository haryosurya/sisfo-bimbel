<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a>
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('mentor_access')
                            <li class="{{ request()->is('admin/mentors') || request()->is('admin/mentors/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.mentors.index") }}">
                                    <i class="fa-fw fab fa-angellist">

                                    </i>
                                    <span>{{ trans('cruds.mentor.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('paket_access')
                <li class="{{ request()->is('admin/pakets') || request()->is('admin/pakets/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.pakets.index") }}">
                        <i class="fa-fw fas fa-book">

                        </i>
                        <span>{{ trans('cruds.paket.title') }}</span>
                    </a>
                </li>
            @endcan
            @can('murid_access')
                <li class="{{ request()->is('admin/murids') || request()->is('admin/murids/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.murids.index") }}">
                        <i class="fa-fw fas fa-user-graduate">

                        </i>
                        <span>{{ trans('cruds.murid.title') }}</span>
                    </a>
                </li>
            @endcan
            @can('jadwal_access')
                <li class="{{ request()->is('admin/jadwals') || request()->is('admin/jadwals/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.jadwals.index") }}">
                        <i class="fa-fw far fa-calendar-alt">

                        </i>
                        <span>{{ trans('cruds.jadwal.title') }}</span>
                    </a>
                </li>
            @endcan
            @can('kehadiran_access')
                <li class="{{ request()->is('admin/kehadirans') || request()->is('admin/kehadirans/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.kehadirans.index") }}">
                        <i class="fa-fw fas fa-user-check">

                        </i>
                        <span>{{ trans('cruds.kehadiran.title') }}</span>
                    </a>
                </li>
            @endcan
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>