<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16" style="color: #4595ed">
            <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
        </svg>
        <a class="c-sidebar-brand-full h4" href="#"> EpiCRM </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                Home
            </a>
        </li>

        @can('tenant_management_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.tenants.index") }}" class="c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-user">

                    </i>
                    Tenant management
                </a>
            </li>
        @endcan

        @can('user_management_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-user">

                    </i>
                    User management
                </a>
            </li>
        @endcan

        @can('role_management_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-user">

                    </i>
                    Role management
                </a>
            </li>
        @endcan

        @can('asset_group_management_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.asset-groups.index") }}" class="c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-list">

                    </i>
                    Asset groups management
                </a>
            </li>
        @endcan

        @can('asset_management_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.assets.index") }}" class="c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-industry">

                    </i>
                    Asset management
                </a>
            </li>
        @endcan

        @can('image_management_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.images.index") }}" class="c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-image">

                    </i>
                    Image management
                </a>
            </li>
        @endcan

        @can('document_management_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.documents.index") }}" class="c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-file">

                    </i>
                    Document management
                </a>
            </li>
        @endcan


        @can('note_management_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.notes.index") }}" class="c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sticky-note">

                    </i>
                    Note management
                </a>
            </li>
        @endcan


        <!--junior Leads management-->
        @can('lead_management_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.leads.index") }}" class="c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sticky-note">

                    </i>
                    Lead management
                </a>
            </li>
        @endcan


        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.profile.edit") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-user">

                </i>
                My profile
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                Logout
            </a>
        </li>
    </ul>

</div>
