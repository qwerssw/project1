<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>О нас - hotels.by</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<style>
     * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    body {
        font-family: 'Inter', sans-serif;
        margin: 0;
        background: #fff;
        color: #222;
        line-height: 1.6;
    }
       /* Шапка */
  .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0px;
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

        /* Поиск*/
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
            background: url('https://cdn.worldota.net/t/640x400/extranet/a8/a7/a8a7782aa805636c1dc31ef25ea0e75ae6d3865f.JPEG') center/cover no-repeat;
            border-radius: 25px;
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
            max-width: 508px;
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
    .container {
        
        margin: 0 auto;
        padding: 0px 40px;
    }

    h1, h2 {
        font-weight: 600;
        color: #111;
        margin-bottom: 20px;
    }

    h1 {
        font-size: 2.5em;
    }

    h2 {
        font-size: 2em;
    }

    p {
        font-size: 1.05em;
        color: #333;
        margin-bottom: 20px;
    }

    .section {
        margin-bottom: 40px;
    }

    .stats {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px 30px;
        background: #f0f4ff;
        border-radius: 15px;
        text-align: center;
        font-weight: 700;
        font-size: 1.5em;
        color: #402e7dff;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        margin-bottom:20px;
    }

    a {
        color: #0072ff;
    }

    a:hover {
        text-decoration: underline;
    }

    .features {
        margin-top: 0px;
        display: flex;
        flex-direction: column;
    }

    .feature {
        padding: 10px 0;
    }

    img.section-img {
        width: 100%;
        max-height: 300px;
        object-fit: cover;
        margin-bottom: 20px;
        border-radius: 8px;
    }
 .footer {
            background: #1a1a2e;
            color: #fff;
            padding: 60px 40px 30px;
            margin-top: 60px;
            margin:-40px;
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
<div class="container">

<!-- Шапка -->
@include('layouts.header')

<!-- Hero -->
<section class="hero">
    <div class="hero-content">
        <h1>{{ __('messages.hotels_for_rest') }}</h1>
        <p>{{ __('messages.booking_info') }}</p>
        <button onclick="window.location.href='{{ route('search') }}'">{{ __('messages.start_journey') }}</button>
    </div>
</section>
    <div class="section about-advantages" style="display: flex; gap: 195px; flex-wrap: wrap; margin-top:40px;">
        <div style="flex: 1 1 400px;">
        <h1>О нас</h1>
        <p>Hotels.by – ваш надежный помощник в поиске и бронировании отелей по всей Беларуси. Мы делаем отдых комфортным и безопасным, предоставляя актуальные цены и честные отзывы.</p>
    </div>

    <div style="flex: 1 1 400px;">
        <h2>Наши преимущества</h2>
        <div class="features">
            <div class="feature">&#9675; Простой поиск</div>
            <div class="feature">&#9675; Честные отзывы</div>
            <div class="feature">&#9675; Безопасное бронирование</div>
        </div>
    </div>
</div>

    <div class="section">
        <div class="stats">120 000+ гостей уже забронировали через Hotels.by!</div>
    </div>
@include('layouts.footer')


</div>
</body>
</html>