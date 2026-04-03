<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Личный кабинет</title>
<style>

    * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Arial', sans-serif; }
    body { display: flex; min-height: 100vh; background: #f4f7fb; }

    .sidebar {
        width: 250px;
        background: #1a1a2e;
        color: white;
        display: flex;
        flex-direction: column;
        padding: 20px;
    }

    .sidebar h2 { margin-bottom: 40px; font-size: 22px; color: #fff; }
    .sidebar a {
        color: #c4d8f1ff;
        text-decoration: none;
        margin-bottom: 15px;
        display: block;
        padding: 10px;
        border-radius: 8px;
        transition: 0.2s;
    }
    .sidebar a:hover { background: #334155; color: #fff; }

    .content {
        flex: 1;
        padding: 40px;
    }

    .profile-card {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: white;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        margin-bottom: 30px;
    }
    .profile-card p { margin-bottom: 8px; }

    .btn {
        padding: 8px 15px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        color: white;
        background: #9cc6cfff;
        transition: 0.2s;
        text-decoration: none;
        display: inline-block; 
    }
    .btn:hover { background: #466369ff; }
    
    .btn-logout {
        background: #1a1a2e;
    }
    .btn-logout:hover {
        background: #466369ff;
    }

    .section h3 {
        margin-top:20px;
        margin-bottom: 20px; 
        color: #1e293b;
        }

    .cards {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }

    .card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: 0.3s;
    }
    .card:hover { transform: translateY(-5px); }

    .card img {
        width: 100%;
        height: 150px;
        object-fit: cover;
    }

    .card-body { padding: 15px; }
    .card-body p { margin-bottom: 10px; color: #334155; }
    
    .empty-message {
        background: #f1f5f9;
        padding: 0 40px;
        text-align: center;
        border-radius: 12px;
        color: #64748b;
    }
</style>
</head>
<body>

<div class="sidebar">
    <h2>Личный кабинет</h2>
    <a href="{{ route('profile') }}">Профиль</a>
    <a href="{{ route('bookings.index') }}">Мои бронирования</a>
    <a href="{{ route('likes.index') }}">Избранные отели</a>
    <a href="{{ route('home') }}">На главную</a>
    <form method="POST" action="{{ route('logout') }}" style="margin-top: auto;">
        @csrf
        <button type="submit" class="btn btn-logout" style="width: 100%; text-align: left;  margin-top: 20px;">
            Выйти
        </button>
    </form>
</div>

<div class="content">
    <!-- Профиль пользователя  -->
    <div class="profile-card">
        <div>
            <p><strong>{{ Auth::user()->name }}</strong></p>
            <p>{{ Auth::user()->email }}</p>
            <p><small>Зарегистрирован: {{ Auth::user()->created_at->format('d.m.Y') }}</small></p>
        </div>
        <a href="{{ route('profile.edit') }}" class="btn">Редактировать</a>
    </div>

    <!-- Мои бронирования (отели) -->
    <div class="section">
        <h3>Мои бронирования</h3>
        <div class="cards">
            @forelse($bookings ?? [] as $booking)
                <div class="card">
                    <img src="{{ $booking->hotel->main_image ?? 'https://via.placeholder.com/300x150?text=Отель' }}">
                    <div class="card-body">
                        <p><strong>{{ $booking->hotel->name }}</strong></p>
                        <p>{{ $booking->hotel->city }}</p>
                        <p>Заезд: {{ \Carbon\Carbon::parse($booking->check_in)->format('d.m.Y') }}</p>
                        <p>Выезд: {{ \Carbon\Carbon::parse($booking->check_out)->format('d.m.Y') }}</p>
                        <p>Стоимость: {{ $booking->total_price }} BYN</p>
                        <p>Статус: 
                            @if($booking->status == 'confirmed')
                                <span style="color: green;">Подтверждено</span>
                            @elseif($booking->status == 'pending')
                                <span style="color: orange;">В обработке</span>
                            @else
                                <span style="color: red;">Отменено</span>
                            @endif
                        </p>
                        <a href="/hotels/{{ $booking->hotel->id }}" class="btn">Подробнее об отеле</a>
                    </div>
                </div>
            @empty
                <div class="empty-message">
                    <p>У вас пока нет бронирований</p>
                    <a href="{{ route('home') }}" class="btn" style="margin-top: 10px;">Перейти к отелям</a>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Избранные отели -->
    <div class="section">
        <h3>Избранные отели</h3>
        <div class="cards">
            @forelse($likes ?? [] as $like)
                <div class="card">
                    <img src="{{ $like->hotel->images->first()->image_path  }}" alt="{{ $like->hotel->name }}">                    
                        <div class="card-body">
                        <p><strong>{{ $like->hotel->name }}</strong></p>
                        <p>{{ $like->hotel->city }}</p>
                        <p>{{ $like->hotel->stars }} звезд</p>
                        <p>{{ $like->hotel->price_per_night }} BYN / ночь</p>
                        <a href="/hotels/{{ $like->hotel->id }}" class="btn">Подробнее</a>
                    </div>
                </div>
            @empty
                <div class="empty-message">
                    <p>У вас пока нет избранных отелей</p>
                    <a href="{{ route('home') }}" class="btn" style="margin-top: 10px;">Выбрать отель</a>
                </div>
            @endforelse
        </div>
    </div>
</div>

</body>
</html>
