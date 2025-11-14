@extends('layouts.app')

@section('title', 'الرئيسية')

@section('content')
<!-- قسم الهيرو -->
<section class="bg-gradient-to-l from-dark to-gray-900 text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-5xl font-bold mb-6 leading-tight">
            مرحباً بك في 
            <span class="text-primary">نظام الإدارة</span>
        </h1>
        <p class="text-xl mb-8 text-gray-300 max-w-2xl mx-auto leading-relaxed">
            نظام متكامل لإدارة المستخدمين والصلاحيات بطريقة احترافية وآمنة
        </p>
        
        @auth
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 max-w-md mx-auto shadow-2xl">
                <div class="w-20 h-20 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user-check text-white text-2xl"></i>
                </div>
                <h2 class="text-2xl font-semibold mb-3">مرحباً {{ auth()->user()->name }}!</h2>
                <p class="text-gray-300 mb-6">أنت مسجل دخول بنجاح إلى النظام</p>
                
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" 
                       class="bg-primary text-white px-8 py-3 rounded-lg hover-primary transition duration-300 font-medium inline-flex items-center shadow-lg">
                        <i class="fas fa-tachometer-alt ml-2"></i>
                        الذهاب إلى لوحة التحكم
                    </a>
                @else
                    <div class="bg-green-500/20 border border-green-500/30 rounded-lg p-4">
                        <i class="fas fa-check-circle text-green-400 ml-2"></i>
                        <span>تم تسجيل الدخول كمستخدم عادي</span>
                    </div>
                @endif
            </div>
        @else
            <div class="flex justify-center space-x-4 space-x-reverse">
                <a href="{{ route('login') }}" 
                   class="bg-primary text-white px-8 py-4 rounded-lg hover-primary transition duration-300 font-medium text-lg inline-flex items-center shadow-lg">
                    <i class="fas fa-sign-in-alt ml-2"></i>
                    تسجيل الدخول
                </a>
                <a href="{{ route('about') }}" 
                   class="border border-white text-white px-8 py-4 rounded-lg hover:bg-white hover:text-dark transition duration-300 font-medium text-lg inline-flex items-center">
                    <i class="fas fa-info-circle ml-2"></i>
                    تعرف علينا
                </a>
            </div>
        @endauth
    </div>
</section>

<!-- قسم المميزات -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-dark mb-12">مميزات النظام</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- ميزة 1 -->
            <div class="bg-gray-50 rounded-xl p-6 text-center shadow-sm hover:shadow-md transition duration-300 border border-gray-100">
                <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-alt text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-dark mb-3">آمن ومحمي</h3>
                <p class="text-gray-600">نظام آمن مع صلاحيات متعددة المستويات لحماية بياناتك</p>
            </div>
            
            <!-- ميزة 2 -->
            <div class="bg-gray-50 rounded-xl p-6 text-center shadow-sm hover:shadow-md transition duration-300 border border-gray-100">
                <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users-cog text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-dark mb-3">إدارة المستخدمين</h3>
                <p class="text-gray-600">إدارة كاملة للمستخدمين مع إمكانية الإضافة والحذف والتعديل</p>
            </div>
            
            <!-- ميزة 3 -->
            <div class="bg-gray-50 rounded-xl p-6 text-center shadow-sm hover:shadow-md transition duration-300 border border-gray-100">
                <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-tachometer-alt text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-dark mb-3">لوحة تحكم متكاملة</h3>
                <p class="text-gray-600">لوحة تحكم بديهية وسهلة الاستخدام للإدارة الشاملة</p>
            </div>
        </div>
    </div>
</section>
@endsection