<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация - Отели Беларуси</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-2xl p-8">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900">Регистрация</h2>
            <p class="mt-2 text-sm text-gray-600">
                Уже есть аккаунт?
                <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Войдите
                </a>
            </p>
        </div>

        @if($errors->any())
            <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form class="mt-6 space-y-4" method="POST" action="{{ route('register') }}">
            @csrf
            
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Имя</label>
                <input id="name" name="name" type="text" required 
                       class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                       value="{{ old('name') }}" placeholder="Введите ваше имя">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email адрес</label>
                <input id="email" name="email" type="email" required 
                       class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                       value="{{ old('email') }}" placeholder="Введите ваш email">
            </div>
            
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Пароль</label>
                <input id="password" name="password" type="password" required 
                       class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                       placeholder="Введите пароль (минимум 6 символов)">
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Подтверждение пароля</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required 
                       class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                       placeholder="Повторите пароль">
            </div>

            <button type="submit" 
                    class="w-full py-2 px-4 text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Зарегистрироваться
            </button>
        </form>
    </div>
</body>
</html>