<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
        
    public function dashboard()
    {
        // تحقق يدوي من صلاحيات الأدمن
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'ليس لديك صلاحيات للوصول إلى هذه الصفحة.');
        }

        $users = User::where('role', 'user')->get();
        return view('admin.dashboard', compact('users'));
    }

    public function createUser()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'ليس لديك صلاحيات للوصول إلى هذه الصفحة.');
        }

        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'ليس لديك صلاحيات للوصول إلى هذه الصفحة.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'تم إضافة المستخدم بنجاح');
    }

    public function editUser($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'ليس لديك صلاحيات للوصول إلى هذه الصفحة.');
        }

        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'ليس لديك صلاحيات للوصول إلى هذه الصفحة.');
        }

        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'تم تحديث المستخدم بنجاح');
    }

    public function deleteUser($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'ليس لديك صلاحيات للوصول إلى هذه الصفحة.');
        }

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'تم حذف المستخدم بنجاح');
    }
}