@extends('layouts.app')

@section('title', 'لوحة التحكم')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">لوحة تحكم الأدمن</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-blue-100 p-6 rounded-lg">
            <h3 class="text-xl font-semibold text-blue-800">إجمالي المستخدمين</h3>
            <p class="text-3xl font-bold text-blue-600">{{ $users->count() }}</p>
        </div>
    </div>

    <div class="mb-4">
        <a href="{{ route('admin.users.create') }}" 
           class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            إضافة مستخدم جديد
        </a>
        <a href="{{ route('admin.users.index') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mr-2">
            إدارة المستخدمين
        </a>
    </div>
</div>
@endsection