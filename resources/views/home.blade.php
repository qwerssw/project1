<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Отели Беларуси</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #eaf3f5ff;
            color: #333;
        }

        /* Шапка */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background: white;
            border-bottom: 1px solid #eee;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            flex: 1;
        }

        .logo-icon {
            font-size: 28px;
        }

        .logo-title {
            font-weight: bold;
            font-size: 24px;
        }

        .logo-sub {
            font-size: 12px;
            color: gray;
        }

        /* Поиск посередине */
        .search-container {
            flex: 2;
            display: flex;
            justify-content: center;
        }

        .search-form {
            display: flex;
            width: 100%;
            max-width: 400px;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 12px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 30px;
            font-size: 14px;
            outline: none;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: #402e7dff;
            box-shadow: 0 0 5px rgba(64, 46, 125, 0.3);
        }

        .search-btn {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            background: #402e7dff;
            border: none;
            color: white;
            padding: 8px 20px;
            border-radius: 30px;
            cursor: pointer;
            transition: 0.3s;
        }

        .search-btn:hover {
            background: #1b285eff;
        }

        .menu {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .menu a {
            margin-left: 25px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }

        .menu a:hover {
            color: #4b2e7dff;
        }

        /* Hero секция */
        .hero {
            height: 450px;
            background: url('https://assets.hiltonstatic.com/hilton-asset-cache/image/upload/c_fill,w_1920,h_1080,q_70,f_auto,g_auto/Imagery/Renderings/Waldorf%20Astoria/M/MSQWAWA/4.png') center/cover no-repeat;
            border-radius: 25px;
            margin: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
        }

        .hero-content {
            position: relative;
            z-index: 1;
            color: white;
            max-width: 500px;
            text-align: center;
        }

        .hero-content h1 {
            font-size: 48px;
            margin-bottom: 15px;
            color: white;
        }

        .hero-content p {
            margin-bottom: 20px;
            color: white;
        }

        .hero-content button {
            padding: 12px 25px;
            border-radius: 25px;
            border: none;
            background: white;
            cursor: pointer;
            font-weight: bold;
        }

        /* Контейнер с карточками */
        .container {
            padding: 50px 40px;
            max-width: 1400px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 50px;
            color: #1a1a2e;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
            transition: all 0.4s ease;
        }

        .card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .card:hover img {
            transform: scale(1.05);
        }

        .card-body {
            padding: 25px;
        }

        .card-title {
            font-size: 18px;
            margin-bottom: 10px;
            font-weight: bold;
            color: #000000; 
        }

        .card-text {
            font-size: 14px;
            color: #555;
            margin-bottom: 15px;
        }

        .btn {
            display: inline-block;
            padding: 8px 12px;
            background: #402e7dff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #1b285eff;
        }

        .profile-icon {
            font-size: 20px;
            margin-left: 25px;
            text-decoration: none;
            color: #333;
            transition: 0.3s;
        }

        .profile-icon:hover {
            transform: scale(1.2);
            color: #2e2e7dff;
        }

        .filters {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 40px;
        }

        .filters select {
            padding: 15px 30px;
            border-radius: 25px;
            border: 1px solid #ccc;
            background: white;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            min-width: 200px;
        }

        .filters select:hover {
            border-color: #2e2e7dff;
            box-shadow: 0 4px 12px rgba(67, 46, 125, 0.2);
        }

        .filters select:focus {
            outline: none;
            border-color: #1b235eff;
            box-shadow: 0 0 5px rgba(50, 46, 125, 0.5);
        }

         .footer {
            background: #1a1a2e;
            color: #fff;
            padding: 60px 40px 30px;
            margin-top: 60px;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }

        .footer-section h3 {
            font-size: 20px;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-section h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: #402e7dff;
        }

        .footer-section p {
            line-height: 1.8;
            color: #ccc;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 12px;
        }

        .footer-section ul li a {
            color: #ccc;
            text-decoration: none;
            transition: 0.3s;
        }

        .footer-section ul li a:hover {
            color: #402e7dff;
            padding-left: 5px;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            color: #fff;
            text-decoration: none;
            transition: 0.3s;
        }

        .social-links a:hover {
            background: #402e7dff;
            transform: translateY(-3px);
        }

        .contact-info li {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            color: #ccc;
        }

        .contact-info li span:first-child {
            font-size: 16px;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 40px;
            margin-top: 40px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: #888;
            font-size: 14px;
        }

        .newsletter-form {
            display: flex;
            margin-top: 20px;
        }

        .newsletter-input {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 30px 0 0 30px;
            outline: none;
        }

        .newsletter-btn {
            padding: 12px 20px;
            background: #402e7dff;
            border: none;
            color: white;
            border-radius: 0 30px 30px 0;
            cursor: pointer;
            transition: 0.3s;
        }

        .newsletter-btn:hover {
            background: #1b285eff;
        }
    </style>
</head>
<body>

<!-- Шапка -->
<header class="header">
    <div class="logo">
        <div>
            <div class="logo-title">hotels.by</div>
        </div>
    </div>

    <!-- Поиск -->
    <div class="search-container">
        <form class="search-form" action="{{ route('search') }}" method="GET">
            <input type="text" name="q" class="search-input" placeholder="Поиск отелей, городов..." value="{{ request('q') }}">
            <button type="submit" class="search-btn">Найти</button>
        </form>
    </div>

    <nav class="menu">
        <a href="{{ route('about') }}">О нас</a>
        <a href="#">Отели</a>
        <a href="#">Отзывы</a>
        @auth
            <a href="{{ route('profile') }}" class="profile-icon"> {{ Auth::user()->name }}</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}" class="profile-icon"> Войти</a>
        @endauth
    </nav>
