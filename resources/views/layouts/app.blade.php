<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - نظام الإدارة</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .bg-primary { background-color: #cf1721; }
        .text-primary { color: #cf1721; }
        .border-primary { border-color: #cf1721; }
        .bg-dark { background-color: #2a201f; }
        .text-dark { color: #2a201f; }
        .hover-primary:hover { background-color: #b3141d; }
        .hover-dark:hover { background-color: #1a1615; }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <!-- شريط التنقل -->
    <nav class="bg-dark shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- الشعار -->
                <div class="flex items-center space-x-2 space-x-reverse">
                    <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
                        <i class="fas fa-cog text-white text-lg"></i>
                    </div>
                    <span class="text-white text-xl font-bold">نظام الإدارة</span>
                </div>

                <!-- روابط التنقل -->
                <div class="flex space-x-6 space-x-reverse items-center">
                    <a href="{{ route('home') }}" class="text-white hover:text-primary transition duration-300 font-medium">
                        <i class="fas fa-home ml-1"></i>
                        الرئيسية
                    </a>
                    <a href="{{ route('about') }}" class="text-white hover:text-primary transition duration-300 font-medium">
                        <i class="fas fa-info-circle ml-1"></i>
                        من نحن
                    </a>
                    
                    @auth
                        @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-primary transition duration-300 font-medium">
                            <i class="fas fa-tachometer-alt ml-1"></i>
                            لوحة التحكم
                        </a>
                        @endif
                        
                        <div class="flex items-center space-x-3 space-x-reverse">
                            <span class="text-white">
                                <i class="fas fa-user ml-1"></i>
                                {{ auth()->user()->name }}
                            </span>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-white hover:text-primary transition duration-300 font-medium">
                                    <i class="fas fa-sign-out-alt ml-1"></i>
                                    تسجيل خروج
                                </button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover-primary transition duration-300 font-medium">
                            <i class="fas fa-sign-in-alt ml-1"></i>
                            تسجيل دخول
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- المحتوى الرئيسي -->
    <main class="min-h-screen">
        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mx-4 mt-4 shadow-sm">
                <div class="flex items-center">
                    <i class="fas fa-check-circle ml-2"></i>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mx-4 mt-4 shadow-sm">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle ml-2"></i>
                    {{ session('error') }}
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- التذييل -->
    <footer class="bg-dark text-white py-8 mt-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <div class="flex items-center space-x-2 space-x-reverse">
                        <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center">
                            <i class="fas fa-cog text-white"></i>
                        </div>
                        <span class="text-xl font-bold">نظام الإدارة</span>
                    </div>
                    <p class="text-gray-300 mt-2">نقدم لكم أفضل حلول الإدارة والإشراف</p>
                </div>
                
                <div class="flex space-x-4 space-x-reverse">
                    <a href="#" class="text-gray-300 hover:text-primary transition duration-300">
                        <i class="fab fa-twitter text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-primary transition duration-300">
                        <i class="fab fa-facebook text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-primary transition duration-300">
                        <i class="fab fa-linkedin text-lg"></i>
                    </a>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-6 pt-6 text-center text-gray-300">
                <p>جميع الحقوق محفوظة &copy; {{ date('Y') }} - نظام الإدارة</p>
            </div>
        </div>
    </footer>
</body>
</html>