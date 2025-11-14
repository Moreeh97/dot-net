@extends('layouts.app')

@section('title', 'لوحة التحكم')

@section('content')
<!-- قسم الإحصائيات -->
<section class="py-8">
    <div class="container mx-auto px-4">
        <!-- العنوان والترحيب -->
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
            <div class="mb-6 lg:mb-0">
                <h1 class="text-3xl font-bold text-dark">لوحة التحكم</h1>
                <p class="text-gray-600 mt-2">مرحباً {{ auth()->user()->name }}, هذه نظرة عامة على النظام</p>
            </div>
            <div class="flex items-center space-x-3 space-x-reverse">
                <div class="bg-primary/10 text-primary px-4 py-2 rounded-full text-sm font-medium">
                    <i class="fas fa-shield-alt ml-2"></i>
                    مسؤول النظام
                </div>
                <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                    <i class="fas fa-tachometer-alt text-white text-xl"></i>
                </div>
            </div>
        </div>

        <!-- بطاقات الإحصائيات -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- إجمالي المستخدمين -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition duration-300 group">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">إجمالي المستخدمين</p>
                        <h3 class="text-3xl font-bold text-dark mt-2">{{ $users->count() }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center group-hover:scale-110 transition duration-300">
                        <i class="fas fa-users text-blue-600 text-lg"></i>
                    </div>
                </div>
                <div class="flex items-center text-green-600 text-sm">
                    <i class="fas fa-arrow-up ml-1"></i>
                    <span>زيادة عن الشهر الماضي</span>
                </div>
            </div>

            <!-- المستخدمين النشطين -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition duration-300 group">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">المستخدمين النشطين</p>
                        <h3 class="text-3xl font-bold text-dark mt-2">{{ $users->count() }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center group-hover:scale-110 transition duration-300">
                        <i class="fas fa-user-check text-green-600 text-lg"></i>
                    </div>
                </div>
                <div class="flex items-center text-green-600 text-sm">
                    <i class="fas fa-circle ml-1"></i>
                    <span>جميع المستخدمين نشطين</span>
                </div>
            </div>

            <!-- الأدمن -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition duration-300 group">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">مسؤولي النظام</p>
                        <h3 class="text-3xl font-bold text-dark mt-2">1</h3>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center group-hover:scale-110 transition duration-300">
                        <i class="fas fa-user-shield text-purple-600 text-lg"></i>
                    </div>
                </div>
                <div class="flex items-center text-gray-600 text-sm">
                    <i class="fas fa-info-circle ml-1"></i>
                    <span>أنت مسؤول النظام</span>
                </div>
            </div>

            <!-- الإجراءات اليومية -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition duration-300 group">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">الإجراءات اليومية</p>
                        <h3 class="text-3xl font-bold text-dark mt-2">0</h3>
                    </div>
                    <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center group-hover:scale-110 transition duration-300">
                        <i class="fas fa-chart-line text-orange-600 text-lg"></i>
                    </div>
                </div>
                <div class="flex items-center text-gray-600 text-sm">
                    <i class="fas fa-clock ml-1"></i>
                    <span>جاري المراقبة</span>
                </div>
            </div>
        </div>

        <!-- الأزرار السريعة -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <a href="{{ route('admin.users.index') }}" 
               class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition duration-300 group">
                <div class="flex items-center">
                    <div class="w-14 h-14 bg-primary rounded-full flex items-center justify-center group-hover:scale-110 transition duration-300">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <div class="mr-4">
                        <h3 class="text-xl font-semibold text-dark mb-2">إدارة المستخدمين</h3>
                        <p class="text-gray-600">عرض، إضافة، تعديل وحذف المستخدمين</p>
                    </div>
                    <div class="mr-auto text-primary">
                        <i class="fas fa-arrow-left text-lg"></i>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.users.create') }}" 
               class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition duration-300 group">
                <div class="flex items-center">
                    <div class="w-14 h-14 bg-green-500 rounded-full flex items-center justify-center group-hover:scale-110 transition duration-300">
                        <i class="fas fa-user-plus text-white text-xl"></i>
                    </div>
                    <div class="mr-4">
                        <h3 class="text-xl font-semibold text-dark mb-2">إضافة مستخدم جديد</h3>
                        <p class="text-gray-600">إنشاء حساب جديد للمستخدمين</p>
                    </div>
                    <div class="mr-auto text-green-500">
                        <i class="fas fa-arrow-left text-lg"></i>
                    </div>
                </div>
            </a>
        </div>

        <!-- قسم المحتوى الرئيسي -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- المستخدمين الأخيرة -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-semibold text-dark flex items-center">
                                <i class="fas fa-clock ml-2 text-primary"></i>
                                أحدث المستخدمين
                            </h2>
                            <a href="{{ route('admin.users.index') }}" class="text-primary hover:text-red-600 text-sm font-medium">
                                عرض الكل
                                <i class="fas fa-arrow-left ml-1"></i>
                            </a>
                        </div>
                    </div>
                    <div class="p-6">
                        @if($users->count() > 0)
                            <div class="space-y-4">
                                @foreach($users->take(5) as $user)
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-300 group">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center group-hover:scale-110 transition duration-300">
                                            <i class="fas fa-user text-white"></i>
                                        </div>
                                        <div class="mr-3">
                                            <h4 class="font-medium text-dark">{{ $user->name }}</h4>
                                            <p class="text-gray-600 text-sm">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-3 space-x-reverse">
                                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-medium">
                                            {{ $user->created_at->diffForHumans() }}
                                        </span>
                                        <a href="{{ route('admin.users.show', $user) }}" 
                                           class="bg-primary/10 text-primary p-2 rounded-lg hover:bg-primary hover:text-white transition duration-300">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-users text-gray-400 text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-medium text-gray-600 mb-2">لا يوجد مستخدمين حتى الآن</h3>
                                <p class="text-gray-500 mb-4">ابدأ بإضافة أول مستخدم إلى النظام</p>
                                <a href="{{ route('admin.users.create') }}" 
                                   class="bg-primary text-white px-6 py-2 rounded-lg hover-primary transition duration-300 inline-flex items-center">
                                    <i class="fas fa-user-plus ml-2"></i>
                                    إضافة أول مستخدم
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- الإجراءات السريعة والإحصائيات -->
            <div class="space-y-6">
                <!-- الإجراءات السريعة -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                        <h2 class="text-xl font-semibold text-dark flex items-center">
                            <i class="fas fa-bolt ml-2 text-primary"></i>
                            إجراءات سريعة
                        </h2>
                    </div>
                    <div class="p-6 space-y-3">
                        <a href="{{ route('admin.users.create') }}" 
                           class="w-full bg-primary text-white py-3 px-4 rounded-lg hover-primary transition duration-300 font-medium inline-flex items-center justify-center">
                            <i class="fas fa-user-plus ml-2"></i>
                            إضافة مستخدم جديد
                        </a>
                        
                        <a href="{{ route('admin.users.index') }}" 
                           class="w-full bg-gray-100 text-gray-700 py-3 px-4 rounded-lg hover:bg-gray-200 transition duration-300 font-medium inline-flex items-center justify-center">
                            <i class="fas fa-list ml-2"></i>
                            عرض جميع المستخدمين
                        </a>
                        
                        <a href="{{ route('home') }}" 
                           class="w-full bg-blue-100 text-blue-600 py-3 px-4 rounded-lg hover:bg-blue-200 transition duration-300 font-medium inline-flex items-center justify-center">
                            <i class="fas fa-home ml-2"></i>
                            العودة للرئيسية
                        </a>
                    </div>
                </div>

                <!-- حالة النظام -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                        <h2 class="text-xl font-semibold text-dark flex items-center">
                            <i class="fas fa-heartbeat ml-2 text-primary"></i>
                            حالة النظام
                        </h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-green-500 rounded-full ml-2"></div>
                                <span class="text-gray-700">قاعدة البيانات</span>
                            </div>
                            <span class="text-green-600 font-medium">نشط</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-green-500 rounded-full ml-2"></div>
                                <span class="text-gray-700">التطبيق</span>
                            </div>
                            <span class="text-green-600 font-medium">يعمل</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-green-500 rounded-full ml-2"></div>
                                <span class="text-gray-700">الذاكرة</span>
                            </div>
                            <span class="text-green-600 font-medium">جيد</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-blue-500 rounded-full ml-2"></div>
                                <span class="text-gray-700">الإصدار</span>
                            </div>
                            <span class="text-blue-600 font-medium">v1.0.0</span>
                        </div>
                    </div>
                </div>

                <!-- إحصائيات سريعة -->
                <div class="bg-gradient-to-br from-primary to-red-600 rounded-2xl p-6 text-white">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-pie text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">نظرة عامة</h3>
                        <p class="text-white/90 mb-4">أداء النظام في أفضل حالاته</p>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold">{{ $users->count() }}</div>
                                <div class="text-white/80 text-sm">مستخدم</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold">100%</div>
                                <div class="text-white/80 text-sm">استقرار</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- قسم النشاط الأخير -->
        <div class="mt-8 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                <h2 class="text-xl font-semibold text-dark flex items-center">
                    <i class="fas fa-history ml-2 text-primary"></i>
                    النشاط الأخير
                </h2>
            </div>
            <div class="p-6">
                <div class="text-center py-8">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-chart-line text-gray-400 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-600 mb-2">لا يوجد نشاط حديث</h3>
                    <p class="text-gray-500">سيظهر النشاط هنا عند قيامك بإجراءات في النظام</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection