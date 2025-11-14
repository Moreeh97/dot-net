<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // عرض صفحة تسجيل الدخول للمستخدمين
    public function showUserLogin()
    {
        return view('auth.user-login');
    }

    // عرض صفحة تسجيل الدخول للأدمن
    public function showAdminLogin()
    {
        return view('auth.admin-login');
    }

    // معالجة تسجيل الدخول للمستخدمين
    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            
            // توجيه الأدمن إلى لوحة التحكم
            if (Auth::user()->isAdmin()) {
                return redirect()->intended('/admin/dashboard');
            }
            
            // توجيه المستخدم العادي إلى الصفحة الرئيسية
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'email' => 'بيانات الدخول غير صحيحة.',
        ]);
    }

    // معالجة تسجيل الدخول للأدمن (نفس الدالة ولكن لعرض مختلف)
    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            
            // التحقق إذا كان المستخدم أدمن
            if (Auth::user()->isAdmin()) {
                return redirect()->intended('/admin/dashboard');
            }
            
            // إذا كان مستخدم عادي، نخرجه ونظهر خطأ
            Auth::logout();
            return back()->withErrors([
                'email' => 'ليس لديك صلاحيات أدمن.',
            ]);
        }

        return back()->withErrors([
            'email' => 'بيانات الدخول غير صحيحة.',
        ]);
    }

    // تسجيل الخروج
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}