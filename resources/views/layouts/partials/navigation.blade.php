<header>
    <nav class="container">
        <a href="{{ url('/') }}" class="logo">
            <i class="fas fa-hotel"></i>
            MatFam Resort
        </a>
        
        <ul class="nav-links" id="navLinks">
            <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ url('/rooms') }}" class="{{ request()->is('rooms*') ? 'active' : '' }}">Rooms</a></li>
            <li><a href="{{ url('/services') }}" class="{{ request()->is('services*') ? 'active' : '' }}">Services</a></li>
            @guest
                @if (Route::has('login'))
                    <li><a href="{{ url('/about') }}" class="{{ request()->is('about*') ? 'active' : '' }}">About</a></li>
                @endif
            @else
                <li><a href="{{ url('/bookings') }}" class="{{ request()->is('bookings*') ? 'active' : '' }}">My Bookings</a></li>
            @endguest
        </ul>
        
        <div class="auth-buttons">
            @guest
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="btn btn-outline">
                        <i class="fas fa-sign-in-alt"></i>
                        Sign In
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">
                            <i class="fas fa-user-plus"></i>
                            Register
                        </a>
                    @endif
                @endif
            @else
                <div class="user-menu">
                    <span class="text-sm text-gray-600">Welcome, {{ Auth::user()->name }}</span>
                    <a href="{{ route('logout') }}" 
                       class="btn btn-primary"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            @endguest
        </div>
        
        <button class="mobile-menu-btn" id="mobileMenuBtn">
            <i class="fas fa-bars"></i>
        </button>
    </nav>
</header>
