@extends('layouts.app')

@section('title', 'إدارة المستخدمين')

@section('content')
<section class="py-8">
    <div class="container mx-auto px-4">
        <!-- العنوان والأزرار -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-dark">إدارة المستخدمين</h1>
                <p class="text-gray-600 mt-2">إدارة كاملة لحسابات المستخدمين في النظام</p>
            </div>
            <a href="{{ route('admin.users.create') }}" 
               class="bg-primary text-white px-6 py-3 rounded-lg hover-primary transition duration-300 font-medium inline-flex items-center shadow-lg mt-4 md:mt-0">
                <i class="fas fa-user-plus ml-2"></i>
                إضافة مستخدم جديد
            </a>
        </div>

        <!-- بطاقة المحتوى -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <!-- الهيدر -->
            <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
                            <i class="fas fa-users text-white"></i>
                        </div>
                        <div class="mr-3">
                            <h2 class="text-xl font-semibold text-dark">قائمة المستخدمين</h2>
                            <p class="text-gray-600 text-sm">إجمالي {{ $users->count() }} مستخدم</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-2 space-x-reverse mt-4 md:mt-0">
                        <div class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-medium">
                            <i class="fas fa-circle ml-1"></i>
                            نشط
                        </div>
                    </div>
                </div>
            </div>

            <!-- الجدول -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200">
                            <th class="px-6 py-4 text-right text-sm font-semibold text-dark">المستخدم</th>
                            <th class="px-6 py-4 text-right text-sm font-semibold text-dark">البريد الإلكتروني</th>
                            <th class="px-6 py-4 text-right text-sm font-semibold text-dark">تاريخ الإنشاء</th>
                            <th class="px-6 py-4 text-right text-sm font-semibold text-dark">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($users as $user)
                        <tr class="hover:bg-gray-50 transition duration-300">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-white text-sm"></i>
                                    </div>
                                    <div class="mr-3">
                                        <h4 class="font-medium text-dark">{{ $user->name }}</h4>
                                        <span class="text-gray-500 text-sm">مستخدم عادي</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-dark font-medium">{{ $user->email }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-gray-600 text-sm">
                                    {{ $user->created_at->format('Y-m-d') }}
                                </div>
                                <div class="text-gray-500 text-xs">
                                    {{ $user->created_at->diffForHumans() }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2 space-x-reverse">
                                    <a href="{{ route('admin.users.show', $user) }}" 
                                        class="bg-gray-100 text-gray-600 px-3 py-2 rounded-lg hover:bg-gray-200 transition duration-300 inline-flex items-center text-sm font-medium">
                                        <i class="fas fa-eye ml-1"></i>
                                        عرض
                                    </a>
                                    <a href="{{ route('admin.users.edit', $user) }}" 
                                       class="bg-blue-100 text-blue-600 px-3 py-2 rounded-lg hover:bg-blue-200 transition duration-300 inline-flex items-center text-sm font-medium">
                                        <i class="fas fa-edit ml-1"></i>
                                        تعديل
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-100 text-red-600 px-3 py-2 rounded-lg hover:bg-red-200 transition duration-300 inline-flex items-center text-sm font-medium"
                                                onclick="return confirm('هل أنت متأكد من حذف المستخدم {{ $user->name }}؟')">
                                            <i class="fas fa-trash ml-1"></i>
                                            حذف
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <div class="text-gray-400 mb-4">
                                    <i class="fas fa-users text-4xl"></i>
                                </div>
                                <h3 class="text-lg font-medium text-gray-600 mb-2">لا يوجد مستخدمين</h3>
                                <p class="text-gray-500 mb-4">لم يتم إضافة أي مستخدمين حتى الآن</p>
                                <a href="{{ route('admin.users.create') }}" 
                                   class="bg-primary text-white px-6 py-2 rounded-lg hover-primary transition duration-300 inline-flex items-center">
                                    <i class="fas fa-user-plus ml-2"></i>
                                    إضافة أول مستخدم
                                </a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- التذييل -->
            @if($users->count() > 0)
            <div class="border-t border-gray-200 px-6 py-4 bg-gray-50">
                <div class="flex justify-between items-center">
                    <p class="text-gray-600 text-sm">
                        عرض {{ $users->count() }} من {{ $users->count() }} مستخدم
                    </p>
                    <div class="flex items-center space-x-2 space-x-reverse">
                        <span class="text-gray-600 text-sm">النظام يعمل بشكل مثالي</span>
                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection