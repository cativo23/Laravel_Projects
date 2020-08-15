<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="/dashboard"><img src="{{asset('admin/img/logo.png')}}" data-retina="true" alt="" width="150" height="36"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            @if(Auth::user()->admin)
                <li class="nav-item {{ request()->is('users*') ? ' active' : '' }}" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="{{route('admin.users.index')}}">
                        <i class="fa fa-fw fa-users"></i>
                        <span class="nav-link-text">Users</span>
                    </a>
                </li>
            @endif
            <li class="nav-item {{ request()->is('home*') ? ' active' : '' }}" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{route('admin.home')}}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Destinations">
                <a class="nav-link {{ request()->is('destinations*') ? ' active' : '' }}" href="{{route('admin.destinations.index')}}">
                    <i class="fa fa-fw fa-map-pin"></i>
                    <span class="nav-link-text">Destinations</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Download Destinations Images">
                <a class="nav-link {{ request()->is('destinations*') ? ' active' : '' }}" href="{{route('admin.download.index')}}">
                    <i class="fa fa-fw fa-file-image-o"></i>
                    <span class="nav-link-text">Download Destination Images</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Galleries">
                <a class="nav-link nav-link-collapse {{ request()->is('galleries*') ? '' : 'collapsed' }}" data-toggle="collapse" href="#collapseMylistings" data-parent="#mylistings">
                    <i class="fa fa-fw fa-image"></i>
                    <span class="nav-link-text">Galleries</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseMylistings">
                    <li>
                        <a href="{{route('admin.galleries.index')}}">Galleries</a>
                    </li>
                    <li>
                        <a href="{{route('admin.images.index')}}">Images</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reviews">
                <a class="nav-link {{ request()->is('hotels1*') ? ' active' : '' }}" href="{{route('admin.hotels1.index')}}">
                    <i class="fa fa-fw fa-hotel"></i>
                    <span class="nav-link-text">Hotels</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Things To Do">
                <a class="nav-link {{ request()->is('things2do*') ? ' active' : '' }}" href="{{route('admin.things2do.index')}}">
                    <i class="fa fa-fw fa-heart"></i>
                    <span class="nav-link-text">Things To Do</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Articles">
                <a class="nav-link nav-link-collapse {{ request()->is('articles*') ? '' : 'collapsed' }}" data-toggle="collapse" href="#swag" data-parent="#mylistings">
                    <i class="fa fa-fw fa-list"></i>
                    <span class="nav-link-text">Articles</span>
                </a>
                <ul class="sidenav-second-level collapse" id="swag">
                    <li>
                        <a href="{{route('admin.articles.index')}}">Articles</a>
                    </li>
                    <li>
                        <a href="{{route('admin.sections.index')}}">Sections</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Activities">
                <a class="nav-link" href="{{route('admin.activities.index')}}">
                    <i class="fa fa-fw fa-user"></i>
                    <span class="nav-link-text">Activities</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Servers">
                <a class="nav-link" href="{{route('admin.servers.index')}}">
                    <i class="fa fa-fw fa-desktop"></i>
                    <span class="nav-link-text">Servers</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        @component('admin.header')
        @endcomponent
    </div>
</nav>
<!-- /Navigation-->
