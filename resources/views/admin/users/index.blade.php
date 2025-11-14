@extends('layouts.app')

@section('title', 'إدارة المستخدمين')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">إدارة المستخدمين</h1>
        <a href="{{ route('admin.users.create') }}" 
           class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            إضافة مستخدم جديد
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">الاسم</th>
                    <th class="px-4 py-2">البريد الإلكتروني</th>
                    <th class="px-4 py-2">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="border-b">
                    <td class="px-4 py-2 text-center">{{ $user->name }}</td>
                    <td class="px-4 py-2 text-center">{{ $user->email }}</td>
                    <td class="px-4 py-2 text-center">
                        <a href="{{ route('admin.users.edit', $user) }}" 
                           class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 mr-2">
                            تعديل
                        </a>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700"
                                    onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                حذف
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection