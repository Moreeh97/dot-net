@extends('layouts.app')

@section('title', 'عرض المستخدم')

@section('content')
<section class="py-8">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- العنوان -->
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center">
                    <a href="{{ route('admin.users.index') }}" 
                       class="bg-gray-100 text-gray-600 p-2 rounded-lg hover:bg-gray-200 transition duration-300 mr-4">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <div>
                        <h1 class="text-3xl font-bold text-dark">بيانات المستخدم</h1>
                        <p class="text-gray-600 mt-2">تفاصيل كاملة عن حساب المستخدم</p>
                    </div>
                </div>
                <div class="bg-primary text-white px-4 py-2 rounded-full text-sm font-medium">
                    ID: {{ $user->id }}
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- العمود الرئيسي -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- بطاقة المعلومات الشخصية -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="bg-gradient-to-r from-primary to-red-600 py-4 px-6">
                            <h2 class="text-xl font-semibold text-white flex items-center">
                                <i class="fas fa-user-circle ml-2"></i>
                                المعلومات الشخصية
                            </h2>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-6">
                                <div class="w-20 h-20 bg-primary rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white text-2xl"></i>
                                </div>
                                <div class="mr-4">
                                    <h3 class="text-2xl font-bold text-dark">{{ $user->name }}</h3>
                                    <p class="text-gray-600">{{ $user->email }}</p>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <div class="text-gray-600 text-sm mb-1">البريد الإلكتروني</div>
                                    <div class="text-dark font-medium">{{ $user->email }}</div>
                                </div>
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <div class="text-gray-600 text-sm mb-1">دور المستخدم</div>
                                    <div class="flex items-center">
                                        @if($user->isAdmin())
                                        <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-sm font-medium">
                                            <i class="fas fa-crown ml-1"></i>
                                            مسؤول النظام
                                        </span>
                                        @else
                                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-medium">
                                            <i class="fas fa-user ml-1"></i>
                                            مستخدم عادي
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <div class="text-gray-600 text-sm mb-1">تاريخ الإنشاء</div>
                                    <div class="text-dark font-medium">{{ $user->created_at->format('Y-m-d H:i') }}</div>
                                </div>
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <div class="text-gray-600 text-sm mb-1">آخر تحديث</div>
                                    <div class="text-dark font-medium">{{ $user->updated_at->format('Y-m-d H:i') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- بطاقة الإحصائيات -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                            <h2 class="text-xl font-semibold text-dark flex items-center">
                                <i class="fas fa-chart-bar ml-2 text-primary"></i>
                                إحصائيات الحساب
                            </h2>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="text-center bg-blue-50 rounded-xl p-4">
                                    <i class="fas fa-calendar-plus text-blue-600 text-2xl mb-2"></i>
                                    <div class="text-blue-800 font-bold text-lg">{{ $user->created_at->format('Y-m-d') }}</div>
                                    <div class="text-blue-600 text-sm">تاريخ الإنشاء</div>
                                </div>
                                <div class="text-center bg-green-50 rounded-xl p-4">
                                    <i class="fas fa-sync-alt text-green-600 text-2xl mb-2"></i>
                                    <div class="text-green-800 font-bold text-lg">{{ $user->updated_at->format('Y-m-d') }}</div>
                                    <div class="text-green-600 text-sm">آخر تحديث</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- العمود الجانبي -->
                <div class="space-y-6">
                    <!-- بطاقة الإجراءات -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                            <h2 class="text-xl font-semibold text-dark flex items-center">
                                <i class="fas fa-tools ml-2 text-primary"></i>
                                الإجراءات
                            </h2>
                        </div>
                        <div class="p-6 space-y-3">
                            <a href="{{ route('admin.users.edit', $user) }}" 
                               class="w-full bg-primary text-white py-3 px-4 rounded-lg hover-primary transition duration-300 font-medium inline-flex items-center justify-center">
                                <i class="fas fa-edit ml-2"></i>
                                تعديل البيانات
                            </a>
                            
                            @if(!$user->isAdmin())
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-full bg-red-600 text-white py-3 px-4 rounded-lg hover:bg-red-700 transition duration-300 font-medium inline-flex items-center justify-center"
                                        onclick="return confirm('هل أنت متأكد من حذف المستخدم {{ $user->name }}؟')">
                                    <i class="fas fa-trash ml-2"></i>
                                    حذف المستخدم
                                </button>
                            </form>
                            @else
                            <button disabled
                                    class="w-full bg-gray-300 text-gray-500 py-3 px-4 rounded-lg font-medium inline-flex items-center justify-center cursor-not-allowed">
                                <i class="fas fa-shield-alt ml-2"></i>
                                لا يمكن حذف المسؤول
                            </button>
                            @endif
                            
                            <a href="{{ route('admin.users.index') }}" 
                               class="w-full bg-gray-100 text-gray-700 py-3 px-4 rounded-lg hover:bg-gray-200 transition duration-300 font-medium inline-flex items-center justify-center">
                                <i class="fas fa-arrow-right ml-2"></i>
                                العودة للقائمة
                            </a>
                        </div>
                    </div>

                    <!-- بطاقة حالة الحساب -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                            <h2 class="text-xl font-semibold text-dark flex items-center">
                                <i class="fas fa-info-circle ml-2 text-primary"></i>
                                حالة الحساب
                            </h2>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">الحالة</span>
                                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-medium">
                                        <i class="fas fa-check-circle ml-1"></i>
                                        نشط
                                    </span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">البريد مؤكد</span>
                                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-medium">
                                        <i class="fas fa-check ml-1"></i>
                                        نعم
                                    </span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">آخر نشاط</span>
                                    <span class="text-dark font-medium">{{ $user->updated_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection