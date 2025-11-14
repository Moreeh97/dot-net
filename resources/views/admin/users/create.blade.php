@extends('layouts.app')

@section('title', 'إضافة مستخدم جديد')

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
                    <h1 class="text-3xl font-bold text-dark">إضافة مستخدم جديد</h1>
                    <p class="text-gray-600 mt-2">املأ البيانات لإنشاء حساب جديد للمستخدم</p>
                </div>
            </div>

            <!-- البطاقة -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- الهيدر -->
                <div class="bg-primary py-6 px-8">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-user-plus text-white text-xl"></i>
                        </div>
                        <div class="mr-4">
                            <h2 class="text-xl font-semibold text-white">معلومات المستخدم الجديد</h2>
                            <p class="text-white/90 mt-1">جميع الحقول مطلوبة</p>
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

                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf
                        
                        <!-- حقل الاسم -->
                        <div class="mb-6">
                            <label for="name" class="block text-dark font-medium mb-3">
                                <i class="fas fa-user ml-2 text-primary"></i>
                                الاسم الكامل
                            </label>
                            <input type="text" id="name" name="name" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition duration-300"
                                   value="{{ old('name') }}" 
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
                                   value="{{ old('email') }}" 
                                   required
                                   placeholder="ادخل البريد الإلكتروني">
                        </div>

                        <!-- حقل كلمة المرور -->
                        <div class="mb-6">
                            <label for="password" class="block text-dark font-medium mb-3">
                                <i class="fas fa-lock ml-2 text-primary"></i>
                                كلمة المرور
                            </label>
                            <input type="password" id="password" name="password" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition duration-300"
                                   required
                                   placeholder="ادخل كلمة المرور (6 أحرف على الأقل)">
                        </div>

                        <!-- حقل تأكيد كلمة المرور -->
                        <div class="mb-8">
                            <label for="password_confirmation" class="block text-dark font-medium mb-3">
                                <i class="fas fa-lock ml-2 text-primary"></i>
                                تأكيد كلمة المرور
                            </label>
                            <input type="password" id="password_confirmation" name="password_confirmation" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition duration-300"
                                   required
                                   placeholder="أعد إدخال كلمة المرور">
                        </div>

                        <!-- الأزرار -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button type="submit" 
                                    class="flex-1 bg-primary text-white py-3 px-6 rounded-lg hover-primary transition duration-300 font-medium text-lg shadow-lg inline-flex items-center justify-center">
                                <i class="fas fa-save ml-2"></i>
                                حفظ المستخدم
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

            <!-- تلميحات -->
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-2xl p-6">
                <div class="flex items-start">
                    <i class="fas fa-lightbulb text-blue-500 text-xl ml-3 mt-1"></i>
                    <div>
                        <h3 class="text-blue-800 font-semibold mb-2">نصائح لإضافة مستخدمين</h3>
                        <ul class="text-blue-700 text-sm space-y-1">
                            <li>• تأكد من صحة البريد الإلكتروني</li>
                            <li>• اختر كلمة مرور قوية للمستخدم</li>
                            <li>• سيتم إنشاء المستخدم كـ "مستخدم عادي"</li>
                            <li>• يمكن للمستخدم تعديل بياناته لاحقاً</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection