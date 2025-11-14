@extends('layouts.app')

@section('title', 'عرض المستخدم')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">بيانات المستخدم: {{ $user->name }}</h1>

    <div class="space-y-4">
        <div>
            <label class="block text-gray-700 font-semibold">الاسم:</label>
            <p class="text-gray-600">{{ $user->name }}</p>
        </div>
        
        <div>
            <label class="block text-gray-700 font-semibold">البريد الإلكتروني:</label>
            <p class="text-gray-600">{{ $user->email }}</p>
        </div>
        
        <div>
            <label class="block text-gray-700 font-semibold">الدور:</label>
            <p class="text-gray-600">{{ $user->role === 'admin' ? 'أدمن' : 'مستخدم عادي' }}</p>
        </div>
        
        <div>
            <label class="block text-gray-700 font-semibold">تاريخ الإنشاء:</label>
            <p class="text-gray-600">{{ $user->created_at->format('Y-m-d H:i') }}</p>
        </div>
    </div>

    <div class="mt-6 flex space-x-2 space-x-reverse">
        <a href="{{ route('admin.users.edit', $user) }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            تعديل
        </a>
        <a href="{{ route('admin.users.index') }}" 
           class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
            رجوع
        </a>
    </div>
</div>
@endsection