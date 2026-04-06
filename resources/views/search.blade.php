@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Результаты поиска</h1>

    <form action="{{ route('search') }}" method="get" class="mb-4">
        <input type="text" name="q" placeholder="Поиск..." value="{{ request('q') }}">
        <select name="city">
            <option value="">Все города</option>
            @foreach($cities as $city)
                <option value="{{ $city }}" @if(request('city') == $city) selected @endif>{{ $city }}</option>
            @endforeach
        </select>
        <button type="submit">Искать</button>
    </form>

    @if($hotels->count())
        <div class="row">
            @foreach($hotels as $hotel)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($hotel->images->count())
                            <img src="{{ asset('storage/' . $hotel->images->first()->path) }}" class="card-img-top" alt="{{ $hotel->name }}">
                        @else
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="{{ $hotel->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $hotel->name }}</h5>
                            <p class="card-text">{{ $hotel->city }}</p>
                            <p class="card-text"><strong>{{ $hotel->price_per_night }}₽/ночь</strong></p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('hotels.show', $hotel->id) }}" class="btn btn-primary w-100">Подробнее</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $hotels->links() }}
    @else
        <p>Ничего не найдено.</p>
    @endif
</div>
@endsection