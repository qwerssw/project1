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
        margin-right:10px ;
    }
    .btn:hover { background: #466369ff; }
    
    .btn-logout {
        background: #1a1a2e;
    }
    .btn-logout:hover {
        background: #466369ff;
    }
    .section-a{
        display:flex;
        justify-content: space-between;
        align-items: center;
        background: white;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        margin-bottom: 30px; 
    }
.section{
        justify-content: space-between;
        align-items: center;
        background: white;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        margin-bottom: 30px; 
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
        text-align: center;
        border-radius: 12px;
        color: #64748b;
    }
</style>
</head>
<body>

<div class="sidebar">
    <h2>{{ __('messages.my_account') }}</h2>
    <a href="{{ route('home') }}">{{ __('messages.home') }}</a>
        <div style="margin-top: 20px; display: flex; gap: 10px;">
        <a href="{{ route('lang.switch', 'ru') }}" style="flex: 1; text-align: center; padding: 8px; background: #334155; border-radius: 6px; color: #fff; text-decoration: none;">RU</a>
        <a href="{{ route('lang.switch', 'en') }}" style="flex: 1; text-align: center; padding: 8px; background: #334155; border-radius: 6px; color: #fff; text-decoration: none;">EN</a>
    </div>
    <form method="POST" action="{{ route('logout') }}" style="margin-top: auto;">
        @csrf
        <button type="submit" class="btn btn-logout" style="width: 100%; text-align: left;  margin-top: 20px;">
            {{ __('messages.logout') }}
        </button>
    </form>
</div>

<div class="content">
    <!-- Профиль пользователя  -->
    <div class="profile-card">
        <div>
            <p><strong>{{ Auth::user()->name }}</strong></p>
            <p>{{ Auth::user()->email }}</p>
            <p><small>{{ __('messages.registered_on') }}: {{ Auth::user()->created_at->format('d.m.Y') }}</small></p>
        </div>
        <a href="{{ route('profile.edit') }}" class="btn">{{ __('messages.edit_profile') }}</a>
    </div>

    <!-- Мои бронирования (отели) -->
    <div class="section-a">
        <h3>{{ __('messages.my_bookings') }}</h3>
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
                    <p>{{ __('messages.no_bookings') }}</p>
                    <a href="{{ route('home') }}" class="btn" style="margin-top: 10px;">{{ __('messages.go_to_hotels') }}</a>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Избранные отели -->
    <div class="section">
        <h3>{{ __('messages.favorites') }}</h3>
        <div class="cards">
              
            @forelse($likes ?? [] as $like)
                <div class="card">
                    <form method="POST" action="{{ route('likes.toggle', $like->hotel) }}" 
          style="position: absolute; top: 10px; right: 10px;">
        @csrf
        <button type="submit" 
                style="background: rgba(0,0,0,0.6); 
                       color: white; 
                       border: none; 
                       border-radius: 50%; 
                       width: 30px; 
                       height: 30px; 
                       cursor: pointer;
                       font-size: 16px;">
            ✕
        </button>
    </form>
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
                    <p>{{ __('messages.no_favorites') }}</p>
                    <a href="{{ route('home') }}" class="btn" style="margin-top: 10px;">Выбрать отель</a>
                </div>
            @endforelse
        </div>
    </div>
</div>

</body>
</html>
