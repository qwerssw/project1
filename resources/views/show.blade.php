<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $hotel->name }} - Отели Беларуси</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-bottom:20px;

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
            color: #2e7d32;
        }

        /* Навигация */
        .navbar {
            max-width: 1400px;
            margin: 0 auto 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            padding: 15px 30px;
            border-radius: 50px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #402e7dff;
            text-decoration: none;
        }

        .back-btn {
            padding: 10px 25px;
            background: #402e7dff;
            color: white;
            text-decoration: none;
            border-radius: 30px;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: #1b285eff;
            transform: translateY(-2px);
        }

        /* Основной контейнер */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            background: white;
            border-radius: 30px;
            overflow: hidden;
        }

        /* Галерея */
        .gallery-section {
            position: relative;
        }

        .main-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        .thumbnail-grid {
            display: flex;
            justify-content:space-between;
            background: #f5f5f5;
            padding: 5px;
        }

        .thumbnail {
            height: 120px;
            object-fit: cover;
            cursor: pointer;
            transition: 0.3s;
            border-radius: 10px;
        }

        .thumbnail:hover {
            opacity: 0.8;
            transform: scale(0.98);
        }

        /* Контент */
        .content {
            padding: 40px;
        }

        .hotel-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            flex-wrap: wrap;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f0f0f0;
        }

        .hotel-title h1 {
            font-size: 36px;
            color: #1a1a2e;
            margin-bottom: 10px;
        }

        .hotel-meta {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        .rating {
            display: flex;
            align-items: center;
            gap: 5px;
            background: #f0f0f0;
            padding: 5px 12px;
            border-radius: 20px;
        }

        .stars {
            color: #ffc107;
            font-size: 18px;
        }

        .city {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #666;
        }

        .price-card {
            background: #1b285eff;
            padding: 20px 30px;
            border-radius: 20px;
            text-align: center;
            color: white;
        }

        .price-card .price {
            font-size: 32px;
            font-weight: bold;
        }

        .price-card .per-night {
            font-size: 14px;
            opacity: 0.9;
        }

        /* Описание */
        .description {
            margin-bottom: 40px;
        }

        .description h3 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #1a1a2e;
        }

        .description p {
            line-height: 1.8;
            color: #555;
        }

        /* Удобства */
        .amenities {
            margin-bottom: 40px;
        }

        .amenities h3 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #1a1a2e;
        }

        .amenities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
        }

        .amenity-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            background: #f8f9fa;
            border-radius: 12px;
            transition: 0.3s;
        }

        .amenity-item:hover {
            background: #e9ecef;
            transform: translateY(-2px);
        }

        .amenity-icon {
            font-size: 24px;
        }

        /* Отзывы */
        .reviews {
            margin-bottom: 40px;
        }

        .reviews h3 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #1a1a2e;
        }

        .reviews-summary {
            display: flex;
            gap: 30px;
            align-items: center;
            background: #f8f9fa;
            padding: 25px;
            border-radius: 20px;
            margin-bottom: 30px;
        }

        .average-rating {
            text-align: center;
        }

        .average-rating .big-rating {
            font-size: 48px;
            font-weight: bold;
            color: #402e7dff;
        }

        .review-card {
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 20px;
            transition: 0.3s;
        }

        .review-card:hover {
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #f0f0f0;
        }

        .review-author {
            font-weight: bold;
            color: #1a1a2e;
        }

        .review-rating {
            color: #ffc107;
        }

        .review-text {
            color: #555;
            line-height: 1.6;
        }

        /* Форма отзыва */
        .review-form {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 20px;
            margin-top: 30px;
        }

        .review-form h4 {
            font-size: 20px;
            margin-bottom: 20px;
            color: #1a1a2e;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 12px;
            font-family: inherit;
            transition: 0.3s;
        }

        .form-group input:focus, .form-group textarea:focus, .form-group select:focus {
            outline: none;
            border-color: #402e7dff;
            box-shadow: 0 0 5px rgba(64, 46, 125, 0.3);
        }

        .submit-btn {
            padding: 12px 30px;
            background: #1b285eff;
            color: white;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }

        .submit-btn:hover {
            background: #1b285eff;
            transform: translateY(-2px);
        }

        /* Кнопки действий */
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .btn-book {
            padding: 14px 35px;
            background: #4a2e7dff;
            color: white;
            border: none;
            border-radius: 40px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-book:hover {
            background: #1b5e20;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(46,125,50,0.3);
        }

        .btn-like {
            padding: 14px 35px;
            background: #83a3f5ff;
            color: white;
            border: none;
            border-radius: 40px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-like:hover {
            background: #b91c1c;
            transform: translateY(-2px);
        }

        .btn-like.liked {
            background: #16a34a;
        }

        /* Сообщения */
        .alert {
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
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
        <a href="#">О нас</a>
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



<div class="container">
    <!-- Галерея -->
    <div class="gallery-section">
        <div class="thumbnail-grid">
            @php
                $images = $hotel->images ?? collect();
                $allImages = $images->pluck('image_path')->toArray();
                if (empty($allImages) && $hotel->main_image) {
                    $allImages = [$hotel->main_image];
                }
                if (empty($allImages)) {
                    $allImages = ['https://via.placeholder.com/300x200?text=Отель'];
                }
            @endphp
            @foreach($allImages as $index => $img)
                <img src="{{ $img }}" class="thumbnail" onclick="changeImage('{{ $img }}')" alt="Фото отеля">
            @endforeach
            @for($i = count($allImages); $i < 4; $i++)
                <img src="https://via.placeholder.com/300x200?text=Отель" class="thumbnail" onclick="changeImage(this.src)" alt="Фото отеля">
            @endfor
        </div>
    </div>

    <!-- Контент -->
    <div class="content">


        @if($errors->any())
            <div class="alert alert-error">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="hotel-header">
            <div class="hotel-title">
                <h1>{{ $hotel->name }}</h1>
                <div class="hotel-meta">
                    <div class="rating">
                        <span class="stars">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $hotel->stars) ★ @else ☆ @endif
                            @endfor
                        </span>
                        <span>{{ $hotel->stars }} звезд</span>
                    </div>
                    <div class="city">
                         {{ $hotel->city }}, {{ $hotel->address ?? 'Беларусь' }}
                    </div>
                </div>
            </div>
            <div class="price-card">
                <div class="price">{{ number_format($hotel->price_per_night, 0, '.', ' ') }} BYN</div>
                <div class="per-night">за ночь</div>
            </div>
        </div>

        <!-- Описание -->
        <div class="description">
            <h3>Об отеле</h3>
            <p>{{ $hotel->description }}</p>
        </div>

        <!-- Удобства 
        @if($hotel->amenities && count($hotel->amenities) > 0)
        <div class="amenities">
            <h3>Удобства</h3>
            <div class="amenities-grid">
                @foreach($hotel->amenities as $amenity)
                    <div class="amenity-item">
                        <span class="amenity-icon"></span>
                        <span>{{ $amenity->name }}</span>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
-->
<!-- Отзывы -->
<div class="reviews">
    <h3>Отзывы гостей</h3>
    
    @php
        $comments = $hotel->comments ?? collect();
        $avgRating = $comments->avg('rating') ?? 0;
        $commentsCount = $comments->count();
    @endphp
    
   

    @forelse($comments as $comment)
        <div class="review-card">
            <div class="review-header">
                <span class="review-author">{{ $comment->user->name ?? 'Гость' }}</span>
                <span class="review-rating">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $comment->rating) ★ @else ☆ @endif
                    @endfor
                </span>
            </div>
            <div class="review-text">{{ $comment->comment }}</div>
            <small style="color: #999; display: block; margin-top: 10px;">{{ $comment->created_at->format('d.m.Y') }}</small>
        </div>
    @empty
        <p style="color: #666; text-align: center; padding: 30px;">Пока нет отзывов. Будьте первым!</p>
    @endforelse

    <!-- Форма добавления отзыва -->
    @auth
    <div class="review-form">
        <h4>Оставить отзыв</h4>
        <form method="POST" action="{{ route('comments.store', $hotel->id) }}">
            @csrf
            <div class="form-group">
                <label>Ваша оценка</label>
                <select name="rating" required>
                    <option value="5">⚝⚝⚝⚝⚝</option>
                    <option value="4">⚝⚝⚝⚝</option>
                    <option value="3">⚝⚝⚝</option>
                    <option value="2">⚝⚝</option>
                    <option value="1">⚝</option>
                </select>
            </div>
            <div class="form-group">
                <label>Ваш отзыв</label>
                <textarea name="comment" rows="4" required placeholder="Расскажите о своем опыте проживания..."></textarea>
            </div>
            <button type="submit" class="submit-btn">Отправить отзыв</button>
        </form>
    </div>
    @else
    <div class="review-form" style="text-align: center;">
        <p><a href="{{ route('login') }}">Войдите</a> или <a href="{{ route('register') }}">зарегистрируйтесь</a>, чтобы оставить отзыв</p>
    </div>
    @endauth
</div>

        <!-- Кнопки действий -->
        <div class="action-buttons">
            @auth
                <form method="POST" action="{{ route('bookings.store') }}" style="display: inline;">
                    @csrf
                    <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                    <input type="hidden" name="check_in" value="{{ date('Y-m-d', strtotime('+1 day')) }}">
                    <input type="hidden" name="check_out" value="{{ date('Y-m-d', strtotime('+3 days')) }}">
                    <button type="submit" class="btn-book">Забронировать</button>
                </form>
                <form method="POST" action="{{ route('likes.toggle', $hotel) }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-like {{ $isLiked ?? false ? 'liked' : '' }}">
                        {{ $isLiked ?? false ? 'В избранном' :  'В избранное' }}
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn-book" style="text-decoration: none; display: inline-block;">Забронировать</a>
                <a href="{{ route('login') }}" class="btn-like" style="text-decoration: none; display: inline-block;">В избранное</a>
            @endauth
        </div>
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
