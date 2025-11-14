<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FixAdminSeeder extends Seeder
{
    public function run(): void
    {
        // حذف الأدمن إذا كان موجوداً
        DB::table('admins')->where('email', 'admin@example.com')->delete();
        
        // إنشاء الأدمن
        DB::table('admins')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $this->command->info('تم إنشاء الأدمن: admin@example.com / password123');
    }
}