<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Auth::user();
        return view('setting.index', compact('setting'));
    }
    public function update(UpdateUserRequest $request)
    {
        $user = User::where('id', $request->user_id)->first();
        $data = $request->except(['password']);
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);
        session()->flash('success', 'Account Updated Successfully');
        return redirect(route("setting.index"));
    }
}
