<header class="header">
    <div class="logo">
        <div>
            <div class="logo-title">
                <a href="{{ route('home') }}" style="text-decoration: none; color: inherit;">
        hotels.by
    </a>
</div>
        </div>
    </div>

    <!-- Поиск -->
    <div class="search-container">
        <form class="search-form" action="{{ route('search') }}" method="GET">
            <input type="text" name="q" class="search-input" placeholder="{{ __('messages.search_placeholder') }}" value="{{ request('q') }}">
            <button type="submit" class="search-btn">{{ __('messages.find') }}</button>
        </form>
    </div>

    <nav class="menu">
        <a href="{{ route('about') }}">{{ __('messages.about') }}</a>
        <a href="#">{{ __('messages.hotels') }}</a>
        <a href="#">{{ __('messages.reviews') }}</a>
        <a href="{{ route('lang.switch', 'ru') }}">RU</a>
        <a href="{{ route('lang.switch', 'en') }}">EN</a>
        @auth
            <a href="{{ route('profile') }}" class="profile-icon"> {{ Auth::user()->name }}</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}" class="profile-icon"> {{ __('messages.login') }}</a>
        @endauth
    </nav>
</header>