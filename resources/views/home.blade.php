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
}

.logo-icon {
    font-size: 28px;
}

.logo-title {
    font-weight: bold;
}

.logo-sub {
    font-size: 12px;
    color: gray;
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

/* Hero */
.hero-new {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 60px 40px;
    background: #f5f7fa;
    border-radius: 20px;
    margin: 30px;
}

.hero-left {
    max-width: 500px;
}

.hero-left h1 {
    font-size: 48px;
    margin-bottom: 20px;
}

.hero-left p {
    color: #666;
    margin-bottom: 25px;
}

.hero-btn {
    padding: 12px 25px;
    border: none;
    border-radius: 25px;
    background: #e0e0e0;
    cursor: pointer;
}

.hero-right img {
    width: 400px;
    border-radius: 20px;
}
        /* Навбар */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background: linear-gradient(90deg, #1a0f74ff, #6667bbff);
            color: white;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 25px;
            padding: 10px 20px;
            border-radius: 25px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .navbar a:hover {
            background: rgba(255,255,255,0.2);
            transform: translateY(-2px);
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
            color: #38609bff;
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
    color: #2e7d32;
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

    <nav class="menu">
        <a href="#">О нас</a>
        <a href="#">Каталог</a>
        <a href="#">Отзывы</a>
        <a href="/profile" class="profile-icon">👤</a>
    </nav>
</header>

<!-- Hero -->
<section class="hero">
    <div class="hero-content">
        <h1>Отели для отдыха</h1>
        <p>Бронирование, подбор и лучшие предложения по всей Беларуси</p>
        <button>Начать путешествие</button>
    </div>
</section>

<div class="filters">
    <select id="cityFilter" onchange="applyFilterSort()">
        <option value="">Все города</option>
            <option value=""></option>
        
    </select>

    <select id="categoryFilter" onchange="applyFilterSort()">
        <option value="">Все категории</option>
            <option value=""></option>
    </select>

    <select id="sortOrder" onchange="applyFilterSort()">
        <option value="default">По популярности</option>
        <option value="price_asc">Цена ↑</option>
        <option value="price_desc">Цена ↓</option>
        <option value="name_asc">Название ↑</option>
        <option value="name_desc">Название ↓</option>
    </select>
</div>

<!-- Контент -->
<div class="container">
    <h1>Популярные отели</h1>

    <div class="grid">
        @foreach($hotels as $hotel)
            <div class="card">
                <img src="{{ $hotel->image ?? 'https://via.placeholder.com/300x200' }}" alt="Отель">
                <div class="card-body">
                    <div class="card-title">{{ $hotel->name }}</div>
                    <div class="card-text">
                        {{ \Illuminate\Support\Str::limit($hotel->description, 100) }}
                    </div>
                    <a href="/hotels/{{ $hotel->id }}" class="btn">Подробнее</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
