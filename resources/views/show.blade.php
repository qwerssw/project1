<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ $hotel->name }}</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        .wrapper {
           
            margin: 50px auto;
            background: white;
            display: flex;
            border-radius: 20px;
            overflow: hidden;
           
        }


        .left {
            width: 50%;
            padding: 40px;
        }

        .left h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .left p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .price {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            background: #2e7d32;
            color: white;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn:hover {
            background: #1b5e20;
        }

        .right {
            width: 50%;
            display: flex;
            flex-direction: column;
        }

        .main-img {
            height: 70%;
        }

        .main-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gallery {
            display: flex;
            height: 30%;
        }

        .gallery img {
            width: 33.3%;
            object-fit: cover;
        }
    </style>
</head>
<body>

<div class="wrapper">
    
    <div class="right">
        <div class="main-img">
            <img src="{{ $hotel->image }}" alt="Отель">
        </div>

        <div class="gallery">
            <img src="{{ $hotel->image }}">
            <img src="{{ $hotel->image }}">
            <img src="{{ $hotel->image }}">
        </div>
    </div>

    <div class="left">
        <h1>{{ $hotel->name }}</h1>

        <p>{{ $hotel->description }}</p>

        <div class="price">
            {{ $hotel->price_per_night }} BYN / ночь
        </div>

        <button class="btn">Забронировать</button>
        <button class="btn">В избранное</button>
    </div>

</div>

</body>
</html>
