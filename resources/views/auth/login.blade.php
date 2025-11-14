@extends('layouts.app')

@section('title', 'تسجيل الدخول')

@section('content')
<section class="min-h-screen flex items-center justify-center py-12 bg-gray-50">
    <div class="max-w-md w-full">
        <!-- البطاقة -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- الهيدر -->
            <div class="bg-primary py-6 px-8 text-center">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-lock text-primary text-2xl"></i>
                </div>
                <h1 class="text-2xl font-bold text-white">تسجيل الدخول</h1>
                <p class="text-white/90 mt-2">ادخل بياناتك للوصول إلى حسابك</p>
            </div>

            <!-- الفورم -->
            <div class="p-8">
                @if($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle ml-2"></i>
                            {{ $errors->first() }}
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <!-- حقل البريد الإلكتروني -->
                    <div class="mb-6">
                        <label for="email" class="block text-dark font-medium mb-2">
                            <i class="fas fa-envelope ml-2 text-primary"></i>
                            البريد الإلكتروني
                        </label>
                        <input type="email" id="email" name="email" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition duration-300"
                               value="{{ old('email') }}" 
                               required
                               placeholder="ادخل بريدك الإلكتروني">
                    </div>

                    <!-- حقل كلمة المرور -->
                    <div class="mb-6">
                        <label for="password" class="block text-dark font-medium mb-2">
                            <i class="fas fa-lock ml-2 text-primary"></i>
                            كلمة المرور
                        </label>
                        <input type="password" id="password" name="password" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition duration-300"
                               required
                               placeholder="ادخل كلمة المرور">
                    </div>

                    <!-- زر التسجيل -->
                    <button type="submit" 
                            class="w-full bg-primary text-white py-3 px-4 rounded-lg hover-primary transition duration-300 font-medium text-lg shadow-lg">
                        <i class="fas fa-sign-in-alt ml-2"></i>
                        تسجيل الدخول
                    </button>
                </form>

                <!-- معلومات الحسابات التجريبية -->
                <div class="mt-8 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <h3 class="text-dark font-semibold mb-3 text-center">بيانات تجريبية:</h3>
                    <div class="space-y-2 text-sm text-gray-600">
                        <div class="flex justify-between">
                            <span>أدمن:</span>
                            <span class="font-mono">admin@example.com / password</span>
                        </div>
                        <div class="flex justify-between">
                            <span>مستخدم:</span>
                            <span class="font-mono">user@example.com / password</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection