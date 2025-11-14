@extends('layouts.app')

@section('title', 'الرئيسية')

@section('content')
<div class="text-center">
    <h1 class="text-4xl font-bold text-gray-800 mb-8">مرحباً بكم في موقعنا</h1>
    
    @auth
        <div class="bg-white rounded-lg shadow-md p-6 max-w-md mx-auto">
            <h2 class="text-2xl font-semibold text-green-600 mb-4">مرحباً {{ auth()->user()->name }}!</h2>
            <p class="text-gray-600">أنت مسجل دخول بنجاح</p>
            
            @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="mt-4 inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    الذهاب إلى لوحة التحكم
                </a>
            @endif
        </div>
    @else
        <p class="text-gray-600 text-lg mb-4">سجل دخول للوصول إلى الميزات</p>
        <a href="{{ route('login') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
            تسجيل الدخول
        </a>
    @endauth
</div>
@endsection