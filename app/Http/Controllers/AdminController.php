<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * التحقق من صلاحية الأدمن
     */
    private function checkAdminAuthorization()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (!auth()->user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'ليس لديك صلاحية للوصول لهذه الصفحة');
        }

        return null;
    }

    /**
     * عرض لوحة تحكم الأدمن
     */
    public function dashboard()
    {
        // التحقق من الصلاحية
        $redirect = $this->checkAdminAuthorization();
        if ($redirect) {
            return $redirect;
        }

        $users = User::where('role', 'user')->get();
        return view('admin.dashboard', compact('users'));
    }

    /**
     * عرض قائمة جميع المستخدمين العاديين
     */
    public function index()
    {
        // التحقق من الصلاحية
        $redirect = $this->checkAdminAuthorization();
        if ($redirect) {
            return $redirect;
        }

        $users = User::where('role', 'user')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * عرض نموذج إنشاء مستخدم جديد
     */
    public function create()
    {
        // التحقق من الصلاحية
        $redirect = $this->checkAdminAuthorization();
        if ($redirect) {
            return $redirect;
        }

        return view('admin.users.create');
    }

    /**
     * حفظ مستخدم جديد في قاعدة البيانات
     */
    public function store(Request $request)
    {
        // التحقق من الصلاحية
        $redirect = $this->checkAdminAuthorization();
        if ($redirect) {
            return $redirect;
        }

        // التحقق من صحة البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // إنشاء المستخدم الجديد
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        return redirect()->route('admin.users.index')->with('success', 'تم إضافة المستخدم بنجاح');
    }

    /**
     * عرض نموذج تعديل مستخدم
     */
    public function edit(User $user)
    {
        // التحقق من الصلاحية
        $redirect = $this->checkAdminAuthorization();
        if ($redirect) {
            return $redirect;
        }

        // التأكد من أن المستخدم المراد تعديله ليس أدمن
        if ($user->isAdmin()) {
            return redirect()->route('admin.users.index')->with('error', 'لا يمكن تعديل بيانات الأدمن');
        }

        return view('admin.users.edit', compact('user'));
    }

    /**
     * تحديث بيانات المستخدم في قاعدة البيانات
     */
    public function update(Request $request, User $user)
    {
        // التحقق من الصلاحية
        $redirect = $this->checkAdminAuthorization();
        if ($redirect) {
            return $redirect;
        }

        // التأكد من أن المستخدم المراد تعديله ليس أدمن
        if ($user->isAdmin()) {
            return redirect()->route('admin.users.index')->with('error', 'لا يمكن تعديل بيانات الأدمن');
        }

        // التحقق من صحة البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        // تحديث البيانات الأساسية
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // تحديث كلمة المرور إذا تم إدخالها
        if ($request->password) {
            $request->validate([
                'password' => 'min:6|confirmed',
            ]);
            $user->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('admin.users.index')->with('success', 'تم تحديث المستخدم بنجاح');
    }

    /**
     * حذف مستخدم من قاعدة البيانات
     */
    public function destroy(User $user)
    {
        // التحقق من الصلاحية
        $redirect = $this->checkAdminAuthorization();
        if ($redirect) {
            return $redirect;
        }

        // التأكد من أن المستخدم المراد حذفه ليس أدمن
        if ($user->isAdmin()) {
            return redirect()->route('admin.users.index')->with('error', 'لا يمكن حذف الأدمن');
        }

        // حذف المستخدم
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'تم حذف المستخدم بنجاح');
    }

    /**
     * عرض بيانات مستخدم معين
     */
    public function show(User $user)
    {
        // التحقق من الصلاحية
        $redirect = $this->checkAdminAuthorization();
        if ($redirect) {
            return $redirect;
        }

        // التأكد من أن المستخدم المراد عرضه ليس أدمن
        if ($user->isAdmin()) {
            return redirect()->route('admin.users.index')->with('error', 'لا يمكن عرض بيانات الأدمن');
        }

        return view('admin.users.show', compact('user'));
    }
}