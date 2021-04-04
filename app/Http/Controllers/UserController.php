<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    function index()
    {
        $user = auth()->user();
        $user_id = $user->id;
        $projects = Project::where('user_id', $user_id)->paginate(5);
        return view('dashboard', ['user' => $user, 'projects' => $projects]);
    }

    public function profile()
    {
        $user = auth()->user();
        return view('profile.index', ['user' => $user]);
    }

    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,png|max:2048',
        ]);

        $fileName = time() . rand(0000, 99999) . '.' . $request->file->extension();
        $request->file->move(public_path('uploads'), $fileName);
        $id = auth()->user()->id;
        User::where('id', $id)->update(array('photo' => $fileName));
        return back()
            ->with('success', 'You have successfully updated your Photo.')
            ->with('file', $fileName);
    }
    public function userPublicProfile(Request $request)
    {
        $username = $request->username;
        $user =  User::where('username', $username)->firstorFail();
        $user_id = $user->id;
        $projects = Project::where('user_id', $user_id)->paginate(6);
        //dd($user);
        return view('profile.userProfile', ['user' => $user, 'projects' => $projects]);
    }

    function edit(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        return view('profile.edit', ['user' => $user]);
    }

    function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'stack' => 'required|max:255'
        ]);
        $id = auth()->user()->id;
        User::where('id', $id)->update(['name' => $request->name, 'phone' => $request->phone, 'stack' => $request->stack]);
        return Redirect::to('profile')->with('success', 'Profile updated successfully');
    }

    function plans()
    {
        $plans = Plan::all();
        $user = auth()->user();
        return view('plan', ['plans' => $plans, 'user' => $user]);
    }
}
