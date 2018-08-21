<nav class="side-nav">
    <ul>
        <li><a href="/dashboard"><i class="sidenav-icon fas fa-tachometer-alt"></i>Dashboard<i class="sidenav-arrow fas fa-angle-right"></i></a></li>
        <li><a href="/projects"><i class="sidenav-icon fas fa-list-ul"></i>Projects<i class="sidenav-arrow fas fa-angle-right"></i></a></li>
        <li><a href="/categories"><i class="sidenav-icon fas fa-list-ul"></i>Categories<i class="sidenav-arrow fas fa-angle-right"></i></a></li>
        <li><a href="/users"><i class="sidenav-icon fas fa-users"></i>Users<i class="sidenav-arrow fas fa-angle-right"></i></a></li>
        @if(Auth::user()->level_id == 1)
        <li><a href="/admins"><i class="sidenav-icon fas fa-user-shield"></i>Admins<i class="sidenav-arrow fas fa-angle-right"></i></a></li>
        @else
        <div></div>
        @endif
    </ul>
</nav>