@extends('layouts.app')

@section('title', 'تعديل مستخدم')

@section('content')
<section class="py-8">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">
            <!-- العنوان -->
            <div class="flex items-center mb-8">
                <a href="{{ route('admin.users.index') }}" 
                   class="bg-gray-100 text-gray-600 p-2 rounded-lg hover:bg-gray-200 transition duration-300 mr-4">
                    <i class="fas fa-arrow-right"></i>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-dark">تعديل المستخدم</h1>
                    <p class="text-gray-600 mt-2">تعديل بيانات المستخدم: {{ $user->name }}</p>
                </div>
            </div>

            <!-- البطاقة -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- الهيدر -->
                <div class="bg-gradient-to-r from-primary to-red-600 py-6 px-8">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                                <i class="fas fa-user-edit text-white text-xl"></i>
                            </div>
                            <div class="mr-4">
                                <h2 class="text-xl font-semibold text-white">تحديث بيانات المستخدم</h2>
                                <p class="text-white/90 mt-1">يمكنك تحديث المعلومات الأساسية</p>
                            </div>
                        </div>
                        <div class="bg-white/20 rounded-full px-4 py-2">
                            <span class="text-white text-sm font-medium">ID: {{ $user->id }}</span>
                        </div>
                    </div>
                </div>

                <!-- الفورم -->
                <div class="p-8">
                    @if($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
                            <div class="flex items-center">
                                <i class="fas fa-exclamation-circle ml-2"></i>
                                <span>يوجد أخطاء في البيانات المدخلة</span>
                            </div>
                            <ul class="list-disc list-inside mt-2 text-sm">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        @csrf
                        @method('PUT')
                        
                        <!-- حقل الاسم -->
                        <div class="mb-6">
                            <label for="name" class="block text-dark font-medium mb-3">
                                <i class="fas fa-user ml-2 text-primary"></i>
                                الاسم الكامل
                            </label>
                            <input type="text" id="name" name="name" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition duration-300"
                                   value="{{ old('name', $user->name) }}" 
                                   required
                                   placeholder="ادخل الاسم الكامل للمستخدم">
                        </div>

                        <!-- حقل البريد الإلكتروني -->
                        <div class="mb-6">
                            <label for="email" class="block text-dark font-medium mb-3">
                                <i class="fas fa-envelope ml-2 text-primary"></i>
                                البريد الإلكتروني
                            </label>
                            <input type="email" id="email" name="email" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition duration-300"
                                   value="{{ old('email', $user->email) }}" 
                                   required
                                   placeholder="ادخل البريد الإلكتروني">
                        </div>

                        <!-- قسم كلمة المرور (اختياري) -->
                        <div class="mb-8 border-t pt-6">
                            <div class="flex items-center mb-4">
                                <i class="fas fa-key text-primary ml-2"></i>
                                <h3 class="text-dark font-medium">تغيير كلمة المرور (اختياري)</h3>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">اترك الحقول فارغة إذا لم ترد تغيير كلمة المرور</p>
                            
                            <div class="space-y-4">
                                <div>
                                    <label for="password" class="block text-dark font-medium mb-2">
                                        كلمة المرور الجديدة
                                    </label>
                                    <input type="password" id="password" name="password" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition duration-300"
                                           placeholder="كلمة المرور الجديدة (6 أحرف على الأقل)">
                                </div>
                                
                                <div>
                                    <label for="password_confirmation" class="block text-dark font-medium mb-2">
                                        تأكيد كلمة المرور الجديدة
                                    </label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition duration-300"
                                           placeholder="أعد إدخال كلمة المرور الجديدة">
                                </div>
                            </div>
                        </div>

                        <!-- الأزرار -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button type="submit" 
                                    class="flex-1 bg-primary text-white py-3 px-6 rounded-lg hover-primary transition duration-300 font-medium text-lg shadow-lg inline-flex items-center justify-center">
                                <i class="fas fa-save ml-2"></i>
                                حفظ التعديلات
                            </button>
                            <a href="{{ route('admin.users.index') }}" 
                               class="flex-1 bg-gray-100 text-gray-700 py-3 px-6 rounded-lg hover:bg-gray-200 transition duration-300 font-medium text-lg inline-flex items-center justify-center">
                                <i class="fas fa-times ml-2"></i>
                                إلغاء
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- معلومات المستخدم -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- معلومات الحساب -->
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200">
                    <h3 class="text-dark font-semibold mb-4 flex items-center">
                        <i class="fas fa-info-circle text-primary ml-2"></i>
                        معلومات الحساب
                    </h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">رقم المستخدم:</span>
                            <span class="text-dark font-medium">#{{ $user->id }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">الدور:</span>
                            <span class="bg-green-100 text-green-600 px-2 py-1 rounded-full text-xs font-medium">
                                {{ $user->role === 'admin' ? 'مسؤول' : 'مستخدم عادي' }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">تاريخ الإنشاء:</span>
                            <span class="text-dark font-medium">{{ $user->created_at->format('Y-m-d') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">آخر تحديث:</span>
                            <span class="text-dark font-medium">{{ $user->updated_at->format('Y-m-d') }}</span>
                        </div>
                    </div>
                </div>

                <!-- إجراءات سريعة -->
                <div class="bg-blue-50 rounded-2xl p-6 border border-blue-200">
                    <h3 class="text-blue-800 font-semibold mb-4 flex items-center">
                        <i class="fas fa-bolt text-blue-500 ml-2"></i>
                        إجراءات سريعة
                    </h3>
                    <div class="space-y-3">
                        <a href="{{ route('admin.users.index') }}" 
                           class="w-full bg-white text-blue-600 py-2 px-4 rounded-lg border border-blue-200 hover:bg-blue-50 transition duration-300 inline-flex items-center justify-center text-sm font-medium">
                            <i class="fas fa-list ml-2"></i>
                            العودة للقائمة
                        </a>
                        
                        @if(!$user->isAdmin())
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="w-full bg-white text-red-600 py-2 px-4 rounded-lg border border-red-200 hover:bg-red-50 transition duration-300 inline-flex items-center justify-center text-sm font-medium"
                                    onclick="return confirm('هل أنت متأكد من حذف المستخدم {{ $user->name }}؟')">
                                <i class="fas fa-trash ml-2"></i>
                                حذف المستخدم
                            </button>
                        </form>
                        @else
                        <button disabled
                                class="w-full bg-gray-100 text-gray-400 py-2 px-4 rounded-lg border border-gray-200 inline-flex items-center justify-center text-sm font-medium cursor-not-allowed">
                            <i class="fas fa-shield-alt ml-2"></i>
                            لا يمكن حذف المسؤول
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection