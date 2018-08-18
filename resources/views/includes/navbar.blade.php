<header class="lnc-main-header">
    <div class="lnc-logo">
        <div class="hmbrgr">
            <a class="closed">
                <i class="fas fa-bars"></i>
            </a>
        </div>
        <a href="/dashboard">
            <img src="{{asset('/img/lance-logo.svg')}}" alt="Lance" id="lance">
        </a>
    </div>
    <nav class="lnc-nav">
        @guest @yield('login') @else
        <a href="" class="user-name">{{ Auth::user()->name }}</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt logout"></i>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endguest
    </nav>
</header>