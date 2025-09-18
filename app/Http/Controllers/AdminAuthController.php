<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AdminAuth\AdminUserRepositoryInterface;

class AdminAuthController extends Controller
{
    protected $adminUserRepository;

    public function __construct(AdminUserRepositoryInterface $adminUserRepository)
    {
        $this->adminUserRepository = $adminUserRepository;
    }

    public function showLoginForm()
    {
        return view('admin.pages.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $adminUser = $this->adminUserRepository->login($credentials);

        if ($adminUser) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['username' => 'Invalid credentials.'])->withInput();
    }

    public function logout()
    {
        $this->adminUserRepository->logout();
        return redirect('/admin/login');
    }

    public function showProfileForm()
    {
        $adminUser = auth()->guard('admin')->user();
        return view('admin.pages.profile', compact('adminUser'));
    }
}