</header>

<!-- Hero -->
<section class="hero">
    <div class="hero-content">
        <h1>Отели для отдыха</h1>
        <p>Бронирование, подбор и лучшие предложения по всей Беларуси</p>
        <button onclick="window.location.href='{{ route('search') }}'">Начать путешествие</button>
    </div>
</section>

<div class="filters">
    <select id="cityFilter" onchange="applyFilterSort()">
        <option value="">Все города</option>
        @foreach($cities ?? [] as $city)
            <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>{{ $city }}</option>
        @endforeach
    </select>

    <select id="starsFilter" onchange="applyFilterSort()">
        <option value="">Все звезды</option>
        <option value="5" {{ request('stars') == '5' ? 'selected' : '' }}>⚝⚝⚝⚝⚝ 5 звезд</option>
        <option value="4" {{ request('stars') == '4' ? 'selected' : '' }}>⚝⚝⚝⚝ 4 звезды</option>
        <option value="3" {{ request('stars') == '3' ? 'selected' : '' }}>⚝⚝⚝ 3 звезды</option>
        <option value="2" {{ request('stars') == '2' ? 'selected' : '' }}>⚝⚝ 2 звезды</option>
        <option value="1" {{ request('stars') == '1' ? 'selected' : '' }}>⚝ 1 звезда</option>
    </select>

    <select id="sortOrder" onchange="applyFilterSort()">
        <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>По популярности</option>
        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Цена ↑</option>
        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Цена ↓</option>
        <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Название ↑</option>
        <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Название ↓</option>
    </select>
</div>

<!-- Контент -->
<div class="container">
    <h1>Популярные отели</h1>

    <div class="grid">
        @forelse($hotels as $hotel)
            <div class="card">
            <img src="{{ $hotel->images->first()->image_path ?? 'default.jpg' }}" alt="{{ $hotel->name }}">
                <div class="card-body">
                    <div class="card-title">{{ $hotel->name }}</div>
                    <div class="card-text">
                        {{ $hotel->city }} |⚝ {{ $hotel->stars }} звезд<br>
                        {{ \Illuminate\Support\Str::limit($hotel->description, 80) }}
                    </div>
                    <a href="/hotels/{{ $hotel->id }}" class="btn">Подробнее</a>
                </div>
            </div>
        @empty
            <div style="text-align: center; grid-column: 1/-1; padding: 50px;">
                <h3>Отели не найдены</h3>
                <p>Попробуйте изменить параметры поиска</p>
            </div>
        @endforelse
    </div>
    </div>
<footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h3>О нас</h3>
            <p>hotels.by — крупнейший сервис по бронированию отелей в Беларуси. Мы помогаем найти лучшие варианты проживания по выгодным ценам.</p>
            <div class="social-links">
                <a href="#"></a>
                <a href="#"></a>
                <a href="#"></a>
                <a href="#"></a>
            </div>
        </div>

        <div class="footer-section">
            <h3>Быстрые ссылки</h3>
            <ul>
                <li><a href="#">Главная</a></li>
                <li><a href="#">Все отели</a></li>
                <li><a href="#">Отзывы</a></li>
                <li><a href="#">Часто задаваемые вопросы</a></li>
                <li><a href="#">Контакты</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Контакты</h3>
            <ul class="contact-info">
                <li> <span>г. Минск, пр-т Независимости, 10</span></li>
                <li> <span>+375 (29) 123-45-67</span></li>
                <li><span>hotels@gmail.com</span></li>
                <li><span>Ежедневно с 9:00 до 21:00</span></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Подписка</h3>
            <p>Подпишитесь на наши новости и получайте лучшие предложения первыми!</p>
            <form class="newsletter-form" action="#" method="POST">
                @csrf
                <input type="email" class="newsletter-input" placeholder="Ваш email" required>
                <button type="submit" class="newsletter-btn">Подписаться</button>
            </form>
        </div>
  
</footer>

</body>
</html>
