@extends('layouts.app')

@section('title', 'إضافة مستخدم جديد')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">إضافة مستخدم جديد</h1>

    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        
        <div class="mb-4">
            <label for="name" class="block text-gray-700 mb-2">الاسم</label>
            <input type="text" id="name" name="name" 
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                   value="{{ old('name') }}" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 mb-2">البريد الإلكتروني</label>
            <input type="email" id="email" name="email" 
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                   value="{{ old('email') }}" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 mb-2">كلمة المرور</label>
            <input type="password" id="password" name="password" 
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                   required>
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-700 mb-2">تأكيد كلمة المرور</label>
            <input type="password" id="password_confirmation" name="password_confirmation" 
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                   required>
        </div>

        <button type="submit" 
                class="w-full bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">
            إضافة المستخدم
        </button>
        <a href="{{ route('admin.users.index') }}" 
           class="block w-full bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700 text-center mt-2">
            رجوع
        </a>
    </form>
</div>
@endsection