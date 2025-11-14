@extends('layouts.app')

@section('title', 'تسجيل الدخول')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">تسجيل الدخول</h1>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <div class="mb-4">
            <label for="email" class="block text-gray-700 mb-2">البريد الإلكتروني</label>
            <input type="email" id="email" name="email" 
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                   value="{{ old('email') }}" required>
        </div>

        <div class="mb-6">
            <label for="password" class="block text-gray-700 mb-2">كلمة المرور</label>
            <input type="password" id="password" name="password" 
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                   required>
        </div>

        <button type="submit" 
                class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
            تسجيل الدخول
        </button>
    </form>
</div>
@endsection