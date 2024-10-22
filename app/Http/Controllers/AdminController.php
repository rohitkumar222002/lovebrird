<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;
class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        // Validate the email and password 
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {

            $request->session()->regenerate();

            if (auth()->user()->role == 1) {
                // dd('admin');
                return redirect()->route('admin.dashboard');
            }
            dd('user');

            Auth::logout();
            return redirect('/admin/login')->with('error', 'Unauthorized access. Admins only.');
        }

        return redirect('/admin/login')->with('error', 'Invalid credentials');
    }
    public function AdminDashboard()
    {

        return view('admin.dashboard');
    }

    public function AdminProfile()
    {
        $profile = Auth::user();
        return view('admin.profile.profile', compact('profile'));
    }
    public function AdminProfileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        if ($request->hasFile('image')) {
            $profileImage = time() . $request->image->extension();
            $request->image->move(public_path('admin/profile'), $profileImage);
            $user->image = $profileImage;
        }
        $user->save();
        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }
    public function GeneralSetting()
    {
        $settings = Setting::first();
        return view('admin.setting.general-setting', compact('settings'));
    }
    public function GeneralSettingUpdate(Request $request)
    {
        $request->validate([
            'logo' => 'image|nullable',
            'background_image' => 'image|nullable',
            'login_title' => 'string|nullable',
            'description' => 'string|nullable',
            'description_title' => 'string|nullable',
        ]);
    
        $settings = Setting::first(); // Assuming only one row exists
    
        // Update text fields
        $settings->login_title = $request->input('login_title');
        $settings->description = $request->input('description');
        $settings->description_title = $request->input('description_title');
    
        if ($request->hasFile('logo')) {
            if ($settings->logo && file_exists(public_path('admin/setting/' . $settings->logo))) {
                unlink(public_path('admin/setting/' . $settings->logo));
            }
    
            $logoPath = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('admin/setting'), $logoPath);
            $settings->logo = $logoPath;
        }
    
        if ($request->hasFile('background_image')) {
            if ($settings->background_image && file_exists(public_path('admin/setting/' . $settings->background_image))) {
                unlink(public_path('admin/setting/' . $settings->background_image));
            }
    
            $bgPath = time() . '.' . $request->background_image->extension();
            $request->background_image->move(public_path('admin/setting'), $bgPath);
            $settings->background_image = $bgPath;
        }
    
        $settings->save();
    
        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
    
}