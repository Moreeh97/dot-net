@extends('layouts.app')

@section('title', 'من نحن')

@section('content')
<!-- قسم عن الشركة -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- العنوان -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-dark mb-4">من نحن</h1>
                <div class="w-24 h-1 bg-primary mx-auto"></div>
            </div>

            <!-- المحتوى -->
            <div class="bg-gray-50 rounded-2xl p-8 shadow-sm">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <div class="flex-1">
                        <h2 class="text-2xl font-semibold text-dark mb-4">نظام الإدارة المتكامل</h2>
                        <p class="text-gray-600 leading-relaxed mb-6">
                            نحن شركة رائدة في مجال تطوير حلول الإدارة والبرمجيات. نقدم نظام إدارة متكامل 
                            يمكنك من إدارة المستخدمين والصلاحيات بطريقة احترافية وآمنة.
                        </p>
                        
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <i class="fas fa-check text-primary ml-3"></i>
                                <span class="text-gray-700">نظام آمن ومحمي</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check text-primary ml-3"></i>
                                <span class="text-gray-700">واجهة مستخدم بديهية</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check text-primary ml-3"></i>
                                <span class="text-gray-700">دعم فني متكامل</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex-1">
                        <div class="bg-gradient-to-br from-primary to-red-600 rounded-2xl p-8 text-white text-center">
                            <i class="fas fa-cog text-6xl mb-4"></i>
                            <h3 class="text-xl font-semibold mb-2">التقنية والابتكار</h3>
                            <p class="text-white/90">أحدث التقنيات في تطوير أنظمة الإدارة</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- إحصائيات -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-12">
                <div class="text-center">
                    <div class="text-3xl font-bold text-primary mb-2">100+</div>
                    <div class="text-gray-600">مستخدم نشط</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-primary mb-2">24/7</div>
                    <div class="text-gray-600">دعم فني</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-primary mb-2">99.9%</div>
                    <div class="text-gray-600">وقت تشغيل</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-primary mb-2">5+</div>
                    <div class="text-gray-600">سنوات خبرة</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection